<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

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
     * Display a listing of the resource.
     *
     */
    public function webIndex(Request $request)
    {
        unset($request);

        $authors = Author::all();

        return view('authors.index', ['authors' => $authors]);
    }
}
