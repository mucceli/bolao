<?php
/**
 * @author mucceli
 */
class RankingController extends AppController {
    
    var $uses = array('Aposta','User'); 

    public function index() {
        $users = $this->User->find('all');
        $apostas = $this->Aposta->find('all',array('recursive' => 2));
        $ranking = array();        
        foreach ($users as $user) {
            $usuario = $user["User"]["username"];
            $total_pontos = 0;
            foreach ($apostas as $aposta) {
                if($aposta["Aposta"]["user_id"] == $user["User"]["id"]){
                    if(!empty($aposta["Aposta"]["pontos"])){
                        $total_pontos += $aposta["Aposta"]["pontos"];
                    }
                }
            }
            $ranking[$usuario] = $total_pontos;
        }

        arsort($ranking);
        $this->set('ranking',$ranking);
        $this->set('users',$users);
    }

    public function atualizar_pontos() {
        $jogos = $this->Jogo->find('all');
        $apostas = $this->Aposta->find('all',array('recursive' => 2));
        $this->set('apostas',$apostas);
        $this->redirect(array('controller' => 'Ranking','action' => 'index'));
    }
   
}

?>