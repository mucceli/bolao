<?php
/**
 * @author mucceli
 */
class RankingController extends AppController {
    
    var $uses = array('Aposta','User'); 
    const EMPATE = 'EMPATE';
    const VITORIA_TIME1 = 'VITORIA_TIME1';
    const VITORIA_TIME2 = 'VITORIA_TIME2';

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
        $apostas = $this->Aposta->find('all',array('recursive' => 2));
        
        foreach ($apostas as $aposta) {
            //pr($aposta);exit;
            if(!empty($aposta["Aposta"]["golsTime1"]) && !empty($aposta["Aposta"]["golsTime2"])){
                if($aposta["Aposta"]["golsTime1"] == $aposta["Jogo"]["golsTime1"] && 
                    $aposta["Aposta"]["golsTime2"] == $aposta["Jogo"]["golsTime2"]){

                    //echo '3pontos';exit;
                    $this->Aposta->id = $aposta["Aposta"]["id"];
                    $aposta["Aposta"]["pontos"] = 3;
                    //pr($aposta);exit;
                    $this->Aposta->save($aposta);

                }else{
                    $aposta_resultado = '';
                    $resultado_jogo = '';

                    if($aposta["Jogo"]["golsTime1"] == $aposta["Jogo"]["golsTime2"]){
                        $resultado_jogo = self::EMPATE;
                    }else if($aposta["Jogo"]["golsTime1"] > $aposta["Jogo"]["golsTime2"]){
                        $resultado_jogo = self::VITORIA_TIME1;
                    }else{
                        $resultado_jogo = self::VITORIA_TIME2;
                    }

                    if($aposta["Aposta"]["golsTime1"] == $aposta["Aposta"]["golsTime2"]){
                        $aposta_resultado = self::EMPATE;
                    }else if($aposta["Aposta"]["golsTime1"] > $aposta["Aposta"]["golsTime2"]){
                        $aposta_resultado = self::VITORIA_TIME1;
                    }else{
                        $aposta_resultado = self::VITORIA_TIME2;
                    }

                    if($aposta_resultado == $resultado_jogo){
                        $this->Aposta->id = $aposta["Aposta"]["id"];
                        $aposta["Aposta"]["pontos"] = 1;
                        $this->Aposta->save($aposta);
                    }else{
                        $this->Aposta->id = $aposta["Aposta"]["id"];
                        $aposta["Aposta"]["pontos"] = 0;
                        $this->Aposta->save($aposta);
                    }
                   
                }
            }else{
                $this->Aposta->id = $aposta["Aposta"]["id"];
                $aposta["Aposta"]["pontos"] = 0;
                $this->Aposta->save($aposta);
            }
        }
        $this->redirect(array('controller' => 'Ranking','action' => 'index'));
    }
   
}

?>