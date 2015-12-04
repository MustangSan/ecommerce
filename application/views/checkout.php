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
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<?php //var_dump($cliente); ?>
								Nome: <input type="text" value="<?php echo $cliente->getNome();?>" disabled>
								Email: <input type="text" value="<?php echo $cliente->getEmail();?>" disabled>
								CPF: <input type="text" value="<?php echo $cliente->getCPF();?>" disabled>
								Telefone: <input type="text" value="<?php echo $cliente->getCelular();?>" disabled>
							</form>
						</div>
					</div>
					<div class="col-sm-6 clearfix">
						<div class="bill-to">
							<p>Endereço</p>
							<div class="form-one">
								<form>
									Rua: <input type="text" value="<?php echo $cliente->getEndereco()->getRua()?>" disabled>
									Numero: <input type="text" value="<?php echo $cliente->getEndereco()->getNumero() ?>" disabled>
									Complemento: <input type="text" value="<?php echo $cliente->getEndereco()->getComplemento() ?>" disabled>
									Bairro: <input type="text" value="<?php echo $cliente->getEndereco()->getBairro() ?>" disabled>
								</form>
							</div>
							<div class="form-two">
								<form>
									Cidade: <input type="text" value="<?php echo $cliente->getEndereco()->getCidade() ?>" disabled>
									Estado: <input type="text" value="<?php echo $cliente->getEndereco()->getEstado() ?>" disabled>
									CEP: <input type="text" value="<?php echo $cliente->getEndereco()->getCEP() ?>" disabled>
									<a class="btn btn-default check_out" href="<?php //echo $site."checkout"?>">Trocar Endereco</a>
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
	                              <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $produto->getEstoqueProdutos()->getQtdEstoque(); ?>" autocomplete="off" size="2" disabled>
	                           </div>
	                        </td>
	                        <td class="cart_total">
	                           <p class="cart_total_price">R$ <?php echo $produto->getEstoqueProdutos()->getPreco()*$produto->getEstoqueProdutos()->getQtdEstoque(); ?></p>
	                        </td>
	                     </tr>
	               <?php
	                  }
	               } ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>R$ <?php echo $valorCompra; ?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Frete</td>
										<td>Gratis</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>R$ <?php echo $valorCompra; ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
				<div class="review-payment">
					<h2>Tipo de Pagamento</h2>
				</div>
					<form>
					<span>
						<label><input name="pagamento" type="radio"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input name="pagamento" type="radio"> Check Payment</label>
					</span>
					<span>
						<label><input name="pagamento" type="radio" checked="true"> Paypal</label>
					</span>
					</form>
				<a class="btn btn-default check_out" href="<?php echo $site."checkout/finalizarCompra"?>">Finalizar Compra</a>
			</div>
		</div>
	</section> <!--/#cart_items-->

<?php include 'footer.php'; ?>