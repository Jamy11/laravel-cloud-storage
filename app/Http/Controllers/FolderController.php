<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class FolderController extends Controller
{
    //
    public function privateFolder()
    {
        $folders = Auth::user()->privateParentFolder()->get();

        $files = Auth::user()->privateParentFiles()->get();

        return view('user.privateFolder')->with('folders',$folders)->with('files',$files);
    }

    public function privateFolderAdd(Request $req)
    {
        $req->validate([
            'folder_name'=>'required',
        ]);

        $folder = new Folder;

        $folder->folder_name = $req->folder_name;
        $folder->user_id = Auth::user()->id;
        $folder->parent_id = null;
        $folder->shared = 'private';
        $folder->archived = false;

        $folder->save();
        return back();
    }

    public function privateFolderUpload()
    {
        return view('user.privateFolderFileUpload');
    }

    public function uploadStatus(Request $req)
    {
        $req->validate([
            'files'=>'required',
        ]);


        if($req->hasFile('files'))
        {
            foreach($req->file('files') as $file){
                $File = new File;
                $name = time().rand(1,100).$file->getClientOriginalName();
                $file->move('uploads/files',$name);


                $File->file_name = $name;
                $File->archived = false;
                $File->user_id = Auth::user()->id;
                $File->folder_id = null;

                $File->save();
            }
        }

        return redirect()->route('user.privateFolder');

    }
    public function download($filename)
    {
        $path=public_path("uploads/files/".$filename);
        return response()->download($path);
    }


    //private folder sub
    public function privateSubFolder($id)
    {
        //($id);
        $id = Crypt::decrypt($id);
        $f_name= Folder::find($id);
        //dd($f_name->folder_name);
        $folders = Auth::user()->privateSubFolder($id)->get();

        $files = Auth::user()->privateSubFiles($id)->get();

        return view('user.privateFolder')->with('folders',$folders)->with('files',$files)->with('id',$id)->with('f_name',$f_name);
    }


    public function privateSubFolderAdd($id,Request $req)
    {

        $req->validate([
            'folder_name'=>'required',
        ]);

        $folder = new Folder;
        $id = Crypt::decrypt($id);

        //dd($id);
        $folder->folder_name = $req->folder_name;
        $folder->user_id = Auth::user()->id;
        $folder->parent_id = $id;
        $folder->shared = 'private';
        $folder->archived = false;

        $folder->save();
        return redirect()->route('user.privateSubFolder',[Crypt::encrypt($id)]);
    }
    public function privateSubFolderUpload()
    {
        return view('user.privateFolderFileUpload');
    }

    public function uploadStatusSub(Request $req,$id)
    {
        $id = Crypt::decrypt($id);
        //dd($id);
        $req->validate([
            'files'=>'required',
        ]);


        if($req->hasFile('files'))
        {
            foreach($req->file('files') as $file){
                $File = new File;
                $name = time().rand(1,100).$file->getClientOriginalName();
                $file->move('uploads/files',$name);


                $File->file_name = $name;
                $File->archived = false;
                $File->user_id = Auth::user()->id;
                $File->folder_id = $id;

                $File->save();
            }
        }
        $req->session()->flash('status','Upload Complete.');

        return redirect()->route('user.privateSubFolder',[Crypt::encrypt($id)]);

    }
}
