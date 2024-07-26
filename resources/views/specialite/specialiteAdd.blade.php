@extends('layouts.app')

@section('content')

<div class="content">
    <a href="" class="btn btn-danger btn-addon pull-right">
        <i class="fa fa-ban fa-fw"></i>
        Annuler
    </a>

    <div class="row ">
    <div class="col-md-12 m-t-15">
<section class="panel">
    <header class="panel-heading">
        Ajout d'un Campus
    </header>
    <div class="panel-body">
        <form action="" method="POST" role="form"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">nom de la specialite </label>
                <input type="text" class="form-control" name="nom" placeholder="Entrer le nom de la specialite" require>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">filiere </label>
                <input type="text" class="form-control" name="contenu" placeholder="entrer la filiere" require>
            </div>



            <button type="submit" class="btn btn-info">Enregistrer</button>
            <a href="" type="submit" class="btn btn-danger">Annuler</a>
        </form>

    </div>
</section>
</div>
</div>
</div>


@endsection
