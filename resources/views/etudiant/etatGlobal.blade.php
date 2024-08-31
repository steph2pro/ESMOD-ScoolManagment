<div class="content">
    <div class="row">
        <div class="col-md-12 m-t-15">
            <section class="panel">
                <header class="panel-heading">
                    <div class="text-center">
                        <h3>Etat global des étudiants</h3>
                    </div>
                </header>
                <div class="panel-body table-responsive">
                    @php
                        $totalGlobalPaye = 0;
                        $totalGlobalRestant = 0;
                    @endphp

                    @foreach($campuses as $campus)
                        @php
                            $totalPaye = $campus->etudiants->sum(function($etudiant) {
                                return $etudiant->scolarite->montant_paye ?? 0;
                            });
                            $totalRestant = $campus->etudiants->sum(function($etudiant) {
                                return $etudiant->scolarite->montant_restant ?? 0;
                            });

                            // Mise à jour des totaux globaux
                            $totalGlobalPaye += $totalPaye;
                            $totalGlobalRestant += $totalRestant;
                        @endphp

                        @if($campus->etudiants->isNotEmpty())
                            <div id="campus-{{ $campus->id }}">
                                <h4 class="text-primary font-weight-500">{{ $campus->nom }}</h4>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Matricule</th>
                                            <th>Nom et Prénom</th>
                                            <th>Telephone</th>
                                            <th>Montant Payé</th>
                                            <th>Montant Restant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($campus->etudiants as $etudiant)
                                            <tr class="element">
                                                <td class="data">{{ $etudiant->matricule }}</td>
                                                <td class="data">{{ $etudiant->nom_prenom }}</td>
                                                <td class="data">{{ $etudiant->mobile }}</td>
                                                <td class="data">{{ $etudiant->scolarite->montant_paye ?? 'N/A' }} F CFA</td>
                                                <td class="data">{{ $etudiant->scolarite->montant_restant ?? 'N/A' }} F CFA</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Totaux pour ce campus -->
                                <div class="total-campus">
                                    <strong class="text-primary font-weight-500">Total pour {{ $campus->nom }} :</strong>
                                    <p class="text-primary font-weight-500">Montant Payé : {{ number_format($totalPaye, 0, ',', ' ') }} f CFA</p>
                                    <p class="text-primary font-weight-500">Montant Restant : {{ number_format($totalRestant, 0, ',', ' ') }} f CFA</p>
                                </div>
                                <hr>
                            </div>
                        @else
                            <div class="text-center">
                                <p>Aucun étudiant trouvé pour ce campus.</p>
                            </div>
                        @endif
                    @endforeach

                    <!-- Tableau récapitulatif global -->
                    @if($totalGlobalPaye > 0 || $totalGlobalRestant > 0)
                        <div id="recapitulatif-global">
                            <h4 class="text-primary font-weight-500">Récapitulatif Global</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Total Global des Montants Payés</th>
                                        <th>Total Global des Montants Restants</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-primary font-weight-500">{{ number_format($totalGlobalPaye, 0, ',', ' ') }} f CFA</td>
                                        <td class="text-primary font-weight-500">{{ number_format($totalGlobalRestant, 0, ',', ' ') }} f CFA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <!-- Bouton d'impression -->
                    <button onclick="imprimerEtat()" class="btn btn-info btn-xs m-r-15" id="printButton">
                        imprimer l'etat Global
                    </button>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- Script pour gérer l'impression -->
<script type="text/javascript">
    function imprimerEtat() {
        window.print();
    }
</script>
