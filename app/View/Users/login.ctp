<form id ="LoginForm" action="<?php echo $this->webroot.'users/login'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1>Login</h1>
<?php echo $this->Form->input('User.username', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Email')); ?>
<?php echo $this->Form->input('User.password', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Senha')); ?>
<div class="bt-right">
    <input type="reset" value="Limpar" class="bt bt-c"/>
    <input type="submit" value="Log In" class="bt bt-v"/>
</div>

</form>
<?php echo $this->Html->script(array('jquery.min','jquery.validate.min')); ?>
<script type="text/javascript">
     $(document).ready(function(){

    $("#LoginForm").validate({
        errorLabelContainer: $("#retornoMensagem"),
        rules: {
            'data[User][username]': 'required',
            'data[User][password]': 'required',
        },
        messages: {
            'data[User][username]': 'Digite seu e-mail',
            'data[User][password]': 'Digite sua senha',
        }
    });     
</script>