
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

			<?php if($user['User']['done']){ ?>
				<p style="text-align:justify;">Ya usted presentó la prueba, comuníquese con su profesor para que le sea reasignada la prueba.</p>
			<?php }else{ ?>
				<p style="text-align:justify;">Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba.</p>
				<br>
				<p style="text-align:justify;">Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba.</p>
				<br>
				<p style="text-align:justify;">Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba. Aquí debería haber una descripción de la prueba.</p>
			<?php } ?>


			<?php if(!$user['User']['done']){ ?>
				<button id="next_btn" type="submit" onclick="if(confirm('Seguro que desea iniciar la prueba?'))window.location.href = WEBROOT+'test';" class="btn btn-primary">Hacer Prueba</button>
 			<?php } ?>
		</section>	


	</div>
	<div class="col-md-3">
		<div id="ficha">
			<h5><b>Participante: </b><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></h5>
			<h5><b>Correo: </b><?php echo $user['User']['email'];?></h5>
			<h5><b>Nivel actual: </b><?php echo $user['User']['actual_level'];?></h5>
		</div>
	</div>
</div>