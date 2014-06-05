<?php 
function clean($string) {
   $string = str_replace(' ', '', $string);
   $map = array(
		'á' => 'a',
		'à' => 'a',
		'ã' => 'a',
		'â' => 'a',
		'é' => 'e',
		'ê' => 'e',
		'í' => 'i',
		'ó' => 'o',
		'ô' => 'o',
		'õ' => 'o',
		'ú' => 'u',
		'ü' => 'u',
		'ç' => 'c',
		'Á' => 'A',
		'À' => 'A',
		'Ã' => 'A',
		'Â' => 'A',
		'É' => 'E',
		'Ê' => 'E',
		'Í' => 'I',
		'Ó' => 'O',
		'Ô' => 'O',
		'Õ' => 'O',
		'Ú' => 'U',
		'Ü' => 'U',
		'Ç' => 'C'
		);
	$string =  strtr($string, $map);
   return "bd-".strtolower($string); // Removes special chars.
}
?>

<?php echo $this->Session->flash(); ?><br>
	<h1>Apostas</h1>
	<?php if(!empty($user["User"]["equipe_id"])){?>
		Você apostou que o <?php echo $user["Equipe"]["nome"]?> será o campeão. Boa Sorte!
		<?php if(strtotime(date("Y-m-d")) < strtotime("2014-06-12")) { ?>
			<?php echo $this->Html->link('Mudei de ideia','aposta_campeao',array('class' => 'button'));?>
		<?php }	?>	

	<?php }else {?>
		Você ainda não apostou quem será o campeão. <?php echo $this->Html->link('Aposte aqui','aposta_campeao',array('class' => 'button'));?>
	<?php }?>

	<!-- Iniciando listagem dos apostas da fase de grupos -->	
<div class="jg-grupos">
	<div class="jg-grupo">
		<h2>Grupo A</h2>
		<?php 
			$grupo="A";
			
			foreach ($apostas as $aposta):
				//Se o jogo não é do mesmo grupomuda a listagem
				if($aposta["Jogo"]["grupo"]!=$grupo):
					$grupo=$aposta['Jogo']['grupo'];
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

				<form class="jg" action="<?php echo $this->webroot.'apostas/apostar'?>" method="POST">
					<input name="data[Aposta][id]" class="inp-text" maxlength="255" type="hidden" value="<?php echo $aposta["Aposta"]["id"] ?>">
					<span class="jg-time"><span><?php echo $aposta["Jogo"]["Equipe"][0]["nome"] ?></span><i class="<?php echo clean($aposta["Jogo"]["Equipe"][0]["nome"])?>"></i></span>
					
						<input type="text" name="data[Aposta][golsTime1]" class="inp-text" value="<?php echo $aposta["Aposta"]["golsTime1"] ?>" />
						<span>x</span>
						<input type="text" name="data[Aposta][golsTime2]" class="inp-text" value="<?php echo $aposta["Aposta"]["golsTime2"] ?>" />
					<span class="jg-time jg-time-fix"> <i class="<?php echo clean($aposta["Jogo"]["Equipe"][1]["nome"])?>"></i><span><?php echo $aposta["Jogo"]["Equipe"][1]["nome"] ?></span></span>

					<span class="jg-data"><?php echo date("d/m/Y", strtotime($aposta["Jogo"]["dataJogo"])); ?></span>
					
					<span class="jg-data"><?php
						if(strtotime(date("Y-m-d")) < strtotime($aposta["Jogo"]["dataJogo"])) { ?>
							<input type="submit" class="bt bt-v btapostar" value="$ Apostar"/>
						<?php }							
					?></span>
				</form>
	<?php endforeach ?>
</div>
</div>

</body>
<?php echo $this->Html->script(array('jquery.min')); ?>
<script type="text/javascript">
 $(document).ready(function(){
	 $("#btApostaCampeao").click(function(){
	    if($('.comboApostaCampeao').val()== ''){
	    	return false;
	    }
	  });
  });
</script>
