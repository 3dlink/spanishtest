<?php $user=$this->UserAuth->getUser(); ?>
<?php $user_group=$this->UserAuth->getGroupId(); ?>

<style type="text/css">
.logo-prueba{
	margin-bottom: 100px;
}
.prueba_{
	margin: 0 auto;
	    margin-top: 200px;
}
#levels{
	float: left;
	width: 100%;
	height: 30px;
	border-radius: 10px;
	margin-top: 25px;
	border: solid 1px black;
}
.level{
	float: left;
	width: 12.5%;
	color: black;
	text-align: center;
	height: 30px;
	border: 1px solid black;
	position: relative;
}

.active:hover{
	box-shadow: 0px 0px 10px 3px #006cb8;
	cursor: pointer;
}

.level_active{
	box-shadow: 0px 0px 10px 3px #006cb8;
}

.first_level{
	border-left: none;
	border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
}
.last_level{
	border-right: none;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
}
.progreso{
	float: left;
	background-color:#5bbf5b;
	height: 27px;
}

.pase{
	background: #5bbf5b;
	z-index: -1;
}

.no-active{
	background: #cccccc;
	z-index: -1;
}

.num{
	position: absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	font-size: 20px;
}
.tooltip_test_ p{
	text-align: left;
}

.level_num{
	    font-size: 30px;
    color: #006cb8;
    font-weight: bold;
}

.class_name{
	width: 35%;
}
</style>

<div class="row">
	<input id="question_id" type="hidden" value="<?php echo $question['id']; ?>">
	<div class="col-md-3 tooltip_test_">
		<div class="logo-prueba">
		  <img src="<?php echo $this->webroot; ?>img/logo.png">
		</div>
		<div class="counter level_num">
			<p><b>Nivel:</b> <span id="level_num">1</span></p>
		</div>
		<div class="counter">
			<p><b>Pregunta:</b> <span id="counter">1</span>/<span id="total"><?php echo $count; ?></span></p>
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
		<div id="levels">
			<div id="level_1" class="first_level level active level_active">
				<div class="progreso first_level"></div>  
				<div class="num">1</div>
			</div>
			<div id="level_2" class="level active">
				<div class="progreso"></div>  
				<div class="num">2</div>
			</div>
			<div id="level_3" class="level active">
				<div class="progreso"></div>  
				<div class="num">3</div>
			</div>
			<div id="level_4" class="level active">
				<div class="progreso"></div>  
				<div class="num">4</div>
			</div>
			<div id="level_5" class="level active">
				<div class="progreso"></div>  
				<div class="num">5</div>
			</div>
			<div id="level_6" class="level active">
				<div class="progreso"></div>  
				<div class="num">6</div>
			</div>
			<div id="level_7" class="level active">
				<div class="progreso"></div>  
				<div class="num">7</div>
			</div>
			<div id="level_8" class="last_level level active">
				<div class="progreso last_level"></div>  
				<div class="num">8</div>
			</div>
		</div>

		<section class="prueba_ animated">

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
var current_level = 1;

$(document).ready(function() {
	$('.prueba_').addClass('bounceInRight');
});

$('.active').click(function(event) {
	if (confirm('¿Seguro que desea ir a este nivel?')) {
		var leveltodo=$(this).prop('id');
		var res = leveltodo.split("_");
		current_level = res[1];
		nexQuestion(0,current_level);
		counter = 1;

  	for (var i = 1; i <= 8; i++) {
  		$('#level_'+i).removeClass('level_active');
  	};

  	$('#level_'+current_level).addClass('level_active');
	}
});

function next(){

	if(!$('input:radio[name=correct]').is(':checked')){
	  alert('Seleccione por favor la respuesta correcta');
	  return false;
	}else{
		$('.prueba_').removeClass('bounceInRight');

		//guardo el resultado
		quiz[q] = {'question':$("#question_id").val(), 'answer':$("input:checked").val()};

		q++;
		var counter=q+1;
		var percent;

		//pido siguiente pregunta
		if(current_level<=8){

			if(counter>total){//pasé de nivel
				//verificar si pasó o no de nivel
				if(current_level==8){ //terminó la prueba
					$.post(WEBROOT+'pages/testDone',{data:quiz},function(data){
					  if(data){
					  	alert('Felicitaciones. Ha culminado la Prueba Final');
					  	var user_group = '<?php echo $user_group; ?>';
					  	if(user_group == 3){
					  		window.location.href = WEBROOT+'dashTest';
					  	}else{
					  		window.location.href = WEBROOT+'dashboard';
					  	}
					  }
					},'json');

				}else{

					$.post(WEBROOT+'pages/nextLevel',{data:quiz},function(data){
					  if(data){
							alert('Felicitaciones, ha pasado de nivel');
					  	$('#level_'+current_level+' > .progreso').width('100%');
					  	$('#level_'+current_level).removeClass('level_active');
					  	$('#level_'+current_level).removeClass('active');
				  		$('#level_'+current_level).addClass('pase');
							q=0;
					    counter=q+1;
							current_level++;
					  	$('#level_'+current_level).addClass('level_active');
				  		$('#level_'+current_level).removeClass('no-active');
				  		$('#level_'+current_level).addClass('active');

					  	nexQuestion(q,current_level);

					  }else{
					  	//no pasaste
					  	proximo = parseInt(current_level);
					  	for (var i = proximo; i <= 8; i++) {
					  		$('#level_'+i).removeClass('active');
					  		$('#level_'+i).addClass('no-active');
					  	};
							$('#level_'+current_level+' > .progreso').width('100%');
							$('#level_'+current_level+' > .progreso').css('background', '#d83030');
					  	alert('no pasaste');
					  	return;
					  }
					},'json');
				}
			}else{
				nexQuestion(q,current_level);
				if(counter==total && current_level==8){
					$('#next_btn').html('Terminar');
				}
			}
		}
	}
}

function nexQuestion(id,curr){
	q = id;
	current_level = curr;
	$.post(WEBROOT+'pages/nextQuestionTest',{data:{id:q,level:(parseInt(current_level)-1)}},function(data){
	  if(data){
	  	$('.pregunta').html(data['pregunta']);
			$('.prueba_').addClass('bounceInRight');
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
	  	$('#level_num').html(data['nivel']);
	  	current_level = data['nivel'];
	  	total = data['total'];
	  	$('#counter').html(counter);
	  	$('#total').html(data['total']);
	  	$('#question_id').val(data['id']);

	  	percent=(counter-1)*100/total;

	  	$('#level_'+data['nivel']+' > .progreso').width(percent+'%');

			if(data['tipo_id'] == 2){
				$('.audio-content').html('');
			  $('.audio-content').ttwMusicPlayer([{mp3:WEBROOT+'files/'+data['audio']}]);
			}else{
				$('.audio-content').html('');
			}
	  }
	},'json');
}

</script>