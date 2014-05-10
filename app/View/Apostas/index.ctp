<html>
<head><title></title>
</head>
<body>	
	Lista as jogos para aposta.<br>

	<?php echo $this->Session->flash(); ?>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Data</th>
	            <th>Aposta</th>
	            <th></th>
	        </tr>
	        <?php
	        foreach ($jogos as $jogo):
	            ?>
	            <tr> 
	            <form action="<?php echo $this->webroot.'apostas/apostar'?>" method="POST">
	            	<td><?php echo date("d/m/Y", strtotime($jogo["Jogo"]["dataJogo"])); ?></td>
	            	<td><?php echo $jogo["Equipe"][0]["nome"] ?><input type="text"> x <input type="text"> <?php echo $jogo["Equipe"][1]["nome"] ?></td>             
	                <td style="width: 35px;">
	                <?php echo $this->Form->postLink('Apostar', array('action' => 'apostar', $jogo["Jogo"]["id"]),array('class' =>'btapostar','title'=>'Editar')); ?>
	                </td>
	             </form>
	            </tr>

	            <?php
	        endforeach;
	        ?>
	    </table>
</body>
<script type="text/javascript">
	 $('.btapostar').click(function(){
                    var login = $('.valid_user').val();
                    if(login==''){
                        $('#retornoMensagemLoginSucesso').remove();                       
                    }
                    $.ajax({
                    dataType: "html",
                    type: "POST",
                    evalScripts: true,
                    url: '<?php echo Router::url(array('controller'=>'apostas','action'=>'apostar'));?>',
                    data: "login="+login,
                    success: function (data){                        
                        if(data == 1){
                                $("#retornoMensagemLoginSucesso").fadeOut(25000);
                        }else{
                                $("#check_user_icon_invalid").fadeOut(25000);
                        }
                     }
                });
              });
</script>
</html>