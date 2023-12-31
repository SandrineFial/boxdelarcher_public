<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image" >
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Salut Archer !</h1>
                  </div>
                  
                    <?php
                        echo form_open('connexion/index',array('class'=>'user'));
                    ?> 
                    <?php
                    if(isset($msg) AND !empty($msg)) {
                        echo '<div class="p-3 mb-2 bg-danger text-white rounded"><i class="fas fa-exclamation-triangle"></i>  '.$msg.'</div>';
                        }
                    else { } ?>
                    <?php
                    $input_mail = array('class'=>"form-control form-control-user", "name"=>"login", "required"=>"required",
                                "type"=>"email",
                                "placeholder"=>"Identifiant email", "aria-describedby"=>"emailHelp", "aria-describedby"=>"emailHelp");
                    echo form_input($input_mail); ?>
               
                    <?php
                    $input_pw = array('class'=>"form-control form-control-user mt-3 mb-3", "name"=>"password", "required"=>"required",
                                "placeholder"=>"Mot de passe");
                    echo form_password($input_pw); ?>
                    <!--
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                      </div>
                    </div> -->
                    <?php
                        echo form_submit('btnsubmit', ' Se connecter', array("class"=>"btn btn-primary btn-user btn-block"));
                        echo form_close(); ?>
                    
                    <!--
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>index.php/connexion/mp_perdu">Mot de passe oublié</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>index.php/connexion/enregistrement">Créer mon compte</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>