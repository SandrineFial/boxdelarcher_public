
  <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chart-table pb-4 text-primary"></i> Travail Technique</h1> 
            <a href="<?php echo base_url(); ?>index.php/repetitions/add" class="btn btn-info btn-circle btn-lg shadow-sm">
                <i class="fas fa-plus"></i>
              </a>
    </div>
    
          <!-- DataTales Example -->
          <div class="card shadow mb-4">    
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
                                    $tab_type_jr[$cemois][$tjr->date][$tjr->type_id][$tjr->distance_id] = $tjr->travail_technique;
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
                                  <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                        <tr class="bg-primary text-white">
                                          <th>Rép.</th>
                                              <?php
                                              foreach($type as $tp) {
                                                  echo '<th>'.$tp->travail_technique.'</th>';   
                                              } ?>
                                          <th>TOT</th>
                                          <th>Edit</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          
                                        <?php
                                       // print_r($tab_type_jr);
                                        foreach($tab_type_jr[$cemois] as $datejr => $donnees) { ?>
                                          <tr>
                                            <td><?php echo date("d/m/y", strtotime($datejr)); ?></td>
                                              <?php
                                              $totjour=0;
                                                foreach($type as $tp) {
                                                  if(isset($donnees[$tp->id])) {
                                                      $totp=0;
                                                      foreach($donnees[$tp->id] as $tot_tp) {
                                                          $totjour+=$tot_tp;
                                                          $totp+=$tot_tp;
                                                      } 
                                                      echo "<td>".$totp."</td>";
                                                  }
                                                  else { echo "<td> </td>"; }
                                                } ?>
                                            <td class="table-warning"><?php echo $totjour; ?></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/repetitions/edit/?date=<?php echo $datejr; ?>">
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
          </div>
