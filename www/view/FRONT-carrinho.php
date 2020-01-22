<?php include "FRONT-header.php" ?>

<div class="card titulofaixa">
    <div class="card-body titulo">
        Meu carrinho
    </div>
</div>
</div>

<?php
                @$carrinho = $_SESSION['carrinho'];

                if($carrinho===null || empty($carrinho->getItems())){
                    // Inicio HTML
                    ?>
<?php include "FRONT-carrinhovazio.php" ?>

<?php
                    // Fim HTML
                }else{

                   
                    ?>


<div class="container">
    <div class="row" style="margin-top:50px">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <td>
                        PRODUTO
                    </td>
                    <td>
                        QUANTIDADE
                    </td>
                    <td>
                        PREÇO
                    </td>
                    <td>

                    </td>

                </tr>
                <?php
                    foreach ($carrinho->getItems() as $item){
                        $produto = $item->getProduto();
                        $link = "http://localhost/fitchef/carrinho/remover/".$produto->getId();
                     
                        // Inicio HTML
                        ?>
                <tr>
                    <td>
                        <img width="80" src="<?php echo $url.'/img/produtos/'.$produto->getImagem(); ?>">
                        <p class="nome-remove"><?php echo $produto->getNome(); ?></p>
                    </td>
                    <td>

                    </td>
                    <td>
                        <?php echo $produto->getPreco(); ?>
                    </td>
                    <td>
                        <a href="<?php echo $url; ?>/carrinho/remover/<?php echo $produto->getId() ?>"
                            class="btn nome-remove">Remover</a>
                    </td>

                </tr>

                <?php
                  }
                        ?>

            </table>

        </div>

        <div class="col-md-4" style="text-align:center">
           
            <i class="fas fa-truck fa-3x"></i>
            <form method="post" action="<?php echo $url; ?>/frete/calcular">
                <label>Frete</label>
                <input type="text" size="6" name="cep" />
                <button class="btn btn-outline-secondary">Calcular</button>
            </form>
            <?php
                    if(isset($_POST['cep'])){
                        echo "<p>Preço: R$ ".$frete->getValor()."</p>";
                        echo "<p>Entrega: R$ ".$frete->getPrazoEntrega()." dias</p>";
                        echo '<a href="'.$url.'/pedido/finalizar" class="btn btn-success">Finalizar</a>';
                        
                    }else{
                        echo "<p>Insira o CEP</p>";
                        echo '<a href="'.$url.'/pedido/finalizar" class="btn btn-success disabled">Finalizar</a>';
                    }
                

                    foreach ($carrinho->getItems() as $item){
                        $produto = $item->getProduto();
                        $link = "http://localhost/fitchef/carrinho/remover/".$produto->getId();
                    
                        // Inicio HTML
            ?>
        </div>


    </div>


</div>
<?php   
     // Fim HTML
            }
        }
    ?>





</div>
</div>
</div>
</div>
<?php include "FRONT-footer.php" ?>