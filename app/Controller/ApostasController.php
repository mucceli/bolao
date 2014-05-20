<?php
/**
 * Description of ApostasController
 *
 * @author mucceli
 */
App::import('Aposta');
class ApostasController extends AppController {
        
     var $uses = array('Aposta','Jogo','Equipe','EquipeJogo','User');
    
    public function index() {
        $userlogged = $this->Session->read('Auth.User.username');

        if($userlogged){
            $user = $this->User->findByUsername($userlogged);
            $this->set('user',$user);
            $user_id = $user["User"]["id"];
            $this->User->id = $user_id;

            $apostas = $this->Aposta->find('all',array('conditions' => array('Aposta.user_id' => $user_id),'recursive' => 2, 'order'=>'Jogo.grupo, Jogo.dataJogo'));
            $this->set('apostas',$apostas);

            //Verifica se já existe objeto aposta correspondente ao objeto jogo.
            $jogos = $this->Jogo->find('all');
            foreach ($jogos as $jogo) {
                $jogo_id = $jogo["Jogo"]["id"];
                $resultadoApostaObj = $this->Aposta->find('all',array('conditions' => array('Aposta.user_id' => $user_id,'Aposta.jogo_id' => $jogo_id)));            
                //Se estiver vazio, significa que não existe um objeto Aposta correspondente
                if(empty($resultadoApostaObj)){
                    $novaAposta = new Aposta();
                    $novaAposta->user_id = $user_id;
                    $novaAposta->jogo_id = $jogo_id;
                    $this->Aposta->save($novaAposta);
                }
            }
        }
    }
   
    public function apostar() {
        $userlogged = $this->Session->read('Auth.User.username'); 
        if($userlogged){
            $apostaObj = $this->Aposta->findById($this->data["Aposta"]["id"]);
            $apostaObj["Aposta"]["golsTime1"] = $this->data["Aposta"]["golsTime1"];
            $apostaObj["Aposta"]["golsTime2"] = $this->data["Aposta"]["golsTime2"];

            $this->Aposta->id = $apostaObj["Aposta"]["id"];
            $this->Aposta->save($apostaObj);
            $this->Session->setFlash('Aposta registrada. Boa sorte!');
            $this->redirect(array('controller' => 'Apostas','action' => 'index'));
        }else{
            $this->Session->setFlash('Você precisa estar logado para fazer uma aposta.');
        }
    }

    public function aposta_campeao(){
        $equipes =  $this->Equipe->find('list', array('fields' => array ('Equipe.nome')));
        $this->set('equipes',$equipes); 

        $userlogged = $this->Session->read('Auth.User.username'); 
        if($userlogged){
            $user = $this->User->findByUsername($userlogged);
            $this->request->data = $user;
        }
    }

    public function salvar_aposta_campeao(){
        $userlogged = $this->Session->read('Auth.User.username'); 
        $equipe_id = $this->data["User"]["equipe_id"];
        if($userlogged){
            $user = $this->User->findByUsername($userlogged);
            $user["User"]["equipe_id"] = $equipe_id;

            $user["User"]["flag"] = 1;
            $this->User->id = $user["User"]["id"];
            $this->User->save($user);
            $this->Session->setFlash('Aposta registrada. Boa sorte!');
        }else{
            $this->Session->setFlash('Você precisa estar logado para fazer uma aposta.');
        }
        $this->redirect(array('controller' => 'Apostas','action' => 'index'));
    }
}

?>