@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <div class="panel-body table-responsive">
                    <div id="elements">

                        <table class="table table-hover tableau-violet">
                            <thead>
                                <tr>
                                    <th colspan="7" rowspan="4" class="header-background">
                                        <img src="asset('img/esmodRecu.JPG') }}" alt="">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="header-background2">
                                <tr>
                                    <th colspan="5">Reçu N°=00{{ $etudiant->id }}</th>
                                    <th>Montant Total</th>
                                    <td class="bg1">{{ number_format($totalVersements, 0, ',', ' ') }} F CFA</td>
                                </tr>
                                <tr>
                                    <td colspan="7">Date de versement : {{ \Carbon\Carbon::now()->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Mode de paiement</td>
                                    <td colspan="3">
                                        @foreach ($etudiant->versements as $paiement)
                                            {{ $paiement->mode_paiement }}{{ !$loop->last ? ', ' : '' }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Nom et Prénom</td>
                                    <td colspan="4">{{ $etudiant->nom_prenom }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Classe</td>
                                    <td colspan="4">{{ $etudiant->specialite->libele }} - ({{ $etudiant->specialite->abreviation }}) </td>
                                </tr>
                                <tr>
                                    <td colspan="3">MONTANT DU VERSEMENT : (en lettres)</td>
                                    <td colspan="4">{{ $totalVersementsEnLettres }}</td>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="7">
                                        HISTORIQUE DES VERSEMENTS
                                    </th>
                                </tr>
                                <tr>
                                    <td>Objet du versement</td>
                                    <td>Montants versés</td>
                                    <td>Avance tranche</td>
                                    <td>Reste à verser</td>
                                    <td>Date</td>
                                    <td colspan="2">Observations</td>
                                </tr>
                                @foreach ($etudiant->versements as $paiement)
                                <tr>
                                    <td>{{ $paiement->objet_paiement }}</td>
                                    <td>{{ number_format($paiement->montant, 0, ',', ' ') }} F CFA</td>
                                    <td>...</td>
                                    <td></td>
                                    <td>{{ $paiement->created_at->format('d/m/Y') }}</td>
                                    <td colspan="2">{{ $paiement->observation }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>Total</td>
                                    <td class="bg2">{{ number_format($totalVersements, 0, ',', ' ') }} F CFA</td>
                                    <td></td>
                                    <td class="bg3">{{ number_format($sommeDue, 0, ',', ' ') }} F CFA</td>
                                    <td></td>
                                    <td>Somme due</td>
                                    <td class="bg4">{{ number_format($etudiant->scolarite->montant_total + $etudiant->scolarite->montant_inscription, 0, ',', ' ') }} F CFA</td>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="7">
                                        @if($sommeDue <= 0)
                                            <span class="text-success">Scolarité soldée</span>
                                        @else
                                            <span class="text-danger">Scolarité non soldée</span>
                                        @endif
                                    </th>
                                </tr>
                            </tbody>
                            <tfoot class="tfoot" >
                                <tr>
                                    <td colspan="2">Visa Sécrétariat</td>
                                    <td colspan="3">Visa Étudiant(e)s</td>
                                    <td colspan="2">La Direction</td>
                                </tr>
                            </tfoot>
                        </table>
                         <!-- Bouton pour imprimer la page -->
                         <button id="printButton" class="btn btn-primary mb-3" onclick="window.print()">Imprimer le reçu</button>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Style pour masquer le bouton d'impression lors de l'impression -->
<style>
       .header-background img{
    background-size: cover; /* Ajuste l'image pour couvrir l'élément */
    background-position: center; /* Centre l'image */
    color: white; /* Change la couleur du texte si nécessaire */
    height: 100px; /* Ajustez la hauteur selon vos besoins */
}
@media print {
    #printButton {
        display: none;
    }
    /* Conserver le style des autres éléments */

    .header-background {
    background-image: url('{{ asset('img/esmodRecu.JPG') }}'); /* Remplacez par le chemin de votre image */
    background-size: cover; /* Ajuste l'image pour couvrir l'élément */
    background-position: center; /* Centre l'image */
    color: white; /* Change la couleur du texte si nécessaire */
    height: 100px; /* Ajustez la hauteur selon vos besoins */
}
.header-background2{
    background-image: url('{{ asset('img/esmodLogo.JPG') }}'); /* Remplacez par le chemin de votre image */
    background-size: cover; /* Ajuste l'image pour couvrir l'élément */
    background-position: center; /* Centre l'image */
    /*color: white;  Change la couleur du texte si nécessaire */
    height: 100px; /* Ajustez la hauteur selon vos besoins */
}
.tableau-violet {
    border-collapse: collapse; /* Pour fusionner les bordures */
    width: 100%; /* Ajustez selon vos besoins */
}

.tableau-violet th, .tableau-violet td {
    border: 1px solid dodgerblue; /* Bordure de 2 pixels en violet */
    padding: 8px; /* Espacement interne */
    text-align: left; /* Alignement du texte */
}

.tableau-violet th {
    background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
}
.tfoot{
    height: 15vh;
}
tr .text-center{
    text-align: center;
    font-weight: 500;
}
.bg1,.bg2,.bg3,.bg4{
    color: aliceblue
}
.bg1{
    background-color: orange
}
.bg2{
    background-color: rgb(235, 72, 72)
}.bg3{
    background-color: rgb(94, 94, 196)
}.bg4{
    background-color: dodgerblue
}
}
</style>
@endsection
