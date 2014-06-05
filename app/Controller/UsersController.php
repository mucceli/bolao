<?php
/**
 * Description of CategoriasController
 *
 * @author mucceli
 */
class UsersController extends AppController {
        
    public function index() {
        $usuarios = $this->User->find('all');
        $this->set('usuarios', $usuarios);  
    }

    public function cadastrar(){

    }

    public function editar_usuario($id){
        if (empty($id)){
               $this->Session->setFlash("Usuário inválido. Não foi encontrado o usuário!", "default", array('class' => 'erro'));
         }else{
               $this->request->data = $this->User->findById($id);
               $this->Session->delete('id_user_edit');  
               $this->Session->write('id_user_edit',$id);               
         }
    }
    public function salvar_edicao(){
        $this->User->id = $this->data["User"]["id"];
        $this->User->save($this->data);
        $this->Session->setFlash("Usuário salvo.", "default");
        $this->redirect(array('controller' => 'Users','action' => 'index'));
    }

    public function block_unblock(){
        $this->User->id = $this->data["User"]["id"];
        $ativo_desativo = $this->data["User"]["ative"];
        $user = $this->data;
        if($ativo_desativo == 0){
            $user["User"]["ative"] = 1;      
            $this->User->save($user);  
            $this->Session->setFlash("Usuário Desbloqueado", "default");
        }else{
            $user["User"]["ative"] = 0;
            $this->User->save($user);
            $this->Session->setFlash("Usuário Bloqueado", "default");
        }
        
    }

    public function add(){
         if ($this->request->is('post')) {
            $user = $this->data;
            //AppController::sendTicketNovoUsuario($user["User"]);
            $user["User"]["ative"] = false;
            $user["User"]["role"] = 'user';
            if ($this->User->save($user)) {                
                $this->Session->setFlash("Usuário cadastrado! Para ativar sua conta faça o pagamento e entre em contato com o administrador do site.", "default", array('class' => ''));
                $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__('Ocorreu um erro ao tentar salvar o usuário. Entre em contato com o administrador.'));
            }
        }
    }

    public function existe_usuario(){  
        $param = $this->data["login"];
        $this->autoRender = false;
        $this->layout = 'ajax';
        $user = $this->User->find('all',array('conditions'=>array('User.username'=>$param)));
        if(empty($user)){            
            return true;
        }else{            
            return false;
        }
    }
   
}

?>