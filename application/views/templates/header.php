<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="author" content="Sandrine Fialon">

  <title><?php echo $title; ?> - Box de l'archer</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>public/css/sb-admin-2.min.css" rel="stylesheet"> 
  
  <link href="<?php echo base_url(); ?>public/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link rel="canonical" href="<?php echo base_url().$canonical; ?>" />
  <meta name="robots" content="follow" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GS3Q1W410X"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GS3Q1W410X');
</script>

</head>

<body id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper"><?php
  
  ?>
      
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-solid fa-bullseye"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Box de l'archer</div>
      </a>

      <hr class="sidebar-divider my-0">

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menureglage" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Réglage matériel</span>
              </a>
              <div id="menureglage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="<?php echo base_url(); ?>index.php/reglages">Réglage Arc classique</a>
                  <a class="collapse-item" href="https://youtu.be/tR1B_7jDZAM" target="_blank">Fabriquer une corde <i class="fas fa-external-link-alt">&nbsp;</i></a>
                  <a class="collapse-item" href="https://youtu.be/FN3JeFxqA74" target="_blank">Réparer une corde <i class="fas fa-external-link-alt">&nbsp;</i></a>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menumental" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Prépa mentale</span>
              </a>
              <div id="menumental" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="<?php echo base_url(); ?>index.php/prepamentale">C'est quoi ?</a>
                  <a class="collapse-item" href="<?php echo base_url(); ?>index.php/prepamentale/visualisation">La visualisation</a>
                </div>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/prepaphysique">
                <i class="fas fa-fw fa-dumbbell"></i>
                <span>Prépa physique</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>index.php/outils">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Outils d'entrainements</span>
              </a>
            </li>
            
      <li><?php echo img(array('src'=>path_img.'sf.webp', "class"=>"img-fluid p-3 opacity-50")); ?><li>
        
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>index.php/contact">
          <i class="fas fa-info-circle"></i>
          <span>Contact</span>
        </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


    </ul>
    
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top bg-gradient-warning">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <span class="h3 mb-2">La boite à outils du Tir à l'Arc</span>

        </nav>
        

        <div class="container-fluid p-5 pt-3">