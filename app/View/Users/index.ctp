<html>
<head><title></title>
</head>
<body>
	Lista as usuarios.<br>

	<a href="cadastro_usuarios">Editar usuarios</a>
	<a href="cadastro_usuarios">Excluir usuarios</a>

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
	                <td><?php echo $usuario["usuario"]["nome"] ?></td>
	                <td style="width: 35px;">
	                    <?php echo $this->Form->postLink('', array('action' => 'excluir', $usuario["Usuario"]["idusuario"]),array('confirm' => 'Voce tem certeza?','class' =>'botao-acoes excluir','title'=>'Excluir'));?>
	                    <?php echo $this->Form->postLink('', array('action' => 'editar_usuario', $usuario["Usuario"]["idusuario"]),array('class' =>'botao-acoes editar','title'=>'Editar')); ?>
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