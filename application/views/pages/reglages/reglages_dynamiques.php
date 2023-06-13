
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900"><i class="fas fa-tools text-primary"></i> Réglages dynamiques</h1>
        
        <div class="text-center mb-3 btn-group" role="group">
            
            <a href="<?php echo base_url(); ?>index.php/reglages/index" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text">Avant réglages</span>
              </a>
            
            <a href="<?php echo base_url(); ?>index.php/reglages/reglages_statiques" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text">Réglages statiques</span>
              </a>
            <a href="#" class="btn btn-primary btn-icon-split btn-sm disabled" role="button" aria-disabled="true">
                <span class="text"> Réglages dynamiques</span>
              </a>
    
        </div>
        
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary h4">Régler mon bouton de berger</h2>
        </div>

        <div class="card-body">
            
            <h3 class="h5">Définition</h3>
            <p>Le réglage du berger button consiste en l'ajustement optimal de l'alignement de la flèche et de la pression exercée par le ressort du berger button lors de l'éjection de la flèche.</p>
            
            <h3 class="h5">Objectif</h3>
            <p>Avoir un vol de flèche le plus rectiligne possible lors des premiers mètres de vol dès la sortie de la poignée.</p>
            
            <h3 class="h5">Pourquoi</h3>
            <p>Le réglage du berger button va permettre une éjection de la flèche plus rectiligne en exerçant une pression le long du tube, limitant le paradoxe engendré par la forte poussée à l'arrière de la flèche lors de la libération.</p>
            <p><a href="<?php echo base_url().path_img.'bouton-de-berger.jpg'; ?>" style="margin-left:1em">
             <?php echo img(array('src'=>path_img.'bouton-de-berger.webp', "class"=>"img-fluid")); ?></a></p>
            
            <h3 class="h5">Réglage du bouton de berger</h3>
            <p>Pour réaliser le réglage de base du berger button, le test se déroule entre 15 et 20m sur un blason de 40cm avec 2/3 flèches emplumées et 2/3 flèches sans plume.</p>
            <p>Si vos flèches sans plume sont à droite par rapport aux flèches emplumées :</p>
            <p><a href="<?php echo base_url().path_img.'bouton-de-berger-durcir.jpg'; ?>" style="margin-left:1em">
                <?php echo img(array('src'=>path_img.'bouton-de-berger-durcir.webp', "class"=>"img-fluid")); ?></a></p>
            <p>Si vos flèches sans plume sont à gauche par rapport aux flèches emplumées :</p>
            <p><a href="<?php echo base_url().path_img.'bouton-de-berger-ramollir.jpg'; ?>" imageanchor="1" style="margin-left:1em">
                <?php echo img(array('src'=>path_img.'bouton-de-berger-ramollir.webp', "class"=>"img-fluid")); ?></a></p>

            <h3 class="h5">Réglage plus fin du bouton de berger</h3>
            <p>Pour réaliser le réglage du berger button, le test se déroule de 5m à 50m (voir plus si possible).<br/>
            Placez un monospot de 40cm tout en haut de la butte de tir, réglez votre viseur à 20m puis tirez une flèche tous les 5m sans toucher le réglage du viseur.<br/>
            (Pour réaliser ce test, le viseur doit être aligné dans l'axe de l'arc et la corde doit être dans l'axe de l'oeilleton durant le tir)</p>
            <p><a href="<?php echo base_url().path_img.'berger-reglages-dynamique.jpg'; ?>" style="margin-left:1em">
                <?php echo img(array('src'=>path_img.'berger-reglages-dynamique.webp', "class"=>"img-fluid")); ?></a></p>
            
            <p>Pensez à vérifier régulièrement la tête du Berger. En effet, avec l'usure, la surface plate du piston s'altère et peut parfois favoriser la montée du tube sur le Berger.</p>
        </div>
    </div>

    <p><i>Sources : FFTA</i></p>
