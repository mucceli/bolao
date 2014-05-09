<?php

class Equipe extends AppModel {

	public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        )
    );

}

?>