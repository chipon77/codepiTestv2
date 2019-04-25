@extends('template')

@section('title')
    @lang('navbar.catalogue')
@endsection

@section('content')
    <div class="container" style="margin-top:10px">
    	<div class="row">
            @foreach ($books as $book)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <div class="card-text">                   
                				<div class="col">
                					<h1 style="margin-left:auto;" align="center">{{ $book->title }}</h1>
                				</div>
        	        			<div class="col" style="margin-top:10px">
        	        				<h4 style="margin-left:auto;" align="center">{{ $book->author }}</h4>
        	        			</div>
                				<div class="col">
                					<a href="{{ route('details',['n' => $book->id]) }}" class="btn btn-primary">@lang('book.details')</a>
                				</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
        {{ $books->links() }}
    </div>
@endsection
