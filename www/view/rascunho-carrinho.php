<div>

             <div class="row painelcarrinho">

                    <div class="col-sm-3 tabelacarrinho">
                    <img width="100%" src="<?php echo $url.'/img/produtos/'.$produto->getImagem(); ?>">
                       

                    </div>

                    <div class="col-sm-3 tabelacarrinho">

                        <p class="nome-remove"><?php echo $produto->getNome(); ?></p>
                        <p><?php echo $produto->getPreco(); ?></p>


                    </div>

                    <div class="col-sm-3 tabelacarrinho">
                        <p><?php echo $produto->getDescricao(); ?></p>

                    </div>

                    <div class="col-sm-3 tabelacarrinho">

                        <a href="<?php echo $url; ?>/carrinho/remover/<?php echo $produto->getId() ?>"
                            class="btn nome-remove">Remover</a>
                    </div>
                </div>



            </div>