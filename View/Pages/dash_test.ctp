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

	.description-text{
		color: #006cb8;
    font-size: 22px;
    margin-top: 40px;
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

<h1>Bienvenido a su examen de ubicación de nivel del idioma Español</h1>
<h1 style="margin-top:0;">欢迎进入您的西班牙语水平测试</h1>

<p class="description-text">
	Para familiarizarse con el examen, puede tomar la prueba modelo sin valor.
<br>
	为了可以了解考试，考生可先选择模拟考试而不会计分
</p>