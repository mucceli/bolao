<?php echo $this->Session->flash(); ?><br>
	<h1>Resultado do campeão</h1>
	<form id ="ApostaCampeaoForm" action="<?php echo $this->webroot.'jogos/salvar_resultado_campeao'?>" method="POST">
	<?php echo $this->Form->input('Equipe.id',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe campeã', 'empty' => '-- Selecione uma seleção --','class'=>'inp-text')); ?>
            <input id="btApostaCampeao" type="submit" value="Salvar" class="bt bt-v btapostar"/>
	</form>