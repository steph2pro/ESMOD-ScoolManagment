@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route("etudiant.create") }}" class="btn btn-primary btn-addon pull-right">
        <i class="fa fa-plus"></i>
        inscrire un etudiant
    </a>

    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    <div>
                        Liste des étudiants
                        <input type="search" name="search" id="search" placeholder="Rechercher......" class="pull-right" style="padding: 10px;width: 30%;margin: 10px">
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
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Montant Payé</th>
                                    <th>Montant Restant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etudiants as $index => $etudiant)
                                    <tr class="element">
                                        <td class="data">{{ $index + 1 }}</td>
                                        <td class="data">{{ $etudiant->matricule }}</td>
                                        <td class="data">{{ $etudiant->nom_prenom }}</td>
                                        <td class="data">{{ $etudiant->sexe }}</td>
                                        <td class="data">{{ $etudiant->email }}</td>
                                        <td class="data">{{ $etudiant->mobile }}</td>
                                        <td class="data">{{ $etudiant->scolarite->montant_paye ?? 'N/A' }} f CFA</td>
                                        <td class="data">{{ $etudiant->scolarite->montant_restant ?? 'N/A' }} f CFA</td>
                                        <td class="data">
                                            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-info btn-xs m-r-15">
                                                <ion-icon style="margin-right: 0px;" name="create"></ion-icon>
                                            </a>
                                            <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
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
