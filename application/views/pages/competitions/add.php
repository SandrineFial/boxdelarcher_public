<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
  <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-bullseye pb-4 text-primary"></i> <?php echo $title; ?></h1>
  
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php echo form_open_multipart('competitions/add'); ?>
        <?php echo validation_errors('<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> ', '</div>');
        if(isset($error)) { echo '<div class="p-3 mb-2 bg-danger text-white"><i class="fas fa-exclamation-triangle"></i> '.$error.'</div>'; } ?>
        
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Date', 'date');?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text fa fa-calendar" aria-hidden="true"></span>
                    </div><?php
                    $nbdate = array('class'=>"form-control", "id"=>"date", "name"=>"date", "required"=>"required"); //unix_to_human(time(), TRUE, 'eu'));
                    if(isset($compete)) { $nbdate['value']=$compete[0]->date; }
                    else { $nbdate['value']=date("Y-m-d"); }
                    echo form_input($nbdate); ?>
                </div>  
            </div> 
            <div class="col-md-4 mb-3"><?php
                echo form_label('Lieu', 'lieu');?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text fas fa-map" aria-hidden="true"></span>
                    </div><?php
                    $lieu = array('class'=>"form-control", "id"=>"lieu", "name"=>"lieu");
                    if(isset($compete)) { $lieu['value']=$compete[0]->lieu; }
                    else {  }
                    echo form_input($lieu);
                ?></div>
            </div> 
        </div> 
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Type', 'type_id');
                $type_liste = array();
                foreach($type as $row) {
                    $type_liste[$row['id']]=$row['nom'];
                }
                if(isset($compete)) { $sel_tp=$compete[0]->type_id; }
                else { $sel_tp="0"; }
                echo form_dropdown('type_id', $type_liste, $sel_tp, array("class"=>"form-control", "required"=>"required"));
            ?></div>
            <div class="col-md-4 mb-3"><?php
                echo form_label('Description', 'description');
                $description = array('class'=>"form-control", "id"=>"description", "name"=>"description");
                if(isset($compete)) { $description['value']=$compete[0]->description; }
                else {  }
                echo form_input($description); ?>
            </div> 
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3"><?php
                echo form_label('Mandat', 'mandat');
                $mandat = array('class'=>"form-control", "id"=>"mandat", "name"=>"mandat", "type"=>"file");
                echo form_input($mandat); ?>
            </div>
            <div class="col-md-4 mb-3">
              <?php
                if(isset($compete) AND $compete[0]->mandat!="") {
                  ?><a href="<?php echo base_url().path_img_competitions.$compete[0]->mandat; ?>" target="_blank">
                    <i class="fa fa-file-pdf fa-4x"></i></a><?php
                }
                else {  }
                if(isset($compete)) { echo form_hidden("id",$compete[0]->id); } ?>
            </div>
        </div>
        <?php
            echo form_submit('btnsubmit', 'Enregistrer', array("class"=>"btn btn-lg btn-info"));
            echo form_close(); ?>
    </div>
</div>