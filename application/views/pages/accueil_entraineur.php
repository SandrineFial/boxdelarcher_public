
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Les archers de mon club
    <?php if($droit_user<3) { echo '<small>('.$this->Common_model->club_trouve_nom($this->session->user['club_id']).')</small>'; } ?></h1>
</div>

<?php

 $semaine_en_cours = round(date('W', strtotime(date("Y-m-d"))));

if(is_array($archers)) {
    foreach($archers as $arc) { ?>

          <div class="card shadow mb-4">
              <div class="card-header py-2">
                  <h1 class="m-0 font-weight-bold text-primary h6"><?php echo $arc->prenom." ".$arc->nom; ?> 
                     <?php if($droit_user==3) { echo '<small>('.$arc->ville.')</small>'; } ?>
                  <small class="float-right"><?php echo $arc->nom_categ_court; ?> <?php echo $arc->nom_arme_court; ?></small></h1>
              </div>
          
              <div class="card-body">
                
                  <?php $where= array();
                  $where["utilisateur_id"]=$arc->id;  $whereScore["utilisateur_id"]=$arc->id;
                  $totRepArcher = $this->Repetitions_model->semaine_tot_6_dernieres($where);
                  $totPPGArcher=$this->Prepa_physique_model->semaines_tot_exos_6sem($where);
                  $totScoreArcher=$this->Scores_model->semaine_tot_6_dernieres($whereScore);
                  
                      ?>
                      <table class="table table-bordered mb-2">
                        <thead>
                          <tr>
                            <th class="table-secondary">Semaines</th>
                            <?php foreach($totRepArcher as $sem) {
                              ?><td class="table-secondary">
                                  <?php echo $sem['semaine']; ?></td><?php 
                            } ?>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th><span class="mb-1 text-primary"><i class="fas fa-chart-line"></i> Répétitions</span></th>
                            <?php foreach($totRepArcher as $nomb) {
                              ?><td <?php if($semaine_en_cours==$nomb['semaine']) { echo 'class="table-warning"'; } else {} ?>>
                                <?php $totR=round($nomb['nombre']);
                                if($totR>=1) {
                                   $travail=$nomb['travail_technique'];
                                   if($travail=="") { echo $totR; }
                                   else { ?>
                                   <a type="button" class="bg-gray-100" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $travail; ?>">
                                     <?php echo $totR; ?>
                                   </a>
                                   <?php }
                                } else { echo '.'; }
                                ?>
                              </td><?php 
                            } ?>
                          </tr>
                          
                          <tr>
                            <th><span class="mb-1 text-primary"><i class="fas fa-fw fa-trophy"></i> Scores</span></th>
                            <?php
                              foreach($totScoreArcher as $scob) {
                                   ?><td <?php if($semaine_en_cours==$scob['semaine']) { echo 'class="table-warning"'; } else {} ?>>
                                       <?php if($scob['score_total']==0 OR $scob['score_total']=="") {} else {
                                        $tsScores=explode("_", $scob['score_total']);
                                        foreach($tsScores as $sco) {
                                           $scoreDist=explode("-", $sco);
                                           echo $scoreDist["0"].' <small class="text-muted">('.$scoreDist['1']."m)</small><br/>"; } 
                                        } ?>
                                   </td><?php
                            } ?>
                          </tr>
                          
                          <tr>
                            <th><span class="mb-1 text-primary"><i class="fas fa-fw fa-dumbbell"></i> PPG</span></th>
                            <?php
                            //print_r($totPPGArcher);
                            foreach($totPPGArcher as $nomb) {
                              ?><td <?php if($semaine_en_cours==$nomb['semaine']) { echo 'class="table-warning"'; } else {} ?>>
                                  <?php
                                  if($nomb['repetitions']==0) {
                                     if($nomb['effort']==0) {} else { echo $nomb['effort']; }
                                  } else {
                                       echo $nomb['repetitions'];
                                  } ?></td><?php 
                            } ?>
                          </tr>
                          
                        </tbody>
                      </table>
                
              </div>
          </div>
  <?php }
} else {
  
  ?><p>Hep ! Pas encore d'archers à suivre.<br/>Demande-leur de créer un compte sur l'appli et tu pourras les voir.</p><?php
}
?>