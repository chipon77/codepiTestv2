    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Catalogue</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">Accueil 
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('addBook')}}">Ajout Produit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#ajoutcategorie">Ajout catégorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modifiercategorie">Modifier catégorie</a>
          </li>
        </ul>
      </div>
    </nav>
    
  <div class="modal fade" id="ajoutcategorie" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ajout catégorie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form method="post" action="{{route('addCategory')}}">
            @csrf     
            <div class="form-group">
              <label for="exampleInputEmail1">nom categorie</label>
              <input type="text" class="form-control" name="name">
            </div>                          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
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
            <h5 class="modal-title" >modifier catégorie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label>Selectionner  une catégorie puis changer le nom : </label>
            <select name="id" class="form-control" id="editcategorie" form="editID">
              @foreach ($lists as $list)
                <option value="{{ $list->id }}">{{ $list->name}} </option>
              @endforeach
            </select>
            <input type="text" name="name" class="form-control" id="newname" style="margin-top :10px">         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">//javascript pour pré-remplir l'input avec le nom de la catégorie à modifier
    $("#editcategorie").change(function(){
      $("#newname").val($("#editcategorie option:selected").text());
      //$("#editID").attr('action',"category/edit/"+$("#editcategorie option:selected").val());
    });
  </script>