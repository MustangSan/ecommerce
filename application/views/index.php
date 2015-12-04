<?php 
   include 'header.php';
   $site = BASEURL;
   $base_url = BASEURL."/assets/images/home/";
   //var_dump($produtos);
?> 
   <section>
      <div class="container">
         <div class="row">
            
            <div class="col-sm-12 padding-right">
               <div class="features_items"><!--features_items-->
                  <?php 
                     if(!empty($produtos)){
                        echo "<h2 class=\"title text-center\">Sapatos</h2>";
                        foreach ($produtos as $produto) {
                           foreach ($produto->getEstoqueProdutos() as $estoqueProduto) {
                  ?>
                              <div class="col-sm-4">
                                 <div class="product-image-wrapper">
                                    <div class="single-products">
                                          <div class="productinfo text-center">
                                             <img src="<?php echo $base_url.$estoqueProduto->getFoto(); ?>" alt="" />
                                             <?php 
                                             if($estoqueProduto->getQtdEstoque() > 0) { ?>
                                                <h2>R$<?php echo $estoqueProduto->getPreco(); ?></h2>
                                             <?php 
                                             } else {
                                                echo "<h3>Produto Indisponivel</h3>";
                                             }
                                             ?>
                                             <p><?php echo $produto->getNome(); ?></p>
                                             <p><a href="<?php echo $site."home/detalhesProduto/".$produto->getIdProduto()."/".$estoqueProduto->getIdEstoqueProduto(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver Produto</a></p>
                                             <?php
                                             if($estoqueProduto->getQtdEstoque() > 0) { ?>
                                                <form method="POST" action="<?php echo $site; ?>home/addCarrinho">
                                                   <input name="idProduto" type="text" value="<?php echo $produto->getIdProduto(); ?>" hidden="true"/>
                                                   <input name="idProdutoEstoque" type="text" value="<?php echo $estoqueProduto->getIdEstoqueProduto(); ?>" hidden="true"/>
                                                   <input name="qtdProduto" type="number" value="1" hidden="true"/>
                                                   <button type="submit" class="btn btn-fefault cart">
                                                      <i class="fa fa-shopping-cart"></i>
                                                      Adicionar ao carrinho
                                                   </button>
                                                </form>
                                             <?php 
                                                } else {
                                                      echo 
                                                      '<button type="submit" class="btn btn-fefault cart">
                                                         <i class="fa fa-shopping-cart"></i>
                                                         Adicionar ao carrinho
                                                      </button>';
                                                }
                                             ?>
                                          </div>
                                          <div class="product-overlay">
                                             <div class="overlay-content">
                                                <?php 
                                                if($estoqueProduto->getQtdEstoque() > 0) { ?>
                                                   <h2>R$<?php echo $estoqueProduto->getPreco(); ?></h2>
                                                <?php 
                                                } else {
                                                   echo "<h3>Produto Indisponivel</h3>";
                                                }
                                                ?>
                                                <p><?php echo $produto->getNome(); ?></p>
                                                <p><a href="<?php echo $site."home/detalhesProduto/".$produto->getIdProduto()."/".$estoqueProduto->getIdEstoqueProduto(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver Produto</a></p>
                                                <?php
                                                if($estoqueProduto->getQtdEstoque() > 0) { ?>
                                                   <form method="POST" action="<?php echo $site; ?>home/addCarrinho">
                                                      <input name="idProduto" type="text" value="<?php echo $produto->getIdProduto(); ?>" hidden="true"/>
                                                      <input name="idProdutoEstoque" type="text" value="<?php echo $estoqueProduto->getIdEstoqueProduto(); ?>" hidden="true"/>
                                                      <input name="qtdProduto" type="number" value="1" hidden="true"/>
                                                      <button type="submit" class="btn btn-fefault cart">
                                                         <i class="fa fa-shopping-cart"></i>
                                                         Adicionar ao carrinho
                                                      </button>
                                                   </form>
                                                <?php 
                                                } else {
                                                      echo 
                                                      '<button type="submit" class="btn btn-fefault cart">
                                                         <i class="fa fa-shopping-cart"></i>
                                                         Adicionar ao carrinho
                                                      </button>';
                                                }
                                                ?>
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                              </div>
                  <?php
                           }
                        }
                     }
                  ?>
               </div><!--features_items-->
            </div>
         </div>
      </div>
   </section>
   
<?php include 'footer.php'; ?>