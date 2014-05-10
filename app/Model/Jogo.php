<?php

class Jogo extends AppModel {

    public $hasAndBelongsToMany = array(
        'Equipe' =>
            array(
                'className' => 'Equipe',
                'joinTable' => 'equipe_jogos',
                'foreignKey' => 'jogo_id',
                'associationForeignKey' => 'equipe_id',
                'unique' => true               
            )
    );
}

?>