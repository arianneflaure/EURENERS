<?php
	@session_start();
	$menu = new recorridos();
	if(isset($_GET['vehicule']))
		$menus = $menu->getAssociatedRoutes($_GET['vehicule']);
	else
		$menus = $menu->getAllRecords();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Recorridos</h2>
					<span onclick="window.location='?view=lmaquinarias&type=vehicle'" class="addy">Return to vehicule list</span>
					<span onclick="window.location='?view=recorridos&vehicule=<?php echo $_GET['vehicule']; ?>'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Nombre</th>
								<th>Unidad</th>
								<th>Fuente</th>
								
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($m->nombre); ?></a></td>
								<td><?php echo $m->unidad; ?></td>
								<td><?php echo utf8_encode($m->fuente); ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=recorridos&vehicule=<?php echo $_GET['vehicule']; ?>&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteRecorridos('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/recorridos.js"></script>
<script type="text/javascript">

</script>