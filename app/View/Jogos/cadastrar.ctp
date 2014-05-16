<form id ="JogosForm" action="<?php echo $this->webroot.'jogos/cadastrar'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1>Cadastro de jogos</h1>
<label>Data do jogo</label>
<input id="dataJogo" name="data[Jogo][dataJogo]" class="inp-text small" maxlength="255" type="text">

<?php echo $this->Form->input('EquipeJogo.equipe_id',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe 1', 'empty' => '-- Selecione uma seleção --','class'=>'inp-text')); ?>
<?php echo $this->Form->input('segunda_equipe_id',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe 2', 'empty' => '-- Selecione uma seleção --','class'=>'inp-text')); ?>
<?php echo $this->Form->input('Jogo.grupo', array('label' => false, 'placeholder'=>'Grupo', 'class'=> 'inp-text')); ?>


<div class="bt-right">
    <?php  echo $this->Html->link('Cancelar',array('controller' => 'Jogos', 'action' => 'index', 'full_base' => true),array('class'=>'bt bt-c'));?>
    <input type="submit" value="Salvar" class="bt bt-v"/>
</div>

</form>

<?php echo $this->Html->script(array('jquery.min','jquery.validate.min','jquery.maskedinput.min')); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#dataJogo").mask("99/99/9999"); 
  });
</script>