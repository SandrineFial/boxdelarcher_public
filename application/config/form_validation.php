<?php
$config = array(
        'prepaphysique' => array(
                array(
                        'field' => 'date',
                        'label' => 'Date',
                        'rules' => 'required',
                        array('required' => 'Une %s est requise.')
                ) /*,
                array(
                        'field' => 'repetitions',
                        'label' => 'Nombre de rep.',
                        'rules' => 'required|numeric',
                        array('required' => '%s requis.')
                )*/
        ),
        'repetitions' => array(
                array(
                        'field' => 'date',
                        'label' => 'Date',
                        'rules' => 'required',
                        array('required' => 'Une %s est requise.')
                ),
                array(
                        'field' => 'nombre',
                        'label' => 'Nombre de rep.',
                        'rules' => 'required|numeric',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'type_id',
                        'label' => 'Type de rep.',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                )
        ),
        'scores' => array(
                array(
                        'field' => 'date',
                        'label' => 'Date',
                        'rules' => 'required',
                        array('required' => 'Une %s est requise.')
                ),
                array(
                        'field' => 'score1',
                        'label' => 'Score série 1',
                        'rules' => 'required|numeric',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'score1',
                        'label' => 'Score série 1',
                        'rules' => 'required|numeric',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'volee_mini',
                        'label' => "Score minimum d'une volée",
                        'rules' => 'numeric',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'volee_mini',
                        'label' => "Score minimum d'une volée",
                        'rules' => 'numeric',
                        array('required' => '%s requis.')
                )
        ),
        'reglages' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|alpha'
                ),
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required'
                )
        ),
        'connexion' => array(
                array(
                        'field' => 'login',
                        'label' => 'Adresse email',
                        'rules' => 'required|valid_email',
                        array('required' => '%s requis.', 'valid_email' => "Cette adresse mail est incorrecte.")
                ),
                array(
                        'field' => 'password',
                        'label' => 'Mot de passe',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                )
        ),
        'connexion/enregistrement' => array(
                array(
                        'field' => 'login',
                        'label' => 'Adresse email',
                        'rules' => 'required|valid_email|is_unique[utilisateur.login]',
                        array('required' => '%s requis.','valid_email' => "Cette adresse mail est incorrecte.",
                        'is_unique'=>"Cette adresse mail est incorrecte.")
                ),
                array(
                        'field' => 'password',
                        'label' => 'Mot de passe',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'password2',
                        'label' => 'Mot de passe',
                        'rules' => 'required|matches[password]',
                        array('required' => 'Confirmation de %s requis.','matches' => "Le mot de passe n'est pas identique.")
                ),
                array(
                        'field' => 'nom',
                        'label' => 'Nom',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'prenom',
                        'label' => 'Prénom',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'club_id',
                        'label' => 'Club',
                        'rules' => 'required',
                        array('required' => 'Indiquez votre %s.')
                ),
                array(
                        'field' => 'arme_id',
                        'label' => 'Arme',
                        'rules' => 'required',
                        array('required' => 'Indiquez votre %s.')
                ),
                array(
                        'field' => 'categorie_id',
                        'label' => 'Categorie',
                        'rules' => 'required',
                        array('required' => 'Indiquez votre %s.')
                ),
                array(
                        'field' => 'licence',
                        'label' => 'numéro de Licence',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
        ),
        'utilisateur' => array(
                array(
                        'field' => 'nom',
                        'label' => 'Nom',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'prenom',
                        'label' => 'Prénom',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'club_id',
                        'label' => 'Club',
                        'rules' => 'required',
                        array('required' => 'Indiquez votre %s.')
                ),
                array(
                        'field' => 'licence',
                        'label' => 'numéro de Licence',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
        ),
        'stages' => array(
                array(
                        'field' => 'date',
                        'label' => 'Date',
                        'rules' => 'required',
                        array('required' => 'Une %s est requise.')
                ),
                array(
                        'field' => 'lieu',
                        'label' => 'Lieu',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'type_id',
                        'label' => 'Type',
                        'rules' => 'required',
                        array('required' => 'Indiquez votre %s.')
                )
        ),
        'competitions' => array(
                array(
                        'field' => 'date',
                        'label' => 'Date',
                        'rules' => 'required',
                        array('required' => 'Une %s est requise.')
                ),
                array(
                        'field' => 'lieu',
                        'label' => 'Lieu',
                        'rules' => 'required',
                        array('required' => '%s requis.')
                ),
                array(
                        'field' => 'type_id',
                        'label' => 'Type',
                        'rules' => 'required',
                        array('required' => 'Indiquez votre %s.')
                )
        )
);