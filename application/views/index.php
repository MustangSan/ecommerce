<?php 
   include 'header.php';
   //$base_url = BASEURL;
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
                                             <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver Produto</a>
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
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver Produto</a>
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