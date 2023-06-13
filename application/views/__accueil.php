
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary h5"><i class="fas fa-chart-line"></i> Répétitions</h1>
            </div> 
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="BarChartDasboard"></canvas>
                </div>
            </div>
        </div>  
    </div>   
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary h5"><i class="fas fa-chart-line"></i> Prépa physique</h1>
            </div> 
            <div class="card-body"> 
                <div class="chart-bar">
                    <canvas id="myBarChartPPG"></canvas>
                </div>
            </div>
        </div>  
    </div> 
</div>

    <!-- Content Row -->
    <div class="row mb-3">
        <div class="col-sm pb-3">
            <a href="<?php echo base_url(); ?>index.php/repetitions" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
              <i class="fas fa-chart-line pb-4 fa-2x"></i><br/>
            <span class="text">Répétitions</span>
          </a>
        </div>
        <div class="col-sm pb-3">
            <a href="#" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
              <i class="fas fa-table pb-4 fa-2x"></i><br/>
            <span class="text">Travail technique</span>
          </a>
        </div>
        
        <div class="col-sm pb-3">
            <a href="<?php echo base_url(); ?>index.php/scores" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
              <i class="fas fa-bullseye pb-4 fa-2x"></i><br/>
            <span class="text">Scores</span>
          </a>
        </div>
    </div>
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
        
        <div class="col-sm pb-3">
             <a href="<?php echo base_url(); ?>index.php/reglages" class="btn btn-info p-4 display-3 btn-lg h-100 w-100">
              <i class="fas fa-tools pb-4 fa-2x"></i><br/>
            <span class="text">Réglage Matériel</span>
          </a>
        </div>
    </div>