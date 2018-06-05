<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="green">
            <i class="material-icons">
                arrow_upward
            </i>
        </div>
        <div class="card-content">
            <p class="category">Total Puntos Ganados:</p>
            <h3 class="title">{{ $point_stats['total_win'] }}
                <small>Puntos</small>
            </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="#pablo">Ver mas...</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="red">
            <i class="material-icons">
                arrow_downward
            </i>
        </div>
        <div class="card-content">
            <p class="category">Total Puntos Perdidos</p>
            <h3 class="title">{{ $point_stats['total_lose'] }}
                <small>Puntos</small>
            </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">date_range</i> Ver mas...
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="blue">
            <i class="material-icons">
                attach_money
            </i>
        </div>
        <div class="card-content">
            <p class="category">Total Capital</p>
            <h3 class="title">{{ $point_stats['profit'] }}$</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="orange">
            <i class="material-icons">
                attach_money
            </i>
        </div>
        <div class="card-content">
            <p class="category">Sumatoria de puntos</p>
            <h3 class="title">{{ $point_stats['total_points'] }}
                <small>Puntos</small>
            </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">update</i> Just Updated
            </div>
        </div>
    </div>
</div>