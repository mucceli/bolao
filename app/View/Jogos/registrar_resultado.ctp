<html>
<head><title></title>
</head>
<body>
	Registra resultado<br>

	<?php echo $this->Session->flash(); ?>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Data</th>
	            <th>Jogo</th>
	            <th></th>
	        </tr>
	        <?php
	        foreach ($jogos as $jogo):
	            ?>
	            <tr> 
	            	<form action="<?php echo $this->webroot.'jogos/salvar_resultado'?>" method="POST">
		            	<td><?php echo date("d/m/Y", strtotime($jogo["Jogo"]["dataJogo"])); ?></td>
		            	<td><?php echo $jogo["Equipe"][0]["nome"] ?>
		            		<input name="data[Jogo][id]" class="inp-text" maxlength="2" type="hidden" value="<?php echo $jogo["Jogo"]["id"] ?>">
			            	<input name="data[Jogo][golsTime1]" class="inp-text" maxlength="2" type="text" value="<?php echo $jogo["Jogo"]["golsTime1"]?>">
			            	 x 
			            	<input name="data[Jogo][golsTime2]" class="inp-text" maxlength="255" type="text" value="<?php echo $jogo["Jogo"]["golsTime2"]?>"> <?php echo $jogo["Equipe"][1]["nome"] ?>            
		            	</td>             
		                <td style="width: 35px;">
		                	<input type="submit" class="bt bt-v btapostar" value="Salvar"/>
		                </td>
		            </form>
	            </tr>

	            <?php
	        endforeach;
	        ?>
	    </table>
<br>
</body>
</html>