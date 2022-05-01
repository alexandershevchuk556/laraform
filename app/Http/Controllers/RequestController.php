<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{

    public function getRequests()
    {
        // $userId = Auth::id();
        // $user = User::findOrFail($userId);
        // $requests = $user->requests;
        $requests = Auth::user()->requests;
        return view('welcome', compact('requests'));

    }

    public function addRequest(Request $request)
    {

        // $request->validate([
        //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        //     ]);

        $userId = Auth::id();
        $user = User::findOrFail($userId);



        $newRequest = new RequestModel($request->only('name', 'phone', 'company', 'request', 'message'));

        $savedRequest = $user->requests()->save($newRequest);       
        
        $fileModel = new File;
        
        if($request->file('file')) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $fileName;
            $fileModel->file_path = '/storage/' . $filePath;

            $savedRequest->file()->save($fileModel);

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        
        }


        
        return redirect('/');
    }

       
}
