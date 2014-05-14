<html>
<head><title></title>
</head>
<body>
<?php echo $this->Session->flash(); ?><br>
	<h1>Aposta de campeão e vice-campeão.</h1>
	<form id ="ApostaCampeaoForm" action="<?php echo $this->webroot.'apostas/salvar_aposta_finalistas'?>" method="POST">
	<?php echo $this->Form->input('User.idEquipeCampea',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe campeã', 'empty' => '-- Selecione uma seleção --')); ?>
	<?php echo $this->Form->input('User.idEquipeViceCampea',array('type'=>'select','options'=>$equipes, 'label'=>'Equipe vice-campeã', 'empty' => '-- Selecione uma seleção --')); ?>
	    
	    <div class="bt-right">
            <input type="submit" value="Cadastrar" class="bt bt-v"/>
	    </div>

	</form>

	Lista as jogos para aposta.<br>
	    <table class="table table-bordered table-striped table-hover">
	        <tr>
	            <th>Data</th>
	            <th>Aposta</th>
	            <th></th>
	        </tr>
	        <?php
	        foreach ($apostas as $aposta):
	            ?>
	            <tr> 
	            <form action="<?php echo $this->webroot.'apostas/apostar'?>" method="POST">
	            	<td>
	            	<?php echo date("d/m/Y", strtotime($aposta["Jogo"]["dataJogo"])); ?>
	            	<!--$jogo["Jogo"]["id"]-->
	            	</td>
	            	<td><?php echo $aposta["Jogo"]["Equipe"][0]["nome"] ?>
	            	<input name="data[Aposta][jogo_id]" class="inp-text" maxlength="255" type="hidden" value="<?php echo $aposta["Jogo"]["id"] ?>">
	            	<input name="data[Aposta][golsTime1]" class="inp-text" maxlength="255" type="text" 
	            	value="<?php echo $aposta["Aposta"]["golsTime1"]?>">
	            	 x 
	            	<input name="data[Aposta][golsTime2]" class="inp-text" maxlength="255" type="text"
	            	value="<?php echo $aposta["Aposta"]["golsTime2"]?>"> <?php echo $aposta["Jogo"]["Equipe"][1]["nome"] ?></td>             
	                <td style="width: 35px;">
	                <input type="submit" class="bt bt-v btapostar" value="$ Apostar"/>
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