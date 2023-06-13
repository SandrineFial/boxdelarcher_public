<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user pb-4 text-primary"></i> Mon profil</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        
        <?php echo form_open_multipart('utilisateur/index'); $user=$user["0"]; //print_r($user); ?>
        <?php echo validation_errors('<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> ', '</div>');
        if(isset($error)) { echo '<div class="p-3 mb-2 bg-danger text-white rounded"><i class="fas fa-exclamation-triangle"></i> '.$error.'</div>'; }
        if(isset($success)) { echo '<div class="p-3 mb-2 bg-success text-white rounded"><i class="fas fa-check"></i> '.$success.'</div>'; } ?>
        
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
                $tel = array('class'=>"form-control", "id"=>"tel", "name"=>"telephone", "value"=>$user->telephone);
                echo form_input($tel); ?>
            </div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Mail', 'email');
                $mail = array('class'=>"form-control", "id"=>"email", "type"=>"email", "name"=>"email", "value"=>$user->email);
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
                if($droit_user==3) {
                    echo form_dropdown('club_id', $input_club, $user->club_id, array("class"=>"form-control form-control-user"));
                }
                else {
                    echo '<div class="form-control form-control-user">'.$input_club[$user->club_id].'</div>';
                    echo form_hidden('club_id', $user->club_id);
                }
                ?>
            </div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Licence', 'licence');
                $licence = array('class'=>"form-control", "id"=>"licence", "name"=>"licence", "required"=>"required", "value"=>$user->licence);
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
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <?php
                if($user->photo=="") { echo '<i class="fa fa-user fa-4x"></i>'; }
                else {
                    echo img(array('src'=>path_img_user.$user->photo, 'class'=>'img-profile rounded-circle img-thumbnail'));
                    }
                ?>
            </div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Photo', 'photo');
                $photo = array('class'=>"form-control", "id"=>"photo", "name"=>"photo", "type"=>"file");
                echo form_input($photo); ?>
            </div>
        </div>
        <?php
        echo form_submit('btnsubmit', 'Enregistrer', array("class"=>"btn btn-lg btn-info"));
        echo form_close(); ?>
    </div>
</div>