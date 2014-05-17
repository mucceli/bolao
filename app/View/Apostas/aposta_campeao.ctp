<?php echo $this->Session->flash(); ?><br>
	<h1>Aposte no campeão</h1>
	<form id ="ApostaCampeaoForm" action="<?php echo $this->webroot.'apostas/salvar_aposta_campeao'?>" method="POST">
	<?php echo $this->Form->input('User.equipe_id',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe campeã', 'empty' => '-- Selecione uma seleção --','class'=>'inp-text comboApostaCampeao')); ?>
            <input id="btApostaCampeao" type="submit" value="$ Apostar" class="bt bt-v btapostar"/>
	</form>