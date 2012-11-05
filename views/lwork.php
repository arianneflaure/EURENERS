<?php
	@session_start();
	$menu = new labores();	
	$menus = $menu->getAllRecords();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Works</h2>
					<span onclick="window.location='?view=work'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th><input type="checkbox" name="check" class="checkall" /></th>
								<th width="138">Nombre</th>
								<th width="138">Energy</th>
								<th width="138">Fuente</th>
								<th width="138">Consumer</th>
								<th width="138">Unit</th>
								<th width="138">Performance</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?>
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($m->nombre); ?></a></td>
								<td><a ><?php echo utf8_encode($menu->getName($m->energia, 'energias')); ?></a></td>
								<td><?php echo $m->fuente; ?></td>
								<td><?php echo $m->consumo; ?></td>
								<td><a ><?php echo $m->unidad; ?></a></td>
								<td><?php echo $m->rendimiento; ?></td>
								
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=work&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteWork('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
								</td>
							</tr>
						<?php } ?> 
						</tbody> 
					</table>
					<button type="submit" class="red"><span>Delete</span></button>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/work.js"></script>
<script type="text/javascript">

</script>