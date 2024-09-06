<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    // Retrieve all to-do items
    public function index()
    {
        return response()->json(Todo::all(), Response::HTTP_OK);
    }

    // Create a new to-do item
    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->validated()); // Automatically validated
        return response()->json($todo, Response::HTTP_CREATED);
    }
    // Retrieve a specific to-do item
    public function show($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($todo, Response::HTTP_OK);
    }

    // Update a to-do item
    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], Response::HTTP_NOT_FOUND);
        }

        $todo->update($request->validated());
        return response()->json($todo, Response::HTTP_OK);
    }

    // Delete a to-do item
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], Response::HTTP_NOT_FOUND);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
