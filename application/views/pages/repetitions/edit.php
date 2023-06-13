<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chart-line pb-4 text-primary"></i> Modifier les répétitions</h1> 
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary h4">Le <?php $date_modif=$this->input->get("date"); echo $date_modif ?></h1>
    </div>
    <div class="card-body">
        
        <div class="table-responsive">   
            <?php echo form_open('repetitions/edit/?date='.$date_modif); ?>
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-primary text-white">
                        
                        <?php foreach($repetitions as $krep=>$rep) { ?>
                            <th><?php echo round($krep+1); ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>    
                        <tr>
                    <?php
                    foreach($repetitions as $krep=>$rep) { ?>
                            <td>
                                <?php
                                echo form_label('Date', 'date');?>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text fa fa-calendar" aria-hidden="true"></span>
                                    </div><?php
                                    $nbdate = array('class'=>"form-control", "id"=>"date".$krep, "name"=>$rep->id."[date]", "value"=>$rep->date); //unix_to_human(time(), TRUE, 'eu'));
                                    echo form_input($nbdate);
                                    echo form_hidden("post","1"); ?>
                                </div>
                                
                                <?php
                                    echo form_label('Nombre', 'nombre');
                                    $nb = array('class'=>"form-control form-control-sm", "id"=>"nombre", "name"=>$rep->id."[nombre]", 
                                                "required"=>"required", "value"=>$rep->nombre);
                                    echo form_input($nb);
                                ?><br/>
                                <?php
                                    echo form_label('Type de répétition', 'type_id');
                                    foreach ($type as $row) {
                                        $tp_rep[$row->id]=$row->nom_long;
                                    }
                                    $sel=$rep->type_id;
                                    echo form_dropdown($rep->id."[type_id]", $tp_rep, $sel, array("class"=>"form-control form-control-sm"));
                                ?><br/>
                                <?php
                                    echo form_label('Distance', 'distance_id');
                                    foreach ($distance->result_array() as $row) {
                                        $distance_liste[$row['chiffre']]=$row['chiffre']." m";
                                    }
                                    $selD=$rep->distance_id;
                                    echo form_dropdown($rep->id."[distance_id]", $distance_liste, $selD, array("class"=>"form-control form-control-sm"));
                                ?><br/>
                                <?php
                                    echo form_label('Travail technique', 'travail_technique');
                                    $travail_technique = array('class'=>"form-control form-control-sm", "id"=>"travail_technique",
                                                               "name"=>$rep->id."[travail_technique]", "value"=>$rep->travail_technique);
                                    echo form_textarea($travail_technique);
                                    ?>
                    <?php } ?> 
                        </tr>
                </tbody>
            </table>
          <?php
            echo form_submit('', 'Enregistrer', array("class"=>"btn btn-lg btn-warning"));
            echo form_close(); ?>
        </div>
    </div>
</div>