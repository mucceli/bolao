<?php
/**
 * Description of CategoriasController
 *
 * @author mucceli
 */
App::import('Aposta');
class ApostasController extends AppController {
        
     var $uses = array('Aposta','Jogo','Equipe','EquipeJogo'); 
    
    public $paginate = array(
        'limit' => 15,
        'order' => array(
            'Jogo.dataJogo' => 'asc'
        )
    );           
    
    public function index() {
        $jogos = $this->Jogo->find('all');
        $apostas = $this->Aposta->find('all',array('recursive' => 2));
        $this->set('apostas',$apostas);

        //Verifica se já existe objeto aposta correspondente ao objeto jogo.
        $userlogged = $this->Session->read('Auth.User.username'); 
        if($userlogged){
            $user = $this->User->findByUsername($userlogged);
            $user_id = $user["User"]["id"];

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
            $this->redirect(array('controller' => 'Apostas','action' => 'index'));

        }else{
            $this->Session->setFlash('Você precisa estar logado para fazer uma aposta.');
        }
        
    }
}

?>