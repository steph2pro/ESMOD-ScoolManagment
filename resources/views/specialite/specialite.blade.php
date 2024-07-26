
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
                                <th>nom</th>
                                <th>filiere</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="element">
                                <td class="data"></td>
                                <td class="data"></td>
                                <td class="data"></td>
                                <td class="data"></td>


                                <td class="data">
                                    <a href="" class="btn btn-info btn-xs m-r-15"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>


        </div>

    </div>
</div>

@endsection
