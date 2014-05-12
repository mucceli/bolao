<?php

class Aposta extends AppModel {

    
    var $belongsTo = array( 'Jogo' =>array(
            'foreignKey'=>'jogo_id'),);

}

?>
