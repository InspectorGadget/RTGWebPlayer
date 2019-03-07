<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{

    public function getDatabaseHandler(): DatabaseHandler {
        return new DatabaseHandler();
    }

    public function addVideo(Request $request) {
        $this->validate($request, [
           'title' => 'required',
           'description' => 'required',
           'upload' => 'required|max:200000'
        ]);

        $random = uniqid();
        $appendedFileName = "{$random}-{$request->file('upload')->getClientOriginalName()}";

        $buildQuery = [
          'email' => Session::get('email'),
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'file' => $appendedFileName,
          'uploaded_at' => new \DateTime()
        ];

        if ($this->getDatabaseHandler()->storeVideoData($buildQuery)) {
            $request->file('upload')->storeAs('public', $appendedFileName);
            return back()->with('message', 'Video Added!');
        } else {
            return back()->with('error', 'Failed!');
        }
    }

    public function getAllVideos() {
        $result = DB::table(env("DB_VIDEO"))
            ->get()
            ->toArray();

        return (array) $result;
    }

    public function deleteVideo($id) {
        $result = DB::table(env("DB_VIDEO"))
            ->where('videoID', $id)
            ->delete();

        return $result ? back()->with('message', 'Deleted!') : back()->with('error', 'Oops!');
    }

}
