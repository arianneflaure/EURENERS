<?php
	@session_start();
	$menu = new provincias_animales_excreta();	
	$menus = $menu->getAllRecordsP($_GET['provincia']);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Excreta per animal for <?php echo utf8_encode($menu->getName($_GET['provincia'], 'provincias')); ?></h2>
					<span onclick="window.location='?view=lmd-p'" title="List provincias" class="addy">Provinces List</span>
					<span onclick="window.location='?view=md-p-excreta&provincia=<?php echo $_GET['provincia'] ?>'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Animal</th>
								<th>Excreta</th>
								<th>Fuente</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->provincia.'-'.$m->animal; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->animal, 'animales')); ?></a></td>
								<td><a href="#"><?php echo $m->porcentaje_excreta; ?></a></td>
								<td><a href="#"><?php echo $m->fuente; ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=md-p-excreta&provincia=<?php echo $m->provincia; ?>&animal=<?php echo $m->animal; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteCrop('<?php echo $m->provincia.'-'.$m->animal; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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

<script type="text/javascript" src="js/prod-maquinaria.js"></script>