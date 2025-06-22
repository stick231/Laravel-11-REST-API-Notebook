<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookRequest;
use App\Models\Notebook;
use Illuminate\Http\JsonResponse;

class NotebookController extends Controller
{
    public function index():JsonResponse
    {
        $notebooks = Notebook::all();

        if(!empty($notebooks)){
            return response()->json(['success' => 'false', 'message' => 'Notebook is not found'], 404);
        }

        return response()->json(['success' => 'true', 'data' => $notebooks]);
    }

    public function show(Notebook $notebook):JsonResponse
    {
        return response()->json($notebook);
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

    public function destroy(Notebook $notebook) :JsonResponse
    {
        $notebook->delete();
        return response()->json(['message' => 'Запись удаленна']);
    }
}
