<html>
<head><title></title>
</head>
<body>
	Lista as jogos.<br>

	<?php echo $this->Session->flash(); ?>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Jogo</th>
	            <th>Data</th>
	            <th>Resultado</th>
	        </tr>
	        <?php
	        foreach ($jogos as $jogo):
	            ?>
	            <tr>
	            	<td><?php echo $jogo["Jogo"]["dataJogo"] ?></td>
	                <td><?php echo $jogo["Jogo"]["dataJogo"] ?></td>
	                <td style="width: 35px;">
	                <?php echo $this->Form->postLink('Registrar um resultado', array('action' => 'registrar_resultado', $jogo["Jogo"]["id"]),array('class' =>'botao-acoes editar','title'=>'Editar')); ?>

	                    <?php echo $this->Form->postLink('', array('action' => 'excluir', $jogo["Jogo"]["id"]),array('confirm' => 'Voce tem certeza?','class' =>'botao-acoes excluir','title'=>'Excluir'));?>
	                    <?php echo $this->Form->postLink('', array('action' => 'editar_jogo', $jogo["Jogo"]["id"]),array('class' =>'botao-acoes editar','title'=>'Editar')); ?>
	                </td>
	            </tr>

	            <?php
	        endforeach;
	        ?>
	    </table>
<br>
	<br>
	<a href="<?php echo $this->Html->url('/jogos/cadastrar/', true);?>"> Cadastre uma jogo</a>
	<br>	
</body>
</html>