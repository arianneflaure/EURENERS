<?php
	@session_start();
	$menu = new animales();	
	$menus = $menu->getAllRecords();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of animals</h2>
					<span onclick="window.location='?view=mi-animals'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Nombre</th>
								<th>Peso Animal</th>
								<th>UGM</th>
								<th>Categoria</th>
								<th width="120">Fuente</th>
								<th width="67"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
								<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($m->nombre); ?></a></td>
								<td><a href="#"><?php echo $m->peso_medio; ?></a></td>
								<td><?php echo $m->	ugm; ?></td>
								<td><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></td>
								<td><?php echo $m->fuente; ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=mi-animals&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMia('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
									<a style="margin-left:2px;float:left" href="?view=lmi-animals-excreta&id=<?php echo $m->identificador; ?>" title="Manage Excreta" ><img src="images/icons/bookmarks.png" alt="delete" /></a>
									<a style="margin-left:2px;float:left" href="?view=lmi-animals-efactor&id=<?php echo $m->identificador; ?>" title="Manage Emission Factor" ><img src="images/icons/bullet_green.png" height="20" alt="delete" /></a>
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
<script type="text/javascript" src="js/mi-animals.js"></script>
<script type="text/javascript">

</script>