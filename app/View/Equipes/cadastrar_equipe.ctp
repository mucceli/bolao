<form id ="EquipesForm" action="<?php echo $this->webroot.'equipes/cadastrar_equipe'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1>Cadastro de Equipes</h1>
<?php echo $this->Form->input('Equipe.nome', array('label' => 'Nome')); ?>
<br></br>

<div>
    <label>&nbsp;</label>
    <?php  echo $this->Html->link('Cancelar',array('controller' => 'Equipes', 'action' => 'index', 'full_base' => true),array('class'=>'btn btn-danger'));?>
    <input type="reset" value="Limpar" class="btn btn-primary"/>
    <input type="submit" value="Salvar" class="btn btn-success"/>
</div>

</form>
<?php echo $this->Html->script(array('jquery.min','jquery.validate.min')); ?>
<script type="text/javascript">
     $(document).ready(function(){

    $("#EquipeForm").validate({
        errorLabelContainer: $("#retornoMensagem"),
        rules: {
            'data[Equipe][nome]': 'required',
            'data[Equipe][descricao]': 'required',
        },
        messages: {
            'data[Equipe][nome]': 'Digite o nome do Equipe',
            'data[Equipe][descricao]': 'Digite a descrição do Equipe',
        }
    });     
</script>