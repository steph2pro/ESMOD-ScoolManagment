
@extends('layouts.app')

@section('content')


<div class="content">
    <a href="{{ route('utilisateurAdd') }}" class="btn btn-primary btn-addon pull-right">
        <i class="fa fa-plus"></i>
        Ajouter un utilisateur
    </a>

    <div class="row ">

        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    <div>
                        Liste des utilisateurs
                        <input type="search" name="search" id="search" name="search" placeholder="rechercher......" class="pull-right" style="padding: 10px;width: 30%;margin: 10px">
                    </div>

                </header>
                <div class="panel-body table-responsive">
                <div id="elements">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Sexe</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utilisateurs as $index => $utilisateur)
                            <tr class="element">
                                <td class="data">{{ $index + 1 }}</td>
                                <td class="data">{{ $utilisateur->nom }}</td>
                                <td class="data">{{ $utilisateur->prenom }}</td>
                                <td class="data">{{ $utilisateur->sexe }}</td>
                                <td class="data">
                                    <a href="{{ route('utilisateur.edit', $utilisateur->id) }}" class="btn btn-info btn-xs m-r-15"><ion-icon style="margin-right: 0px;" name="create"></ion-icon></a>
                                    <form action="{{ route('utilisateur.destroy', $utilisateur->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce t\'utilisateur ?');"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>


        </div>

    </div>
</div>

@endsection
