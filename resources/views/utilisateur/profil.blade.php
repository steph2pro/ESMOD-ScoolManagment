@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title mb-0">Informations de l'utilisateur</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Nom:</label>
                <p class="form-control-plaintext">{{ $utilisateur->nom }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Email:</label>
                <p class="form-control-plaintext">{{ $utilisateur->email }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sexe:</label>
                <p class="form-control-plaintext">{{ $utilisateur->sexe }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Rôle:</label>
                <p class="form-control-plaintext">{{ $utilisateur->role }}</p>
            </div>
        </div>
        <div class="card-footer text-end">
            {{-- <button type="button" class="btn btn-primary">Modifier</button> --}}
            <a href="{{ route('utilisateur.edit', $utilisateur->id) }}" class="btn btn-primary"><ion-icon style="margin-right: 0px;" name="create"></ion-icon>Modifier</a>
        </div>
    </div>
@endsection
