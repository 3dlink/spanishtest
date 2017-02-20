<article class="card shadow-1">
  <fieldset>
      <legend>Pregunta Modelo</legend>
      <div class="margenesHorizontales">
      	<div>
      		<div class="col-md-4">
      			<div class="form-group">
							<label>Tipo:</label>
              <?php echo h($modeltest['Type']['name'])?>
						</div>
      		</div>
      		<div class="col-md-4">
      			<div class="form-group">
							<label>Categoría:</label>
              <?php echo h($modeltest['Category']['name'])?>
						</div>
      		</div>         	
      	</div>
      	<div>
      		<div class="col-md-12">
      			<div class="form-group">
							<label>Pregunta: </label>
              <p><?php echo nl2br($modeltest['Modeltest']['question'])?></p>
						</div>
      		</div>
      		<div style="clear:both;"></div>
      	</div>
        <?php if($modeltest['Type']['id']==2){ ?>
        	<div>
        		<div class="col-md-12">
        			<div class="form-group">
  							<label style="float:left;">Audio: </label>
                <div class="audio-content"></div>
  						</div>
        		</div>
        		<div style="clear:both;"></div>
        	</div>
        <?php } ?>
      	<div>
      		<div class="col-md-12">
      			<div class="form-group">
								<table class="table table-striped">
	                <tr>
	                  <th>Respuestas</th>
	                  <th>Correcta</th>
	                </th>

	                <?php foreach ($modeltest['Answertest'] as $item): ?>
									<tr>
		                <td><?php echo h($item['answer']); ?>&nbsp;</td>
		                <td><?php if($item['correct']) echo 'Si'; ?>&nbsp;</td>
									</tr>
									<?php endforeach; ?>
	              </table>



						</div>
      		</div>
      		<div style="clear:both;"></div>
      	</div>
      	
    		<div class="margenesVerticales" style="text-align:right;">
                <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'modeltests';" title="regresar" value = "Atrás" style="width: 79px;">
			  </div>
      </div>     
    </fieldset>  
</article>


<script type="text/javascript">
  $('.audio-content').ttwMusicPlayer([{mp3:'<?php echo $this->webroot."files/".$modeltest["Modeltest"]["audio"]; ?>'}]);
</script>