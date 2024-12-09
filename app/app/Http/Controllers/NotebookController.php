<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookRequest;

class NotebookController extends Controller
{
    public function index(NotebookRequest $request)
    {
        return response()->json(['Hello world1' => ' veniamin!'], 200);
    }

    public function show(NotebookRequest $request)
    {
        return response()->json(['Hello world2' => ' asdf'], 200);
    }

    public function store(NotebookRequest $request)
    {
        return response()->json(['Hello world3' => ' asdf'], 200);
    }

    public function update(NotebookRequest $request)
    {
        return response()->json(['Hello world4' => ' asdf'], 200);
    }

    public function destroy(NotebookRequest $request) 
    {
        return response()->json(['Hello world5' => 'asdf'], 200);
    }
}
