<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        unset($request);

        $authors = Author::all();

        return response()->json($authors);
    }

    /**
     * Show a single author
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        unset($request);

        $author = Author::findOrFail($id);
 
        return response()->json($author);
    }

    /**
     * Create a new author
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|between:2,50',
            'email' => 'required|email|between:5,50',
        ]);

        $author = new Author();
        $author->name = $data['name'];
        $author->email = $data['email'];
        $author->save();

        return response()->json($author);
    }

    /**
     * Update a single author
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|between:3,50',
            'email' => 'required|email|between:5,50',
        ]);

        $author = Author::findOrFail($id);

        $author_with_email = Author::whereEmail($data['email'])->count();
        abort_if(
            ($author_with_email > 0),
            Response::HTTP_UNPROCESSABLE_ENTITY,
            'Author With Email Already Exists'
        );

        $author->name = $data['name'];
        $author->email = $data['email'];
        $author->save();

        return response()->json($author);
    }

    /**
     * Delet a single author
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        unset($request);

        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json($author);
    }




    /**
     * Display a listing of the resource.
     *
     */
    public function webIndex(Request $request)
    {
        unset($request);

        $author = new Author();
        $author->name = 'Foedn Todd';
        $author->email = 'foden@example.com';
        $author->save();

        $authors = Author::all();

        return view('authors.index', ['authors' => $authors]);
    }
}
