<div class="d-sm-flex align-items-center justify-content-between mb-2">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-trophy pb-4 text-primary"></i> Scores
  <a href="<?php echo base_url(); ?>index.php/scores/add" class="btn btn-warning btn-circle float-right shadow-sm">
          <i class="fas fa-plus"></i>
        </a></h1>      
</div>                     
        <p class="text-gray-600 mb-3">Tirs comptés.</p>
    
<?php if(isset($msg_ok)) { ?>
  <div class="p-3 mb-2 bg-success text-white rounded"><i class="fas fa-check"></i> <?php echo $msg_ok; ?></div>
<?php } else {} ?>
      <?php 
        $sc_tab = array();
        foreach($scores as $ts_tab) {
          $sc_tab[$ts_tab->distance_id][$ts_tab->date.'-'.$ts_tab->id]=$ts_tab;
        } ?>
        
    <div class="row">
      <?php foreach($meilleur_score_total as $dist_id=>$score_total) { ?>
        <div class="col-6 col-sm-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Meilleur score</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $score_total; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="text-gray-300"><?php echo $dist_id; ?>m.</i>
                  </div>
                </div>
              </div>
            </div>
        </div>
      <?php } ?>
      
      <?php foreach($meilleur_serie as $dist_id=>$score_serie) { ?>
        <div class="col-6 col-sm-3 mb-4 d-none d-sm-block">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Meilleure série</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $score_serie; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="text-gray-300"><?php echo $dist_id; ?>m.</i>
                  </div>
                </div>
              </div>
            </div>
        </div>
      <?php } ?>
    </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4"><!--
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary">Scores</h4>
    </div>-->
    <div class="card-body">
                                 
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <?php $tot_sc=0;
          foreach($sc_tab as $distance=>$tab_entier) {  $tot_sc++; ?>
            <li class="nav-item">
              <a class="nav-link <?php if($tot_sc==1) { echo "active"; } else {} ?>" id="tab-<?php echo $distance; ?>" data-toggle="tab"
              href="#t<?php echo $distance; ?>"
              role="tab" aria-controls="t<?php echo $distance; ?>" aria-selected="true"><?php echo $distance; ?>m</a>
            </li>
         <?php } ?>
        </ul>
      <div class="tab-content" id="myTabContent">
        <?php $tot_sc=0;
          foreach($sc_tab as $distance=>$tab_entier) { $tot_sc++; ?>
          <div class="tab-pane fade <?php if($tot_sc==1) { echo "show active"; } else {} ?>" id="t<?php echo $distance; ?>"
          role="tabpanel" aria-labelledby="tab-<?php echo $distance; ?>">
          
            <div class="row"> 
                <div class="col-md-6"> 
                    <div class="chart-bar m-3">
                        <canvas id="myBarChart<?php echo $distance; ?>"></canvas>
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="chart-bar m-3">
                        <canvas id="myBarChart<?php echo $distance; ?>mn"></canvas>    
                    </div>
                </div>
            </div>
          
              <div class="table-responsive">
                  
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-primary text-white">
                      <th>Jr</th>
                      <th>Sc. 1</th>
                      <th>Sc. 2</th>
                      <th>Tot.</th>
                      <th>Moy.</th>   
                      <th>Tps</th>
                      <th>Vol. min</th>
                      <th>Vol. max</th>
                      <th>Vol. écart</th>
                      <th>Hum.</th>
                      <th>Stratégie</th>    
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $k=0;
                      foreach($tab_entier as $date=>$donnees) { $k++; ?>
                        <tr>
                          <td class="bg-gray-500 text-white"><?php echo date("d", strtotime($donnees->date)); ?><br/>
                          <span><?php echo date("m/y", strtotime($donnees->date)); ?></span></td>
                          <td><?php echo $donnees->score1; ?></td>
                          <td><?php echo $donnees->score2; ?></td>
                          <td class="table-warning"><?php echo $donnees->score_total; ?></td>
                          <td class="table-success"><?php echo $donnees->moyenne; ?></td>     
                          <td><i class="fa far fa-<?php echo $donnees->tps_icn; ?>"></i></td>
                          <td><?php echo $donnees->volee_mini; ?></td>
                          <td><?php echo $donnees->volee_maxi; ?></td>
                          <td><?php echo $donnees->volee_ecart; ?></td>
                          <td><i class="far fa-<?php echo $donnees->hum_icn; ?>"></i></td>
                          <td>
                            <?php if($donnees->commentaire=="") {}
                            else { ?>
                                <a href="#collapseCard<?php echo $distance.$k; ?>" class="p-1 m-0" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard<?php echo $distance.$k; ?>">
                                <i class="fa fa-list"></i> </a>
                                <div class="collapse hide" id="collapseCard<?php echo $distance.$k; ?>">
                                  <div class="card-body p-0 m-0">
                                    <?php echo $donnees->commentaire; ?>
                                  </div>
                                </div>
                            <?php } ?>
                          </td>             
                          <td><a href="<?php echo base_url(); ?>index.php/scores/add/?id=<?php echo $donnees->id; ?>">
                                    <i class="fas fa-edit"> </i></a></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
          
          </div>
          <?php } ?>
          
    </div>
</div>
