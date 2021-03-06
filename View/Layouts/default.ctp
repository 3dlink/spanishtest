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
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
  echo $this->Html->meta('icon');

    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('admin');
    echo $this->Html->css('dropzone');
    echo $this->Html->css('style');
    echo $this->Html->css('animate');
    echo $this->Html->css('bootstrap-datetimepicker.min');
    echo $this->Html->css('toast.min');

    echo $this->Html->script('jquery-2.2.0.min');
    echo $this->Html->script('jquery.countdown.min');
    echo $this->Html->script('jquery.jplayer.min');
    echo $this->Html->script('ttw-music-player-min');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('dropzone');
    echo $this->Html->script('moment.js');
    echo $this->Html->script('toast.min');

    
  echo $this->fetch('meta');
  echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    
<script type="text/javascript">WEBROOT='<?php echo $this->webroot; ?>';

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-full-width",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

</script>
  </head>
  <body>    
    <!--Header Open-->
    <header style="display: table;">
    </header>
    <!--Header Close-->
    <?php
      echo $this->element('menu');
    ?>
    
    <section class="container"> 
      <?php echo $this->Session->flash(); ?>  
    <?php echo $this->fetch('content'); ?>
    </section>
  </body>
</html>
