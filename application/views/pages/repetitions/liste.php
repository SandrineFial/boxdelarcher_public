<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chart-line pb-4 text-primary"></i> Répétitions
        <a href="<?php echo base_url(); ?>index.php/repetitions/add" class="btn btn-warning btn-circle float-right shadow-sm">
            <i class="fas fa-plus"></i>
          </a>
    </h1>                             
</div>                                         
                                                   
        <p class="text-gray-600 mb-3">Total de flèches tirées par mois et par semaine.</p>
<?php if(isset($msg_ok)) { ?>
  <div class="p-3 mb-2 bg-success text-white rounded"><i class="fas fa-check"></i> <?php echo $msg_ok; ?></div>
<?php } else {} ?>

<?php //print_r($this->Repetitions_model->total_semaine());  ?>
<div class="row">
    <?php /*
    //print_r($month_tot);
    foreach($month_tot as $mt=>$mtot) { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo $month[$mt]["mois_long"]; ?></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $mtot['0']["nombre"]; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
    <?php } */ ?>
            
</div>

<div class="card shadow mb-4">    <!--
 <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary"><?php // $mois_encours=date("m"); print_r($month); ?></h4>
  </div>                      -->
  <div class="card-body">
      
      <ul class="nav nav-tabs" id="myTab" role="tablist">
          
          <?php
          $mois_encours=date("m");
          foreach($month as $mois) {
              
              if($mois_encours==$mois["mois_chiffre"]) {
                  $mois_enc_afch="true";
                  $mois_active="active";
              }
              else {
                  $mois_enc_afch="false";
                  $mois_active="";
              }
              ?>
            <li class="nav-item">
              <a class="nav-link <?php echo $mois_active;?>" id="tab-<?php echo $mois["mois_chiffre"]; ?>" data-toggle="tab"
              href="#t<?php  echo $mois["mois_chiffre"]; ?>"
              role="tab" aria-controls="<?php echo $mois["mois_chiffre"]; ?>" aria-selected="<?php echo $mois_enc_afch; ?>">
              <?php echo $mois["mois_court"]; ?></a>
            </li>
         <?php } ?>
        </ul>
      
      <div class="tab-content" id="myTabContent">
        <?php
        foreach($month as $mois) {
                  $tot=0;
                  $cemois=$mois["mois_chiffre"];
                  $tab_type_jr[$cemois] = array();
                  $tab_dist_tp[$cemois] = array();
                  $tab_distance[$cemois] = array();
                  
                  if(isset($totjr[$cemois]["jr"]["0"])) {
                      
                      foreach($totjr[$cemois]["jr"] as $key=>$tjr) {
                          $tab_type_jr[$cemois][$tjr->date][$tjr->type_id][$tjr->distance_id]['tot']['nombre'] = $tjr->nombre;
                          $tab_type_jr[$cemois][$tjr->date][$tjr->type_id][$tjr->distance_id]['tot']['technique'] = $tjr->travail_technique;
                          //print_r($tab_type_jr);
                          $tot+=$tjr->nombre;         
                          if($tjr->chiffre=="0") { }
                          else {
                              $tab_distance[$cemois][$tjr->date][$tjr->chiffre][$tjr->type_id] = $tjr->nombre;
                              //$tot_par_type+=$tjr->nombre;
                              $tab_dist_tp[$cemois][$tjr->chiffre]=$tjr->chiffre;
                          } // prepare les distances
                      }
                  } else {}
                  
                  if($cemois==date("m")) {
                      $active="show active";
                  } else {
                      $active="";
                  }
                  ?>
                  
                  <div class="tab-pane fade <?php echo $active; ?>" id="t<?php echo $cemois; ?>" role="tabpanel"
                  aria-labelledby="<?php echo $cemois; ?>-tab">
                      <div class="row mt-3"> 
                         <?php /* <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo $month[$cemois]["mois_long"]; ?></div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $month_tot[$cemois]['0']["nombre"]; ?></div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>>*/ if(isset($week_tot[$cemois][0]->nombre)) { ?>
                          <div class="col-md-6"> 
                              <div class="chart-bar m-3">
                                  <canvas id="myBarChart<?php echo $cemois; ?>"></canvas>
                              </div>
                          </div>
                          <?php } else {} ?>
                       </div>
                        <div class="table-responsive">
                            
                          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr class="bg-primary text-white">
                                <th>Jour</th>
                                    <?php
                                    foreach($type as $tp) {
                                        echo '<th>'.$tp->nom_court.'</th>';   
                                    } ?>
                                <th>Trav. tech.</th>
                                <th>TOT</th>
                                <th>Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                                  <?php $k=0;
                                  foreach($tab_type_jr[$cemois] as $datejr => $donnees) { $k++; ?>
                                      <tr>
                                           <td class="bg-gray-500 text-white"><?php echo date("d", strtotime($datejr)); ?></td>
                         
                                          <?php
                                          $totjour=0;       
                                            $travail_technique='';
                                          foreach($type as $tp) {
                                            if(isset($donnees[$tp->id])) {
                                                $totp=0;
                                                foreach($donnees[$tp->id] as $tot_tp) {
                                                    $totjour+=$tot_tp['tot']["nombre"];
                                                    $totp+=$tot_tp['tot']["nombre"];
                                                    if($tot_tp['tot']["technique"]=="") {}
                                                    else {                        
                                                      if($travail_technique=="") { $travail_technique.=$tot_tp['tot']["technique"]; }
                                                      else { $travail_technique.="<br/>".$tot_tp['tot']["technique"]; }
                                                    }
                                                } 
                                                echo "<td>".$totp."</td>";
                                            }
                                            else { echo "<td> </td>"; }  
                                          }
                                          ?>
                                          <td>
                                            
                                            <?php if($travail_technique=="") {}
                                            else { ?>
                                                <a href="#collapseCard<?php echo $k; ?>" class="p-1 m-0" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard<?php echo $k; ?>">
                                                <i class="fa fa-list"></i></a>
                                                <div class="collapse hide" id="collapseCard<?php echo $k; ?>">
                                                  <div class="card-body p-0 m-0">
                                                    <?php echo $travail_technique; ?>
                                                  </div>
                                                </div>
                                            <?php } ?>
                                            
                                          </td>
                                          <td class="table-warning"><?php echo $totjour; ?></td>
                                          <td><a href="<?php echo base_url(); ?>index.php/repetitions/edit/?date=<?php echo $datejr; ?>">
                                                    <i class="fas fa-edit"> </i></a></td>
                                      </tr>
                                  <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        
                       <!-- <h5 class="m-0 font-weight-bold text-primary">Distance</h5> -->
                        <div class="table-responsive">
                          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr class="bg-primary text-white">
                                <th>Jour</th>
                                <?php
                                $totdistance=0;         
                                $tot_distance = array();
                                foreach($distance as $key) {
                                  if($key->chiffre==0) {}
                                  else {
                                    echo '<th>'.$key->chiffre.' m.</th>';
                                    $tot_distance[$key->chiffre]=0;
                                  }
                                } ?>
                              </tr>
                            </thead>
                            <tbody>  
                                <?php
                              //$tab_distance[$cemois][$tjr->date][$tjr->chiffre][$tjr->type_id] = $tjr->nombre;
                                foreach($tab_distance[$cemois] as $datejr => $donneesD) { ?>
                                    <tr>
                                        <td class="bg-gray-500 text-white"><?php echo date("d", strtotime($datejr)); ?></td>
                                        <?php $totD=0;
                                        
                                        foreach($distance as $key) {
                                            $distance_chiffre=$key->chiffre;
                                            if($distance_chiffre==0) { }
                                            else {
                                              if(isset($donneesD[$distance_chiffre])) {
                                                  $tot_tpd=0;
                                                  foreach($donneesD[$distance_chiffre] as $nb_tot) {  
                                                      $tot_tpd+=$nb_tot;    
                                                  }
                                                  echo "<td>".$tot_tpd."</td>";  
                                                  $totD+=$tot_tpd;    
                                                  $tot_distance[$distance_chiffre]=$tot_tpd+$tot_distance[$distance_chiffre];
                                              }
                                              else {
                                                  echo "<td> </td>";
                                                  //$tot_distance[$distance_chiffre]=0;
                                              }
                                            }
                                        }
                                          
                                          ?>
                                    </tr>    
                                <?php } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td>TOT</td>
                                  <?php foreach($tot_distance as $distaK=>$totDist) { ?>
                                      <td class="table-warning"><?php if($totDist=="0") {} else { echo $totDist; } ?></td>
                                  <?php } ?>   
                                  </tr>  
                            </tfoot>
                          </table>
                        </div>
                    </div>  
          <?php } ?>
        </div>   
    </div>
</div>