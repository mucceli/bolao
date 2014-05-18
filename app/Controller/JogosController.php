<?php
/**
 * Description of CategoriasController
 *
 * @author mucceli
 */
class JogosController extends AppController {
        
    var $uses = array('Jogo','Equipe','EquipeJogo'); 

    public function index() {
        $jogos = $this->Jogo->find('all', array('order'=>'Jogo.grupo','Jogo.dataJogo'));        
        $this->set('jogos', $jogos);  
    }

    public function cadastrar(){
        $equipes =  $this->Equipe->find('list', array('fields' => array ('Equipe.nome'),'order'=>('Equipe.nome')));
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

    public function registrar_resultado() {
        $jogos = $this->Jogo->find('all', array('order'=>'Jogo.grupo','Jogo.dataJogo'));
        $this->set('jogos', $jogos);  
    }

    public function salvar_resultado() {
        if (!empty($this->data)) {
            $jogo = $this->data;
            //pr($jogo);exit;
            $this->Jogo->id = $jogo["Jogo"]["id"];
            if ($this->Jogo->save($jogo)) {

                $this->Session->setFlash("Resultado salvo com sucesso!", "default", array('class' => ''));
                $this->redirect(array('controller' => 'Jogos','action' => 'registrar_resultado'));
            }
        }
    }

    public function resultado_campeao(){
        $equipes =  $this->Equipe->find('list', array('fields' => array ('Equipe.nome')));
        $this->set('equipes',$equipes); 
    }

    public function salvar_resultado_campeao(){
        $equipe_campea = $this->data;
        $equipes = $this->Equipe->find('all');

        

        foreach ($equipes as $equipe) {
            if($equipe["Equipe"]["id"] == $equipe_campea["Equipe"]["id"]){
                $equipe["Equipe"]["campea"] = 1;
            }else{
                $equipe["Equipe"]["campea"] = 0;
            }
            $this->Equipe->id = $equipe["Equipe"]["id"];
            $this->Equipe->save($equipe["Equipe"]);
        }
        $this->Session->setFlash("Equipe campeã salva com sucesso!", "default", array('class' => ''));
        $this->redirect(array('controller' => 'Jogos','action' => 'registrar_resultado'));
    }
   
}

?>