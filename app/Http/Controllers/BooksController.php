<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|min:3|max:10',
            'body' => 'required|min:3|max:50',
        ]);
        $book = new Book();
        $book->title = $request->title;
        $book->body = $request->body;
        $book->author_id = $request->author_id;
        $book->save();
        return response()->json(['Message' => 'Created', 'Data' => $book], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Book::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'title' => 'required|min:3|max:10',
            'body' => 'required|min:3|max:50',
        ]);
        $author = Author::findOrFail($id);
        $book->title = $request->title;
        $book->body = $request->body;
        $book->author_id = $request->author_id;
        $book->save();
        return response()->json(['Message' => 'Updated', 'Data' => $book], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Book::destroy($id);
    }
}
