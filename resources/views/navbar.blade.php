<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Catalogue</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="{{route('home')}}">
					@lang('navbar.home') 
					<span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('addBook')}}">@lang('navbar.addBook')</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" data-toggle="modal" data-target="#ajoutcategorie">@lang('navbar.addCategory')</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" data-toggle="modal" data-target="#modifiercategorie">@lang('navbar.editCategory')</a>
			</li>
		</ul>
	</div>
</nav>

<div class="modal fade" id="ajoutcategorie" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">@lang('navbar.addBook')</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{route('addCategory')}}">
					@csrf     
					<div class="form-group">
						<label for="exampleInputEmail1">@lang('navbar.nameCategory')</label>
						<input type="text" class="form-control" name="name">
					</div>                          
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('navbar.close')</button>
						<button type="submit" class="btn btn-primary">@lang('book.submit')</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modifiercategorie" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="POST" action="{{route('editCategory')}}" id="editID" accept-charset="UTF-8" >
				@csrf
				<div class="modal-header">
					<h5 class="modal-title">@lang('navbar.editCategory')</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label>@lang('navbar.selectCategory') </label>
					<select name="id" class="form-control" id="editcategorie" form="editID">
						@foreach ($lists as $list)
							<option value="{{ $list->id }}">{{ $list->name}} </option>
						@endforeach
					</select>
					<input type="text" name="name" class="form-control" id="newname" style="margin-top :10px">         
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('navbar.close')</button>
					<button type="submit" class="btn btn-primary">@lang('book.submit')</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#editcategorie").change(function(){
		$("#newname").val($("#editcategorie option:selected").text());
	});
</script>