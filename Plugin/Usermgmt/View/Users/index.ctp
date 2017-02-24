<!-- List  Open-->




      <article class="card shadow-1">
          <fieldset>
            <legend>Participantes registrados</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-6">
                <div class=" margenesVerticales">
                 <form class="right" role="search" method="get">
                 	<div class="input-group">
	                    <input type="text" class="form-control" placeholder="Buscar Participantes..." name="filtro">
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
	                    </span>
					</div>  
				</form>           
                </div>
              </div>
              <div class="col-md-6">
                <div class=" margenesVerticales" style="text-align: right;">
                  <a class="btn btn-primary" href="<?php echo $this->webroot.'addUser';?>">Agregar Participante</a>
                </div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <!--Search Close-->
            <div class="margenesHorizontales">
              <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Correo Electrónico</th>
                  <th>Nombre y Apellido</th>
                  <th>Prueba Asignada</th>
                  <th>Vencido</th>
                  <th>Veces</th>
                  <th>Nivel obtenido</th>
                  <th></th>
                </th>
                <?php foreach ($users as $row): ?>
	                <tr>
	                  <td><?php echo $row['User']['email']; ?></td>
	                  <td><?php echo $row['User']['first_name'].' '.$row['User']['last_name']; ?></td>
                    <td><?php if($row['User']['asigned']){echo 'Si';}else{echo 'No';} ?></td>
                    <td><?php if($row['User']['expired']){echo 'Si';}else{echo 'No';} ?></td>
                    <td><?php echo $row['User']['presents']; ?></td>
                    <td><?php if($row['User']['done']){echo $row['User']['actual_level'];}else{echo 'N/A';} ?></td>
	                  <td>
	                    <div style="display: block; width: 80px; margin: 0 auto;">
	                      <a href="<?php echo $this->webroot.'editUser/'.$row['User']['id'];?>" class="menuTable" title="Editar participante">
	                        <span class="glyphicon glyphicon-pencil"></span>
	                      </a>
	                      <?php if ($row['User']['active']==0): ?>
		                      <a href="<?php echo $this->webroot.'usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/1';?>" class="menuTable" title="Activar participante">
		                        <span class="glyphicon glyphicon-ok"></span>
		                      </a>
	                      <?php else: ?>
		                      <a href="<?php echo $this->webroot.'usermgmt/users/makeActiveInactive/'.$row['User']['id'].'/0';?>" class="menuTable" title="Desactivar participante">
		                        <span class="glyphicon glyphicon-remove"></span>
		                      </a>
	                      <?php endif;?>
                        <?php if ($row['User']['done']==1): ?>
	                      <a href="<?php echo $this->webroot.'viewUser/'.$row['User']['id'];?>" class="menuTable" title="Ver resultados">
	                        <span class="glyphicon glyphicon-eye-open"></span>
	                      </a>
                        <?php else: ?>
                        <?php if($row['User']['presents']==0 && (!$row['User']['asigned'])){ ?>
                        <a href="<?php echo $this->webroot.'usermgmt/users/asign/'.$row['User']['id'];?>" onclick="if (confirm(&quot;¿Seguro que desea asignarle la prueba a <?php echo $row['User']['first_name']; ?>?&quot;)) { return true; } return false;" class="menuTable" title="Activar prueba">
                          <span class="glyphicon glyphicon-share-alt"></span>
                        </a>
                        <?php } ?>
                        <?php endif;?>
	                    </div>                  
	                  </td>
	                </tr>
                <?php endforeach; ?>
              </table>
              </div>
            </div> 
          </fieldset>          
      </article>
<!--List  Close