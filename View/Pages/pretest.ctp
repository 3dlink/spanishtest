
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
				<p style="text-align:justify;">
					Usted no puede tomar este examen ya que fue presentado anteriormente, favor dirijase al administrador para ser autorizado.
					<br><br>
					因您之前已经参与过测试因此系统拒接您的再次参与，请与管理员联系重新取得授权
				</p>
			<?php }else{ ?>
				<p style="text-align:justify;">
					Este examen objetivo esta dividido en dos grandes secciones, lectura y audio.
					<br> <br>
					La duracion total del examen es de 1 hora 45 minutos, todas las preguntas se responden por seleccion, El numero de niveles es de 8., pudiendo el participante iniciar en cualquiera de los niveles que considere el suyo.
				</p>
				<br> <br>
				<p style="text-align:justify;">
					测试主要分成两部分：阅读和听力。
					<br> <br>
					测试时间是1小时45分钟，考题均为选择题，共有8个级别，考生可在任何认为可以的阶段开始进行测试。
				</p>
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