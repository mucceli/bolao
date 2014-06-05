<form id ="LoginForm" action="<?php echo $this->webroot.'users/login'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1 id="h1">Login</h1>
<?php echo $this->Form->input('User.username', array('required'=>false,'label'=>false,'class' => 'inp-text username', 'placeholder'=> 'Email')); ?>
<?php echo $this->Form->input('User.password', array('required'=>false,'label'=>false,'class' => 'inp-text userpassword', 'placeholder'=> 'Senha')); ?>
<div class="bt-right">
    <input type="reset" value="Limpar" class="bt bt-c" id="bt-limpar"/>
    <input type="submit" value="Log In" class="bt bt-v" id="bt-login"/>
</div>

</form>
<?php echo $this->Html->script(array('jquery.min')); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#bt-limpar").click(function(){
            $('#flashMessage').remove();
            $('.userpassword').removeClass("invalid");
            $('.username').removeClass("invalid");
        });

        $("#bt-login").click(function(){    
            $('#flashMessage').remove();
            $('.userpassword').removeClass("invalid");
            $('.username').removeClass("invalid");

            if($('.username').val() == ''){
                $('<div id="flashMessage" class="message erro">Digite seu usuário.</div>').insertAfter('#h1');
                $('.username').addClass("invalid");
                return false;
            }
            if($('.userpassword').val() == ''){
                $('<div id="flashMessage" class="message erro">Digite sua senha.</div>').insertAfter('#h1');
                $('.userpassword').addClass("invalid");
                return false;
            }
        });

    });     
</script>