<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-graduation-cap pb-4 text-primary"></i> <?php echo $title; ?></h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php echo form_open_multipart('stages/sinscrire'); ?>
        <?php echo validation_errors('<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> ', '</div>'); ?>
         
        <div>
            <?php
                $stage=$stage["0"];
                $type_liste = array();
                foreach($type as $row) {
                    $type_liste[$row['id']]=$row['nom'];
                }
            ?>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item"><strong>Le <?php echo date("d/m/Y", strtotime($stage->date)); ?></strong></li>
                <li class="list-group-item"><?php echo $type_liste[$stage->type_id]; ?></li>
                <li class="list-group-item"><?php echo $stage->description; ?></li>
            </ul>
            
           <p>
              <?php
                if(isset($stage) AND $stage->mandat!="") {
                  ?><a href="<?php echo base_url().path_img_stages.$stage->mandat; ?>" target="_blank">
                    <i class="fa fa-file-pdf fa-4x"></i></a><?php
                }
                else {  }
                if(isset($stage)) { echo form_hidden("id",$stage->id); } ?>
            </p>
        </div>
         
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Nom', 'nom');
                $nom = array('class'=>"form-control", "id"=>"nom", "name"=>"nom", "required"=>"required", "value"=>$user->nom);
                echo form_input($nom); ?>
            </div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Prénom', 'prenom');
                $prenom = array('class'=>"form-control", "id"=>"prenom", "name"=>"prenom", "required"=>"required", "value"=>$user->prenom);
                echo form_input($prenom); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Téléphone', 'tel');
                $tel = array('class'=>"form-control", "id"=>"tel", "name"=>"telephone", "required"=>"required", "value"=>$user->telephone);
                echo form_input($tel); ?>
            </div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Mail', 'email');
                $mail = array('class'=>"form-control", "id"=>"email", "type"=>"email", "required"=>"required", "name"=>"email", "value"=>$user->email);
                echo form_input($mail); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <?php
                echo form_label('Club', 'club_id');
                $input_club = array();
                foreach ($clubs->result_array() as $row) {
                    $input_club[$row['id']]=$row['ville'];
                }
                echo form_dropdown('club_id', $input_club, $user->club_id, array("class"=>"form-control form-control-user"));
                ?>
            </div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Licence', 'licence');
                $licence = array('class'=>"form-control", "id"=>"licence", "name"=>"licence", "value"=>$user->licence);
                echo form_input($licence); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
               <?php
                echo form_label('Catégorie', 'categorie_id');
               $input_categ[0] = array();
               foreach ($categories->result_array() as $row) {
                   $input_categ[$row['id']]=$row['nom_categ_long'];
               }
               echo form_dropdown('categorie_id', $input_categ, $user->categorie_id, array("class"=>"form-control",
                                                                     "value"=>set_value('categorie_id')));
               ?>
             </div>
               
            <div class="col-md-4 mb-3">
               <?php
                echo form_label('Arme', 'arme_id');
               $input_arme[0]=array();
               foreach ($armes->result_array() as $row) {
                   $input_arme[$row['id']]=$row['nom_arme_long'];
               }
               echo form_dropdown('arme_id', $input_arme, $user->arme_id, array("class"=>"form-control",
                                                                     "value"=>set_value('arme_id')));
               ?>
            </div>
        </div>
        
        <?php
            echo form_submit('btnsubmit', 'Enregistrer', array("class"=>"btn btn-lg btn-warning"));
            echo form_close(); ?>
    </div>
</div>