<?php
	@session_start();
	$menu = new maquinarias();
	if(isset($_GET['type'])) {
		if($_GET['type'] == 'vehicle')
			$menus = $menu->getAllVehicle();
	} else {
		$menus = $menu->getAllRecords();
	}
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Vehicules</h2>
					<span onclick="window.location='?view=vehicle'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Nombre</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Combustible</th>
								<th width="115">Categoria</th>
								<th width="50"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?>
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($m->nombre); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($m->	marca); ?></a></td>
								
								<td><?php echo $m->modelo; ?></td>
								<td><?php echo utf8_encode($m->combustible); ?></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=vehicle&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMaquinarias('<?php echo $m->identificador; ?>', 'Vehiculo')"><img src="gfx/icon-delete.png" alt="delete" /></a>
									<a title="Manage Recorridos for this vehicule" style="margin-left:2px;float:left" href="?view=lrecorridos&vehicule=<?php echo $m->identificador; ?>"><img src="images/icons/road_sign_7.png" height="16" alt="delete" /></a>
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
<script type="text/javascript" src="js/maquinarias.js"></script>
<script type="text/javascript">
</script>