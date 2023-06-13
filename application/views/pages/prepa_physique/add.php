<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-dumbbell pb-4 text-primary"></i> Préparation Physique - Le <?php echo date("d/m"); ?></h1> 
</div>
<?php /*
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary h4"><i class="fas fa-dumbbell text-primary"></i> Préparation physique - Le <?php echo date("d/m"); ?></h1>
    </div>
    <div class="card-body">
        
        <h2 class="m-0 font-weight-bold text-primary h5 mb-3"><i class="fas fa-dumbbell text-primary"></i> Préparation physique</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="bg-primary text-white">
                <th>Date</th>
                <?php
                $tot=0;
                $tp_muscu = array();
                foreach($exos as $exo) {
                    echo '<th>'.$exo->exos_nom.'</th>';
                }
                foreach($rep as $tjr) {
                    $tp_muscu[$tjr->date][$tjr->exercice_id][$tjr->outils_id]=$tjr->efforts_nom;
                } ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                
                foreach($tp_muscu as $tdate=>$t) {
                    ?>
                    <td><?php echo date("d/m/Y", strtotime($tdate)); ?></td>
                    <?php
                    $total_par_jr=0;
                    
                    foreach($exos as $exo) {
                        if(isset($t[$exo->id])) { 
                            $totexos=0;  
                            foreach($t[$exo->id] as $typexo=>$total) {
                                $totexos+=$total;
                                $total_par_jr+=$total;
                            }               
                            echo '<td>'.$totexos.'</td>';
                        } else {
                            echo '<td> </td>';
                        }
                    }      
                    ?><td class="table-warning"><?php echo $total_par_jr; ?></td><?php
                }
                ?>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
</div>
*/ ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary h5">Ajouter un exercice</h2>
    </div>
    <div class="card-body">
        
        <?php echo form_open('prepaphysique/add'); ?>
        <?php echo validation_errors('<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> ', '</div>'); ?>
        
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                    echo form_label('Date', 'date'); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text fa fa-calendar" aria-hidden="true"></span>
                        </div><?php
                        $nbdate = array('class'=>"form-control", "id"=>"date", "name"=>"date", "value"=>date("Y-m-d"));
                        echo form_input($nbdate); ?>
                    </div>
            </div>      
            <div class="col-md-4 mb-3"><?php
                echo form_label("Type d'exercices", 'exercice_id');
                foreach ($exos as $row) {
                    $tp_exos[$row->id]=$row->exos_nom;
                }
                echo form_dropdown('exercice_id', $tp_exos, '0', array("class"=>"form-control"));
            ?></div> 
        </div>   
        <div class="form-row"><?php
            ?><div class="col-md-4 mb-3"><?php
                echo form_label('Outils utilisés', 'outils_id');
                foreach ($outils as $row) {
                    $tp_outils[$row->id]=$row->outils_nom;
                }
                echo form_dropdown('outils_id', $tp_outils, '0', array("class"=>"form-control"));
            ?></div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Effort', 'effort');
                echo form_dropdown('effort', $tb_effort, '0', array("class"=>"form-control"));
            ?></div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Total répétitions / ou temps en secondes.', 'repetitions');
                $nb = array('class'=>"form-control", "id"=>"repetitions", "name"=>"repetitions", "type"=>"number", "required"=>"required");
                echo form_input($nb);
            ?></div><!--
            <div class="col-md-4 mb-3"><?php
               // echo form_label('Temps passé', 'temps')."<br/>"; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text fas fa-clock" aria-hidden="true"></span>
                    </div><?php
                 //   $tps = array('class'=>"form-control", "id"=>"temps", "name"=>"temps");
                  //  echo form_input($tps);
                ?></div>
            </div -->
             
        </div>
        <div class="form-row">
            <div class="col-md-8 mb-3">
                <?php
                echo form_label('Commentaire / Exercice', 'commentaire');
                $ttech= array('class'=>"form-control", "id"=>"commentaire", "name"=>"commentaire");
                echo form_textarea($ttech); ?>
            </div>
        </div>
            
        <div class="mt-3">
            <?php
                foreach ($exos as $row) {
                    ?><p><strong>- <?php echo $row->exos_nom; ?></strong> (<?php echo $row->description; ?>) : <?php echo $row->utilite; ?></p><?php
                }
            ?>
        </div>
        <?php
            echo form_submit('btnsubmit', 'Enregistrer', array("class"=>"btn btn-lg btn-warning"));
            echo form_close(); ?>
    </div>
</div>