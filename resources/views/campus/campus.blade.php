@extends('layouts.app')

@section('content')


<div class="content">
    <a href="{{ route('campusAdd') }}" class="btn btn-primary btn-addon pull-right">
        <i class="fa fa-plus"></i>
        Ajouter un campus
    </a>

    <div class="row ">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    <div>
                        Liste des campus
                        <input type="search" name="search" id="search" placeholder="rechercher......" class="pull-right" style="padding: 10px;width: 30%;margin: 10px">
                    </div>
                </header>
                <div class="panel-body table-responsive">
                    <div id="elements">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Adresse de localisation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($campuses as $index => $campus)
                                    <tr class="element">
                                        <td class="data">{{ $index + 1 }}</td>
                                        <td class="data">{{ $campus->nom }}</td>
                                        <td class="data">{{ $campus->adresse }}</td>
                                        <td class="data">
                                            <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-info btn-xs m-r-15"><ion-icon style="margin-right: 0px;" name="create"></ion-icon></a>
                                            <form action="{{ route('campus.destroy', $campus->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce campus ?');"><i class="fa fa-times"></i></button>
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
