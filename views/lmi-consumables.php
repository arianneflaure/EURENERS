<?php
	@session_start();
	$menu = new consumibles();	
	$menus = $menu->getAllRecords();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Consumables</h2>
					<span onclick="window.location='?view=mi-consumables'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Nombre</th>
								<th>Unidad</th>
								<th>F.E CO<sub>2</sub></th>
								<th>Categoria</th>
								<th>Fuente</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo $m->nombre; ?></a></td>
								<td><?php echo $m->unidad; ?></td>
								<td><a href="#"><?php echo $m->emision_co2; ?></a></td>
								<td><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></td>
								<td><?php echo $m->fuente; ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=mi-consumables&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteConsumable('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/consumable.js"></script>
<script type="text/javascript">

</script>