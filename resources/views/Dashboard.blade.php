<div>
    <div class="sm-st clearfix">
        <div class="sm-st-info">
            <span>Bienvenue {{ session('user')->nom }}! Vous etes connecter en tant que {{ session('user')->role }}</span>
            <h5>votre page d'accueil pour vos syntheses!
                @if (session('campus'))
                    Vous ne pourrez avoir accès qu'aux informations du {{ session('campus')->nom }}.
                @endif

            </h5>
        </div>
    </div>
</div>

@if (session('user')->role != "Administrateur")
    <h3 class="text-primary font-weight-500">Specialites</h3>
    <div class="row" style="margin-bottom:5px;">

        @foreach($specialites as $specialite)
            <div class="col-md-3">
                <div class="sm-st clearfix">
                    <span class="sm-st-icon st-violet"><ion-icon name="sparkles"></ion-icon></span>
                    <div class="sm-st-info">
                        <span>{{ $specialite->abreviation }}</span> <!-- Remplacez 'nom' par le nom réel du champ dans votre table campus -->
                        {{ $specialite->etudiants_count }} étudiants
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('./etudiant/etatGlobal')

@else


    <h3 class="text-primary font-weight-500">Campus</h3>
    <div class="row" style="margin-bottom:5px;">

        @foreach($campuses as $campus)
            <div class="col-md-3">
                <div class="sm-st clearfix">
                    <span class="sm-st-icon st-red"><ion-icon name="school"></ion-icon></span>
                    <div class="sm-st-info">
                        <span>{{ $campus->nom }}</span> <!-- Remplacez 'nom' par le nom réel du champ dans votre table campus -->
                        {{ $campus->etudiants_count }} étudiants
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h3 class="text-primary font-weight-500">Specialites</h3>
    <div class="row" style="margin-bottom:5px;">

        @foreach($specialites as $specialite)
            <div class="col-md-3">
                <div class="sm-st clearfix">
                    <span class="sm-st-icon st-violet"><ion-icon name="sparkles"></ion-icon></span>
                    <div class="sm-st-info">
                        <span>{{ $specialite->abreviation }}</span> <!-- Remplacez 'nom' par le nom réel du champ dans votre table campus -->
                        {{ $specialite->etudiants_count }} étudiants
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('./etudiant/etatGlobal')



@endif
</div>
