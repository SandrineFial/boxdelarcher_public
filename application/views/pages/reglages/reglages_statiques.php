
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900"><i class="fas fa-tools text-primary"></i> Réglages statiques</h1>
        
        <div class="text-center mb-3 btn-group" role="group">
            
            <a href="<?php echo base_url(); ?>index.php/reglages/index" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text">Avant réglages</span>
              </a>
            
            <a href="#" class="btn btn-primary btn-icon-split btn-sm disabled" role="button" aria-disabled="true">
                <span class="text">Réglages statiques</span>
              </a>
            <a href="<?php echo base_url(); ?>index.php/reglages/reglages_dynamiques" class="btn btn-primary btn-icon-split btn-sm">
                <span class="text"> Réglages dynamiques</span>
              </a>
    
        </div>
        
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary h4">1. Le band</h2>
        </div>

        <div class="card-body">
            <span style="clear: left; float: left; margin-bottom: 1em; margin-right: 1em;">
                <?php echo img(array('src'=>path_img.'band2.webp', "class"=>"img-fluid")); ?>
</span>
            
            <h3 class="h5">Définition</h3>
            <p>Le band est la distance mesurée entre la corde de l’arc en tension et le centre du berger button.</p>
            
            <h3 class="h5">Objectif</h3>
            <p>Assurer lors de la libération de la corde une restitution complète de la puissance, un vol optimal de la flèche, et un bruit normal pour l’arc.</p>

            <h3 class="h5">Pourquoi</h3>
            <p>Si le band est trop faible, la corde va venir claquer sur les branches, engendrant un arc très bruyant et un vol de flèche moins efficace, voire erratique.</p>
            <p>Si le band est trop élevé, la puissance ne sera pas pleinement restituée et engendrera également un vol de flèche moins efficace.</p>
            
            <p>Le band est adapté à la taille de mon arc. Voici un tableau de correspondance :</p>

            <div class="page" title="Page 12">
                <table class="table">
                    <thead  class="table-light">
                        <tr>
                            <td>TAILLE DE L'ARC </td>
                            <td>BAND</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>64"</td>
                            <td>20cm (+/- 5mm)</td>
                        </tr>
                        <tr>
                            <td>66"</td>
                            <td>21cm (+/- 5mm)</td>
                        </tr>
                        <tr>
                            <td>68"</td>
                            <td>22cm (+/- 5mm)</td>
                        </tr>
                        <tr>
                            <td>70"</td>
                            <td>23cm (+/- 5mm)</td>
                        </tr>
                        <tr>
                            <td>72"</td>
                            <td>24cm (+/- 5mm)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <h3 class="h5">Réglage du band</h3>
            <p>Si j'ai un band inférieur au tableau, je vrille ma corde : je l'enlève de mon arc, et la tourne de plusieurs tour pour la resserrer.</p>
            <p>Si j'ai un band supérieur au tableau, je dévrille ma corde : je l'enlève de mon arc et la tourne dans le sens inverse où elle est tournée pour la desserer.</p>
            <p>Il se peut que pour certaines poignées le band idéal ne soit pas celui noté ici. Je me réfère alors aux données constructeurs de la poignée.</p>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary h4">2. Le Tiller</h2>
        </div>

        <div class="card-body">
            <h3 class="h5">Définition
            <span imageanchor="1" style="float: right; margin-bottom: 1em; margin-left: 1em;">
                <?php echo img(array('src'=>path_img.'tiller.webp', 'height'=>"180", "class"=>"img-fluid")); ?>
</span></h3>
            <p>Le tiller définit la distance entre le point d’attache de la branche et la corde, lorsque l’arc est en tension.</p>
            
            <h3 class="h5">Objectif</h3>
            <p>Pour que le tiller d’un arc soit bien réglé, la distance entre le point d’attache de la branche du haut et la corde doit être supérieur de 3 à 5mm par rapport à la distance mesurée de la même façon en bas.</p>
            
            <h3 class="h5">Pourquoi</h3>
            <p>La prise de corde en arc classique s’effectuant avec 1 doigt au dessus de la flèche et 2 doigts en dessous, il est nécessaire que les branches puissent évoluer de façon synchrone après la libération de la corde, et assurer une projection rectiligne de la flèche lors de la libération.</p>
            
            <h3 class="h5">Réglage du Tiller</h3>               
            <p>Mesurez le tiller en haut et en bas de votre arc (distance de la corde à la branche, juste au dessus de la poignée) avec une équerre.</p>
            <p>Le tiller se mesure en soustrayant la distance du tiller du haut et celle du bas.</p>
            <p>Le total doit se situer entre <b>3 et 5mm</b>. <strong>La distance du tiller haut est plus grande que celle du bas</strong>.</p>

            <p>Pour régler le tiller dévisser et visser les vis de réglage de puissance après avoir dévissé la vis de verrouillage.</p>

                <div class="separator" style="clear: both;">
                    <span imageanchor="1" style="margin-bottom: 1em;">
                    <?php echo img(array('src'=>path_img.'Vis-de-puissance-de-tiller.webp', 'width'=>"320", "class"=>"img-fluid")); ?></span>
                </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary h4">3. Alignement des branches</h2>
        </div>

        <div class="card-body">
            
            <h3 class="h5">Définition
            <a href="<?php echo base_url().path_img.'alignement-branches.jpg'; ?>" imageanchor="1" style="margin-left: 1em; margin-right: 1em; float:right;">
                <?php echo img(array('src'=>path_img.'alignement-branches.webp', 'height'=>"320", "class"=>"img-fluid")); ?></a></h3>
            <p>Ajustement de la position des branches pour influencer le positionnement de la corde par rapport à l’axe de l’arc.</p>
            
            <h3 class="h5">Objectif</h3>
            <p>Positionner la corde dans l’axe de l’arc pour optimiser le fonctionnement mécanique de l’arc.</p>
            
            <h3 class="h5">Pourquoi</h3>
            <p>Le positionnement de la corde dans l’axe de l’arc grâce à l’alignement des branches va permettre de respecter la symétrie de l’arc, assurant ainsi une poussée de la flèche équilibrée latéralement et une propulsion plus rectiligne.
            <br/>A noter que ce réglage a une incidence significative sur la longévité et la qualité des branches.</p>
            
            <h3 class="h5">Alignement des branches</h3>
            <p>A l'aide de câles Beiter, je vais aligner les branches.<br>
            Je pose d'abord mon arc sur une chaise, et je pose une cale sur chaque branche.<br>
            Ou bien je me sers des vis de la poignée pour vérifier l'alignement des branches avec la corde.
            Celle-ci doit être alignée aux 2 vis de la poignées.
            </p>
            <p>L'axe de l'arc doit également être aligné dans l'axe de la stabilisation.<br/>
La zone de tolérance de l'alignement de l'arc implique que l'axe de l'arc soit aligné entre le bord gauche et le bord droit de l'extrémité de la stabilisation.</p>
            
            <p>La flèche doit être alignée dans l'axe de l'arc, de la corde, du viseur et de la stabilisation.<br/>
La réglette du viseur doit être parallèle à la corde.</p>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary h4">4. La sortie de flèche</h2>
        </div>

        <div class="card-body">
            <p>Pour une bonne sortie de flèche, il est très important de placer son repose-flèche sous la flèche, ni trop rentré, ni trop sorti.</p>
            <p>La flèche sur le repose-flèche doit également être placée de sorte qu'elle se trouve au milieu du bouton de berger.</p>
            <p>
                
                <a href="<?php echo base_url().path_img.'sortie-de-fleche.jpg'; ?>" imageanchor="1" style="margin-left: 1em; margin-right: 1em;">
                    <?php echo img(array('src'=>path_img.'sortie-de-fleche.webp', 'height'=>"320", "class"=>"img-fluid")); ?></a>
                
                <a href="<?php echo base_url().path_img.'sortie-de-fleche-alignement.jpg'; ?>" imageanchor="1" style="margin-left: 1em; margin-right: 1em;">
                    <?php echo img(array('src'=>path_img.'sortie-de-fleche-alignement.webp', 'height'=>"320", "class"=>"img-fluid")); ?></a>
            </p>
            <p>La flèche doit être alignée dans l'axe de la corde. Pour ce faire, rentrez ou sortez le bouton de berger.</p>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary h4">5. Détalonnage</h2>
        </div>

        <div class="card-body">
            <p><span imageanchor="1" style="float:right; margin-left:1em">
             <?php echo img(array('src'=>path_img.'detalo.webp', 'width'=>"320", "class"=>"img-fluid")); ?>
                </span>  <span style="float:right; margin-left:1em">
             <?php echo img(array('src'=>path_img.'detalo-hauteur.webp', "class"=>"img-fluid")); ?></span>
            </p>
            
            <h3 class="h5">Définition</h3>
            <p>Le réglage du détalonnage est l’ajustement du positionnement du point d’encochage sur la corde.</p>
                                    
            <h3 class="h5">Objectif</h3>
            <p>Positionner le point d’encochage à la hauteur optimale pour obtenir une trajectoire de la flèche la plus rectiligne possible.</p>

            <h3 class="h5">Pourquoi</h3>
            <p>Le réglage du détalonnage va permettre de limiter les oscillations de la flèche de haut en bas et d’assurer une propulsion de la flèche sans perturbation au niveau de la fenêtre d’arc.</p>
            
            <h3 class="h5">Réglage du détalonnage</h3>
            <p>
             Le détalonnage se mesure au niveau du haut du nockset du bas. Le 0 de l’équerre est situé sur le bord inférieur de celle-ci en
contact avec la tige du repose flèche.<br/>
Celui-ci est généralement compris entre 6mm et 13mm au dessus du point 0.
            </p>    
            <span imageanchor="1" style="float:right; margin-left:1em">
             <?php echo img(array('src'=>path_img.'encochage-haut.webp', 'width'=>"200", "class"=>"img-fluid")); ?>
            </span>
            <span imageanchor="1" style="float:right; margin-left:1em">
             <?php echo img(array('src'=>path_img.'encochage-bas.webp', 'width'=>"200", "class"=>"img-fluid")); ?>
            </span>
            
            <p>Pour régler le détalonnage, le test se déroule entre 15 et 20m sur un blason de 40cm avec 2/3 flèches emplumées et 2/3 flèches sans plume.</p>
            <p>Si vos flèches sans plume sont en haut par rapport aux flèches emplumées : montez votre point d’encochage de quelques millimètres.
            <br>Inversement : si les flèches sans plumes sont en bas : baissez le point d'encochage de quelques millimètres.</p>
            <p>Quand le point d'encochage est bon, les flèches emplumées et les sans plumes doivent être regroupées ensemble.</p>
        </div>
    </div>

    <p><i>Sources : FFTA</i></p>
