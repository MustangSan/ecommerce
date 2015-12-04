<?php 
	$site = BASEURL;
	include 'header.php'; 
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Cadastro</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Cadastro</h2>
			</div>
			<div class="checkout-options">
				<h3>Novo Usuário</h3>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Nossa loja não irá usar suas informações para nada, elas serão guardadas de maneira segura.</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="shopper-info">
					<form method="POST" action="<?php echo $site; ?>cadastro/singUp">
						<!--div class="col-sm-3">
							<div class="shopper-info"-->
								<p>Informações Pessoais</p>
									<input name="nome" type="text" placeholder="Nome Completo" value="<?php echo $nome; ?>">
									<input name="email" type="email" placeholder="E-mail" value="<?php echo $email; ?>">
									<input name="senha" type="password" placeholder="Password" value="<?php echo $senha; ?>">
									<input name="senhaConf" type="password" placeholder="Confirm password" value="<?php echo $senha; ?>">
									<input name="cpf" type="text" placeholder="CPF">
							<!--/div>
						</div-->
						<!--div class="col-sm-9 clearfix">
							<div class="bill-to"-->
								<p>Endereço</p>
								<!--div class="form-one"-->
										<input name="rua" type="text" placeholder="Rua">
										<input name="numero" type="text" placeholder="Número">
										<input name="complemento" type="text" placeholder="Complemento">
										<input name="bairro" type="text" placeholder="Bairro">
										<input name="cidade" type="text" placeholder="Cidade">
								<!--/div>
								<div class="form-two"-->
										<input name="estado" type="text" placeholder="Estado">
										<input name="cep" type="text" placeholder="Zip / Postal Code *">
										<input name="telefone" type="text" placeholder="Telefone">
										<input name="celular" type="text" placeholder="Celular">
								<!--/div>
							</div>
						</div-->
						<button type="submit" class="btn btn-default">Cadastrar</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<br><br>

<?php include 'footer.php'; ?>