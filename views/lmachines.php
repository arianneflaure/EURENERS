<?php
	@session_start();
	$menu = new maquinarias();	
	$menus = $menu->getAllRecords();
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Machines</h2>
					<span onclick="window.location='?view=machine'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr>
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Nombre</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Material</th>
								<th>Amortizacion</th>
								<th>Combustible</th>
								<th>Type</th>
								
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
							<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><?php echo utf8_encode($m->nombre); ?></td>
								<td><?php echo $m->marca; ?></td>
								<td><?php echo $m->modelo; ?></td>
								<td><a href="#"><?php echo utf8_encode($m->material); ?></a></td>
								<td><?php echo $m->amortizacion; ?></td>
								<td><?php echo utf8_encode($m->combustible); ?></td>
								<td><?php echo $menu->getMaqType($m->identificador); ?></td>
								
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=machine&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMaquinarias('<?php echo $m->identificador; ?>', 'Maquinaria')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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