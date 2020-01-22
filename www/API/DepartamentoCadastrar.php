<?php 
namespace FITCHEF\API;
use FITCHEF\Model\Departamento;
use FITCHEF\DAO\DAODepartamento;

class DepartamentoCadastrar{

    public $msg;

    function __construct(){

 if($_POST){
        
        try{
            $obj = new Departamento();
            $obj->setNome($_POST['nome']);
            
        
            $DAO = new DAODepartamento();
            $this->msg = $DAO->cadastrar($obj);

            

        }catch(\Exception $e){
            $this->msg = $e->getMessage();
        
        }
    }
}
}

    ?>