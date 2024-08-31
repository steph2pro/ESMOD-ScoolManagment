@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('etudiant') }}" class="btn btn-danger btn-addon pull-right">
        <i class="fa fa-ban fa-fw"></i>
        Annuler
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    Inscription d'un étudiant
                </header>
                <div class="panel-body">
                    <form action="{{ route('etudiant.store') }}" method="POST">
                        @csrf

                        {{-- Affichage des erreurs générales --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="nom">Nom et prénom</label>
                            <input type="text" class="form-control @error('nom_prenom') is-invalid @enderror" name="nom_prenom" id="nom" placeholder="Entrer le nom complet de l'étudiant" value="{{ old('nom_prenom') }}" required>
                            @error('nom_prenom')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Entrer l'email de l'étudiant" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telephone">Numéro de téléphone</label>
                            <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="telephone" placeholder="Entrer le numéro de téléphone" value="{{ old('mobile') }}" required>
                            @error('mobile')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sexe">Sexe de l'étudiant</label>
                            <select name="sexe" id="sexe" class="form-control @error('sexe') is-invalid @enderror">
                                <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                <option value="Feminin" {{ old('sexe') == 'Feminin' ? 'selected' : '' }}>Feminin</option>
                            </select>
                            @error('sexe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="specialite">Spécialité</label>
                            <select name="specialite_id" id="specialite" class="form-control @error('specialite_id') is-invalid @enderror" required>
                                @foreach($specialites as $specialite)
                                    <option value="{{ $specialite->id }}" {{ old('specialite_id') == $specialite->id ? 'selected' : '' }}>{{ $specialite->libele }}</option>
                                @endforeach
                            </select>
                            @error('specialite_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="campus">Campus</label>
                            @if (session('user')->role == "Administrateur")
                                <select name="campus_id" id="campus" class="form-control @error('campus_id') is-invalid @enderror" required>
                                    @foreach($campus as $camp)
                                        <option value="{{ $camp->id }}" {{ old('campus_id') == $camp->id ? 'selected' : '' }}>{{ $camp->nom }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" class="form-control" value="{{ session('campus')->nom }}" disabled>
                                <input type="hidden" name="campus_id" value="{{ session('campus')->id }}">
                            @endif
                            @error('campus_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="annee_scolaire">Année scolaire</label>
                            <input type="text" class="form-control @error('annee_scolaire') is-invalid @enderror" name="annee_scolaire" id="annee_scolaire" placeholder="Entrer l'année scolaire" value="{{ old('annee_scolaire') }}" required>
                            @error('annee_scolaire')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="montant_inscription">Montant inscription</label>
                            <input type="number" step="0.01" class="form-control @error('montant_inscription') is-invalid @enderror" name="montant_inscription" id="montant_inscription" placeholder="Entrer le montant de l'inscription" value="{{ old('montant_inscription') }}" required>
                            @error('montant_inscription')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="montant_scolarite_paye">Montant scolarité payé</label>
                            <input type="number" step="0.01" class="form-control @error('frais_scolarite') is-invalid @enderror" name="frais_scolarite" id="montant_scolarite_paye" placeholder="Entrer le montant de la scolarité payé" value="{{ old('frais_scolarite') }}" required>
                            @error('frais_scolarite')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-info">Enregistrer</button>
                        <a href="{{ route('etudiant') }}" class="btn btn-danger">Annuler</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
