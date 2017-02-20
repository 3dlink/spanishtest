 	<!--Form Open-->
      <article class="card shadow-1">
        <?php echo $this->Form->create('User', array('action' => 'addUser')); ?>
<?php $userito = $this->Session->read('UserAuth'); ?>
          <fieldset>
            <legend>Agregar Participante</legend>
            <div class="margenesHorizontales">
            <div>
					    <div class="col-md-4">
          		  <div class="form-group">
						      <label>Correo Electrónico</label>
		                 <?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control","placeholder"=>"Correo Electrónico" ))?>
					      </div>
          		</div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label>Nombre</label>
                      <?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control","placeholder"=>"Nombre" ))?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Apellido</label>
                      <?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"form-control","placeholder"=>"Apellido" ))?>
                  </div>
                </div>
                <div style="clear:both;"></div>
              </div> 


        				<div class="margenesVerticales" style="text-align:right;">
        					<input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'allUsers';" title="regresar" value = "Atr&aacute;s" style="width: 79px;">
        					<button class="btn btn-primary">
        						Guardar
        					</button>
        				</div>
			     </div>          
          </fieldset>          
        <?php echo $this->Form->end(); ?>
      </article>
	<!--Form Close-->
   