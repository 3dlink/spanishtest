<style type="text/css">
.answers{
  min-height: 40px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
.pregunta{
  float: left;
  width: 100%;
  margin-bottom: 40px;
  padding-bottom: 20px;
  border-bottom: 1px #ccc solid;
}
</style>

<article class="card shadow-1">
  <fieldset>
      <legend>Participante</legend>
      <div class="margenesHorizontales">
      	<div>
      		<div class="col-md-4">
      			<div class="form-group">
							<label>Nombre:</label>
              <?php echo h($user['User']['first_name']).' '.h($user['User']['last_name'])?>
						</div>
      		</div>
      		<div class="col-md-4">
      			<div class="form-group">
							<label>Email:</label>
              <?php echo  h($user['User']['email'])?>
						</div>
      		</div>
          <div class="col-md-4">
            <div class="form-group">
              <label>NIVEL:</label>
              <?php echo  h($user['User']['actual_level'])?>
            </div>
          </div>         	
      	</div>
      	<legend>RESULTADOS DE LA PRUEBA</legend>
        <?php $k=0; ?>
      	<?php foreach ($results as $key => $value): ?>
          <legend>Nivel <?php echo $key; ?>   -  (<?php echo $percent[$k]; ?>%)</legend>
          <?php foreach ($value as $key => $value) { ?>
          <div class="pregunta">
            <div>
              <div class="col-md-4">
                <div class="form-group">
                <label>Pregunta número:</label>
                  <?php echo $key+1;?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label>Tipo:</label>
                  <?php echo $value['type'];?>
                </div>
              </div> 
              <div class="col-md-4">
                <div class="form-group">
                <label>Categoría:</label>
                  <?php echo $value['category'];?>
                </div>
              </div>          
            </div>
            <div>
              <div class="col-md-12">
                <div class="form-group">
                <label>Pregunta:</label>
                  <p style="text-align:justify;"><?php echo $value['question'];?></p>
                </div>
              </div>
            </div>
            <?php if(!is_null($value['audio'])){ ?>
              <div>
                <div class="col-md-12">
                  <div class="form-group">
                  <label>Audio:</label>
                    <p style="text-align:justify;"><?php echo $value['audio'];?></p>
                  </div>
                </div>
              </div>
            <?php } ?>

            <div>
              <div class="col-md-12">
                <div class="form-group">
                    <label style="float:left;">Respuestas: </label>
                </div>
              </div>
            </div>

            <div>
              <div class="col-md-6">
                <div class="form-group">
                  <p style="text-align:justify;" class="<?php if($value['answers'][0]['selected'] && $value['answers'][0]['correct']){echo 'bg-success';} if($value['answers'][0]['selected'] && !$value['answers'][0]['correct']){echo 'bg-danger';} if(!$value['answers'][0]['selected'] && $value['answers'][0]['correct']){echo 'bg-success';}?> answers"><?php echo $value['answers'][0]['answer'];?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <p style="text-align:justify;" class="<?php if($value['answers'][1]['selected'] && $value['answers'][1]['correct']){echo 'bg-success';} if($value['answers'][1]['selected'] && !$value['answers'][1]['correct']){echo 'bg-danger';} if(!$value['answers'][1]['selected'] && $value['answers'][1]['correct']){echo 'bg-success';}?> answers"><?php echo $value['answers'][1]['answer'];?></p>
                </div>
              </div>
            </div>
            <div>
              <div class="col-md-6">
                <div class="form-group">
                  <p style="text-align:justify;" class="<?php if($value['answers'][2]['selected'] && $value['answers'][2]['correct']){echo 'bg-success';} if($value['answers'][2]['selected'] && !$value['answers'][2]['correct']){echo 'bg-danger';} if(!$value['answers'][2]['selected'] && $value['answers'][2]['correct']){echo 'bg-success';}?> answers"><?php echo $value['answers'][2]['answer'];?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <p style="text-align:justify;" class="<?php if($value['answers'][3]['selected'] && $value['answers'][3]['correct']){echo 'bg-success';} if($value['answers'][3]['selected'] && !$value['answers'][3]['correct']){echo 'bg-danger';} if(!$value['answers'][3]['selected'] && $value['answers'][3]['correct']){echo 'bg-success';}?> answers"><?php echo $value['answers'][3]['answer'];?></p>
                </div>
              </div>
            </div>
            </div>
          <?php } ?>
          <?php $k++; ?>
      	<?php endforeach ?>
      	
    		<div class="margenesVerticales" style="text-align:right;">
                <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'questions';" title="regresar" value = "Atrás" style="width: 79px;">
			  </div>
      </div>     
    </fieldset>  
</article>


