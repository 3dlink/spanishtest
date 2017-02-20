<style type="text/css">

.input_add{    
	margin: 0 5%;
	width: 40% !important;
	height: 35px;
}

</style>

<div class="Tipos index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Agregar categorías</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-12" style="padding:0;">
                <div class=" margenesVerticales">
	              	<form class="right" role="search" method="get">
	                 <div class="input-group">
	                     <input type="text" class="col-md-6 input_add" placeholder="Nombre de la categoría" name="add" autofocus>
	                     <?php echo $this->Form->input('type',array('div'=>false,'label'=>false,'class'=>'col-md-6 input_add','name'=>'type','placeholder'=>'Tipo','options'=>$types, 'required'=>true)); ?>
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" type="submit" style="background: green;color: white;"><span class="glyphicon glyphicon-plus"></span></button>
	                    </span> 
	                  </div>  
									</form>            
                </div>
              </div>
              <div style="clear:both;"></div>
            </div>
            <!--Search Close-->
            <legend>Categorías</legend>
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th></th>
                </th>

                <?php foreach ($categories as $item): ?>
					<tr>
	                    <td><?php echo h($item['Category']['name']); ?>&nbsp;</td>
	                    <td><?php echo h($item['Type']['name']); ?>&nbsp;</td>
		                <td>
		                    <div style="display: block; width: 80px; margin: 0 auto;">
	                        <?php if($this->UserAuth->getGroupId() == 1){ ?>
	  	                      <a href="<?php echo $this->webroot;?>categories/delete/<?php echo $item['Category']['id'];?>" onclick="if (confirm(&quot;¿Seguro que desea borrar el tipo de pregunta?&quot;)) { return true; } return false;" class="menuTable">
	  	                        <span class="glyphicon glyphicon-remove"></span></a>
	                        <?php } ?>
		                    </div>                  
		                </td>
					</tr>
								<?php endforeach; ?>
              </table>
            </div> 
          </fieldset>          
      </article>
<p>
<?php //echo $this->Paginator->counter(array('format' => __('Page {:page} from {:pages}, showing {:current} Tipos from {:count}.')));?>
</p>
<!-- <ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
</ul> -->

</div>	