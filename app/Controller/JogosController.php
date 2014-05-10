<?php
/**
 * Description of CategoriasController
 *
 * @author mucceli
 */
class JogosController extends AppController {
        
    var $uses = array('Jogo','Equipe','EquipeJogo'); 

    public function index() {
        $jogos = $this->paginate('Jogo');        
        //pr($jogos);exit;
        $this->set('jogos', $jogos);  
    }

    public function cadastrar(){
        $equipes =  $this->Equipe->find('list', array('fields' => array ('Equipe.nome')));
        $this->set('equipes',$equipes); 

         if (!empty($this->data)) {
            $equipeJogo = $this->data["EquipeJogo"];
            $equipeJogo2 = $this->data["EquipeJogo"];            
            // se os dados do formulário puderam ser validados e salvos...
            if ($this->Jogo->save($this->data)) {

                //Pega id do jogo recem salvo.
                $equipeJogo["jogo_id"] = $this->Jogo->id;
                $equipeJogo2["jogo_id"] = $this->Jogo->id;
                $equipeJogo2["equipe_id"] = $this->data["segunda_equipe_id"];
                //pr($equipeJogo);pr($equipeJogo2);
                $this->EquipeJogo->save($equipeJogo);
                $this->EquipeJogo->save($equipeJogo2);

                // define uma mensagem de flash na sessão e redireciona.
                $this->Session->setFlash("Jogo salvo com sucesso!", "default", array('class' => ''));
                $this->redirect(array('controller' => 'Jogos','action' => 'index'));
            }
        }
    }

    public function registrar_resultado($id) {
        $jogo = $this->Jogo->findById($id);
        $this->set('jogo', $jogo);
    }

    public function salvar_resultado() {
        pr($this->data);exit;
        // if (!empty($this->data)) {
        //     // se os dados do formulário puderam ser validados e salvos...
        //     if ($this->Jogo->save($this->data)) {
        //         // define uma mensagem de flash na sessão e redireciona.
        //         $this->Session->setFlash("Jogo salvo com sucesso!", "default", array('class' => ''));
        //         $this->redirect(array('controller' => 'Jogos','action' => 'index'));
        //     }
        // }
    }
   
}

?>