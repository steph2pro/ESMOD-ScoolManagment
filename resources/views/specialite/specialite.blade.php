
@extends('layouts.app')

@section('content')


<div class="content">
    <a href="{{ route('specialiteAdd') }}" class="btn btn-primary btn-addon pull-right">
        <i class="fa fa-plus"></i>
        Ajouter une specialite
    </a>

    <div class="row ">

        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    <div>
                        Liste des specialites
                        <input type="search" name="search" id="search" name="search" placeholder="rechercher......" class="pull-right" style="padding: 10px;width: 30%;margin: 10px">
                    </div>

                </header>
                <div class="panel-body table-responsive">
                <div id="elements">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>libele</th>
                                <th>Frais de scolarite</th>
                                <th>Frais d'inscription</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($specialites as $index => $specialite)
                            <tr class="element">
                                <td class="data">{{ $index + 1 }}</td>
                                <td class="data">{{ $specialite->libele }}</td>
                                <td class="data">{{ $specialite->frais_scolarite }}</td>
                                <td class="data">{{ $specialite->frais_inscription }}</td>
                                <td class="data">
                                    <a href="{{ route('specialite.edit', $specialite->id) }}" class="btn btn-info btn-xs m-r-15"><ion-icon style="margin-right: 0px;" name="create"></ion-icon></a>
                                    <form action="{{ route('specialite.destroy', $specialite->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce specialite ?');"><i class="fa fa-times"></i></button>
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
