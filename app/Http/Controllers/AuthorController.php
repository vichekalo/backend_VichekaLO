<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Author::get();
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
            'name' => 'required|min:3|max:10',
            'age' => 'required|min:1|max:10',
            'province' => 'nullable'
        ]);
        $author = new Author();
        $author->name = $request->name;
        $author->age = $request->age;
        $author->province = $request->province;
        $author->save();
        return response()->json(['Message' => 'Created', 'Data' => $author], 201);
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
        return Author::findOrFail($id);
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
            'name' => 'required|min:3|max:10',
            'age' => 'required|min:1|max:10',
            'province' => 'nullable'
        ]);
        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->age = $request->age;
        $author->province = $request->province;
        $author->save();
        return response()->json(['Message' => 'Updated', 'Data' => $author], 200);
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
        return Author::destroy($id);
    }
}
