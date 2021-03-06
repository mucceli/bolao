<form id ="UserForm" action="<?php echo $this->webroot.'users/add'?>" method="POST">
<?php echo $this->Session->flash(); ?>
<h1 id="h1">Cadastro de usuarios</h1>
<?php echo $this->Form->input('User.username', array('label'=>false,'class' => 'inp-text valid_user', 'placeholder'=> 'Email')); ?>
<?php echo $this->Form->input('User.apelido', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Apelido')); ?>
<?php echo $this->Form->input('User.password', array('label'=>false,'class' => 'inp-text userpassword', 'placeholder'=> 'Senha')); ?>
<?php echo $this->Form->input('', array('label'=>false,'class' => 'inp-text password_confirm', 'placeholder'=> 'Confirmação de senha')); ?>
<div class="bt-right">
    <input type="reset" value="Limpar" class="bt bt-c bt-limpar" />
    <input type="submit" value="Cadastrar" class="bt bt-v"/>
</div>

</form>
<?php echo $this->Html->script(array('jquery.min','jquery.validate.min')); ?>
<script type="text/javascript">
     $(document).ready(function(){

    $(".password_confirm").focusout(function(){
        $('#flashMessage').remove();
          $pwd = $('.userpassword').val();
          $pwd_confirm = $(".password_confirm").val();
          if($pwd != $pwd_confirm){
             $('.password_confirm').val('');
             $('.userpassword').val('');
             $('.userpassword').addClass("invalid");
             $('.password_confirm').addClass("invalid");
             $('<div id="flashMessage" class="message erro">Senhas não conferem.</div>').insertAfter('#h1');
             return false;
          }else{
                if($('.userpassword').val().length < 6){
                    $('.password_confirm').val('');
                    $('.userpassword').val('');
                    $('.userpassword').addClass("invalid");
                    $('.password_confirm').addClass("invalid");
                    $('<div id="flashMessage" class="message erro">Sua senha deve ter pelo menos 6 dígitos.</div>').insertAfter('#h1');
                    return false;
                }
          }
          $('.userpassword').removeClass("invalid");
          $('.password_confirm').removeClass("invalid");
    });

     $('.valid_user').focusout(function(){
            var login = $('.valid_user').val();
            if(login==''){
                $('#flashMessage').remove();                   
                return;
            }
            $.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: '<?php echo Router::url(array('controller'=>'users','action'=>'existe_usuario'));?>',
            data: "login="+login,
            success: function (data){                        
                if(data == 1){
                  $('#flashMessage').remove();
                  $('.valid_user').addClass("valido");
                  $('.valid_user').removeClass("invalid");
                }else{
                  $('#flashMessage').remove();
                  $('.valid_user').removeClass("valido");
                  $('.valid_user').addClass("invalid");
                  $('.valid_user').val('');
                  $('<div id="flashMessage" class="message erro">Usuário já existe. Escolha outro.</div>').insertAfter('#h1');
                }
             }
        });
      });

  $(".bt-limpar").click(function(){
    $('#flashMessage').remove();
    $('.valid_user').removeClass("valido");
    $('.userpassword').removeClass("invalid");
    $('.password_confirm').removeClass("invalid");
  });

});
</script>