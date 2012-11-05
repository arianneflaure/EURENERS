<?php
	@session_start();
	$menu = new empresa_residuos();	
	$menus = $menu->getAllRecordsE();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Works for enterprise</h2>
					<span onclick="window.location='?view=pcrop_works'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Residuo</th>
								<th>Animal</th>
								<th>Tipo de Gestion</th>
								<th>LER</th>
								<th>Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->residuo; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->residuo, 'residuos')); ?></a></td>
								<td><?php echo utf8_encode($menu->getName($m->animal, 'animales')); ?></td>
								<td><a href="#"><?php echo $m->tipo_gestion; ?></a></td>
								<td><a href="#"><?php echo $m->codigo_ler; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=pcrop_wastetr&residuo=<?php echo $m->residuo; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteCrop('<?php echo $m->residuo; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/pcrop-catalog.js"></script>