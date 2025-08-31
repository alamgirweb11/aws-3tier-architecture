<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    // Get all authors
    public function index()
    {
        return response()->json(Author::all(), Response::HTTP_OK);
    }

    // Store new author
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:authors,email',
            'remarks' => 'nullable|string',
        ]);

        $author = Author::create($validated);

        return response()->json($author, Response::HTTP_CREATED);
    }

    // Show single author
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($author, Response::HTTP_OK);
    }

    // Update author
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'name'    => 'sometimes|string|max:255',
            'email'   => 'sometimes|email|unique:authors,email,' . $author->id,
            'remarks' => 'nullable|string',
        ]);

        $author->update($validated);

        return response()->json($author, Response::HTTP_OK);
    }

    // Delete author
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], Response::HTTP_NOT_FOUND);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted'], Response::HTTP_OK);
    }
}
