<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Todo; 
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $user = User::user();
        $todos = $user->todos()->latest()->get(); 
        return response()->json(['todos' => $todos], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::user();

        $todo = $user->todos()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json(['todo' => $todo], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::user();

        $todo = $user->todos()->find($id);
        if (!$todo) {
            return response()->json(['error' => 'Todo not found'], 404);
        }

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json(['todo' => $todo], 200);
    }

    public function destroy($id)
    {
        $user = User::user();

        $todo = $user->todos()->find($id);
        if (!$todo) {
            return response()->json(['error' => 'Todo not found'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully'], 200);
    }
}
