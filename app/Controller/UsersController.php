<?php
/**
 * Description of CategoriasController
 *
 * @author mucceli
 */
class UsersController extends AppController {
        
    public $paginate = array(
        'limit' => 15,
        'order' => array(
            'Categoria.nome' => 'asc'
        )
    );           
    
    public function index() {
        $usuarios = $this->paginate('User');
        $this->set('usuarios', $usuarios);  
    }

    public function cadastrar(){

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
   
}

?>