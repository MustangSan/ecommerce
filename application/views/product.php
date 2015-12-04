<?php 
   include 'header.php';
   //$base_url = BASEURL;
   $site = BASEURL;
   $base_url = BASEURL."/assets/images/home/";
?>

   <section>
      <div class="container">
         <div class="row">
            <div class="col-sm-12 padding-right">
               <div class="product-details"><!--product-details-->
                  <div class="col-sm-5">
                     <div class="view-product">
                        <img src="<?php echo $base_url.$produto->getEstoqueProdutos()->getFoto(); ?>" alt="" />
                     </div>
                  </div>
                  <div class="col-sm-7">
                     <div class="product-information"><!--/product-information-->
                        <h2><?php echo $produto->getNome(); ?></h2>
                        <p>Web ID: <?php echo $produto->getEstoqueProdutos()->getIdEstoqueProduto(); ?></p>
                        <span>
                           <span>R$ <?php echo $produto->getEstoqueProdutos()->getPreco(); ?></span>
                        </span>
                        <?php 
                        if($produto->getEstoqueProdutos()->getQtdEstoque() > 0) { ?>
                           <p><b>Viabilidade:</b> <?php echo $produto->getEstoqueProdutos()->getQtdEstoque(); ?> unidades disponiveis</p>
                        <?php 
                        } else {
                           echo "<p><b>Viabilidade:</b> Produto Indisponivel</p>";
                        }
                        ?>
                        <p><b>Cor: </b><?php echo $produto->getEstoqueProdutos()->getCor(); ?></p>
                        <p><b>Numero: </b><?php echo $produto->getEstoqueProdutos()->getNumeracao(); ?></p>
                        <p><b>Marca: </b><?php echo $produto->getMarca(); ?></p>
                        <p><b>Material: </b><?php echo $produto->getMaterial(); ?></p>
                        <p><b>Fecho: </b><?php echo $produto->getFechamento(); ?></p>
                        <p><b>Publico: </b><?php echo $produto->getPublico(); ?></p>
                        <p><b>Adicionais: </b><?php echo $produto->getAdicional(); ?></p>
                        <p><b>Descrição: </b><?php echo $produto->getDescricao(); ?></p>
                        <span>
                           <form method="POST" action="<?php echo $site; ?>home/addCarrinho">
                           <input name="idProduto" type="text" value="<?php echo $produto->getIdProduto(); ?>" hidden="true"/>
                           <input name="idProdutoEstoque" type="text" value="<?php echo $produto->getEstoqueProdutos()->getIdEstoqueProduto(); ?>" hidden="true"/>
                           <label>Quantity:</label>
                           <input name="qtdProduto" type="number" value="1" min="1" max="<?php echo $produto->getEstoqueProdutos()->getQtdEstoque(); ?>" />
                           <button type="submit" class="btn btn-fefault cart">
                              <i class="fa fa-shopping-cart"></i>
                              Add to cart
                           </button>
                           </form>
                        </span>
                     </div><!--/product-information-->
                  </div>
               <a href="<?php echo $site; ?>home" class="btn btn-default">Voltar</a>
               </div><!--/product-details-->
            </div>
         </div>
      </div>
   </section>

<?php include 'footer.php'; ?>