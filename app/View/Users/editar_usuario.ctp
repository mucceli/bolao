<form id ="UserForm" action="<?php echo $this->webroot.'users/salvar_edicao'?>" method="POST">
    <?php echo $this->Session->flash(); ?>
    <h1>Editar usuario</h1>
    <input name="data[User][id]" class="inp-text" maxlength="255" type="hidden" value="<?php echo $this->request->data["User"]["id"] ?>">
    <?php echo $this->Form->input('User.username', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Email')); ?>
    <?php echo $this->Form->input('User.nome', array('label'=>false,'class' => 'inp-text', 'placeholder'=> 'Apelido')); ?>

    <div class="bt-right">
        <input type="submit" value="Salvar" class="bt bt-v"/>
    </div>
</form>
<?php if($this->request->data["User"]["ative"] == 0){?>
        <form action="<?php echo $this->webroot.'users/block_unblock'?>" method="POST">
            <input name="data[User][id]" class="inp-text" maxlength="255" type="hidden" value="<?php echo $this->request->data["User"]["id"] ?>">
            <input name="data[User][ative]" class="inp-text" maxlength="255" type="hidden" value="0">
                <span class="user_block off"></span><input type="submit" style="margin-left:10px;" class="bt bt-v btblock" value="Desbloquear"/></span>
        </form> 
<?php }?>
<?php if($this->request->data["User"]["ative"] == 1){?>
        <form action="<?php echo $this->webroot.'users/block_unblock'?>" method="POST">
            <input name="data[User][id]" class="inp-text" maxlength="255" type="hidden" value="<?php echo $this->request->data["User"]["id"] ?>">
            <input name="data[User][ative]" class="inp-text" maxlength="255" type="hidden" value="1">
                <span class="user_block"></span><input type="submit" style="margin-left:10px;" class="bt bt-c btblock" value="Bloquear"/>
        </form> 
<?php }?>


<?php echo $this->Html->script(array('jquery.min','jquery.validate.min')); ?>
<script type="text/javascript">
     $(document).ready(function(){

    
    });
</script>