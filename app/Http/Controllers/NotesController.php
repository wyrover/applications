<?php

namespace App\Http\Controllers;

use App\Notes;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{

    public function index(Request $request)
    {
        $notes = Notes::where('user_id', '=', $request->segment(2))->paginate(10);
        return view('notes.index', compact('notes'));
    }

    public function store(Request $request)
    {
        Notes::create($request->all());
        flash()->success('Success', 'Note successfully created');
        return back();
    }


    public function delete(Request $request)
    {
        $n = Notes::where('id', '=', $request->segment(3))->delete();

        flash()->success('Record Deleted', 'Note successfully removed');
        return back();
    }
}
