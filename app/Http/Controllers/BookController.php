<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\CategoryRequest;
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
     * return the add book page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists=Category::get();
        return view('addBook', ['lists' => $lists]);
    }

    /**
     * Save book data in DB
     *
     * @param  App\Http\Requests\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book=new book;
        $book->title = $request->title;
        $book->type = $request->type;
        $book->author = $request->author;
        $book->editor = $request->editor;
        $book->price = $request->price;
        $book->display = 1;       
        $book->save();        
        foreach ($request->categories as $key ) {
            $book->category()->attach($key);
        }
        return redirect()->route('home'); 
    }

    /**
     * Display the details page of book
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = book::find($id);
        $categories = $details->category()->get();
        $lists = Category::get();
        return view('book', ['details' => $details, 'lists' => $lists, 'categories' => $categories])->with('id', $id);
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
     * Modify the book data ib DB
     *
     * @param  \App\Http\Requests\BookRequest;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book = book::where('id', $id);
        $book->update(['title' => $request->title]);
        $book->update(['author' => $request->author]);
        $book->update(['type' => $request->type]);
        $book->update(['editor' => $request->editor]);
        $book->update(['price' => $request->price]);
        foreach ($request->categories as $key ) {
            $category = category::where('id',$key)->first();
            if (!$category->book()->find($id)) {
                $category->book()->attach($id);
            }
        }    
        return redirect()->route('details', ['id' => $id]); 
    }

    /**
     *change display in DB
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details = book::where('id', $id)->update(['display' => 0]);
        return redirect()->route('home'); 
    }


    /**
     *link a  book with a category
     *@param  \App\Http\Requests\CategoryRequest  $request
     *@param  int  $id
     *@return \Illuminate\Http\Response
     */
    public function link(CategoryRequest $request, $id)
    {
        $category = category::where('id',$request->category)->first();
        if (!$category->book()->find($id)) {
            $category->book()->attach($id);
        }
        return redirect()->route('details', ['id' => $id]);
    }
}
