<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookRequest;
use App\Models\Notebook;
use Illuminate\Http\JsonResponse;

class NotebookController extends Controller
{
    public function index():JsonResponse
    {
        $allNote = Notebook::all();
        return response()->json($allNote);
    }

    public function show($id):JsonResponse
    {
        $showNote = Notebook::findOrFail($id);
        return response()->json($showNote);
    }

    public function store(NotebookRequest $request) :JsonResponse
    {
        $data = $request->validated();
        Notebook::create($data);

        return response()->json(['message' => 'note created'], 201);
    }


    public function update(NotebookRequest $request, $id): JsonResponse
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->update($request->validated()); 
        return response()->json(['message' => 'Запись обновлена', 'data' => $notebook], 200);
    }

    public function destroy($id) :JsonResponse
    {
        Notebook::destroy($id);
        return response()->json(['message' => 'Запись удаленна']);
    }
}
