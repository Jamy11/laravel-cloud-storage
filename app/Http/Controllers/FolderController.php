<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class FolderController extends Controller
{
    ///////////////////////////  Private Folder  /////////////////////////////////////////////////////////
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

    public function privateUploadStatus(Request $req)
    {
        $req->validate([
            'files'=>'required',
        ]);


        if($req->hasFile('files'))
        {
            foreach($req->file('files') as $file){
                $File = new File;
                $name = date('y-m-d').time().rand(1,1000).$file->getClientOriginalName();
                $file->move('uploads/files',$name);


                $File->file_name = $file->getClientOriginalName();
                $File->file_uniquename = $name;
                $File->shared = 'private';
                $File->archived = false;
                $File->user_id = Auth::user()->id;
                $File->folder_id = null;

                $File->save();
            }
        }

        return redirect()->route('user.privateFolder');

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

    public function privateUploadStatusSub(Request $req,$id)
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


                $File->file_name = $file->getClientOriginalName();
                $File->file_uniquename = $name;
                $File->shared = 'private';
                $File->archived = false;
                $File->user_id = Auth::user()->id;
                $File->folder_id = $id;

                $File->save();
            }
        }
        $req->session()->flash('status','Upload Complete.');

        return redirect()->route('user.privateSubFolder',[Crypt::encrypt($id)]);

    }
//////////////// common method         ////////////////////////////////////////////
    public function archiveFile($id)
    {
        $file = File::find($id);
        $file->archived = true;
        $file->save();
        return back();
    }

    public function archiveFolder($id)
    {
        $id = Crypt::decrypt($id);
        $folder = Folder::find($id);
        $folder->archived = true;
        $folder->save();
        return back();
    }


    public function download($filename)
    {
        $path=public_path("uploads/files/".$filename);
        return response()->download($path);
    }

///////////////////////////////////////////////////  public folder //////////////////////////////////////////////

    public function publicFolder()
    {
        $folders = Auth::user()->publicParentFolder()->get();

        $files = Auth::user()->publicParentFiles()->get();

        return view('user.publicFolder')->with('folders',$folders)->with('files',$files);
    }

    public function publicFolderAdd(Request $req)
    {
        $req->validate([
            'folder_name'=>'required',
        ]);

        $folder = new Folder;

        $folder->folder_name = $req->folder_name;
        $folder->user_id = Auth::user()->id;
        $folder->parent_id = null;
        $folder->shared = 'public';
        $folder->archived = false;

        $folder->save();
        return back();
    }


    public function publicFolderUpload()
    {
        return view('user.privateFolderFileUpload');
    }


    public function publicUploadStatus(Request $req)
    {
        $req->validate([
            'files'=>'required',
        ]);


        if($req->hasFile('files'))
        {
            foreach($req->file('files') as $file){
                $File = new File;
                $name = date('y-m-d').time().rand(1,1000).$file->getClientOriginalName();
                $file->move('uploads/files',$name);


                $File->file_name = $file->getClientOriginalName();
                $File->file_uniquename = $name;
                $File->shared = 'public';
                $File->archived = false;
                $File->user_id = Auth::user()->id;
                $File->folder_id = null;

                $File->save();
            }
        }

        return redirect()->route('user.publicFolder');

    }

    ////////// public sub folder





    public function publicSubFolder($id)
    {
        //($id);
        $id = Crypt::decrypt($id);
        $f_name= Folder::find($id);
        //dd($f_name->folder_name);
        $folders = Auth::user()->publicSubFolder($id)->get();

        $files = Auth::user()->publicSubFiles($id)->get();

        return view('user.publicFolder')->with('folders',$folders)->with('files',$files)->with('id',$id)->with('f_name',$f_name);
    }


    public function publicSubFolderAdd($id,Request $req)
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
        $folder->shared = 'public';
        $folder->archived = false;

        $folder->save();
        return redirect()->route('user.publicSubFolder',[Crypt::encrypt($id)]);
    }


    public function publicSubFolderUpload()
    {
        return view('user.privateFolderFileUpload');
    }

    public function publicUploadStatusSub(Request $req,$id)
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


                $File->file_name = $file->getClientOriginalName();
                $File->file_uniquename = $name;
                $File->shared = 'public';
                $File->archived = false;
                $File->user_id = Auth::user()->id;
                $File->folder_id = $id;

                $File->save();
            }
        }
        $req->session()->flash('status','Upload Complete.');

        return redirect()->route('user.publicSubFolder',[Crypt::encrypt($id)]);

    }
}
