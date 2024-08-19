<div>
    <div class="sm-st clearfix">
        <div class="sm-st-info">
            <span>Bienvenue!</span>
            votre page d'accueil pour vos syntheses
        </div>
    </div>
</div>
<div class="row" style="margin-bottom:5px;">
    @foreach($campuses as $campus)
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-red"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                <div class="sm-st-info">
                    <span>{{ $campus->nom }}</span> <!-- Remplacez 'nom' par le nom réel du champ dans votre table campus -->
                    {{ $campus->etudiants_count }} étudiants
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>
