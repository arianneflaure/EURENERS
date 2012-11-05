<?php
	@session_start();
	$menu = new empresa_distribucion_unidad_funcional();	
	$menus = $menu->getAllRecordsE();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Distributiona</h2>
					<span onclick="window.location='?view=distribution'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Product</th>
								<th>Vehiculo</th>
								<th>Recorrido</th>
								<th>Receptor</th>
								<th>Distancia</th>
								<th>Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?>
							<tr id="<?php echo $m->producto_final . '-' . $m->maquinaria; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo $menu->getName($m->producto_final, 'productos_finales'); ?></a></td>
								<td><a href="#"><?php echo $menu->getName($m->maquinaria, 'maquinarias'); ?></a></td>
								<td><a href="#"><?php echo $menu->getName($m->recorrido, 'recorridos'); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($m->receptor); ?></a></td>
								<td><a href="#"><?php echo $m->distancia; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=distribution&producto_final=<?php echo $m->producto_final ?>&maquinaria=<?php echo $m->maquinaria; ?>&categoria=<?php echo $m->categoria; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteDistribution('<?php echo $m->producto_final . '-' . $m->maquinaria; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/distribution.js"></script>
<script type="text/javascript">

</script>