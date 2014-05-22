
<?php 
function clean($string) {
   $string = str_replace(' ', '', $string);
   $string= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string));
   return "bd-".strtolower($string); // Removes special chars.
}
?>
<h1>Registra resultado</h1>
	<?php echo $this->Session->flash(); ?>

	<?php if($registro_campeao == 1){?>
		Você registrou que o <?php echo $nome_campeao?> foi o campeão.
		<?php echo $this->Html->link('Mudei de ideia','resultado_campeao',array('class' => 'button'));?>
	<?php }else {?>
		<?php echo $this->Html->link('Registre o campeão','resultado_campeao',array('class' => 'button'));?>
	<?php }?>

	<!-- Iniciando listagem dos jogos da fase de grupos -->	
	<div class="jg-grupos">
		<div class="jg-grupo">
			<h2>Grupo A</h2>
			<?php 
				$grupo="A";
				
				foreach ($jogos as $jogo):?>
					<form action="<?php echo $this->webroot.'jogos/salvar_resultado'?>" method="POST">
						<input name="data[Jogo][id]" class="inp-text" maxlength="2" type="hidden" value="<?php echo $jogo["Jogo"]["id"] ?>">
						<?php //Se o jogo não é do mesmo grupomuda a listagem
						 if($jogo["Jogo"]["grupo"]!=$grupo):
							$grupo=$jogo['Jogo']['grupo'];
							?>
							</div>

							<?php echo strlen($grupo);
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
						<input type="text" name="data[Jogo][golsTime1]" class="inp-text" value="<?php echo $jogo["Jogo"]["golsTime1"] ?>" />
							<span>x</span>
							<input type="text" name="data[Jogo][golsTime2]" class="inp-text" value="<?php echo $jogo["Jogo"]["golsTime2"] ?>" />
						<span class="jg-time jg-time-fix"> <i class="<?php echo clean($jogo["Equipe"][1]["nome"])?>"></i><span><?php echo $jogo["Equipe"][1]["nome"] ?></span></span>

						<span class="jg-data"><?php echo date("d/m/Y", strtotime($jogo["Jogo"]["dataJogo"])); ?></span>
						<input type="submit" class="bt bt-v btapostar" style="margin-bottom:15px;" value="Salvar"/>
					</span>
					 </form>
		<?php endforeach ?>
</div>
</div>
