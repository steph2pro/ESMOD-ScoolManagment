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
                    Modification de l'utilisateur
                </header>
                <div class="panel-body">
                    <form action="{{ route('utilisateur.update', $utilisateur->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Indique que c'est une requête PUT -->

                        <div class="form-group">
                            <label for="nom">Nom de l'utilisateur</label>
                            <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom', $utilisateur->nom) }}" placeholder="Entrer le nom de l'utilisateur" required>
                            @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $utilisateur->email) }}" placeholder="Entrer l'email de l'utilisateur" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <input type="text" class="form-control" name="role" id="role" value="{{ old('role', $utilisateur->role) }}" placeholder="Entrer le rôle de l'utilisateur" required>
                            @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control">
                                <option value="{{ old('sexe', $utilisateur->sexe) }}">{{ old('sexe', $utilisateur->sexe) }}</option>
                                @if($utilisateur->sexe == "feminin")
                                    <option value="masculin">Masculin</option>
                                @else
                                    <option value="feminin">Feminin</option>
                                @endif
                            </select>
                            @if ($errors->has('sexe'))
                                <span class="text-danger">{{ $errors->first('sexe') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password', $utilisateur->password) }}" placeholder="Entrer le nouveau mot de passe">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
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
