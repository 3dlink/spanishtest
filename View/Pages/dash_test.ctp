<style type="text/css">

	h1{
		color: #006cb8;
		text-align: center;
		font-weight: bold;
		margin-top: 70px;
	}

	p{
		text-align: center;
	}

	#ficha{
		border: 1px solid #006cb8;
		float: right;
		padding:10px;
	}

	.container{
		*position: relative;
	}

</style>

<?php $user=$this->UserAuth->getUser(); ?>

<div id="ficha">
	<h5><b>Participante: </b><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></h5>
	<h5><b>Correo: </b><?php echo $user['User']['email'];?></h5>
</div>
<div class="logo">
  <img src="<?php echo $this->webroot; ?>img/logo.png">
</div>

<h1>BIENVENIDOS</h1>
<p>Aquí debería haber una breve descripción de las pruebas (quizás en chino)</p>