<?php
	@session_start();
	$menu = new empresa_procesos_producto_final();	
	$menus = $menu->getAllRecordsE();	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Transformacion for enterprise</h2>
					<span onclick="window.location='?view=proc_pp'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Proceso transformacion</th>
								<th>Producto final</th>
								<th>Maquinaria</th>
								<th>Horas</th>
								<th>Potencia</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->proceso_transformacion . '-' . $m->producto_final; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->proceso_transformacion, 'procesos_transformacion')); ?></a></td>
								<td><?php echo utf8_encode($menu->getName($m->producto_final, 'productos_finales')); ?></td>
								<td><?php echo utf8_encode($menu->getName($m->maquinaria, 'maquinarias')); ?></td>
								<td><a href="#"><?php echo $m->horas; ?></a></td>
								<td><a href="#"><?php echo $m->potencia;  ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=proc_pp&proceso_transformacion=<?php echo $m->proceso_transformacion; ?>&producto_final=<?php echo $m->producto_final ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteProcP('<?php echo $m->proceso_transformacion . '-' . $m->producto_final; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/pcrop-work.js"></script>