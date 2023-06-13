<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Un max d'outils pour l'archer">
  <meta name="author" content="Sandrine Fialon">

  <title><?php echo $title; ?> - Box de l'archer</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>public/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet" media="screen">
  
  <?php if($this->uri->ruri_string()=="connexion/enregistrement") { ?>
          <script src="https://www.google.com/recaptcha/api.js" async defer></script>
          <script>
            function onSubmit(token) {
              document.getElementById("enregistre").submit();
              /*// 6LfE0qYZAAAAABohpiGOFUGgs3XCneCPb6djTZqV
              // 6LfE0qYZAAAAACwDLh2sxWWh8feb1LQZhgVpXVLt */
              grecaptcha.execute();
            }
          </script>
          <script>
            function onSubmit(token) {
              alert('thanks ' + document.getElementById('field').value);
            }
        
            function validate(event) {
              event.preventDefault();
              if (!document.getElementById('field').value) {
                alert("You must add text to the required field");
              } else {
                grecaptcha.execute();
              }
            }
        
            function onload() {
              var element = document.getElementById('submit');
              element.onclick = validate;
            }
          </script>

  <?php } else {} ?>

</head>

<body id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper">
                             
<?php if(isset($_SESSION['user'])) {
  
			$user_id = $_SESSION['user']['user_id'];
			$droit_user = $this->Common_model->return_droit_user($user_id);
  ?>
      
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bullseye"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Box de l'archer</div>
      </a>

      <hr class="sidebar-divider my-0">
                      
      <?php /* // if($droit_user==2) { // si entraineur ?>
      
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url(); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Les archers de mon club
            </div>
            <?php foreach($archers as $arc) { ?>
            
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>">
                  <span><?php echo $arc->nom." ".$arc->prenom; ?></span>
                </a>
              </li>
            <?php } ?>
            
      <?php */ /* }
      else { */ // si archer ou Admin ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url(); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Mon récap.</span></a>
            </li>
      
            <hr class="sidebar-divider">
      
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/repetitions">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Répétitions</span></a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/prepaphysique">
                <i class="fas fa-fw fa-dumbbell"></i>
                <span>Prépa physique</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/prepamentale">
                <i class="fas fa-fw fa-laugh"></i>
                <span>Prépa mentale</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/scores">
                <i class="fas fa-fw fa-trophy"></i>
                <span>Scores</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/reglages">
                <i class="fas fa-fw fa-tools"></i>
                <span>Réglage matériel</span></a>
            </li>
            
            
            <hr class="sidebar-divider">
                  
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Autres</span>
              </a>
              <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  
                  <a class="collapse-item" href="<?php echo base_url(); ?>index.php/outils">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Outils</span>
                  </a>
                  <a class="collapse-item" href="<?php echo base_url(); ?>index.php/stages">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>Stages</span>
                  </a>
                
                  <a class="collapse-item" href="https://www.ffta.fr/ws/epreuves" target="_blank">
                    <i class="fas fa-fw fa-bullseye"></i>
                    <span>Compétitions</span>
                  </a>
                  
                </div>
              </div>
            </li>

      <!-- Divider -->
            
                     
      <?php // } ?>
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
               
    </ul>
    
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <?php 
              if($droit_user==2 OR $droit_user==3) { ?>
                  <li class="nav-item no-arrow mx-1">
                    <?php if(isset($_GET["entraineur"])) { $link="accueil/index"; } else { $link="accueil/?entraineur"; } ?>
                    <a class="nav-link text-primary" href="<?php echo base_url(); ?>index.php/<?php echo $link; ?>" role="button">
                      <i class="fa fa-exchange-alt"></i>
                    </a>
                  </li>
              <?php } else {} ?>
              
              <li class="nav-item no-arrow mx-1">
                <a class="nav-link text-primary" href="<?php echo base_url(); ?>index.php/outils" role="button">
                  <i class="fas fa-fw fa-file-alt"></i>
                </a>
              </li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo $this->session->user['prenom']." ".$this->session->user['nom']; ?>
                </span>
                <?php if($this->session->user['photo']=="") { ?> <i class="fas fa-user text-primary"></i><?php }
                    else { echo img(array('src'=>path_img_user.$this->session->user['photo'], 'class'=>'img-profile rounded-circle img-thumbnail')); }
                    ?>
              </a>
              
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/utilisateur/index">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mon profil
                </a> <!--
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mes paramêtres
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/connexion/logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Se déconnecter
                </a>
              </div>
            </li>

          </ul>

        </nav>
        
<?php } else {} ?>

        <div class="container-fluid">