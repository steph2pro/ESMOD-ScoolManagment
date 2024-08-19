@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('etudiant') }}" class="btn btn-danger btn-addon pull-right">
        <i class="fa fa-arrow-left"></i>
        Retour à la liste
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    Modification des informations de l'étudiant
                </header>
                <div class="panel-body">
                    <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom">Nom et prénom</label>
                            <input type="text" class="form-control @error('nom_prenom') is-invalid @enderror" name="nom_prenom" id="nom" placeholder="Entrer le nom complet de l'étudiant" value="{{ old('nom_prenom', $etudiant->nom_prenom) }}" required>
                            @error('nom_prenom')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Entrer l'email de l'étudiant" value="{{ old('email', $etudiant->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telephone">Numéro de téléphone</label>
                            <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="telephone" placeholder="Entrer le numéro de téléphone" value="{{ old('mobile', $etudiant->mobile) }}" required>
                            @error('mobile')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sexe">Sexe de l'étudiant</label>
                            <select name="sexe" id="sexe" class="form-control @error('sexe') is-invalid @enderror">
                                <option value="Masculin" {{ old('sexe', $etudiant->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                <option value="Feminin" {{ old('sexe', $etudiant->sexe) == 'Feminin' ? 'selected' : '' }}>Feminin</option>
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
                                    <option value="{{ $specialite->id }}" {{ old('specialite_id', $etudiant->specialite_id) == $specialite->id ? 'selected' : '' }}>{{ $specialite->libele }}</option>
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
                            <select name="campus_id" id="campus" class="form-control @error('campus_id') is-invalid @enderror" required>
                                @foreach($campus as $camp)
                                    <option value="{{ $camp->id }}" {{ old('campus_id', $etudiant->campus_id) == $camp->id ? 'selected' : '' }}>{{ $camp->nom }}</option>
                                @endforeach
                            </select>
                            @error('campus_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="annee_scolaire">Année scolaire</label>
                            <input type="text" class="form-control @error('annee_scolaire') is-invalid @enderror" name="annee_scolaire" id="annee_scolaire" placeholder="Entrer l'année scolaire" value="{{ old('annee_scolaire', $etudiant->scolarite->annee_scolaire ?? '') }}" required>
                            @error('annee_scolaire')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="montant_inscription">Montant inscription</label>
                            <input type="number" step="0.01" class="form-control @error('frais_inscription') is-invalid @enderror" name="frais_inscription" id="montant_inscription" placeholder="Entrer le montant de l'inscription" value="{{ old('frais_inscription', $etudiant->scolarite->montant_inscription ?? '') }}" required>
                            @error('frais_inscription')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="montant_scolarite_paye">Montant scolarité payé</label>
                            <input type="number" step="0.01" class="form-control @error('frais_scolarite_paye') is-invalid @enderror" name="frais_scolarite_paye" id="montant_scolarite_paye" placeholder="Entrer le montant de la scolarité payé" value="{{ old('frais_scolarite_paye', $etudiant->scolarite->montant_paye ?? '') }}" required>
                            @error('frais_scolarite_paye')
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
