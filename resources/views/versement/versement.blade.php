@extends('layouts.app')

@section('content')

<div class="content">
    <a href="{{ route('versement.create') }}" class="btn btn-primary btn-addon pull-right">
        <i class="fa fa-plus"></i>
        Ajouter un versement
    </a>

    <div class="row ">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    <div>
                        Liste des versements
                        <input type="search" name="search" id="search" placeholder="rechercher......" class="pull-right" style="padding: 10px;width: 30%;margin: 10px">
                    </div>
                </header>
                <div class="panel-body table-responsive">
                    <div id="elements">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom étudiant</th>
                                    <th>Objet </th>
                                    <th>Mode</th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($versements as $index => $versement)
                                    <tr class="element">
                                        <td class="data">{{ $index + 1 }}</td>
                                        <td class="data">{{ $versement->etudiant->nom_prenom ?? 'N/A' }}</td>
                                        <td class="data">{{ $versement->objet_paiement ?? 'N/A' }}</td>
                                        <td class="data">{{ $versement->mode_paiement ?? 'N/A' }}</td>
                                        <td class="data">{{ $versement->montant ?? 'N/A' }}</td>
                                        <td class="data">{{ $versement->date_paiement ?? 'N/A' }}</td>
                                        <td class="data">
                                            <a href="{{ route('versement.edit', $versement->id) }}" class="btn btn-info btn-xs m-r-15"><ion-icon style="margin-right: 0px;" name="create"></ion-icon></a>
                                            <form action="{{ route('versement.destroy', $versement->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce versement ?');"><i class="fa fa-times"></i></button>
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
