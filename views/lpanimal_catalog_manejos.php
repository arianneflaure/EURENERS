<?php
	@session_start();
	$menu = new empresa_animales_manejos();	
	$menus = $menu->getAllRecordsE($_GET['animal']);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Manejos for <?php echo utf8_encode($menu->getName($_GET['animal'], 'animales')); ?></h2>
					<span onclick="window.location='?view=panimal_catalog_manejos&animal=<?php echo $_GET['animal']; ?>'" class="add">Add</span>
					<span onclick="window.location='?view=lpanimal_catalog'" title="List animal inventario" class="add">Close</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Manejo</th>
								<th>Porcentaje</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->animal.$m->manejo; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->manejo, 'manejos')); ?></a></td>
								<td><a href="#"><?php echo $m->porcentaje; ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=panimal_catalog_manejos&animal=<?php echo $m->animal; ?>&manejo=<?php echo $m->manejo; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteCrop('<?php echo $m->animal.$m->manejo; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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

<script type="text/javascript" src="js/panimal-catalog.js"></script>