<h1>Equipes</h1>
	<?php echo $this->Session->flash(); ?>

	<p><a href="<?php echo $this->Html->url('/equipes/cadastrar_equipe/', true);?>"> Clique aqui para cadastrar uma nova equipe</a></p>
	    <table class="table" width="100%" cellpadding="0" cellspacing="0">
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
	                    <?php echo $this->Form->postLink('Excluir', array('action' => 'excluir', $equipe["Equipe"]["id"]),array('confirm' => 'Voce tem certeza?','class' =>'ico excluir','title'=>'Excluir'));?>
	                    <?php echo $this->Form->postLink('Editar', array('action' => 'editar_Equipe', $equipe["Equipe"]["id"]),array('class' =>'ico editar','title'=>'Editar')); ?>
	                </td>
	            </tr>

	            <?php
	        endforeach;
	        ?>
	    </table>
<br>
	<br>

