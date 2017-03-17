<style type="text/css">
.filtros{
  padding: 5px;
}
</style>

<div class="Tipos index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Preguntas</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-8">
                <div class=" margenesVerticales">
	              	<form class="right" role="search" method="get">
	                 <div class="input-group row">
                    <div class="col-md-4 filtros">
	                    <input type="text" class="form-control" placeholder="Buscar pregunta..." name="question" value="<?php echo $question; ?>">
                    </div>
                    <div class="col-md-4 filtros">
                      <select class="form-control" name="level">
                        <option <?php if($level==''){ ?> selected <?php } ?> value="">Nivel</option>
                        <option <?php if($level=="1"){ ?> selected <?php } ?> value="1">1</option>
                        <option <?php if($level=="2"){ ?> selected <?php } ?> value="2">2</option>
                        <option <?php if($level=="3"){ ?> selected <?php } ?> value="3">3</option>
                        <option <?php if($level=="4"){ ?> selected <?php } ?> value="4">4</option>
                        <option <?php if($level=="5"){ ?> selected <?php } ?> value="5">5</option>
                        <option <?php if($level=="6"){ ?> selected <?php } ?> value="6">6</option>
                        <option <?php if($level=="7"){ ?> selected <?php } ?> value="7">7</option>
                        <option <?php if($level=="8"){ ?> selected <?php } ?> value="8">8</option>
                      </select>
                    </div>
                    <div class="col-md-4 filtros">
                      <select class="form-control" name="type">
                        <option <?php if($type==''){ ?> selected <?php } ?> value="">Tipo de Pregunta</option>
                        <option <?php if($type==1){ ?> selected <?php } ?> value="1">Comprensión Lectora</option>
                        <option <?php if($type==2){ ?> selected <?php } ?> value="2">Comprensión Auditiva</option>
                      </select>
                    </div>
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" alt="Buscar" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	                    </span>
                      <span class="input-group-btn">
                        <div class="btn btn-default" id="todos"><span class="glyphicon glyphicon-align-justify"></span></div>
                      </span>
	                  </div>  
									</form>            
                </div>
              </div>
              <div class="col-md-4">
                <div class=" margenesVerticales" style="text-align: right;">
                  <buttom onclick="window.location.href=WEBROOT+'questions/add';" class="btn btn-primary">Agregar</buttom>
                </div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Nombre</th>
                  <th>Nivel</th>
                  <th>Tipo</th>
                  <th></th>
                </th>

                <?php foreach ($questions as $item): ?>
					         <tr>
	                    <td style="width: 500px;"><?php echo h($item['Question']['question']); ?>&nbsp;</td>
                      <td><?php echo h($item['Question']['level_3d']); ?>&nbsp;</td>
                      <td><?php echo h($item['Type']['name']); ?>&nbsp;</td>
		                <td>
		                     <div style="display: block; width: 60px; margin: 0 auto;">
  	                      <a href="<?php echo $this->webroot;?>questions/edit/<?php echo $item['Question']['id'];?>" title="Editar pregunta" class="menuTable">
  	                        <span class="glyphicon glyphicon-pencil"></span>
  	                      </a>
  	                      <a href="<?php echo $this->webroot;?>questions/delete/<?php echo $item['Question']['id'];?>" onclick="if (confirm(&quot;¿Seguro que desea borrar la pregunta?&quot;)) { return true; } return false;" class="menuTable">
  	                        <span class="glyphicon glyphicon-remove"></span></a>
	                      <a href="<?php echo $this->webroot;?>questions/view/<?php echo $item['Question']['id'];?>" title="Ver pregunta" class="menuTable">
	                        <span class="glyphicon glyphicon-eye-open"></span>
	                      </a>
		                    </div>               
		                </td>
					       </tr>
								<?php endforeach; ?>
              </table>
            </div> 
          </fieldset>          
      </article>
<p>
<?php echo $this->Paginator->counter(array('format' => __('Pagina {:page} de {:pages}, mostrando {:current} preguntas de {:count}.')));?>
</p>
 <ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
</ul> 

</div>	

<script type="text/javascript">

$('#todos').click(function(event) {
  window.location.href=WEBROOT+'questions';
});

</script>