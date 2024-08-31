
{{-- @extends(session('user') ? 'layouts.app' : 'layouts.etudiant') --}}

    @extends('layouts.app')

    @section('content')
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-0">Informations de l'étudiant</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Matricule:</label>
                    <p class="form-control-plaintext">{{ $etudiant->matricule }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Nom et Prénom:</label>
                    <p class="form-control-plaintext">{{ $etudiant->nom_prenom }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Sexe:</label>
                    <p class="form-control-plaintext">{{ $etudiant->sexe }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <p class="form-control-plaintext">{{ $etudiant->email }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">mot de pass:</label>
                    <p class="form-control-plaintext">{{ $etudiant->mot_de_pass }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Mobile:</label>
                    <p class="form-control-plaintext">{{ $etudiant->mobile }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Campus:</label>
                    <p class="form-control-plaintext">{{ $etudiant->campus->nom }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Spécialité:</label>
                    <p class="form-control-plaintext">{{ $etudiant->specialite->libele }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Scolarité:</label>
                    <p class="form-control-plaintext"><b>Frais d'inscription: </b>{{ number_format($etudiant->scolarite->montant_inscription , 0, ',', ' ') }} F CFA</p>
                    <p class="form-control-plaintext"><b>Frais de scolarité: </b>{{ number_format($etudiant->scolarite->montant_total , 0, ',', ' ') }} F CFA</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Paiements:</label>
                    <p class="form-control-plaintext">
                        @php
                            $totalVerse = $etudiant->versements->sum('montant');
                            $resteAPayer = ($etudiant->scolarite->montant_inscription + $etudiant->scolarite->montant_total) - $totalVerse;
                        @endphp

                        @foreach($etudiant->versements as $paiement)
                            <span><b>{{ $paiement->objet_paiement }} -</b> {{ number_format($paiement->montant , 0, ',', ' ') }} F CFA - {{ $paiement->date_paiement }}</span><br>
                        @endforeach
                    </p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Montant total versé:</label>
                    <p class="form-control-plaintext">{{ number_format($totalVerse, 0, ',', ' ') }} F CFA</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Reste à payer:</label>
                    <p class="form-control-plaintext">{{ number_format($resteAPayer, 0, ',', ' ') }} F CFA</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">État de la scolarité:</label>
                    <p class="form-control-plaintext">
                        @if($resteAPayer <= 0)
                            <span class="text-success">Scolarité soldée</span>
                        @else
                            <span class="text-danger">Scolarité non soldée</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-primary">
                    <ion-icon style="margin-right: 0px;" name="create"></ion-icon> Modifier
                </a>
            </div>
        </div>
    @endsection


