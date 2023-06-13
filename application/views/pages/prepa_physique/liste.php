<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-dumbbell pb-4 text-primary"></i> Prépa Physique
      <a href="<?php echo base_url(); ?>index.php/prepaphysique/add" class="btn btn-warning btn-circle float-right shadow-sm">
          <i class="fas fa-plus"></i>
      </a>
    </h1>
</div>                        
    <p class="text-gray-600 mb-3">Total de renforcement physique mensuel.</p>

<?php if(isset($msg_ok)) { ?>
  <div class="p-3 mb-2 bg-success text-white rounded"><i class="fas fa-check"></i> <?php echo $msg_ok; ?></div>
<?php } else {} ?>

<div class="card shadow mb-4">
    <div class="card-body">
                      
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php
            $mois_encours=date("m"); $k=0;
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
                  $tot_rep=0;
                  $cemois=$mois["mois_chiffre"];
                  $tab_type_jr[$cemois] = array();
                  
                  if(isset($totjr[$cemois]["jr"]["0"])) {
                      
                      foreach($totjr[$cemois]["jr"] as $key=>$tjr) {
                        
                          $tab_type_jr[$cemois][$tjr->date][$tjr->exercice_id][$tjr->outils_id]['intensite'] = $tjr->effort;
                          $tab_type_jr[$cemois][$tjr->date][$tjr->exercice_id][$tjr->outils_id]['repetitions'] = $tjr->repetitions;
                          $tab_type_jr[$cemois][$tjr->date][$tjr->exercice_id][$tjr->outils_id]['commentaire'] = $tjr->commentaire;
                          //print_r($tab_type_jr);
                          $tot+=$tjr->effort; 
                          $tot_rep+=$tjr->repetitions; 
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
                         <?php // print_r($week_tot);
                         if(isset($week_tot[$cemois])) {
                            // foreach($week_tot[$cemois] as $g_sem=>$g_exos) { ?> 
                                <div class="col-md-8"> 
                                    <div class="chart-bar m-3">
                                        <canvas id="myBarChart<?php echo $cemois; ?>"></canvas>
                                    </div>
                                </div>
                          <?php // }
                          } else {} ?>
                       </div>
                        <div class="table-responsive">
                                                         
                            <div class="">
                              <p><strong>Intensité : </strong></p>
                              
                              <ul class="list-group list-group-horizontal-sm">
                                  <?php
                                  foreach($efforts as $tp) { ?>   
                                      <li class="list-group-item"><i class="fas fa-dumbbell text-<?php echo $tp->efforts_color; ?>"></i> <?php echo $tp->efforts_nom; ?></li><?php
                                  } ?>
                              </ul> 
                            </div>
                          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr class="bg-primary text-white">
                                <th>Date</th>
                                    <?php
                                    foreach($exos as $tp) {
                                        echo '<th>'.$tp->exos_nom.'</th>';   
                                    } ?>
                                <th>TOT. Jr</th>
                                <th>Commentaire</th>
                                <th>Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                              <?php
                              foreach($tab_type_jr[$cemois] as $datejr => $donnees) { ?>
                                <tr>
                                    <td class="bg-gray-500 text-white"><?php echo date("d", strtotime($datejr)); ?></td>
                                    <?php
                                    $totjour=0; $k++;
                                      foreach($exos as $tp) {
                                        if(isset($donnees[$tp->id])) {
                                            $totp=0;
                                            ?><td><ul class="ml-0 pl-2"><?php
                                                $tot_exos=0;
                                                foreach($donnees[$tp->id] as $tot_tp) {
                                                    //$totjour+=$tot_tp;
                                                    //$totp+=$tot_tp;
                                                    $tot_exos+=$tot_tp['repetitions'];
                                                    ?><li class="pl-1 list-unstyled"><i class="fas fa-dumbbell text-<?php echo $ts_effort_color[$tot_tp['intensite']]; // effort ?>"></i>
                                                    <?php if(round($tot_exos)>0) { echo $tot_exos; } else {} ?></li> <?php
                                                }
                                            ?></ul></td><?php
                                        }
                                        else { echo "<td> </td>"; }
                                      } ?>
                                        <?php      
                                          $commentaire=''; //print_r($donnees);
                                          foreach($type as $tp) {
                                            if(isset($donnees[$tp->id])) {
                                                $totp=0;
                                                foreach($donnees[$tp->id] as $tot_tp) {
                                                    $totjour+=$tot_tp["repetitions"];
                                                    $totp+=$tot_tp["repetitions"];
                                                    if($tot_tp["commentaire"]=="") {}
                                                    else {                        
                                                      if($commentaire=="") { $commentaire.=$tot_tp["commentaire"]; }
                                                      else { $commentaire.="<br/>".$tot_tp["commentaire"]; }
                                                    }
                                                } 
                                            }
                                            else {  }  
                                          }
                                          ?>
                                  <?php ?> <td class="table-warning"><?php echo $totjour; ?></td> <? ?>
                                  <td><?php if($commentaire=="") {}
                                            else { ?>
                                                <a href="#collapseCard<?php echo $k; ?>" class="p-1 m-0" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard<?php echo $k; ?>">
                                                <i class="fa fa-list"></i></a>
                                                <div class="collapse hide" id="collapseCard<?php echo $k; ?>">
                                                  <div class="card-body p-0 m-0">
                                                    <?php echo $commentaire; ?>
                                                  </div>
                                                </div>
                                            <?php } ?></td>
                                    <td><a href="<?php echo base_url(); ?>index.php/prepaphysique/edit/?date=<?php echo $datejr; ?>">
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
</div>