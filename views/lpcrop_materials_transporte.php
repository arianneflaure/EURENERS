<?php
	@session_start();
	$menu = new empresa_materias_primas_transporte();
	if(isset($_GET['materia_prima']))
		$menus = $menu->getAllRecordsEM($_GET['materia_prima']);
	else
		$menus = $menu->getAllRecordsE();
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of materials for enterprise</h2>
					<span onclick="window.location='?view=pcrop_materials_transporte&materia_prima=<?php echo $_GET['materia_prima']; ?>'" class="add">Add</span>
					<span onclick="window.location='?view=lpcrop_materials'" class="add">Back</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Materia Prima</th>
								<th>Transporte</th>
								<th>Recorrido</th>
								<th>Proveedor</th>
								<th>Distancia</th>
								<th>Unidad</th>
								<th>Fuente</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
								<tr id="<?php echo $m->materia; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><?php echo utf8_encode($menu->getName($m->materia, 'materias_primas')); ?></td>
								<td><?php echo utf8_encode($menu->getName($m->maquinaria, 'maquinarias')); ?></td>
								<td><?php echo utf8_encode($menu->getName($m->recorrido, 'recorridos')); ?></td>
								<td><?php echo $m->distancia; ?></td>
								<td><?php echo $m->proveedor; ?></td>
								<td><?php echo $m->unidad; ?></td>
								<td><a href="#"><?php echo $m->fuente; ?></</a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=pcrop_materials_transporte&materia_prima=<?php echo $m->materia; ?>&maquinaria=<?php echo $m->maquinaria; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMaterias('<?php echo $m->materia; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/materias.js"></script>