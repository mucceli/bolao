<?php 
function clean($string) {
   $string = str_replace(' ', '', $string);
   $string= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string));
   return "bd-".strtolower($string); // Removes special chars.
}
?>
<?php echo $this->Session->flash(); ?><br>
	<h1>Apostas</h1>
	<form id ="ApostaCampeaoForm" action="<?php echo $this->webroot.'apostas/salvar_aposta_finalistas'?>" method="POST">
	<?php echo $this->Form->input('User.idEquipeCampea',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe campeã', 'empty' => '-- Selecione uma seleção --')); ?>
            <input type="submit" value="$ Apostar" class="bt bt-v btapostar"/>
	</form>


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

</body>
<script type="text/javascript">
	 $('.btapostar').click(function(){
                    var login = $('.valid_user').val();
                    if(login==''){
                        $('#retornoMensagemLoginSucesso').remove();                       
                    }
                    $.ajax({
                    dataType: "html",
                    type: "POST",
                    evalScripts: true,
                    url: '<?php echo Router::url(array('controller'=>'apostas','action'=>'apostar'));?>',
                    data: "login="+login,
                    success: function (data){                        
                        if(data == 1){
                                $("#retornoMensagemLoginSucesso").fadeOut(25000);
                        }else{
                                $("#check_user_icon_invalid").fadeOut(25000);
                        }
                     }
                });
              });
</script>
