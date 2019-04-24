<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists=Category::get();
        return view('addBook',['lists' => $lists]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book= new book;
        $book->title = $request->title;
        $book->type = $request->type;
        $book->author = $request->author;
        $book->editor = $request->editor;
        $book->price = $request->price;
        $book->display=1;       
        $book->save();
        
        foreach ($request->category as $key ) {
            $book->category()->attach($key);
        }
        return redirect()->route('home'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details=  book::find($id);
        $listcategorie=$details->category()->get();//liste categories d'UN produit
        $lists=Category::get();
        return view('book',['details' => $details,'lists' => $lists,'listcategorie' => $listcategorie])->with('id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book=book::where('id', $id);
        $book->update(['title' => $request->title]);
        $book->update(['author' => $request->author]);
        $book->update(['type' => $request->type]);
        $book->update(['editor' => $request->editor]);
        $book->update(['price' => $request->price]);

        foreach ($request->category as $key ) {
            $category= category::where('id',$key)->first();
            if ($category->book()->find($id)) {
                # code...
            }
            else{
                $category->book()->attach($id);
            }
        }    
        return redirect()->route('details', ['id' => $id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details=  book::where('id', $id)->update(['display' => 0]);
        return redirect()->route('home'); 
    }


    public function link(Request $request, $id)
    {
        $category= category::where('id',$request->category)->first();
        $category->book()->attach($id);
        return redirect()->route('details', ['id' => $id]);
    }
}
