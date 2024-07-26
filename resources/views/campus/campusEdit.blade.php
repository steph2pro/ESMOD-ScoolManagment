@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('campus') }}" class="btn btn-danger btn-addon pull-right">
        <i class="fa fa-ban fa-fw"></i>
        Annuler
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    Modification du Campus
                </header>
                <div class="panel-body">
                    <form action="{{ route('campus.update', $campus->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nom">Nom du campus</label>
                            <input type="text" class="form-control" name="nom" value="{{ $campus->nom }}" required>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" class="form-control" name="adresse" value="{{ $campus->adresse }}" required>
                        </div>

                        <button type="submit" class="btn btn-info">Modifier</button>
                        <a href="{{ route('campus') }}" class="btn btn-danger">Annuler</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
