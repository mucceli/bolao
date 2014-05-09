<?php
/**
 * Description of CategoriasController
 *
 * @author mucceli
 */
class ApostasController extends AppController {
        
    var $uses = array('Categoria','Subcategoria'); 
    
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Categoria.nome' => 'asc'
        )
    );           
    
     /**
     * Método necessário para adequar as convenções do Cake. Nome do file é  "painel_cadastrar_categoria.ctp"
     */
    public function index() {
          
    }
   
}

?>