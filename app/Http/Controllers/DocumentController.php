<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{
    public function show(User $user, $filename)
    {
        // find the document from db
       $document = $user->documents()->where('filename',$filename)->get()->first();

        //authorise user making request
        if(! request()->user()->isAdmin()){
            abort(403);
        }
        if($document->extension = 'pdf'){
            return response(Storage::disk('s3')->get('/documents/'.$user->id.'/'.$filename))
                ->header('Content-Type', 'application/pdf');
        }

        //stream the file to the browser

    }
}
