<?php
/**
 * Description of CategoriasController
 *
 * @author mucceli
 */
class ApostasController extends AppController {
        
     var $uses = array('Jogo','Equipe','EquipeJogo'); 
    
    public $paginate = array(
        'limit' => 15,
        'order' => array(
            'Categoria.nome' => 'asc'
        )
    );           
    
    public function index() {
        $jogos = $this->paginate('Jogo');        
        $this->set('jogos', $jogos);  
    }
   
    public function apostar($id) {
        
    }
}

?>