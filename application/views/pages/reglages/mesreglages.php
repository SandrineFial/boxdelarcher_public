
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tools text-primary"></i> Mes réglages</h1>
        
        <div class="text-center mb-3 btn-group" role="group">
            
            <a href="#" class="btn btn-info btn-icon-split btn-sm" disabled>
                <span class="icon text-white-50">
                   <i class="fas fa-tools text-white"></i>
                </span>
                <span class="text">Mes réglages</span>
              </a>
            <a href="<?php echo base_url(); ?>index.php/reglages/index" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text">Avant réglages</span>
              </a>
            
            <a href="<?php echo base_url(); ?>index.php/reglages/reglages_statiques" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text">Réglages statiques</span>
              </a>
            <a href="<?php echo base_url(); ?>index.php/reglages/reglages_dynamiques" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text"> Réglages dynamiques</span>
              </a>
    
        </div>
        
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
             <?php echo form_open('reglages/mesreglages'); ?>
            <?php // echo validation_errors('<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> ', '</div>'); ?>
                                
            <?php $d=$data["0"]; ?>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Viseur', 'viseur_marque');
                    $nviseur = array('class'=>"form-control", "id"=>"viseur_marque", "name"=>"viseur_marque", "value"=>$d->viseur_marque); 
                    echo form_input($nviseur); ?>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('10m', 'distance_10');
                    $distance_10 = array('class'=>"form-control", "id"=>"distance_10", "name"=>"distance_10", "value"=>$d->distance_10); 
                    echo form_input($distance_10); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('15m', 'distance_15');
                    $distance_15 = array('class'=>"form-control", "id"=>"distance_15", "name"=>"distance_15", "value"=>$d->distance_15); 
                    echo form_input($distance_15); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('18m', 'distance_18');
                    $distance_18 = array('class'=>"form-control", "id"=>"distance_18", "name"=>"distance_18", "value"=>$d->distance_18); 
                    echo form_input($distance_18); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('20m', 'distance_20');
                    $distance_20 = array('class'=>"form-control", "id"=>"distance_20", "name"=>"distance_20", "value"=>$d->distance_20);  
                    echo form_input($distance_20); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('25m', 'distance_25');
                    $distance_25 = array('class'=>"form-control", "id"=>"distance_25", "name"=>"distance_25", "value"=>$d->distance_25); 
                    echo form_input($distance_25); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('30m', 'distance_30');
                    $distance_30 = array('class'=>"form-control", "id"=>"distance_30", "name"=>"distance_30", "value"=>$d->distance_30); 
                    echo form_input($distance_30); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('40m', 'distance_40');
                    $distance_40 = array('class'=>"form-control", "id"=>"distance_40", "name"=>"distance_40", "value"=>$d->distance_40); 
                    echo form_input($distance_40); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('50m', 'distance_50');
                    $distance_50 = array('class'=>"form-control", "id"=>"distance_50", "name"=>"distance_50", "value"=>$d->distance_50); 
                    echo form_input($distance_50); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('60m', 'distance_60');
                    $distance_60 = array('class'=>"form-control", "id"=>"distance_60", "name"=>"distance_60", "value"=>$d->distance_60);  
                    echo form_input($distance_60); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('70m', 'distance_70');
                    $distance_70 = array('class'=>"form-control", "id"=>"distance_70", "name"=>"distance_70", "value"=>$d->distance_70);  
                    echo form_input($distance_70); ?>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Allonge', 'allonge');
                    $allonge = array('class'=>"form-control", "id"=>"allonge", "name"=>"allonge", "value"=>$d->allonge); 
                    ?><small id="allongeHelp" class="form-text text-muted">En pouces.</small><?php
                    echo form_input($allonge); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Band', 'band');
                    $band = array('class'=>"form-control", "id"=>"band", "name"=>"band", "value"=>$d->band);  
                    ?><small id="bandHelp" class="form-text text-muted">En cm</small><?php
                    echo form_input($band); ?>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Tiller', 'tiller');
                    $tiller = array('class'=>"form-control", "id"=>"tiller", "name"=>"tiller", "value"=>$d->tiller);  
                    ?><small id="tillerHelp" class="form-text text-muted">En minimêtres</small><?php
                    echo form_input($tiller); ?>
                </div>
                <div class="col-md-4 mb-3">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Poignée', 'poignee_marque');
                    $poignee_marque = array('class'=>"form-control", "id"=>"poignee_marque", "name"=>"poignee_marque", "value"=>$d->poignee_marque); 
                    ?><small id="poignee_marqueHelp" class="form-text text-muted">Marque</small><?php 
                    echo form_input($poignee_marque); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Poignée taille', 'poignee_taille');
                    $poignee_taille = array('class'=>"form-control", "id"=>"poignee_taille", "name"=>"poignee_taille", "value"=>$d->poignee_taille);  
                    ?><small id="poignee_tailleHelp" class="form-text text-muted">En pouces</small><?php 
                    echo form_input($poignee_taille); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Branches', 'branches_marque');
                    $branches_marque = array('class'=>"form-control", "id"=>"branches_marque", "name"=>"branches_marque", "value"=>$d->branches_marque);  
                    ?><small id="branches_marqueHelp" class="form-text text-muted">Marque</small><?php 
                    echo form_input($branches_marque); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Branches taille', 'branches_taille');
                    $branches_taille = array('class'=>"form-control", "id"=>"branches_taille", "name"=>"branches_taille", "value"=>$d->branches_taille);  
                    ?><small id="branches_tailleHelp" class="form-text text-muted">En pouces</small><?php 
                    echo form_input($branches_taille); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Branches puissance marquée', 'branches_puissance_marquee');
                    $branches_puissance_marquee= array('class'=>"form-control", "id"=>"branches_puissance_marquee",
                                                       "name"=>"branches_puissance_marquee", "value"=>$d->branches_puissance_marquee);  
                    ?><small id="branches_puissance_marqueeHelp" class="form-text text-muted">Marque</small><?php 
                    echo form_input($branches_puissance_marquee); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Puissance à mon allonge', 'branches_puissance_allonge');
                    $branches_puissance_allonge= array('class'=>"form-control", "id"=>"branches_puissance_allonge",
                                                       "name"=>"branches_puissance_allonge", "value"=>$d->branches_puissance_allonge);  
                    ?><small id="branches_puissance_allongeHelp" class="form-text text-muted">Du creux de l'encoche à la fin du tube (sans la pointe), au bord de la poignée.</small><?php 
                    echo form_input($branches_puissance_allonge); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Corde', 'corde');
                    $corde= array('class'=>"form-control", "id"=>"corde", "name"=>"corde", "value"=>$d->corde); 
                    ?><small id="cordeHelp" class="form-text text-muted">Marque</small><?php 
                    echo form_input($corde); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Nb de brins', 'corde_brins');
                    $corde_brins= array('class'=>"form-control", "id"=>"corde_brins", "name"=>"corde_brins", "value"=>$d->corde_brins); 
                    ?><small id="corde_brinsHelp" class="form-text text-muted">Nombre de brins à ma corde.</small><?php 
                    echo form_input($corde_brins); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Flèches', 'fleches_marque');
                    $fleches_marque= array('class'=>"form-control", "id"=>"fleches_marque", "name"=>"fleches_marque", "value"=>$d->fleches_marque); 
                    ?><small id="fleches_marqueHelp" class="form-text text-muted">Marque</small><?php  
                    echo form_input($fleches_marque); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Flèches longueur', 'fleches_longueur');
                    $fleches_longueur = array('class'=>"form-control", "id"=>"fleches_longueur", "name"=>"fleches_longueur",
                                              "value"=>$d->fleches_longueur);  
                    ?><small id="fleches_longueurHelp" class="form-text text-muted">En pouces</small><?php  
                    echo form_input($fleches_longueur); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Flèches spin', 'fleches_spin');
                    $fleches_spin= array('class'=>"form-control", "id"=>"fleches_spin", "name"=>"fleches_spin", "value"=>$d->fleches_spin);  
                    ?><small id="fleches_spinHelp" class="form-text text-muted">Rigidité du tube.</small><?php  
                    echo form_input($fleches_spin); ?>
                </div>
                <div class="col-md-4 mb-3">
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Encoches', 'encoches_marque ');
                    $encoches_marque = array('class'=>"form-control", "id"=>"encoches_marque ", "name"=>"encoches_marque",
                                             "value"=>$d->encoches_marque);  
                    ?><small id="encoches_marqueHelp" class="form-text text-muted">Marque</small><?php  
                    echo form_input($encoches_marque ); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Encoches taille', 'encoches_taille');
                    $encoches_taille = array('class'=>"form-control", "id"=>"encoches_taille", "name"=>"encoches_taille", "value"=>$d->encoches_taille);  
                    ?><small id="encoches_tailleHelp" class="form-text text-muted">Taille des encoches (1-2 / S-L)</small><?php  
                    echo form_input($encoches_taille); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Pointes', 'pointe_marque ');
                    $pointe_marque = array('class'=>"form-control", "id"=>"pointe_marque ", "name"=>"pointe_marque", "value"=>$d->pointe_marque); 
                    ?><small id="pointe_marqueHelp" class="form-text text-muted">Marque</small><?php  
                    echo form_input($pointe_marque); ?>
                </div>
                <div class="col-md-4 mb-3"><?php
                    echo form_label('Pointes nb grains', 'pointe_nb_grains');
                    $pointe_nb_grains = array('class'=>"form-control", "id"=>"pointe_nb_grains", "name"=>"pointe_nb_grains",
                                              "value"=>$d->pointe_nb_grains);  
                    ?><small id="pointe_nb_grainsHelp" class="form-text text-muted">Nombre de grains des pointes.</small><?php  
                    echo form_input($pointe_nb_grains); ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3"><?php
                    echo form_label('Commentaire', 'commentaire');
                    $commentaire = array('class'=>"form-control", "id"=>"commentaire", "name"=>"commentaire", "value"=>$d->commentaire);  
                    echo form_textarea($commentaire);
                    echo form_hidden("utilisateur_id", $user_id); ?>
                </div>
            </div>
            <?php
            echo form_submit('btnsubmit', 'Enregistrer', array("class"=>"btn btn-lg btn-info"));
            echo form_close(); ?>
            
        </div>
    </div>