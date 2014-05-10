<form id ="JogosForm" action="<?php echo $this->webroot.'jogos/cadastrar'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1>Cadastro de jogos</h1>
<?php echo $this->Form->input('Jogo.dataJogo', array('label' => 'Email')); ?>
<?php echo $this->Form->input('EquipeJogo.equipe_id',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe 1', 'empty' => '-- Selecione uma seleção --')); ?>
<?php echo $this->Form->input('segunda_equipe_id',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe 2', 'empty' => '-- Selecione uma seleção --')); ?>
<br></br>

<div>
    <label>&nbsp;</label>
    <?php  echo $this->Html->link('Cancelar',array('controller' => 'Jogos', 'action' => 'index', 'full_base' => true),array('class'=>'btn btn-danger'));?>
    <input type="reset" value="Limpar" class="btn btn-primary"/>
    <input type="submit" value="Salvar" class="btn btn-success"/>
</div>

</form>