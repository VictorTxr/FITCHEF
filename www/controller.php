<?php
    use FITCHEF\includes\Config;

    require "includes/autoload.php";
    session_start();
   
    //capturando os dados da URL
    // ex.:admin/departamento/cadastrar/listar
    // model=departamento & action = listar
    @$router = $_GET['model'].$_GET['action'];
    $view = "";

    $config = new Config();
    $url = $config->url;
    

   
    //$url = "http://localhost/fitchef/src";
    //$url = "http://www.fitchef.web70111.uni5.net";
   

   


    switch($router){

        // 0. verificar se existe a classe (produto.class.php)   
        // 1. criar a view/lista-produto.php
        // 2. criar a actions/produto-listar.php
        // 3. verificar se em produto.dao possui a função de listar

        
        case 'clientecadastrar':
            
            $obj = new \FITCHEF\API\ClienteCadastrar;
            $msg = $obj->msg;
            $view = "FRONT-cadastro.php";
            break;

        case 'clientepainel':

            $view = "FRONT-painelcliente.php";
            break;
                

        case 'clientelistar':

            $obj = new \FITCHEF\API\ClienteListar;
            $lista = $obj->lista;
            $view = "lista-cliente.php";
            break;

        case 'clientevisualizar':

            $obj = new \FITCHEF\API\ClienteVisualizar;
            $cliente = $obj->dados;
            $view = "visualiza-cliente.php";
            break;  

        case 'departamentocadastrar':
            
            $obj = new \FITCHEF\API\DepartamentoCadastrar;
            $msg = $obj->msg;
            $view = "form-departamento.php";
            break;

        case 'departamentolistar':
            \FITCHEF\includes\Seguranca::restritoAdm();
            $obj = new \FITCHEF\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "lista-departamento.php";
            break;

        case 'departamentovisualizar':

            $obj = new \FITCHEF\API\DepartamentoVisualizar;
            $departamento = $obj->dados;
            $view = "visualiza-departamento.php";
            break;   
        
        case 'produtocadastrar':
            
            $obj = new \FITCHEF\API\ProdutoCadastrar;
            $msg = $obj->msg;

            $obj2 = new \FITCHEF\API\DepartamentoListar;
            $lista = $obj2->lista;
            
            $view = "form-produto.php";
            break;

        case 'produtolistar':

            $obj = new \FITCHEF\API\ProdutoListar;
            $lista = $obj->lista;
            $view = "lista-produto.php";
            break;
            
        case 'produtovisualizar':

            $obj = new \FITCHEF\API\ProdutoVisualizar;
            $produto = $obj->dados;
            $view = "visualiza-produto.php";
            break;   
        
        case 'usuariocadastrar':
            
            $obj = new \FITCHEF\API\UsuarioCadastrar;
            $msg = $obj->msg;
            $view = "form-usuario.php";
            break;

        case 'usuariolistar':

            $obj = new \FITCHEF\API\UsuarioListar;
            $lista = $obj->lista;
            $view = "lista-usuario.php";
            break;

        case 'usuariovisualizar':

            $obj = new \FITCHEF\API\UsuarioVisualizar;
            $usuario = $obj->dados;
            $view = "visualiza-usuario.php";
            break;  
    
            

        case 'loginadm':
            $obj = new \FITCHEF\API\UsuarioLogar;
            $msg = $obj->msg;
            $view ="form-login-adm.php";
            break;


            
        case 'paineladm':
            $view ="painel-adm.php";
            break;   
           
        case 'painellogoff';
            $obj = new \FITCHEF\API\UsuarioLogoff;
            $view = "form-login-adm.php";
            break;     
     
 
        case 'inicio':
            $obj = new \FITCHEF\API\ProdutoListarHome;
            $lista = $obj->lista;
            $view = "FRONT-inicio.php";
            break;            



             
        case 'porcoes':
            $obj = new \FITCHEF\API\ProdutoListarPorcoes;
            $lista = $obj->lista;
            $view = "FRONT-porcoes.php";
            break; 
            
        case 'cardapio':
            $obj = new \FITCHEF\API\ProdutoListarHome;
            $lista = $obj->lista;
            $lista2 = $obj->lista2;
            $view = "FRONT-cardapio.php";
        break;

        case 'pagamento' :
            $view = "FRONT-pagamento.php";
        break;
        
        case 'quemsomos':
            $view = "FRONT-quemsomos.php";
        break;

        case 'contato':
            $view ="FRONT-contato.php";
        break;
       
        case 'login':
            $view ="FRONT-logincadastro.php";
        break;

        case 'carrinho':
            $view ="FRONT-carrinho.php";
        break;

        case 'produtodetalhes':
            $obj = new \FITCHEF\API\ProdutoVisualizar;
            $produto = $obj->dados;
            
            $view = "visualiza-produto.php";
        break;

        case 'carrinhoadicionar':

            $obj = new \FITCHEF\API\CarrinhoVisualizar;

            $view = "FRONT-carrinho.php";
        break;

        case 'carrinhoremover':
        
            $obj = new \FITCHEF\API\CarrinhoRemover;
           
            $view = "FRONT-carrinho.php";
        break;

        case 'cadastrar':
            $obj = new \FITCHEF\API\UsuarioCadastrar;
            $view = "FRONT-cadastro.php";
            break;

        
        case 'produtobuscar':
            $obj = new \FITCHEF\API\ProdutoBuscaNome;
            $lista = $obj->lista;
            $view = "lista-produto.php";
        break;


        case 'pedidopagamento':
           
            //$obj = new \FITCHEF\DepartamentoListar;
            //$lista = $obj->lista;
            $obj = new \FITCHEF\API\PagamentoVisualizar;
            $pagamento = $obj->pagamento;
            $view= 'FRONT-pagamento.php'; //PÁGINA LOGIN CLIENTE
         break;

         

        case 'fretecalcular':
            $obj = new \FITCHEF\API\CalcularFrete;
            $frete = $obj->frete;

            $view = "FRONT-carrinho.php";
        break;

    /*alterações*/
    case 'pedidofinalizar':
            //\FITCHEF\includes\Seguranca::restritoUsuario();
            $obj = new \FITCHEF\API\PedidoCadastrar($url);  
        break;
        
        case 'logincliente':
           $obj = new \FITCHEF\API\ClienteLogar($url);
           $msg = $obj->msg;
           $view ="FRONT-logincadastro.php";
        break;

        
        case 'painelcliente':
            $view ="FRONT-cliente-painel.php";
            break;   
       
        case 'painellogoff';
            $obj = new \FITCHEF\API\ClienteLogoff;
            $view = "FRONT-logincadastro.php";
            break;
            
        default:
        $view = "FRONT-inicio.php";
        break; 

        }
 
    
    include "view/{$view}";

  
?>

