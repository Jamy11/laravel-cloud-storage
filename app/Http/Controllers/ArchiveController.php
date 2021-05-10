<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ArchiveController extends Controller
{
    //
    public function index()
    {
        $folders = Auth::user()->archiveFolder()->get();

        $files = Auth::user()->archiveFiles()->get();

        return view('user.archive')->with('folders',$folders)->with('files',$files);
    }

    public function unmakeArchiveFolder($id)
    {

        $id = Crypt::decrypt($id);
        $folder = Folder::find($id);
        $folder->archived = false;
        $folder->save();
        return back();
    }

    public function unmakeArchiveFile($id)
    {
        $file = File::find($id);
        $file->archived = false;
        $file->save();
        return back();
    }
}
