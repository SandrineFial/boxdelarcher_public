<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tachometer-alt pb-4 text-primary"></i> Mon récap.
    </h1>
</div>

<div class="card mb-4 border-left-warning text-dark">
  <div class="card-body py-1 text-xs">   
    La Visualisation je n'y arrive pas !
    <a class="text-primary" href="<?php echo base_url(); ?>index.php/prepamentale/visualisation" role="button">
    => Des solutions
      <i class="fas fa-fw fa-file-alt"></i>
    </a>
  </div>
</div> 
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary h5"><i class="fas fa-chart-line"></i>
                  <a href="<?php echo base_url(); ?>index.php/repetitions">Répétitions</a>
                  <a href="<?php echo base_url(); ?>index.php/repetitions/add" class="btn btn-warning btn-circle float-right shadow-sm">
                    <i class="fas fa-plus"></i>
                  </a>
                </h1>
            </div> 
            <div class="card-body">
                <div class="chart-bar">
                    <?php if(count($week_tot)==0) {
                      ?>Pas encore de flèches tirées pour ce mois-ci !<br/>Allez on y va ! <?php
                    } else { ?>
                        <canvas id="BarChartDasboard"></canvas><?php } ?>
                </div>
            </div>
        </div>  
    </div>   
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary h5"><i class="fas fa-chart-line"></i>
                  <a href="<?php echo base_url(); ?>index.php/prepaphysique">Prépa physique</a>
                  <a href="<?php echo base_url(); ?>index.php/prepaphysique/add" class="btn btn-warning btn-circle float-right shadow-sm">
                    <i class="fas fa-plus"></i>
                  </a>
                </h1>
            </div> 
            <div class="card-body"> 
                <div class="chart-bar">
                    <?php if(isset($graph_exos)) { ?>
                        <canvas id="myBarChartPPG"></canvas><?php
                    } else { ?>Pas encore de prépa physique pour ce mois-ci !<br/>Allez on s'y met ! <?php } ?>
                </div>
            </div>
        </div>  
    </div> 
</div>
<div class="row mb-3">   
      <div class="col-sm-4 pb-3">
          <a href="<?php echo base_url(); ?>index.php/scores" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
            <i class="fas fa-bullseye pb-4 fa-2x"></i><br/>
          <span class="text">Mes scores</span>
        </a>
      </div>
      <div class="col-sm-4 pb-3">
          <a href="<?php echo base_url(); ?>index.php/outils" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
            <i class="fas fa-file-alt pb-4 fa-2x"></i><br/>
          <span class="text">Outils à télécharger</span>
        </a>
      </div>
      
      <div class="col-sm-4 pb-3">
          <a href="<?php echo base_url(); ?>index.php/reglages" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
            <i class="fas fa-tools pb-4 fa-2x"></i><br/>
          <span class="text">Tuto réglage matériel</span>
        </a>
      </div>
  </div>
    <?php /*
    <div class="row mb-3">
        <div class="col-sm pb-3">
            <a href="<?php echo base_url(); ?>index.php/prepaphysique" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
              <i class="fas fa-dumbbell pb-4 fa-2x"></i><br/>
            <span class="text">Prépa physique</span>
          </a>
        </div>
        
        <div class="col-sm pb-3">
            <a href="<?php echo base_url(); ?>index.php/prepamentale" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
              <i class="fas fa-laugh pb-4 fa-2x"></i><br/>
            <span class="text">Prépa mentale</span>
          </a>
        </div>
        
    </div> */ ?>