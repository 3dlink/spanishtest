<?php $user=$this->UserAuth->getUser(); ?>
<?php $user_group=$this->UserAuth->getGroupId(); ?>                                        
<div class="row">
	<input id="question_id" type="hidden" value="<?php echo $question['id']; ?>">
	<div class="col-md-3 tooltip_test">
		<div class="counter">
			<p><b>Pregunta:</b> <span id="counter">1</span>/<?php echo $count; ?></p>
		</div>
		<div class="type">
			<p><b>Tipo de Pregunta:</b></p>
			<p id="type_p"><?php echo $question['tipo']; ?></p>
		</div>
		<div class="type">
			<p><b>Categoría:</b></p>
			<p id="cat_p"><?php echo $question['categoria']; ?></p>
		</div>
	</div>
	<div class="col-md-6 pregunta-container" style="padding:0;">
		<div class="logo-prueba">
		  <img src="<?php echo $this->webroot; ?>img/logo.png">
		</div>

		<h1 class="h1-prueba">PRUEBA MODELO</h1>

		<section class="prueba animated">

				<p class="pregunta">
					<?php echo $question['pregunta']; ?>
					<div class="audio-content"></div>
				</p>

			<div class="respuestas">
				<?php foreach ($question['respuestas'] as $key => $value) { ?>
					<div class="respuesta">
						<input id="answercheck_<?php echo $key; ?>" value="<?php echo $value['id']; ?>" type="radio" style="float:left;" name="correct">
						<p id="answer_<?php echo $key; ?>"><?php echo $value['value']; ?></p>
					</div>
				<?php } ?>
			</div>

			<button id="next_btn" type="submit" onclick="next();" class="btn btn_next btn-primary">Siguiente</button>

		</section>	


	</div>
	<div class="col-md-3">
		<div id="ficha">
			<h5><b>Participante: </b><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></h5>
			<h5><b>Correo: </b><?php echo $user['User']['email'];?></h5>
		</div>
	</div>
</div>

<script type="text/javascript">
var type = '<?php echo $question["tipo_id"]; ?>';
if(type == 2){
  $('.audio-content').ttwMusicPlayer([{mp3:'<?php echo $this->webroot."files/".$question["audio"]; ?>'}]);
}
var q=0;
var quiz = new Object();
var total = '<?php echo $count; ?>';

$(document).ready(function() {
	$('.prueba').addClass('bounceInRight');
});

function next(){

	if(!$('input:radio[name=correct]').is(':checked')){
		toastr.error('Seleccione por favor la respuesta correcta');
	  return false;
	}else{
		$('.prueba').removeClass('bounceInRight');

		//guardo el resultado
		quiz[q] = {'question':$("#question_id").val(), 'answer':$("input:checked").val()};

		q++;
		var counter=q+1;


		//pido siguiente pregunta
		if(counter<=total){
			$.post(WEBROOT+'pages/nextQuestion',{question_id:q},function(data){
			  if(data){
			  	$('.pregunta').html(data['pregunta']);
					$('.prueba').addClass('bounceInRight');
			  	$('input[name="correct"]').prop('checked', false);
			  	$('#answer_0').html(data['respuestas'][0]['value']);
			  	$('#answer_1').html(data['respuestas'][1]['value']);
			  	$('#answer_2').html(data['respuestas'][2]['value']);
			  	$('#answer_3').html(data['respuestas'][3]['value']);
			  	$('#answercheck_0').val(data['respuestas'][0]['id']);
			  	$('#answercheck_1').val(data['respuestas'][1]['id']);
			  	$('#answercheck_2').val(data['respuestas'][2]['id']);
			  	$('#answercheck_3').val(data['respuestas'][3]['id']);
			  	$('#type_p').html(data['tipo']);
			  	$('#cat_p').html(data['categoria']);
			  	$('#counter').html(counter);
			  	$('#question_id').val(data['id']);
					if(data['tipo_id'] == 2){
						$('.audio-content').html('');
					  $('.audio-content').ttwMusicPlayer([{mp3:WEBROOT+'files/'+data['audio']}]);
					}else{
						$('.audio-content').html('');
					}
			  }
			},'json');
			if(counter==total){
				$('#next_btn').html('Terminar');
			}
		}else{
			//se envían los resultados
			$.post(WEBROOT+'pages/modelDone',{data:quiz},function(data){
			  if(data){
			  	window.location.href = WEBROOT+'doneTest/1';
			  }
			},'json');
		}
	}
}

</script>