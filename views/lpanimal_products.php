<?php
	@session_start();
	$menu = new empresa_productos_resultantes();	
	$menus = $menu->getAllRecordsE();	
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of products for enterprise</h2>
					<span onclick="window.location='?view=panimal_products'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Producto</th>
								<th>Animal</th>
								<th>Cantidad</th>
								<th>Unidad</th>
								<th>Rendimiento</th>
								<th width="180">Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
								<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><?php echo utf8_encode($menu->getName($m->producto, 'productos')); ?></td>
								<td><?php echo utf8_encode($menu->getName($m->animal, 'animales')); ?></td>
								<td><?php echo $m->cantidad; ?></td>
								<td><?php echo $m->unidad; ?></td>
								<td><a href="#"><?php echo $m->rendimiento; ?></</a></td>
								<td><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=pcrop_products&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deletePprod('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
									<!--<a title="Manage transporte for this materia prima" style="margin-left:2px;float:left" href="?view=lpcrop_materials_transporte&id=<?php echo $m->identificador; ?>"><img src="images/icons/delivery.png" height="16" alt="delete" /></a>-->
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
<script type="text/javascript" src="js/pcrop-prods.js"></script>