<html>
<head><title></title>
</head>
<body>
	Lista as equipes.<br>

	<a href="cadastro_equipes">Editar equipes</a>
	<a href="cadastro_equipes">Excluir equipes</a>

	<?php echo $this->Session->flash(); ?>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Nome</th>
	            <th>Ação</th>
	        </tr>
	        <?php
	        foreach ($equipes as $equipe):
	            ?>
	            <tr>
	                <td><?php echo $equipe["Equipe"]["nome"] ?></td>
	                <td style="width: 35px;">
	                    <?php echo $this->Form->postLink('', array('action' => 'excluir', $equipe["Equipe"]["id"]),array('confirm' => 'Voce tem certeza?','class' =>'botao-acoes excluir','title'=>'Excluir'));?>
	                    <?php echo $this->Form->postLink('', array('action' => 'editar_Equipe', $equipe["Equipe"]["id"]),array('class' =>'botao-acoes editar','title'=>'Editar')); ?>
	                </td>
	            </tr>

	            <?php
	        endforeach;
	        ?>
	    </table>
<br>
	<br>
	<a href="<?php echo $this->Html->url('/equipes/cadastrar_equipe/', true);?>"> Cadastre uma equipe</a>
</body>
</html>