@extends('template')

@section('title')
    @lang('book.details')
@endsection

@section('content')
	<div class="container">
		<form method="post" action="{{ route('editBook', ['id' => $id]) }}">
			@csrf 
			<h1>
				<div  style="display: inline-block" class="base">{{ $details->title }}</div>
				<div  style="display: inline-block">
					<input type="text" name="title" class="modify form-control" style="visibility: hidden;" value="{{ $details->title }}"> 
				</div>
			</h1> 
			<div class="my-3 p-3 bg-white rounded box-shadow">   
				<div class="media text-muted pt-3">
					<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" style="font-size: 20px">
						<div style="display: inline-block">@lang('book.author')</div> 
						<div class="base" style="display: inline-block">{{ $details->author }}</div>
						<div  style="display: inline-block">
							<input type="text" name="author" class="modify form-control" style="visibility: hidden;" value="{{ $details->author }}"> 
						</div>					
					</div>
				</div>
			</div>
			<div class="my-3 p-3 bg-white rounded box-shadow">
				<div class="media text-muted pt-3">
					<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" style="font-size: 20px">
						<div style="display: inline-block">@lang('book.editor')</div>
						<div class="base" style="display: inline-block">{{ $details->editor }}</div>
						<div  style="display: inline-block">
							<input type="text" name="editor" class="modify form-control" style="visibility: hidden;" value="{{ $details->editor }}"> 
						</div>				
					</div>
				</div>
			</div>
			<div class="my-3 p-3 bg-white rounded box-shadow">
				<div class="media text-muted pt-3">
					<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"style="font-size: 20px">
						<div style="display: inline-block">@lang('book.price')</div>
						<div class="base" style="display: inline-block">{{ $details->price }} € </div>
						<div  style="display: inline-block">
							<input type="number" name="price" step="0.01" class="modify form-control" style="visibility: hidden;" value="{{ $details->price }}"> 
						</div>
					</div>
				</div>
			</div>
			<div class="my-3 p-3 bg-white rounded box-shadow">
				<div class="media text-muted pt-3">
					<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" style="font-size: 20px">
						<div style="display: inline-block">@lang('book.type')</div>
						<div class="base" style="display: inline-block">{{ $details->type }}</div>
						<div  style="display: inline-block">
							<input type="text" name="type" class="modify form-control" style="visibility: hidden;" value="{{ $details->type }}"> 
						</div>
					</div>
				</div>
			</div>
			<div class="my-3 p-3 bg-white rounded box-shadow">
				<div class="media text-muted pt-3">
					<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" style="font-size: 20px">
						<div style="display: inline-block">@lang('book.category')</div>
						<div class="base" style="display: inline-block">
							<div>
								@foreach($categories as $category)
									{{ $category->name }}
								@endforeach
							</div>
						</div>
						<div  style="display: inline-block, vertical-align:middle">
							<select name="categories[]" class="form-control modify" style="visibility: hidden;" multiple="multiple">
	            				@foreach ($lists as $list)
	            					@if ($categories->find($list->id))
	                					<option value="{{ $list->id }}" selected="selected">{{ $list->name }} </option>
	                				@else 
	                					<option value="{{ $list->id }}" >{{ $list->name }} </option>
	                				@endif
	            				@endforeach
	        				</select>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary modify" style="visibility: hidden;">@lang('book.submit')</button> 
		</form> 	
	</div>

	<div class="row">
		<div class="col-md-4">
			<form  method="post" action="{{ route('deleteBook', ['id' => $id]) }}">
				@csrf
				<button type="submit" class="btn btn-primary">@lang('book.delete')</button> 
			</form>
		</div>
		<div class="col-md-4">
			<a href="#" id="edit" class="btn btn-primary">@lang('book.modify')</a>
		</div>
		<div class="col-md-4">
			<a href="#" data-toggle="modal" data-target="#liecategorie" class="btn btn-primary">@lang('book.link')</a>
		</div>
	</div>

	<div class="modal fade" id="liecategorie" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Ajout catégorie</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{ route('linkBook', ['id' => $id]) }}"> 
						@csrf
						<select name="category" class="form-control">
							@foreach ($lists as $list)
								<option value="{{ $list->id }}">{{ $list->name}} </option>
							@endforeach
						</select>
						<button type="submit" class="btn btn-primary">Submit</button> 					
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">//javascript pour faire apparaitre les inputs pour changer les information du produits
		$("#edit").click(function(){
			$(".modify").css("visibility","visible");
			$(".base").hide();
		});
	</script>
@endsection
