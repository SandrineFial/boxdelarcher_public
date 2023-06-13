
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-900"><i class="fas fa-tools text-primary"></i> Réglage matériel</h1>

        <div class="text-center mb-3 btn-group" role="group">
            
            <a href="#" class="btn btn-primary btn-icon-split btn-sm disabled" role="button" aria-disabled="true">
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
          <div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary h4">Pré-requis avant réglage</h2>
          </div>

          <div class="card-body">
              <p>Avant de régler mon arc, je vérifie que mes flèches sont adaptées à mon allonge et ma puissance.<br>
              Je vérifie avant tout que je maitrise bien la puissance de mon arc.</p>
          </div>
      </div>

      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary h4">Ma force et mon arc</h2>
          </div>

          <div class="card-body">
              <p>Est-ce que la puissance de mon arc est adaptée à ma musculature ?</p>

              <div class="column">
                  Voici ci-après des tests physiques permettant de savoir :<br>

                  <ul>
                      <li>si la puissance de mon arc est bien adaptée à ma morphologie</li>
                      <li>si je peux augmenter ma puissance, ou si je dois la diminuer</li>
                      <li>si je maitrise mon arc tout au long d'une volée et au cours d'un effort répété</li>
                  </ul>
                  
                  <h3 class="h5">Evaluation physique niveau 1 (débutant)</h3>
                  <p>Temps de tenue 1 série de 8 temps de tenue en 6 secondes avec 20 secondes de repos entre chaque tenue.</p>

                  <div class="separator" style="clear: both; text-align: center;">
                      <a href="<?php echo base_url().path_img.'eval-physique-n1.webp'; ?>" style="margin-left: 1em; margin-right: 1em;">
                        <?php echo img(array('src'=>path_img.'eval-physique-n1.webp', 'height'=>"98", "width"=>"320", 'class'=>"img-fluid")); ?>
                      </a>
                  </div><br>
                  <h3 class="h5">Evaluation physique niveau 2 (compétiteur)</h3>
                  <p>3 séries de 6 temps de tenue de 6 secondes avec 20 secondes de repos entre chaque tenue et 1 minute de repos entre chaque série.</p>
                  <div class="separator" style="clear: both; text-align: center;">
                      <a href="<?php echo base_url().path_img.'eval-physique-n2.webp'; ?>" style="margin-left: 1em; margin-right: 1em;">
                        <?php echo img(array('src'=>path_img.'eval-physique-n2.webp', 'height'=>"98", "width"=>"320", 'class'=>"img-fluid")); ?>
                      </a>
                  </div><br>
                  A faire en lâchant mes flèches à 10 m de distance.<br>
                  <br>
                  Si je n'ai pas ou très peu de tremblements, que mes épaules restent basses et que mon coude de corde reste aligné au plan vertical des branches. C'est bon je peux augmenter ma puissance ou rester avec cette puissance.<br>
                  Sinon je dois baisser ma puissance, mon arc est trop fort.<br>
                  <br>
                  <h3 class="h5">Augmenter ou diminuer ma puissance</h3>
                  Pour augmenter ou baisser ma puissance, je dévisse la vis de serrage derrière la poignée, pour desserrer ou resserrer la vis de réglage devant la poignée.<br>
                  <span style="margin-left: 1em; margin-right: 1em;">
                    <?php echo img(array('src'=>path_img.'puissance-tiller.webp', "height"=>"320", 'class'=>"img-fluid")); ?>
                  </span>
                  <span style="clear: right; float: right; margin-bottom: 1em; margin-left: 1em;">
                    <?php echo img(array('src'=>path_img.'Vis-de-puissance-de-tiller.webp', 'height'=>"135", "width"=>"320", 'class'=>"img-fluid")); ?>
                  </span>
                  <br>
              </div>
          </div>
      </div>

      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary h4">Mon allonge</h2>
          </div>

          <div class="card-body">
              <p>L'allonge se mesure avec une flèche chiffrée. Quand je mets en tension mon arc et que j'arrive au contact du visage, bras tendu et coude de corde dans le prolongement de la flèche, dans l'axe de l'arc.<br>
              Je mesure alors avec une autre personne, mon allonge morphologique. Quand je tire sur mon arc à pleine allonge, le bout de ma flèche doit tomber à la limite de la poignée ou bien dépasser un peu. Je mesure alors la distance entre le creux de l'encoche et le bout du tube.</p>
          
          <p>Si ma flèche avec la pointe est est à l'intérieur de ma poignée, mes flèches sont trop courtes, je les change pour éviter de me blesser.&nbsp;</p>

          <p><span style="clear: left; float: left; margin-bottom: 1em; margin-right: 1em;">
            <?php echo img(array('src'=>path_img.'allonge3.webp', "width"=>"200", 'class'=>"img-fluid")); ?>
          </span><br>
          Pour les plus jeunes (débutants et compétiteurs) et pour les adultes débutants, je privilégie des flèches plus longues que l'allonge réelle de manière à se laisser une marge d'évolution. Se référer alors à la longueur réelle de la flèche pour déterminer l'allonge technique.</p>
    
          </div>
  </div>

      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary h4">Ma puissance</h2>
          </div>

          <div class="card-body">
              <p><span style="clear: left; float: left; margin-bottom: 1em; margin-right: 1em;">
                <?php echo img(array('src'=>path_img.'peson.webp', "width"=>"200", 'class'=>"img-fluid")); ?>
              </span>
              Je pèse arc avec un peson. La puissance de l'arc se mesure en livre.<br>
              <br>
              Encochez votre flèche sur l’arc.<br>
              Mettez votre flèche sous le clicker. Accrochez le peson sous la flèche.<br>
              Tractez la corde jusqu’au passage du clicker. Revenez doucement sans lâcher.<br>
              <br>
              Pour ceux qui n'ont pas de clicker, tractez sur la corde avec le peson, votre entraineur vous dira ou vous arrêter (quand votre flèche atteint votre allonge morphologique et que corde touche le nez).<br>
              <br>
              La puissance tirée peut être différente de celle marquée sur les branches. La puissance de base marquée sur les branches est pour un archer qui a 28'' d'allonge. Si vous avez plus, vous tirerez plus puissant, si vous avez moins d'allonge, votre puissance sera moindre.</p>
          </div>
      </div>

      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary h4">Mes flèches</h2>
          </div>

          <div class="card-body">
              <p>Le bon choix des flèches assure une propulsion plus rectiligne dès les premiers mètres en limitant les perturbations lors du passage de la fenêtre d’arc. Le groupement est amélioré.</p>

              <ul>
                  <li>Flèches adaptées à ma puissance.</li>
              </ul>Maintenant que je connais mon allonge, je peux vérifier à l'aide des tableaux la valeur de mon spin de flèche par rapport à mon allonge, suivant la marque de mes flèches.<br>
              <br>
              <a href="<?php echo base_url().path_file.'2018-Easton-TargetShaft-Selector.pdf'; ?>" target="_blank">
                <i class="fa fa-file-pdf"></i> Exemple tableau Easton</a><br>
              <br>

              <ul>
                  <li>Plumes et encoches bien placées.</li>
              </ul>Je vérifie que mes plumes sont bien à égale distance les unes des autres sur mon tubes.<br>
              Pour placer l'encoche correctement, je pose mes flèches sur une table, plume coq en haut. Toutes les encoches doivent être calées pareilles.<br>
              <br>
              <span style=" margin-bottom: 1em; margin-right: 1em;">
                <?php echo img(array('src'=>path_img.'fleches-plumes.webp', "width"=>"180", 'class'=>"img-fluid")); ?>
              </span>
              <span style="margin-bottom: 1em; margin-right: 1em;">
                <?php echo img(array('src'=>path_img.'fleches-plumes-2.webp', "width"=>"180", 'class'=>"img-fluid")); ?>
              </span>
              <p>
              Il doit aussi y avoir une moyenne d'un pouce entre le creux de l'encoche et le début de la plume.<br>
              Caler les encoches pour un bon placement des plumes poules.</p>
              
              <p><a href="https://play.google.com/store/apps/details?id=com.vapeldoorn.arrows&hl=fr&gl=US" target="_blank">
                <?php echo img(array('src'=>path_img.'outils/arrows.webp', "width"=>"80", 'class'=>"img-fluid")); ?></a> Télécharger l'application <a href="https://play.google.com/store/apps/details?id=com.vapeldoorn.arrows&hl=fr&gl=US" target="_blank">Arrows</a> 
              pour vérifier son Spine par rapport à son allonge et sa puissance.</p>
          </div>
      </div>

      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary h4">Ma corde</h2>
          </div>

          <div class="card-body">
              <p>Elle doit être adaptée à la taille de mon arc et avoir un nombre de brins adaptés à ma puissance tirée.</p>

              <p>Voici une moyenne de longueur de corde adaptée à la taille de mes branches :</p>

              <table class="table">
                <thead  class="table-light">
                      <tr>
                          <td colspan="1" rowspan="2">
                              TAILLE DE POIGNÉE
                          </td>

                          <td colspan="4" rowspan="1">
                              <div style="text-align: center;">
                                  TAILLE DE BRANCHES
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>64"</td>
                          <td>66"</td>
                          <td>68"</td>
                          <td>70"</td>
                      </tr>
                </thead>
                <tbody>

                      <tr>
                          <td>21"</td>
                          <td>143cm</td>
                          <td>148cm</td>
                          <td>153cm</td>
                          <td>158cm</td>
                      </tr>

                      <tr>
                          <td>23"</td>
                          <td>148cm</td>
                          <td>153cm</td>
                          <td>158cm</td>
                          <td>163cm</td>
                      </tr>

                      <tr>
                          <td>25"</td>
                          <td>153cm</td>
                          <td>158cm</td>
                          <td>163cm</td>
                          <td>168cm</td>
                      </tr>

                      <tr>
                          <td>27"</td>
                          <td>158cm </td>
                          <td>163cm</td>
                          <td>168cm</td>
                          <td>173cm</td>
                      </tr>
                  </tbody>
              </table>

              <p>Le nombre de brins à ma corde est aussi très important pour une meilleure restitution de la puissance de mes branches.</p>
              <p>Un nombre optimal de brins va permettre une bonne restitution de la puissance, un bruit de l’arc correct lors de la libération de la corde et une augmentation de la longévité des branches.</p>

              <table class="table">
                <thead  class="table-light">
                      <tr>
                          <td>PUISSANCE TIRÉE</td>
                          <td>NOMBRE DE BRINS</td>
                      </tr>
                </thead>
                <tbody>
                      <tr>
                          <td>&lt; 25 livres</td>
                          <td>10 brins</td>
                      </tr>

                      <tr>
                          <td>25 - 30 livres </td>
                          <td>12 brins</td>
                      </tr>

                      <tr>
                          <td>30 - 35 livres</td>
                          <td>14 brins</td>
                      </tr>

                      <tr>
                          <td>35 - 40 livres</td>
                          <td>16 brins</td>
                      </tr>

                      <tr>
                          <td>40 - 45 livres</td>
                          <td>18 brins</td>
                      </tr>

                      <tr>
                          <td>45 - 50 livres</td>
                          <td>20 brins</td>
                      </tr>

                      <tr>
                          <td>&gt; 50 livres</td>
                          <td>22 brins</td>
                      </tr>
                  </tbody>
              </table>

              <p>Pour une allonge supérieure à 30", j'ajoute 2 brins au nombre indiqué.</p>
          </div>
      </div>

      <p><i>Sources : FFTA</i></p>
