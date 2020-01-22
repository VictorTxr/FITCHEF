
<?php include "FRONT-header.php" ?>

<div class="card titulofaixa">
      <div class="card-body titulo">
        Prato fitchef
      </div>
    </div>
<div class="container produtobox">
  <div class="row">
    <div class="col-sm-6">
      <img class="imgproduto" src="<?php echo $url; ?>/img/produtos/<?php echo $produto->getImagem(); ?>">
    </div>
    <div class="col-sm-6">
      <h2><?php echo $produto->getNome(); ?></h2>

      <a href="#"> Adicionar ao carrinho </a>
      <br><br>
      <p></p>

      <hr style="border:1px dashed gray;">
      <p> As porções são individuais. Clique em + para adicionar.
        <hr style="border:1px dashed gray;">

        <div class="container pricequant">
          <div class="row">

            <div class="col-sm-4">
              <h2>R$19,90</h2>
            </div>

            <div class="col-sm-4">
              <p>Quantidade:</p>
            </div>
            <div class="col-sm-4">
  

            <a href="<?php echo $url; ?>/carrinho/adicionar/<?php echo $produto->getId(); ?>" class="btn">Comprar</a>
</div>


           
          </div>
        </div>


        <hr style="border:1px dashed gray;">




        <div class="container descritext">
          <div class="row">


            <div class="col-sm">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="0000-000" aria-label="0000-000"
                  aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">Calcular Frete</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

</div>
</div>
</div>


  <div class="container">
    <div class="card">
      <div class="card-body">
        Descrição
      </div>
    </div>
    <div class="textoproduto">
    <div>
    <p><?php echo $produto->getDescricao(); ?></p>
    </div>
 


  </div>
</div>
</div>

<?php include "FRONT-footer.php" ?>