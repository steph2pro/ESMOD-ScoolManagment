@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('campus') }}" class="btn btn-danger btn-addon pull-right">
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
         <form action="{{ route('campus.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">nom du campus </label>
                <input type="text" class="form-control" name="nom" placeholder="Entrer le nom du campus" require>
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Adresse  ou ville</label>
                <input type="text" class="form-control" name="adresse" placeholder="ville,quatier" require>
            </div>



            <button type="submit" class="btn btn-info">Enregistrer</button>
            <a href="{{ route('campus') }}" type="submit" class="btn btn-danger">Annuler</a>
        </form>

    </div>
</section>
</div>
</div>
</div>


@endsection
