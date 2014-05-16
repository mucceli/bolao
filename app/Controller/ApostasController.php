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
        $equipes =  $this->Equipe->find('list', array('fields' => array ('Equipe.nome')));
        $this->set('equipes',$equipes); 

        $jogos = $this->Jogo->find('all');
        $apostas = $this->Aposta->find('all',array('recursive' => 2));
        $this->set('apostas',$apostas);

        //Verifica se já existe objeto aposta correspondente ao objeto jogo.
        $userlogged = $this->Session->read('Auth.User.username'); 
        if($userlogged){
            $user = $this->User->findByUsername($userlogged);
            $user_id = $user["User"]["id"];
            $this->User->id = $user_id;

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
        $apostaObj = $this->data;
        if($userlogged){
            $user = $this->User->findByUsername($userlogged);
            $user_id = $user["User"]["id"];
            $apostaObj["Aposta"]["user_id"] = $user_id;

            
            $jogo_id = $apostaObj["Aposta"]["jogo_id"];

            //Verifica se aposta já existe.
           // $aposta_id = $this->Aposta->query("SELECT id FROM apostas");                 

            //Se existir um registro sera um UPDATE.
            if(!empty($aposta_id)){
                $this->Aposta->id = $aposta_id;
            }
            //pr($apostaObj);exit;
            $this->Aposta->save($apostaObj);
            $this->Session->setFlash('Aposta registrada. Boa sorte!');
            $this->redirect(array('controller' => 'Apostas','action' => 'index'));

        }else{
            $this->Session->setFlash('Você precisa estar logado para fazer uma aposta.');
        }
    }

    public function salvar_aposta_finalistas(){
        $userlogged = $this->Session->read('Auth.User.username'); 
        $userObj = $this->data;
        if($userlogged){
            $user = $this->User->findByUsername($userlogged);
            $user_id = $user["User"]["id"];

            $this->User->id = $user_id;
            $this->User->save($userObj);
            $this->Session->setFlash('Aposta registrada. Boa sorte!');
        }else{
            $this->Session->setFlash('Você precisa estar logado para fazer uma aposta.');
        }
        $this->redirect(array('controller' => 'Apostas','action' => 'index'));
    }
}

?>