@extends('template')

@section('title')
   @lang('book.addBook')
@endsection

@section('content')
    <form method="post" action="{{route('sendAddBook')}}"> 
        @csrf  
        <label>@lang('book.title')</label>
        <input type="text" name="title" class="form-control">  
        <label>@lang('book.author')</label>
        <input type="text" name="author" class="form-control">  
        <label>@lang('book.editor')</label>
        <input type="text" name="editor" class="form-control">  
        <label>@lang('book.price')</label>
        <input type="number" step="0.01" name="price" class="form-control">    
        <label>@lang('book.type')</label>
        <input type="text" name="type" class="form-control"> 
        <label>@lang('book.category')  </label> 
        <select name="categories[]" class="form-control" multiple="multiple">
            @foreach ($lists as $list)
                <option value="{{ $list->id }}">{{ $list->name}} </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary" style="margin-top:10px">@lang('book.submit')</button> 
    </form>
@endsection