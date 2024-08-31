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
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{ old('nom', $utilisateur->nom) }}" placeholder="Entrer le nom de l'utilisateur" required>
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $utilisateur->email) }}" placeholder="Entrer l'email de l'utilisateur" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">
                                @if(auth()->user()->role === 'Administrateur')
                                    Choisir le Campus qu'il devra administrer
                                @else
                                    Rôle
                                @endif
                            </label>

                            @if(auth()->user()->role === 'Administrateur')
                                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="Administrateur">Tous les Campus</option>
                                    @foreach($campus as $camp)
                                        <option value="Gerant, {{ $camp->nom }}" {{ old('role', $utilisateur->role) == 'Gerant, ' . $camp->nom ? 'selected' : '' }}>
                                            {{ $camp->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input
                                    type="text"
                                    class="form-control @error('role') is-invalid @enderror"
                                    id="role"
                                    value="{{ old('role', $utilisateur->role) }}"
                                    readonly  name="role"
                                >
                            @endif

                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control @error('sexe') is-invalid @enderror">
                                <option value="{{ old('sexe', $utilisateur->sexe) }}">{{ old('sexe', $utilisateur->sexe) }}</option>
                                @if($utilisateur->sexe == "feminin")
                                    <option value="masculin">Masculin</option>
                                @else
                                    <option value="feminin">Feminin</option>
                                @endif
                            </select>
                            @error('sexe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  placeholder="Entrer le nouveau mot de passe">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
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
