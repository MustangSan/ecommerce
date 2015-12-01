<html>
<body>
   <h1><?php echo $titulo; ?></h1>
   <p><?php echo $teste; ?></p>
   <p><?php echo $email; ?></p>
   <p><?php echo $nome; ?></p>
   <p><?php echo $senha; ?></p>
   <hr>
   <h1>Teste Session</h1>
   <p><?php echo $_SESSION['teste'];?></p>
   <p><?php echo $_SESSION['email'];?></p>
   <p><?php echo $_SESSION['nome'];?></p>
   <p><?php echo $_SESSION['senha'];?></p>
   <p><?php print_r($_SESSION);?></p>
</body>
</html>