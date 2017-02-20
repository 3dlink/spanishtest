<?php $user=$this->UserAuth->getUser(); ?>
<?php $user_group=$this->UserAuth->getGroupId(); ?>   
<style type="text/css">
#next_btn{
	display: block;
	margin: 40px auto;
}
</style>                     
<div class="row">
	<div class="col-md-3 tooltip_test">
	</div>
	<div class="col-md-6 pregunta-container" style="padding:0;">
		<div class="logo-prueba">
		  <img src="<?php echo $this->webroot; ?>img/logo.png">
		</div>

		<h1 class="h1-prueba">PRUEBA DE ESPAÑOL</h1>

		<section class="prueba">

			<p style="text-align:justify;">Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba.</p>
			<br>
			<p style="text-align:justify;">Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba.</p>
			<br>
			<p style="text-align:justify;">Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba.</p>


			<button id="next_btn" type="submit" onclick="window.location.href = WEBROOT+'test';" class="btn btn-primary">Hacer Prueba</button>
 
		</section>	


	</div>
	<div class="col-md-3">
		<div id="ficha">
			<h5><b>Participante: </b><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></h5>
			<h5><b>Correo: </b><?php echo $user['User']['email'];?></h5>
		</div>
	</div>
</div>