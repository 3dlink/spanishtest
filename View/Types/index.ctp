<div class="Tipos index">
 <!--List  Open-->
      <article class="card shadow-1">
          <fieldset>
            <legend>Tipos de preguntas</legend>
            <!--Search Open-->
            <div class="margenesHorizontales">
              <div class="col-md-12" style="padding:0;">
                <div class=" margenesVerticales">
	              	<form class="right" role="search" method="get">
	                 <div class="input-group">
	                     <input type="text" class="form-control" placeholder="Agregar tipo de pregunta" name="add" autofocus>
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
            <div class="margenesHorizontales">
              <table class="table table-striped">
                <tr>
                  <th>Nombre</th>
                  <th></th>
                </th>

                <?php foreach ($types as $item): ?>
					<tr>
	                    <td><?php echo h($item['Type']['name']); ?>&nbsp;</td>
		                <td>
		                    <div style="display: block; width: 80px; margin: 0 auto;">
	                        <?php if($this->UserAuth->getGroupId() == 1){ ?>
	  	                      <a href="<?php echo $this->webroot;?>types/delete/<?php echo $item['Type']['id'];?>" onclick="if (confirm(&quot;¿Seguro que desea borrar el tipo de pregunta?&quot;)) { return true; } return false;" class="menuTable">
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