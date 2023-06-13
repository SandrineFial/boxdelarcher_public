<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-trophy pb-4 text-primary"></i> <?php echo $title; ?></h1> 
</div>
<?php /*
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="m-0 font-weight-bold text-primary h4">Le <?php echo date("d/m"); ?></h1>
    </div>
    <div class="card-body">
        
        <h2 class="m-0 font-weight-bold text-primary h5"><i class="fas fa-trophy pb-4 text-black"></i> Scores</h2>
        
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="bg-primary text-white">
                <th>Date</th>
                <th>Distance</th>
                <th>Score 1</th>
                <th>Score 2</th>
                <th>Total</th>
                <th>Temps</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $tot=0;
                foreach($scores as $sc) {
                    ?> <tr><?php
                    echo '<td>'.date("d/m/y", strtotime($sc->date)).'</td>';
                    echo '<td>'.$sc->chiffre.'m</td>';
                    echo '<td>'.$sc->score1.'</td>';
                    echo '<td>'.$sc->score2.'</td>';
                    echo '<td>'.$sc->score_total.'</td>';
                    echo '<td>'.$sc->type.'</td>';
                    ?> </tr><?php
                } ?>
            </tbody>
          </table>
        </div> 
        
    </div>
</div>
*/ ?>
<!-- Bar Chart -->
<div class="card shadow mb-4">
    <div class="card-body">
        
        <?php echo form_open('scores/add'); ?>
        <?php echo validation_errors('<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> ', '</div>'); ?>
        
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Date', 'date');?>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text fa fa-calendar" aria-hidden="true"></span>
                    </div><?php
                    $nbdate = array('class'=>"form-control", "id"=>"date", "name"=>"date");
                    if(isset($score)) { $nbdate['value'] = $score[0]->date; }
                    else { $nbdate['value'] = date("Y-m-d"); }
                    echo form_input($nbdate); ?>
                </div>
            </div>   
            <div class="col-md-4 mb-4"><?php
                echo form_label('Temps', 'temps_id');
                foreach ($temps as $row) {
                    $temps_liste[$row['id']]=$row['type'];
                }
                if(isset($score)) { $sel_tps = $score[0]->temps_id; }
                else { $sel_tps = "1"; }
                echo form_dropdown('temps_id', $temps_liste, $sel_tps, array("class"=>"form-control form-control-sm"));
            ?></div>
            <div class="col-md-4 mb-4"><?php
                echo form_label('Lieu', 'lieu');?>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text fas fa-map" aria-hidden="true"></span>
                    </div><?php                           
                    $lieu = array('class'=>"form-control", "id"=>"lieu", "name"=>"lieu");
                    if(isset($score)) { $lieu["value"] = $score[0]->lieu; }
                    else { }
                    echo form_input($lieu);
                ?></div>
            </div>
        </div>     
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Série 1', 'score1');
                $nb1 = array('class'=>"form-control form-control-sm", "id"=>"score1", "name"=>"score1", "required"=>"required");  
                if(isset($score)) { $nb1["value"] = $score[0]->score1; }
                else { }
                echo form_input($nb1);
            ?></div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Série 2', 'score2');
                $nb2 = array('class'=>"form-control form-control-sm", "id"=>"score2", "name"=>"score2", "required"=>"required");
                if(isset($score)) { $nb2["value"] = $score[0]->score2; }
                else { }
                echo form_input($nb2);
            ?></div>
            
            <div class="col-md-4 mb-3"><?php
                echo form_label('Distance', 'distance_id');
                foreach ($distance as $row) {
                    $distance_liste[$row['chiffre']]=$row['chiffre']." m";
                }
                if(isset($score)) { $sel_dist = $score[0]->distance_id; }
                else { $sel_dist = '0'; }
                echo form_dropdown('distance_id', $distance_liste, $sel_dist, array("class"=>"form-control form-control-sm"));
            ?></div>
        </div>
             
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Volée mini', 'volee_mini');
                $vol1 = array('class'=>"form-control form-control-sm", "id"=>"volee_mini", "name"=>"volee_mini");
                if(isset($score)) { $vol1["value"] = $score[0]->volee_mini; }
                else { }
                echo form_input($vol1);
            ?></div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Voléee maxi', 'volee_maxi');
                $vol2 = array('class'=>"form-control form-control-sm", "id"=>"volee_maxi", "name"=>"volee_maxi");
                if(isset($score)) { $vol2["value"] = $score[0]->volee_maxi; }
                else { }
                echo form_input($vol2);
            ?></div>
            
            <div class="col-md-4 mb-3"><?php
                echo form_label('Humeur', 'humeur_id');
                $humeur_liste = array();
                foreach ($humeur as $row) {
                    $humeur_liste[$row['id']]=$row['type'];
                }
                if(isset($score)) { $sel_hum = $score[0]->humeur_id; }
                else { $sel_hum = '0'; }
                echo form_dropdown('humeur_id', $humeur_liste, $sel_hum, array("class"=>"form-control form-control-sm"));
            ?></div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3"><?php
                echo form_label('Mon ressenti, ma stratégie', 'commentaire');
                $com = array('class'=>"form-control form-control-sm", "id"=>"commentaire", "name"=>"commentaire");
                if(isset($score)) { $com["value"] = $score[0]->commentaire; }
                else {  }
                echo form_textarea($com);
            ?></div>
        </div>
        <?php
            if(isset($score)) {
                echo form_hidden("id", $score[0]->id);
            }
            else {  }
            echo form_submit('', 'Enregistrer', array("class"=>"btn btn-lg btn-warning"));
            echo form_close(); ?>
    </div>
</div>