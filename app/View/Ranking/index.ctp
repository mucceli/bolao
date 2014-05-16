<h1>Ranking</h1>
<?php echo $this->Session->flash(); ?>
<ul class="rk">	    
 <?php
$count =1;
foreach ($ranking as $key => $value):
    if($count==1):?>
    <li class="rk-one"><i>1</i><?php echo $key ?> <small>- <?php echo $value?> pontos</small></li>
<?php elseif($count==2):?>
    <li class="rk-two"><i>2</i><?php echo $key ?> <small>- <?php echo $value?> pontos</small></li>
<?php else:?>
    <li><?php echo $count ?>º <?php echo $key ?> - <?php echo $value?> pontos</li>
<?php endif;?>


<?php $count++;  ?>
 <?php
endforeach; ?>
</ul>
    <?php if($usuariologado && $userAdmin){?>
		<form action="<?php echo $this->webroot.'ranking/atualizar_pontos'?>" method="POST">
			<input type="submit" class="bt bt-v btapostar" value="Atualizar Ranking"/>
		</form> 
	<?php }?>
</body>
</html>