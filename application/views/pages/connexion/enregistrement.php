 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Créer un compte</h1>
              </div>
               <?php
                  echo form_open('connexion/enregistrement',array('class'=>'user', 'id'=>'enregistre'));
                ?>
                <?php echo validation_errors('<div class="p-3 mb-2 bg-danger text-white rounded"><i class="fas fa-exclamation-triangle"></i>',
                                             '</div>'); ?>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                     <?php
                     $input_nom = array('class'=>"form-control form-control-user", "name"=>"nom", "required"=>"required","placeholder"=>"Nom",
                                        "value"=>set_value('nom'));
                     echo form_input($input_nom); ?>
                  </div>
                  <div class="col-sm-6">
                     <?php
                     $input_prenom = array('class'=>"form-control form-control-user", "name"=>"prenom", "required"=>"required",
                                        "placeholder"=>"Prénom", "value"=>set_value('prenom'));
                     echo form_input($input_prenom); ?>
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0"><?php /*
                   <div class="input_group">
                    <div class="input-group-prepend">
                       <?php echo form_label('Club', 'club_id', array("class"=>"input-group-text"));?>
                    </div>
                    */ ?>
                     <?php
                     $input_club[0]="Club";
                     foreach ($clubs->result_array() as $row) {
                         $input_club[$row['id']]=$row['ville'];
                     }
                     echo form_dropdown('club_id', $input_club, set_value('club_id'),
                                        array("class"=>"form-control", "required"=>"required"));
                     ?>
                   </div>
                     
                  <div class="col-sm-6">
                     <?php
                     $input_licence = array('class'=>"form-control rounded", "name"=>"licence", "required"=>"required",
                                        "placeholder"=>"N° licence", "value"=>set_value('licence'));
                     echo form_input($input_licence); ?>
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                     <?php
                     $input_categ[0]="Catégorie";
                     foreach ($categories->result_array() as $row) {
                         $input_categ[$row['id']]=$row['nom_categ_long'];
                     }
                     echo form_dropdown('categorie_id', $input_categ, set_value('categorie_id'),
                                        array("class"=>"form-control", "required"=>"required"));
                     ?>
                   </div>
                     
                  <div class="col-sm-6">
                     <?php
                     $input_arme[0]="Arme";
                     foreach ($armes->result_array() as $row) {
                         $input_arme[$row['id']]=$row['nom_arme_long'];
                     }
                     echo form_dropdown('arme_id', $input_arme, set_value('arme_id'), array("class"=>"form-control", "required"=>"required"));
                     ?>
                  </div>
                </div>
                <?php
                  $input_mail = array('class'=>"form-control form-control-user mb-3", "name"=>"login", "required"=>"required",
                              "type"=>"email", "value"=>set_value('login'),
                              "placeholder"=>"Identifiant email", "aria-describedby"=>"emailHelp", "aria-describedby"=>"emailHelp");
                  echo form_input($input_mail); ?>
                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <?php
                    $input_pw2 = array('class'=>"form-control form-control-user", "name"=>"password", "required"=>"required",
                                "placeholder"=>"Mot de passe", "value"=>set_value('password'));
                    echo form_password($input_pw2); ?>
                  </div>
                  
                  <div class="col-sm-6">
                    <?php
                    $input_pw = array('class'=>"form-control form-control-user", "name"=>"password2", "required"=>"required",
                                "placeholder"=>"Confirmer Mot de passe");
                    echo form_password($input_pw); ?>
                  </div>
                </div>
                <div class="g-recaptcha"
                      data-sitekey="6LfE0qYZAAAAABohpiGOFUGgs3XCneCPb6djTZqV"
                      data-callback="onSubmit"
                      data-size="invisible">
                </div>
                <script>onload();</script>

                <?php
                    echo form_submit('btnsubmit', "S'enregistrer", array("class"=>"btn btn-primary btn-user btn-block"));
                    echo form_close(); ?>
              <hr>
              <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>index.php/connexion">Déjà un compte ? Se connecter</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>