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
                            <label for="nom">Nom et prénom de l'utilisateur</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Entrer le nom de l'utilisateur" value="{{ old('nom') }}" required>
                            @error('nom')
                                <span class="invalid-feedback  text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email de l'utilisateur</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Entrer l'email de l'utilisateur" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback  text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Role de l'utilisateur</label>

                        </div>
                        <div class="form-group">
                            <label for="role"> choisir le Campus qu'il devra administrer</label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="Administrateur">Tous les Campus</option>
                                @foreach($campus as $camp)
                                    <option value="Gerant, {{ $camp->nom}}" {{ old('role') == $camp->nom ? 'selected' : '' }}>{{ $camp->nom }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control @error('sexe') is-invalid @enderror" required>
                                <option value="">Sélectionnez votre sexe</option>
                                <option value="feminin" {{ old('sexe') == 'feminin' ? 'selected' : '' }}>Féminin</option>
                                <option value="masculin" {{ old('sexe') == 'masculin' ? 'selected' : '' }}>Masculin</option>
                            </select>
                            @error('sexe')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Entrer le mot de passe de l'utilisateur" required>
                            @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
