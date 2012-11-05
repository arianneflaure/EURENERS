<?php
	@session_start();
	$menu = new empresa_consumibles();	
	$menus = $menu->getAllRecordsE();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Consumibles for enterprise</h2>
					<span onclick="window.location='?view=prod_consumables'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Consumible</th>
								<th>Vehiculo</th>
								<th>Distancia</th>
								<th>Unidad</th>
								<th width="180">Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="c<?php echo $m->consumible; ?>m<?php echo $m->maquinaria; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->consumible, 'consumibles')); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->maquinaria, 'maquinarias')); ?></a></td>
								<td><a href="#"><?php echo $m->distancia; ?></a></td>
								<td><a href="#"><?php echo $m->unidad; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=prod_consumables&consumible=<?php echo $m->consumible; ?>&maquinaria=<?php echo $m->maquinaria; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteCcons(<?php echo $m->consumible . ", ". $m->maquinaria; ?>)"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/prod-consumables.js"></script>