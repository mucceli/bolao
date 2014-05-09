<html>
<head><title></title>
</head>
<body>
	Lista as usuarios.<br>

	<?php echo $this->Session->flash(); ?>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Nome</th>
	            <th>Ação</th>
	        </tr>
	        <?php
	        foreach ($usuarios as $usuario):
	            ?>
	            <tr>
	                <td><?php echo $usuario["User"]["username"] ?></td>
	                <td style="width: 35px;">
	                    <?php echo $this->Form->postLink('Excluir', array('action' => 'excluir', $usuario["User"]["id"]),array('confirm' => 'Voce tem certeza?','class' =>'botao-acoes excluir','title'=>'Excluir'));?>
	                    <?php echo $this->Form->postLink('Editar', array('action' => 'editar_usuario', $usuario["User"]["id"]),array('class' =>'botao-acoes editar','title'=>'Editar')); ?>
	                </td>
	            </tr>

	            <?php
	        endforeach;
	        ?>
	    </table>
<br>
	<br>
	<a href="<?php echo $this->Html->url('/users/cadastrar/', true);?>"> Cadastre uma usuario</a>
</body>
</html>