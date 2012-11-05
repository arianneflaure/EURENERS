<?php
	@session_start();
	$menu = new empresa_residuos_transporte();	
	$menus = $menu->getAllRecordsEProdR($_GET['empresa_residuo']);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Transportes for <?php echo utf8_encode($menu->getName($_GET['empresa_residuo'], 'residuos')); ?></h2>
					<span onclick="window.location='?view=pcrop_transporte&empresa_residuo=<?php echo $_GET['empresa_residuo']; ?>'" class="add">Add</span>
					<span onclick="window.location='?view=lpcrop_wastetr'" class="addy">Back to residuos</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Maquinaria</th>
								<th>Recorrido</th>
								<th width="120">Receptor</th>
								<th>Distancia</th>
								<th width="160">Categoria</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->residuo.'-'.$m->maquinaria; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->maquinaria, 'maquinarias')); ?></a></td>
								<td><?php echo utf8_encode($menu->getName($m->recorrido, 'recorridos')); ?></td>
								<td><a href="#"><?php echo $m->receptor; ?></a></td>
								<td><a href="#"><?php echo $m->distancia; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->categoria, 'categorias')); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=pcrop_transporte&empresa_residuo=<?php echo $m->residuo; ?>&maquinaria=<?php echo $m->maquinaria ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteTratamiento('<?php echo $m->residuo.'-'.$m->maquinaria; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/pcrop-wastetr.js"></script>