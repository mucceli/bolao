<?php
/**
 * @author mucceli
 */
class RankingController extends AppController {
        
     /**
     * Método necessário para adequar as convenções do Cake. Nome do file é  "painel_cadastrar_Equipe.ctp"
     */
    public function index() {
        // $equipes = $this->paginate('Equipe');
        // $this->set('equipes', $equipes);  
    }

    public function cadastrar_equipe(){
         if (!empty($this->data)) {
            // se os dados do formulário puderam ser validados e salvos...
            if ($this->Equipe->save($this->data)) {
                // define uma mensagem de flash na sessão e redireciona.
                $this->Session->setFlash("Equipe salva com sucesso!", "default", array('class' => ''));
                $this->redirect(array('controller' => 'Equipes','action' => 'index'));
            }
        }
    }

    function excluir_equipe($id) {
        if (!empty($id)):
            if ($this->Equipe->delete($id,true)):
                $this->Session->setFlash("Equipe excluída com sucesso!","default", array('class' => 'alert alert-success'));
            else:
                $this->Session->setFlash("Não foi possível excluir a equipe!","default", array('class' => 'alert alert-error'));
            endif;
            $this->redirect(array('controller' => 'Equipes','action' => 'index'));
        endif;
    }
    
    public function editar_equipe($id) {
       if (!empty($this->data)) {
           $this->Equipe->id = $this->Session->read('id_Equipe_edit');
           $this->Session->delete('id_Equipe_edit');
            // se os dados do formulário puderam ser validados e salvos...
            if ($this->Equipe->save($this->data)) {
                // define uma mensagem de flash na sessão e redireciona.
                $this->Session->setFlash("Equipe alterada com sucesso!", "default", array('class' => 'alert alert-success'));
                $this->redirect(array('controller' => 'Equipes','action' => 'index'));
            }
        }
    }
   
}

?>