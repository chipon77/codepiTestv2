@extends('template')

@section('titre')
   addBook
@endsection

@section('contenu')

<form method="post" action="{{route('sendAddBook')}}"> 
    @csrf  
    <label>@lang('book.title')</label>
    <input type="text" name="title" class="form-control">  
    <label>@lang('book.author')</label>
    <input type="text" name="author" class="form-control">  
    <label>@lang('book.editor')</label>
    <input type="text" name="editor" class="form-control">  
    <label>@lang('book.price')</label>
    <input type="number" name="price" class="form-control">    
    <label>@lang('book.type')</label>
    <input type="text" name="type" class="form-control"> 
    <label>@lang('book.category')  </label> 
    <select name="category[]" class="form-control" multiple="multiple">
        @foreach ($lists as $list)
            <option value="{{ $list->id }}">{{ $list->name}} </option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary" style="margin-top:10px">@lang('book.submit')</button> 
</form>

@endsection