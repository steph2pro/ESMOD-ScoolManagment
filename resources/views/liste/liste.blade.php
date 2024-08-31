@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('etudiant.create') }}" class="btn btn-primary btn-addon pull-right">
        <i class="fa fa-plus"></i>
        Inscrire un étudiant
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    <div>
                        Liste des étudiants
                        <form method="GET" action="{{ route('liste') }}" class="pull-right" style="margin: 10px;">
                            <input type="search" name="search" id="search" placeholder="Rechercher......" style="padding: 10px;width: 100%;">
                            <select name="specialite_id" id="specialite_id" class="form-control" style="width: 100%; margin: 10px;">
                                <option value="">Toutes les spécialités</option>
                                @foreach($specialites as $specialite)
                                    <option value="{{ $specialite->id }}" {{ request('specialite_id') == $specialite->id ? 'selected' : '' }}>
                                        {{ $specialite->libele }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-warning  pull-right">Filtrer</button>
                        </form>
                    </div>
                </header>
                <div class="panel-body table-responsive">
                    <div id="elements">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Matricule</th>
                                    <th>Nom et Prénom</th>
                                    <th>Sexe</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etudiants as $index => $etudiant)
                                    <tr class="element">
                                        <td class="data">{{ $index + 1 }}</td>
                                        <td class="data">{{ $etudiant->matricule }}</td>
                                        <td class="data">{{ $etudiant->nom_prenom }}</td>
                                        <td class="data">{{ $etudiant->sexe }}</td>
                                        <td class="data">{{ $etudiant->mobile }}</td>
                                        <td class="data">{{ $etudiant->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
