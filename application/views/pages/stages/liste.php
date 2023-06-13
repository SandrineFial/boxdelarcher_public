<div class="d-sm-flex align-items-center justify-content-between mb-2">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-graduation-cap pb-4 text-primary"></i> Stages départementaux et régionaux</h1>
</div>

<?php if(isset($msg_ok)) { ?>
  <div class="p-3 mb-2 bg-success text-white rounded"><i class="fas fa-check"></i> <?php echo $msg_ok; ?></div>
<?php } else {} ?>

<div class="card shadow mb-4">
    <div class="card-body">
      
      <div>    
        <?php /*
        <?php $type_liste = array(); ?>
        <ul><?php
            foreach($type as $row) {
              ?><li><strong><?php echo $row['nom']; ?></strong> : <?php echo $row['description']; ?></li><?php
            } ?>
        </ul>    */ ?>
        <div class="mt-3 mb-3">
          <a href="mailto:vartiralarc@gmail.com?subject=Inscription stage&body=Bonjour, je souhaite m'inscrire au stage du ...
          Cordialement,
          <?php echo $user->nom." ".$user->prenom.". Licence : n°".$user->licence; ?>" class="btn btn-lg btn-warning">S'inscrire</a>
        </div>
      </div>
      <div class="responsiveCal">
        <?php /*<iframe src="https://calendar.google.com/calendar/b/1/embed?height=600&amp;wkst=2&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FParis&amp;src=cmJsazg4aXA3ZXRudTI3cW1obzJzYjlubjBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZmFkODY0Z2R2NnI5cXVmMnY1ZHNubWJjdG9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=dWM4ZHFwdm0xZmkxbDJtbnI5czUxMzlyazRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=bTdoOXFlMWw3M3UzMDdtczhwazNkYzAwMWNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZnIuZnJlbmNoI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23F6BF26&amp;color=%23039BE5&amp;color=%23039BE5&amp;color=%23AD1457&amp;color=%230B8043&amp;title=Stages%20CD83" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        */ ?>
        <iframe src="https://www.cdarc83.com/vie-sportive/stages" width="800" height="600" frameborder="0" scrolling="yes"></iframe>
      </div>
      
      
      <?php /*
      
      <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php
            $mois_encours=date("m");
            // ne select que les mois >= a ajourdhui
            $ordre_du_mois_encours=round($this->Common_model->month_ordre_dans_lannee($mois_encours));
            foreach($month as $mois) {
                if($mois["ordre"]>=$ordre_du_mois_encours) {
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
                    role="tab" aria-controls="t<?php echo $mois["mois_chiffre"]; ?>" aria-selected="<?php echo $mois_enc_afch; ?>">
                    <?php echo $mois["mois_court"]; ?></a>
                  </li>
           <?php } else {}
            } ?>
        </ul>
        <div class="tab-content" id="myTabContent">
          <?php //print_r($liste);
            foreach($month as $mois) {
                $cemois=$mois["mois_chiffre"];
                if($mois["ordre"]>=$ordre_du_mois_encours) {
                    
                    if($cemois==date("m")) {
                        $active="show active";
                    } else {
                        $active="";
                    }
                      ?>
                      
                      <div class="tab-pane fade <?php echo $active; ?>" id="t<?php echo $cemois; ?>" role="tabpanel"
                      aria-labelledby="tab-<?php echo $cemois; ?>">
                           <?php  if(isset($liste[$cemois]["0"])) { ?>
                      
                              <div class="table-responsive">
                                                  
                                  <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                      <tr class="bg-primary text-white">
                                        <th>Date</th>
                                        <th>Lieu</th>
                                        <th>Type</th>
                                        <th>Mandat</th>
                                        <?php if($droit_user==3) { ?><th>Edit</th><?php } else {} ?>
                                        <th>S'inscrire</th>
                                      </tr>
                                    </thead>
                                    <tbody>    
                                          <?php
                                          foreach($liste[$cemois] as $l) {
                                              echo '<td>'.date("d/m/Y", strtotime($l->date)).'</td>';
                                              echo '<td>'.$l->lieu.'</td>';
                                              echo '<td>'.$l->type.'<br/><small>'.$l->description.'</small></td>';
                                              if($l->mandat=="") { $mandat=""; }
                                              else { $mandat='<a href="'.base_url().path_img_stages.$l->mandat.'" target="_blank"><i class="fas fa-file-pdf pb-4 fa-2x"> </i></a>'; }
                                              echo '<td>'.$mandat.'</td>';
                                              if($droit_user==3) { ?>
                                                  <td><a href="<?php echo base_url(); ?>index.php/stages/add/?id=<?php echo $l->id; ?>">
                                                      <i class="fas fa-edit pb-4"> </i></a></td><?php } else {}
                                                      ?>
                                              <td><a href="<?php echo base_url(); ?>index.php/stages/sinscrire/<?php echo $l->id; ?>">
                                                  <i class="fas fa-edit pb-4"> </i></a></td>
                                          <?php } ?>
                                    </tbody>
                                  </table>
                              </div>
                          <?php  } else { ?>
                            <p class="pt-4">Pas de stages de notés pour ce mois.</p>
                         <?php   } ?>
                      </div>
                <?php 
                  } else {}
              } ?>
        </div>
        */ ?>
    </div>
</div>