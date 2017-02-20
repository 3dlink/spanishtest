<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="logo">
  <img src="<?php echo $this->webroot; ?>img/logo.png">
</div>

<article class="card shadow-1 login">
 <fieldset>
    <legend>Iniciar Sesión</legend>
    <?php echo $this->Form->create('User', array('action' => 'login', 'id' => 'login')); ?>
      <div class="margenesHorizontales">
        <div class="form-group">
          <label>Correo Electrónico</label>
          <?php echo $this->Form->input("email" ,array('type'=> 'text', 'label' => false,'div'=>false, 'class' => 'form-control', 'placeholder' => "Correo Electrónico"))?>
        </div>
        <div class="form-group">
          <label>Contraseña</label>
          <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div'=>false,'class'=>"form-control", 'placeholder' => "Contraseña" ))?>
        </div>
        <!-- <div class="form-group">
          <a href="<?php echo $this->webroot.'forgotPassword';?>">Forgot my password</a>
        </div> -->
      </div>
      <div class="form-group" style="float:left;width:100%;">
        <div class="g-recaptcha" id="captcha" data-callback="correctCaptcha" data-sitekey="6LdSwBMUAAAAAH4Rt9kv_-S6lxj-abP4s8j3YzR5"></div>
      </div>
      <hr>
      <div class="margenesHorizontales margenesVerticales" style="text-align:right;">
        <button type="submit" class="btn btn-primary">
          Entrar
        </button>
      </div>
    <?php echo $this->Form->end();?>
  </fieldset>
</article>
<!--Login  Close-->
<style type="text/css">

  .g-recaptcha > div{
    margin: 0 auto;
  }

</style>

<script type="text/javascript">

  var captcha = 0;

  var correctCaptcha = function(response) {
    captcha = 1;
  };

  // $('#login').submit(function() {
  //   if(captcha == 0){
  //     alert('Debe aprobar el Captcha. Inténtelo nuevamente.');
  //     return false;
  //   }
  // });

</script>

