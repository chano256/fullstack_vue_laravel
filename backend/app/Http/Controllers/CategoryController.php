<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->validate([
            'search' => 'nullable|string|min:3'
        ]);

        $search = $data['search'] ?? '';

        $filters = [

        ];
        
        // WHERE MATCH(your_column) AGAINST(
        //     IF(LENGTH('your_search_term') > 3, '+your_search_term*', '')
        //     IN BOOLEAN MODE
        // );
        $categories = Category::filterBy($filters)->get();
        return response()->json($categories);
    }
}
