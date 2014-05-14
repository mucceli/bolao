<h1>Cadastrar nova equipe</h1>
<form id ="EquipesForm" action="<?php echo $this->webroot.'equipes/cadastrar_equipe'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->input('Equipe.nome', array('label' => false, 'placeholder'=>'Nome', 'class'=> 'inp-text')); ?>

    
    <div class="bt-right">
        <?php  echo $this->Html->link('Cancelar',array('controller' => 'Equipes', 'action' => 'index', 'full_base' => true),array('class'=>'bt bt-c'));?>
                <input type="submit" value="Cadastrar" class="bt bt-v"/>
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