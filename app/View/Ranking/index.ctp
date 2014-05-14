<html>
<head><title></title>
</head>
<body>
Ranking
<br>
<br>
<?php echo $this->Session->flash(); ?>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Colocação</th>
	            <th>Nome</th>
	            <th>Pontos</th>
	        </tr>
	        <?php
	        $i =1;
	        foreach ($ranking as $key => $value):
	            ?>
						<tr> 
			            	<td>
			            		<?php echo $i ?>º
			            	</td>
	            			<td>
		                        <?php echo $key ?>
	                        </td>             
			                <td style="width: 35px;">
			                	<?php pr($value)?>
			                </td>
			            </tr>
	                <?php $i++;  ?>
	         <?php
	        endforeach; ?>
	    </table>
	    <br>
<form action="<?php echo $this->webroot.'ranking/atualizar_pontos'?>" method="POST">
		<input type="submit" class="bt bt-v btapostar" value="Atualizar Ranking"/>
</form> 
</body>
</html>