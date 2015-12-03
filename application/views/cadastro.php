<?php include 'header.php'; ?>

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
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Informações Pessoais</p>
							<form>
								<input type="text" placeholder="Nome Completo">
								<input type="email" placeholder="E-mail">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Cadastrar</a>
						</div>
					</div>
					<div class="col-sm-9 clearfix">
						<div class="bill-to">
							<p>Endereço</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Endereço">
									<input type="text" placeholder="Número">
									<input type="text" placeholder="Complemento">
									<input type="text" placeholder="Número">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Estado">
									<input type="text" placeholder="Zip / Postal Code *">
									<input type="text" placeholder="Telefone">
									<input type="text" placeholder="Celular">
								</form>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<br><br>

<?php include 'footer.php'; ?>