<html>
<head><title></title>
</head>
<body>
	Lista as jogos.<br>

	<?php echo $this->Session->flash(); ?>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Data</th>
	            <th>Jogo</th>
	            <th>Resultado</th>
	        </tr>
	        <?php
	        foreach ($jogos as $jogo):
	            ?>
	            <tr> 
	            	<td><?php echo date("d/m/Y", strtotime($jogo["Jogo"]["dataJogo"])); ?></td>
	            	<td><?php echo $jogo["Equipe"][0]["nome"] ?> x <?php echo $jogo["Equipe"][1]["nome"] ?></td> <td style="width: 35px;">
		            	<?php if(!empty($jogo["Jogo"]["golsTime1"]) && !empty($jogo["Jogo"]["golsTime2"])){?>
							<?php echo $jogo["Jogo"]["golsTime1"] ?> x <?php echo $jogo["Jogo"]["golsTime2"] ?>
						<?php }?>
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