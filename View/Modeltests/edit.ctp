
<style type="text/css">
  .input_respuestas{
  	margin-bottom: 30px;
  }

  #agregar_respuesta{
  	width: initial;
    float: right;
    margin-top: 10px;
  }

  .btn_remove{
  	float: left;
  }

  #audio_content{
  	display: block;
  }

  .oculto{
  	display: none !important;
  }

  .answer_input{
  	width:90%;
  	float:left;
  }

</style>

 <article class="card shadow-1">
<?php echo $this->Form->create('Modeltest',array('id'=>'form')); ?>
<?php	echo $this->Form->input('id');?>

    <fieldset>
      <legend>Agregar Pregunta</legend>
      <div class="margenesHorizontales">

				<div class="col-md-4">
	        <div class="form-group">
	          <label>Nivel</label>
	          <?php echo $this->Form->input('level_3d',array('div'=>false,'label'=>false,'class'=>'form-control','type'=>'select','placeholder'=>' ','options'=>array(1=>1,2=>2,3=>3,4=>4,5=>5,5=>5,7=>7,8=>8))); ?>
	        </div>
	      </div>

				<div class="col-md-4">
	        <div class="form-group">
	          <label>Tipo de Pregunta</label>
	          <?php echo $this->Form->input('type_id',array('id'=>'question_type','required' => true,'div'=>false,'label'=>false,'class'=>'form-control','type'=>'select','empty'=>'Seleccione el tipo')); ?>
	        </div>
				</div>

				<div class="col-md-4">
	        <div class="form-group">
	          <label>Categoría</label>
							<?php echo $this->Form->input("category_id" ,array('id'=>'cat','required' => true,'label' => false,'class'=>'form-control', 'type'=>'select', 'placeholder'=>'Categoria', 'options'=>$categories, 'div' => false,'empty'=>'Seleccione la categoría'))?>
	        </div>
				</div>

				<div class="col-md-12">
	        <div class="form-group">
	          <label>Pregunta</label>
	          <?php echo $this->Form->input('question',array('div'=>false,'label'=>false,'class'=>'form-control','type'=>'textarea')); ?>
	        </div>
	      </div>

				<div id="audio_content" class="col-md-12 oculto">
	        <div class="form-group">
	          <label>Audio nuevo (se reemplazará el actual)</label>

						<div class="col-md-12 dlink-dropzone">
			        <label>Archivo de audio</label>
			        <div  class="dropzone"  id ="drop-audio"  name="mainFileUploader">
		            <div  class="fallback">
		            	<input  name="file"  type="file" />
		            </div>
			        </div>
			      </div>
			      <div id="content_audio"></div>
	        </div>
	      </div>

	      <legend style="float:left;width:inherit;">Agregar Respuestas</legend>
	      <legend style="float:right;width:inherit;">Seleccionar Correcta</legend>
      	<div id="respuestas_content" class="margenesHorizontales">
	      <?php foreach ($this->request->data['Answertest'] as $key => $value) { ?>
		      <?php if($key<4){ ?>
						<div class="col-md-12 input_respuestas">
			        <div class="form-group">
			          <input name="data[Answer][<?php echo $key; ?>][answer]" value="<?php echo $value['answer'] ?>" required class="form-control answer_input" placeholder="Respuesta">
								<input value="<?php echo $key ?>" type="radio" style="float:right;" name="correct" <?php if($value['correct'] == true){?> checked="checked" <?php } ?>>
			        </div>
			      </div>
		      <?php }else{ ?>
		      <div id="answ_<?php echo $key ?>" class="col-md-12 input_respuestas">
						<div class="btn_remove">
            	<button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse(<?php echo $key ?>)" style="height: 34px;">
              	<span class="glyphicon glyphicon-remove"></span>
            	</button>
          	</div>
	        	<div class="form-group">
	          	<input name="data[Answer][<?php echo $key ?>][answer]" value="<?php echo $value['answer'] ?>" style="width:86.5%;float:left;" class="form-control" required placeholder="Respuesta">
							<input value="<?php echo $key ?>" type="radio" style="float:right;" name="correct" <?php if($value['correct'] == true){?> checked="checked" <?php } ?>>
	        	</div>
	      	</div>
		        	<?php } ?>
	      <?php } ?>
					
		    </div>

	      <legend style="float:left;">Agregar mas respuestas
					<span id="agregar_respuesta" class="input-group-btn">
	          <div class="btn btn-default" id="add_answ" style="background: green;color: white; height: 34px;"><span class="glyphicon glyphicon-plus"></span></div>
	        </span>
	      </legend>
	      

        <div class="margenesVerticales" style="float:right;margin:20px;
        ">
          <input type = "button" class="btn btn-primary" onclick="window.location.href = WEBROOT+'questions';" title="regresar" value = "Atr&aacute;s" style="width: 80px;">
          <button type="submit" class="btn btn-primary">
            Guardar
          </button>
        </div>
      </div>          
    </fieldset>  
</article>

<script type="text/javascript">
	$("#drop-audio").dropzone({ url: WEBROOT+"pages/upload/2", maxFilesize: 10, dictDefaultMessage: '<div class="col-xs-12 text-center" style="padding-bottom:20px"><img src="<?php echo $this->webroot; ?>img/file.png" alt="" /></div><p class="dropzone-add-message">Arrastre hasta aquí o <a  class="add-files">Examine de su PC</a></p>',maxFiles: 1, acceptedFiles: ".mp3",
		success:function(data){
			$('#content_audio').html('<input type="hidden" value='+data.xhr.response+' name="data[Modeltest][audio]">');
	  }
	});

	var id='<?php echo count($this->request->data["Answertest"])-1; ?>';


	$(document).ready(function() {
    typeId=$('#question_type').val();
  	if(typeId == 2){//comprension auditiva
  		$('#audio_content').removeClass('oculto');
  	}else{
  		$('#audio_content').addClass('oculto');
  	}
	});


	$('#agregar_respuesta').click(function(event) {
		id++;
		$('#respuestas_content').append(
			'<div id="answ_'+id+'" class="col-md-12 input_respuestas">'+
				'<div class="btn_remove">'+
            '<button title="Eliminar curso" class="btn btn-danger" type="button" onclick="removenewCourse('+id+')" style="height: 34px;">'+
              '<span class="glyphicon glyphicon-remove"></span>'+
            '</button>'+
          '</div>'+
        '<div class="form-group">'+
          '<input name="data[Answer]['+id+'][answer]" style="width:86.5%;float:left;" class="form-control" required placeholder="Respuesta">'+
					'<input value="'+id+'" type="radio" style="float:right;" name="correct">'+
        '</div>'+
      '</div>');
	});

	function removenewCourse(id){
		$('#answ_'+id).remove();
		id--;
	}

	$('#form').submit(function() {

   //  typeId=$('#question_type').val();
  	// if(typeId == 2){//comprension auditiva
  	// 	if ($('#content_audio').html()=='') {
			//  alert('Debe adjuntar un archivo de audio');
			//  return false;
  	// 	}
  	// }

    if(!$('input:radio[name=correct]').is(':checked')){
		 alert('Seleccione por favor la respuesta correcta');
		 return false;
		}
	});

	


	$('#question_type').change(function(event) {
    typeId=$('#question_type').val();
  	if(typeId == 2){//comprension auditiva
  		$('#audio_content').removeClass('oculto');
  	}else{
  		$('#audio_content').addClass('oculto');
  	}

    $.get(WEBROOT+'questions/getCategories/',{type_id:typeId},function(data){
    	$('#cat').html('');    
    	// console.log(data);
      if(Object.keys(data['categories']).length!=0){
        for(var x  in data['categories']){
          $('#cat').append('<option value="'+x+'">'+data['categories'][x]+'</option>');
        }
      }
    },'json');
	});


  $('.audio-content').ttwMusicPlayer([{mp3:'<?php echo $this->webroot."files/".$this->request->data["Modeltest"]["audio"]; ?>'}]);
</script>