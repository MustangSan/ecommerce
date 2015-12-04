<?php 
   include 'header.php';
   $site = BASEURL;
   $base_url = BASEURL."/assets/images/home/";
?>

   <section id="cart_items">
      <div class="container">
         <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
         </div>
         <div class="table-responsive cart_info">
            <table class="table table-condensed">
               <thead>
                  <tr class="cart_menu">
                     <td class="image">Item</td>
                     <td class="description"></td>
                     <td class="price">Price</td>
                     <td class="quantity">Quantity</td>
                     <td class="total">Total</td>
                     <td></td>
                  </tr>
               </thead>
               <tbody>
               <?php
               if(isset($carrinho)){
                  foreach ($carrinho as $key => $produto) { ?>
                     <tr>
                        <td class="cart_product">
                           <a href=""><img width="200" src="<?php echo $base_url.$produto->getEstoqueProdutos()->getFoto(); ?>" alt=""></a>
                        </td>
                        <td class="cart_description">
                           <h4><a href=""><?php echo $produto->getNome(); ?></a></h4>
                           <p>Web ID: <?php echo $produto->getEstoqueProdutos()->getIdEstoqueProduto(); ?></p>
                        </td>
                        <td class="cart_price">
                           <p>R$ <?php echo $produto->getEstoqueProdutos()->getPreco(); ?></p>
                        </td>
                        <td class="cart_quantity">
                           <div class="cart_quantity_button">
                              <a class="cart_quantity_up" href="<?php echo $site."home/somaProduto/".$produto->getEstoqueProdutos()->getIdEstoqueProduto()?>"> + </a>
                              <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $produto->getEstoqueProdutos()->getQtdEstoque(); ?>" autocomplete="off" size="2">
                              <a class="cart_quantity_down" href="<?php echo $site."home/subtraiProduto/".$produto->getEstoqueProdutos()->getIdEstoqueProduto()?>"> - </a>
                           </div>
                        </td>
                        <td class="cart_total">
                           <p class="cart_total_price">R$ <?php echo $produto->getEstoqueProdutos()->getPreco()*$produto->getEstoqueProdutos()->getQtdEstoque(); ?></p>
                        </td>
                        <td class="cart_delete">
                           <a class="cart_quantity_delete" href="<?php echo $site."home/removeProduto/".$produto->getEstoqueProdutos()->getIdEstoqueProduto()?>"><i class="fa fa-times"></i></a>
                        </td>
                     </tr>
               <?php
                  }
               } ?>
               </tbody>
            </table>
         </div>
      </div>
   </section> <!--/#cart_items-->

   <section id="do_action">
      <div class="container">
         <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <div class="total_area">
                  <ul>
                     <li>Cart Sub Total <span>R$ <?php echo $valorCompra; ?></span></li>
                     <li>Frete <span>Gratis para todo Brasil</span></li>
                  </ul>
                     <a class="btn btn-default check_out" href="<?php echo $site."checkout"?>">Check Out</a>
               </div>
            </div>
         </div>
      </div>
   </section><!--/#do_action-->

<?php include 'footer.php'; ?>