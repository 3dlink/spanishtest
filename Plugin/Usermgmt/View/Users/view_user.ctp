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
#reasign{
  float: right;
}
</style>
<article class="card shadow-1">
  <fieldset>
      <legend id="title">Participante<input id="reasign" type = "button" class="btn btn-primary" onclick="reasignar();" title="regresar" value = "Reasignar"></legend>
      
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
      	<?php foreach ($statics as $key => $value): ?>
          <legend>Nivel <?php echo $value['level']; ?></legend>
          <div>
            <div class="col-md-4">
              <div class="form-group">
                <label>RESULTADO:</label>
                <?php echo h($value['percent']).'%'?>
              </div>
            </div> 
            <div class="col-md-4">
              <div class="form-group">
                <label>Comprensión Lectora:</label>
                <?php echo $value['lectora'].'/'.$value['total_lectora']?>
              </div>
            </div>  
            <div class="col-md-4">
              <div class="form-group">
                <label>Comprensión Auditiva:</label>
                <?php echo $value['auditiva'].'/'.$value['total_auditiva']?>
              </div>
            </div> 
          </div>
      	<?php endforeach ?>
      	
    		<div class="margenesVerticales" style="text-align:right;">
          <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'allUsers';" title="regresar" value = "Atrás" style="width: 79px;">
			  </div>
      </div>     
    </fieldset>  
</article>


<script type="text/javascript">

function reasignar(){
  var nombre='<?php echo $user["User"]["first_name"]; ?>?';
  var id='<?php echo $user["User"]["id"]; ?>?';
  if (confirm('¿Seguro que desea asignarle la prueba a '+nombre+'?')) {
    window.location.href = WEBROOT+'usermgmt/users/reasign/'+id;
  } 
  return false;
}


</script>