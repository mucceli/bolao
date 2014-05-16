<form id ="UserForm" action="<?php echo $this->webroot.'users/salvar_edicao'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1>Editar usuario</h1>
<?php echo $this->Form->input('User.username', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Email')); ?>
<?php echo $this->Form->input('User.apelido', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Apelido')); ?>
<?php echo $this->Form->input('User.ative', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Ativo')); ?>
<div class="bt-right">
    <input type="reset" value="Limpar" class="bt bt-c"/>
    <input type="submit" value="Cadastrar" class="bt bt-v"/>
</div>

</form>
<?php echo $this->Html->script(array('jquery.min','jquery.validate.min')); ?>
<script type="text/javascript">
     $(document).ready(function(){

    $("#UserForm").validate({
        errorLabelContainer: $("#retornoMensagem"),
        rules: {
            'data[User][nome]': 'required',
            'data[User][descricao]': 'required',
        },
        messages: {
            'data[User][nome]': 'Digite o nome do usuario',
            'data[User][descricao]': 'Digite a descrição do usuario',
        }
    });
</script>