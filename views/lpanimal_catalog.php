<?php
	@session_start();
	$menu = new empresa_animales();	
	$menus = $menu->getAllRecordsE();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Animals for enterprise</h2>
					<span onclick="window.location='?view=panimal_catalog'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Animal</th>
								<th>Dias Exp.</th>
								<th>Numero</th>
								<th>% Pastoreo</th>
								<th>Ciclos/Plaza</th>
								<th>Categoria</th>
								<th width="68"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->animal; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->animal, 'animales')); ?></a></td>
								<td><?php echo $m->dias_en_explotacion; ?></td>
								<td><a href="#"><?php echo $m->numero; ?></a></td>
								<td><a href="#"><?php echo $m->porcentaje_pastoreo; ?></a></td>
								<td><a href="#"><?php echo $m->ciclos_plaza; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=panimal_catalog&animal=<?php echo $m->animal; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteAnimal('<?php echo $m->animal; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
									<a title="Manejos" style="margin-left:2px;float:left" href="?view=lpanimal_catalog_manejos&animal=<?php echo $m->animal; ?>"><img src="images/icons/farm.png" alt="edit" height="20" /></a>
									<a title="Pastoreo" style="margin-left:2px;float:left" href="?view=panimal_catalog_pastoreo&animal=<?php echo $m->animal; ?>"><img src="images/icons/timespan.png" alt="edit" height="18" /></a>
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
<script type="text/javascript" src="js/prod-animal.js"></script>