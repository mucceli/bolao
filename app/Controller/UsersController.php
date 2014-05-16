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
    public function salvar_edicao($id){

    }

    public function add(){
         if ($this->request->is('post')) {
            $user = $this->data;
            //AppController::sendTicketNovoUsuario($user["User"]);
            $user["User"]["ative"] = false;
            $user["User"]["role"] = 'user';
            if ($this->User->save($user)) {                
                $this->Session->setFlash("Acesse o e-mail que acabamos de enviar e ative sua conta.Se você não receber o e-mail, confira se a mensagem não foi marcada como Spam.", "default", array('class' => 'alerta_sucesso'));
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