@extends('template')

@section('titre')
   addBook
@endsection

@section('contenu')

    <form method="post" action="{{route('sendAddBook')}}"> 
        @csrf  
        <label>Entrez le titre :  </label>
        <input type="text" name="title" class="form-control">  
        <label>Entrez l'auteur :  </label>
        <input type="text" name="author" class="form-control">  
        <label>Entrez le l'éditeur :</label>
        <input type="text" name="editor" class="form-control">  
        <label>Entrez le prix :  </label>
        <input type="number" name="price" class="form-control">    
        <label>Entrez le type :  </label>
        <input type="text" name="type" class="form-control"> 
        <label>Entrez la categorie :  </label> 
        <select name="category[]" class="form-control" multiple="multiple">
            @foreach ($lists as $list)
                <option value="{{ $list->id }}">{{ $list->name}} </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button> 
    </form>
@endsection