@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('utilisateur') }}" class="btn btn-danger btn-addon pull-right">
        <i class="fa fa-ban fa-fw"></i>
        Annuler
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    Ajout d'un utilisateur
                </header>
                <div class="panel-body">
                    <form action="{{ route('utilisateur.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom de l'utilisateur</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer le nom de l'utilisateur" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Prenom de l'utilisateur</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer le prenom de l'utilisateur" required>
                        </div>

                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control" required>
                                <option value="">Selectionnez votre sexe</option>
                                <option value="feminin">Feminin</option>
                                <option value="masculin">Masculin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Entrer le mot de passe de l'utilisateur" required>
                        </div>

                        <button type="submit" class="btn btn-info">Enregistrer</button>
                        <a href="{{ route('utilisateur') }}" class="btn btn-danger">Annuler</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
