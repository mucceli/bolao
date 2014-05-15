
<?php 
function clean($string) {
   $string = str_replace(' ', '', $string);
   $string= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string));
   return "bd-".strtolower($string); // Removes special chars.
}
?>
<h1>Lista de jogos</h1>
	<?php echo $this->Session->flash(); ?>
	<a href="<?php echo $this->Html->url('/jogos/cadastrar/', true);?>"> Cadastre um jogo</a>
	<br /></br />

	<!-- Iniciando listagem dos jogos da fase de grupos -->	
	<div class="jg-grupos">
		<div class="jg-grupo">
			<h2>Grupo A</h2>
			<?php 
				$grupo="A";
				
				foreach ($jogos as $jogo):
					//Se o jogo não é do mesmo grupomuda a listagem
					if($jogo["Jogo"]["grupo"]!=$grupo):
						$grupo=$jogo['Jogo']['grupo'];
						?>
						</div>

							<?php 
							echo strlen($grupo);
								//Senao for fase de grupos
							if(strlen($grupo)>1):?>
								</div>
								<div class="jg-grupos">
									<div class="jg-grupo">
										<h2><?php echo $grupo;?></h2>
							<?php else: ?>
								<div class="jg-grupo">
								<h2>Grupo <?php echo $grupo?></h2>
							<?php endif;?>
						

						
					<?php endif;?>

					<span class="jg">
						<span class="jg-time"><span><?php echo $jogo["Equipe"][0]["nome"] ?></span><i class="<?php echo clean($jogo["Equipe"][0]["nome"])?>"></i></span>
						<!-- Se tiver resultado cadastrado -->
						<?php if(!empty($jogo["Jogo"]["golsTime1"]) && !empty($jogo["Jogo"]["golsTime2"])){?>
							<span class="inp-text"><?php echo $jogo["Jogo"]["golsTime1"] ?></span>
							<span>x</span>
							<span class="inp-text"><?php echo $jogo["Jogo"]["golsTime2"] ?></span>
						<?php } else{ ?>
							<span>x</span>
						<?php }?>
						<span class="jg-time jg-time-fix"> <i class="<?php echo clean($jogo["Equipe"][1]["nome"])?>"></i><span><?php echo $jogo["Equipe"][1]["nome"] ?></span></span>

						<span class="jg-data"><?php echo date("d/m/Y", strtotime($jogo["Jogo"]["dataJogo"])); ?></span>
					</span>
		<?php endforeach ?>

	    

