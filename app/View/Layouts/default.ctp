<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	Bolão Boleia - GALO DOIDO!
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->Html->css('bolao');

	?>
</head>
<body>
	<div id="container">
		<header id="header">
			<div class="header-bar">
				<div class="g-980">
				<?php if($usuariologado){?>
						Bem vindo, você é o 4º colocado  | <a href="<?php echo $this->webroot.'users/logout' ?>">Logout
                       </a> 
					<?php }else {?>
						 <a href="<?php echo $this->webroot.'users/cadastrar' ?>">Cadastre-se</a> | 
						 <a href="<?php echo $this->webroot.'users/login' ?>">Entrar</a>
					<?php }?>
				</div>
			</div>
			<div class="g-980 header-cnt">
				<span class="header-mascote"></span>
				<a href="<?php echo $this->webroot?>"><h1 class="header-logo">Bolão boleia</h1></a>
				<!-- FAzer if para usuario logado ou n. E se tiver logado if para administrador -->
				<ul class="header-nav">
					
					<?php if($usuariologado && $userAdmin){?>
						<li><a href="<?php echo $this->webroot.'equipes'?>">Equipes</a></li>
					<?php }?>

					<?php if($usuariologado){?>
						<li><a href="<?php echo $this->webroot.'apostas'?>">Apostas</a></li>
					<?php }?>

					<?php if($usuariologado && $userAdmin){?>
						<li><a href="<?php echo $this->webroot.'users'?>">Usuario</a></li>
					<?php }?>

					<li><a href="<?php echo $this->webroot.'ranking'?>">Ranking</a></li>
					<li><a href="<?php echo $this->webroot.'regras'?>">Regras</a></li>
					<?php if($usuariologado && $userAdmin){?>
						<li><a href="<?php echo $this->webroot.'jogos/registrar_resultado'?>">Resultados</a></li>
					<?php }?>
					<li><a href="<?php echo $this->webroot.'jogos'?>">Jogos</a></li>
					<?php if($usuariologado){?>
						<li><a href="<?php echo $this->webroot.'pagamento'?>">Pagamento</a></li>
					<?php }?>
				</ul>
			</div>
		</header>
		<div id="content" class="g-980">
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
			<div class="g-980">Bolão entre amigos para a Copa de 2014</div>
		</footer>
</body>
</html>
