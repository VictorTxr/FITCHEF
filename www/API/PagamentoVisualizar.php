<?php 
namespace FITCHEF\API;
use FITCHEF\DAO\DAOPedido;
class PagamentoVisualizar{


    public $pagamento;

    public function __construct(){
        $dao = new DAOPedido();
        $this->pagamento = $dao->buscaPorId($_SESSION['idpedido']);
    }
}


    ?>