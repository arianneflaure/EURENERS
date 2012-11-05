<?php
	@session_start();
	$menu = new empresa_residuos_tratamiento();	
	$menus = $menu->getAllRecordsEProdR($_GET['empresa_residuo']);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Tratamientos for <?php echo utf8_encode($menu->getName($_GET['empresa_residuo'], 'residuos')); ?></h2>
					<span onclick="window.location='?view=pcrop_tratamiento&empresa_residuo=<?php echo $_GET['empresa_residuo']; ?>'" class="add">Add</span>
					<span onclick="window.location='?view=lpcrop_wastetr'" class="addy">Back to residuos</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Residuo</th>
								<th>Tratamiento</th>
								<th width="120">Energia</th>
								<th>Unidad</th>
								<th width="160">Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->residuo.'-'.$m->tratamiento_residuo; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->residuo, 'residuos')); ?></a></td>
								<td><?php echo utf8_encode($menu->getName($m->tratamiento_residuo, 'tratamientos_residuos')); ?></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->energia, 'energias')); ?></a></td>
								<td><a href="#"><?php echo $m->unidad; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=pcrop_tratamiento&empresa_residuo=<?php echo $m->residuo; ?>&tratamiento=<?php echo $m->tratamiento_residuo ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteTratamiento('<?php echo $m->residuo.'-'.$m->tratamiento_residuo; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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