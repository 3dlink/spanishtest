<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
?>
<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
	<title>
		Spanish Test Admin
	</title>
    <?php 
      echo $this->Html->meta('icon');

      echo $this->Html->css('bootstrap.min');
      echo $this->Html->css('dropzone');
      echo $this->Html->css('hail');
      echo $this->Html->css('admin');
      echo $this->Html->css('bootstrap-datetimepicker.min');
      echo $this->Html->script('jquery-2.2.0.min');
      echo $this->Html->script('bootstrap.min');
      echo $this->Html->script('pekeUpload');
      echo $this->Html->script('moment.js');
      echo $this->Html->script('bootstrap-datetimepicker.min');
      echo $this->Html->script('dropzone');

      echo $this->fetch('meta');
      echo $this->fetch('css');
      echo $this->fetch('script');
    ?>
    
<script type="text/javascript">WEBROOT='<?php echo $this->webroot; ?>';</script>
  </head>
  <body>
    <section class="container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
    </section>
  <script type="text/javascript">
    $('.error_message').click(function(event) {
      $(this).css('display', 'none');
    });
    $('.success_message').click(function(event) {
      $(this).css('display', 'none');
    });
  </script>
  </body>
</html>