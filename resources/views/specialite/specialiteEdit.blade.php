@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('specialite') }}" class="btn btn-danger btn-addon pull-right">
        <i class="fa fa-ban fa-fw"></i>
        Annuler
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    Modification de la spécialité
                </header>
                <div class="panel-body">
                    <form action="{{ route('specialite.update', $specialite->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Indique que c'est une requête PUT -->
                        <div class="form-group">
                            <label for="libele">Nom de la spécialité</label>
                            <input type="text" class="form-control" name="libele" id="libele" value="{{ old('libele', $specialite->libele) }}" placeholder="Entrer le nom de la spécialité" required>
                        </div>
                        <div class="form-group">
                            <label for="abreviation">abreviation de la spécialité</label>
                            <input type="text" class="form-control" name="abreviation" id="abreviation" value="{{ old('abreviation', $specialite->abreviation) }}" placeholder="Entrer l'abreviation de la spécialité" required>
                        </div>
                        <div class="form-group">
                            <label for="scolarite">Frais de scolarité</label>
                            <input type="number" step="0.01" class="form-control" name="scolarite" id="scolarite" value="{{ old('scolarite', $specialite->frais_scolarite) }}" placeholder="Entrer les frais de scolarité" required>
                        </div>

                        <div class="form-group">
                            <label for="inscription">Frais d'inscription</label>
                            <input type="number" step="0.01" class="form-control" name="inscription" id="inscription" value="{{ old('inscription', $specialite->frais_inscription) }}" placeholder="Entrer les frais d'inscription" required>
                        </div>

                        <button type="submit" class="btn btn-info">Enregistrer</button>
                        <a href="{{ route('specialite') }}" class="btn btn-danger">Annuler</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
