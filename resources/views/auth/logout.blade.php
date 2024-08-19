@extends('layouts.app')

@section('content')

<div class="col-lg-5">
    <section class="panel">
        <header class="panel-heading">
            Deconnexion
        </header>
        <div class="panel-body">

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="alert alert-block alert-danger center">
                    <strong> Voulez-vous vraiment vous  Deconnecter ?</strong>
                </div>
                <button type="submit" class="btn btn-danger">OUI</button>

                <a href="{{ route('dashboard') }}" type="submit" class="btn btn-default">NON</a>
            </form>




        </div>
    </section>
</div>


@endsection
