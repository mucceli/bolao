<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
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
				Dados do usuario logado <a href="#">Link para sair</a>
				</div>
			</div>
			<div class="g-980 header-cnt">
				<span class="header-mascote"></span>
				<a href="<?php echo $this->webroot?>"><h1 class="header-logo">Bolão boleia</h1></a>
				<!-- FAzer if para usuario logado ou n. E se tiver logado if para administrador -->
				<ul class="header-nav">
					<li><a href="<?php echo $this->webroot.'jogos'?>">Jogos</a></li>
					<li><a href="<?php echo $this->webroot.'equipes'?>">Equipes</a></li>
					<li><a href="<?php echo $this->webroot.'apostas'?>">Apostas</a></li>
					<li><a href="<?php echo $this->webroot.'users'?>">Usuario</a></li>


	

	
				</ul>
			</div>
		</header>
		<div id="content" class="g-980">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
</body>
</html>
