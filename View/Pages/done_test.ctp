<style type="text/css">
#next_btn{
	display: block;
	margin: 40px auto;
}
h1{
	font-size: 30px;
}
</style>                     
<div class="row">
	<div class="col-md-3 tooltip_test">
	</div>
	<div class="col-md-6 pregunta-container" style="padding:0;">
		<div class="logo-prueba">
		  <img src="<?php echo $this->webroot; ?>img/logo.png">
		</div>

		<h1 class="h1-prueba">FELICITACIONES, HAS CULMINADO LA <?php echo $title; ?></h1>

		<section class="prueba">
			<p style="text-align:justify;"><?php echo $description; ?></p>
			<br><br>
			<p style="text-align:justify;"><?php echo $description_chino; ?></p>
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