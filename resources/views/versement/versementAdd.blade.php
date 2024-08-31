@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('versement') }}" class="btn btn-danger btn-addon pull-right">
        <i class="fa fa-ban fa-fw"></i>
        Annuler
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    Ajout d'un versement
                </header>
                <div class="panel-body">
                    <form action="{{ route('versement.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom et prénom de l'etudiant qui effectue le versement</label>
                            <select name="etudiant_id" id="etudiant" class="form-control @error('etudiant_id') is-invalid @enderror" required>
                                @foreach($etudiants as $etudiant)
                                    <option value="{{ $etudiant->id }}" {{ old('etudiant_id') == $etudiant->id ? 'selected' : '' }}>{{ $etudiant->nom_prenom }}</option>
                                @endforeach
                            </select>
                            @error('etudiant_id')
                                <span class="invalid-feedback  text-danger" mode_paiement="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="objet_paiement">Objet du versement</label>
                            <input type="text" class="form-control @error('objet_paiement') is-invalid @enderror" name="objet_paiement" id="objet_paiement" placeholder="Entrer l'objet du versement" value="{{ old('objet_paiement') }}" required>
                            @error('objet_paiement')
                                <span class="invalid-feedback  text-danger" mode_paiement="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mode_paiement">Mode de versement</label>
                            <select name="mode_paiement" id="mode_paiement" class="form-control @error('mode_paiement') is-invalid @enderror" required>
                                <option value="Espèce">Espèce</option>
                                <option value="Chèque"> Chèque</option>
                                <option value="OM / MOMO">OM / MOMO</option>

                            </select>
                            @error('mode_paiement')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="montant">montant du versement</label>
                            <input type="number " class="form-control @error('montant') is-invalid @enderror" name="montant" id="montant" placeholder="Entrer le montant du versement" required>
                            @error('montant')
                                <span class="invalid-feedback text-danger" mode_paiement="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info">Enregistrer</button>
                        <a href="{{ route('versement') }}" class="btn btn-danger">Annuler</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
