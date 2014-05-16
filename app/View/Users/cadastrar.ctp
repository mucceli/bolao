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

    $(".password_confirm").focusout(function(){
                $('#flashMessage').remove();
                  $pwd = $('.userpassword').val();
                  $pwd_confirm = $(".password_confirm").val();
                  if($pwd != $pwd_confirm){
                     $('.password_confirm').val('');
                     $('.userpassword').val('');
                     $('<div id="flashMessage" class="message erro">Senhas não conferem.</div>').insertAfter('#h1');
                  }else{
                        if($('.userpassword').val().length < 6){
                            $('.password_confirm').val('');
                            $('.userpassword').val('');
                            $('<div id="flashMessage" class="message erro">Sua senha deve ter pelo menos 6 dígitos.</div>').insertAfter('#h1');
                            return false;
                        }
                  }
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
                }else{
                  $('#flashMessage').remove();
                  $('.valid_user').removeClass("valido");
                  $('.valid_user').val('');
                  $('<div id="flashMessage" class="message erro">Usuário já existe. Escolha outro.</div>').insertAfter('#h1');
                }
             }
        });
      });

  $(".bt-limpar").click(function(){
    $('#flashMessage').remove();
    $('.valid_user').removeClass("valido");
  });

});
</script>