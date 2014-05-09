<form id ="JogosForm" action="<?php echo $this->webroot.'jogos/salvar_resultado'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1>Resultados de jogos</h1>
<label><?php echo $jogo["Jogo"]["idEquipe1"]?></label>
<?php echo $this->Form->input('Jogo.golsTime1', array('label' => '')); ?> X
<?php echo $this->Form->input('Jogo.golsTime2', array('label' => '')); ?>
<label><?php echo $jogo["Jogo"]["idEquipe2"]?></label>
<br></br>

<div>
    <label>&nbsp;</label>
    <?php  echo $this->Html->link('Cancelar',array('controller' => 'Jogos', 'action' => 'index', 'full_base' => true),array('class'=>'btn btn-danger'));?>
    <input type="reset" value="Limpar" class="btn btn-primary"/>
    <input type="submit" value="Salvar" class="btn btn-success"/>
</div>

</form>