<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chart-line pb-4 text-primary"></i> Répétitions - Le <?php echo date("d/m"); ?></h1> 
</div>
<?php /*
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary h4">Le <?php echo date("d/m"); ?></h1>
    </div>
    <div class="card-body">
        
        <h2 class="m-0 font-weight-bold text-primary h5 mb-3">Répétitions</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="bg-primary text-white">
                <?php
                $tot=0;
                //print_r($totjr); 
                $tab_distance = array();
                $tp_tir = array();
                foreach($totjr as $tjr) {
                    $tp_tir[$tjr->nom_court][$tjr->distance_id]=$tjr->nombre;
                    $tot+=$tjr->nombre;         
                    if($tjr->chiffre=="0") { }
                    else { $tab_distance[$tjr->chiffre][$tjr->type_id]=$tjr->nombre; } // prépare les distances  
                }
                foreach($tp_tir as $tpt=>$tpv) {
                    echo '<th>'.$tpt.'</th>';
                } ?>
                <th>TOT.</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                
                foreach($tp_tir as $tpt=>$tpv) {
                    $total_par_type=0;
                    foreach($tpv as $tp_dist=>$nombre) {
                        $total_par_type+=$nombre;
                    }
                    echo '<td>'.$total_par_type.'</td>';
                }
                ?>
                <td class="table-warning"><?php echo $tot; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <h2 class="m-0 font-weight-bold text-primary h5 mb-3">Distance</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="bg-primary text-white">
                <?php
                $totdistance=0;
                foreach($tab_distance as $key=>$value) {
                    echo '<th>'.$key.' m.</th>';
                } ?>
                <th>TOT.</th>   
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                foreach($tab_distance as $key_distance=>$value) {
                    $totdistance_part=0;
                    foreach($value as $type_distance=>$nombre) {
                        $totdistance+=$nombre;
                        $totdistance_part+=$nombre;
                    }     
                    echo '<td>'.$totdistance_part.'</td>';  
                } ?>                    
                <td class="table-warning"><?php echo $totdistance; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php if($tot>0) { ?>
        <div class="row"> 
            <div class="col-md-6"> 
                <div class="chart-bar m-3">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
        <?php } else {} ?>
    </div>
</div>
*/ ?>
<!-- Bar Chart -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary h5">Ajouter des répétitions</h2>
    </div>
    <div class="card-body">
        
        <?php echo form_open('repetitions/add'); ?>
        <?php echo validation_errors('<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> ', '</div>'); ?>
        
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Date', 'date');?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text fa fa-calendar" aria-hidden="true"></span>
                    </div><?php
                    $nbdate = array('class'=>"form-control", "id"=>"date", "name"=>"date", "value"=>date("Y-m-d")); //unix_to_human(time(), TRUE, 'eu'));
                    echo form_input($nbdate); ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Nombre', 'nombre');
                $nb = array('class'=>"form-control", "id"=>"nombre", "name"=>"nombre", "required"=>"required");
                echo form_input($nb);
            ?></div>
            <?php
            ?><div class="col-md-4 mb-3"><?php
                echo form_label('Type de répétition', 'type_id');
                foreach ($type as $row) {
                    $tp_rep[$row->id]=$row->nom_long;
                }
                echo form_dropdown('type_id', $tp_rep, '0', array("class"=>"form-control"));
            ?></div><?php
            ?><div class="col-md-4 mb-3"><?php
                echo form_label('Distance', 'distance_id');
                foreach ($distance->result_array() as $row) {
                    $distance_liste[$row['chiffre']]=$row['chiffre']." m";
                }
                echo form_dropdown('distance_id', $distance_liste, '0', array("class"=>"form-control"));
            ?></div>
        </div>
        <div class="form-row">
            <div class="col-md-8 mb-3">
                <?php
                echo form_label('Travail Technique / Exercice', 'travail_technique');
                $ttech= array('class'=>"form-control", "id"=>"travail_technique", "name"=>"travail_technique");
                echo form_textarea($ttech); ?>
            </div>
        </div>
        <?php
            echo form_submit('', 'Enregistrer', array("class"=>"btn btn-lg btn-warning"));
            echo form_close(); ?>
    </div>
</div>