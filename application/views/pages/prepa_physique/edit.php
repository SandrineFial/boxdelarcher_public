<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-dumbbell pb-4 text-primary"></i> Modifier les prépa physique</h1> 
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary h4">Le <?php $date_modif=$this->input->get("date"); echo $date_modif ?></h1>
    </div>
    <div class="card-body">
        
        <div class="table-responsive">   
            <?php echo form_open('prepaphysique/edit/?date='.$date_modif); ?>
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
                                    echo form_label("Type d'exercices", 'exercice_id');
                                    foreach ($exos as $row) {
                                        $tp_exos[$row->id]=$row->exos_nom;
                                    }
                                    echo form_dropdown($rep->id."[exercice_id]", $tp_exos, $rep->exercice_id, array("class"=>"form-control form-control-sm"));
                                ?>
                                <?php
                                    echo form_label('Outils utilisés', 'outils_id');
                                    foreach ($outils as $row) {
                                        $tp_outils[$row->id]=$row->outils_nom;
                                    }
                                    echo form_dropdown($rep->id.'[outils_id]', $tp_outils, $rep->outils_id, array("class"=>"form-control form-control-sm"));
                                ?>
                                <?php
                                    echo form_label('Effort', 'effort');
                                    echo form_dropdown($rep->id.'[effort]', $tb_effort, $rep->effort, array("class"=>"form-control form-control-sm"));
                                ?>
                                
                                <?php
                                    echo form_label('Total répétitions / ou temps en secondes.', 'repetitions');
                                    $nb = array('class'=>"form-control form-control-sm", "id"=>"repetitions", "name"=>$rep->id."[repetitions]", 
                                                "required"=>"required", "value"=>$rep->repetitions);
                                    echo form_input($nb);
                                ?>
                                <?php
                                    echo form_label('Commentaire', 'commentaire');
                                    $commentaire = array('class'=>"form-control form-control-sm", "id"=>"commentaire",
                                                               "name"=>$rep->id."[commentaire]", "value"=>$rep->commentaire);
                                    echo form_textarea($commentaire);
                                    ?>
                            </td>
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