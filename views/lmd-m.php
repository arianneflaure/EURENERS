<?php
	@session_start();
	$menu = new municipios();	
	$menus = $menu->getAllRecords(true);
//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List Municipios</h2>
					<span onclick="window.location='?view=md-pm'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th><input type="checkbox" name="check" class="checkall" /></th>
								<th>Name</th>
								<th width="105px">T Media Anual (C)</th>
								<th>Provincia</th>
								<th width="291px">Fuente</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?>
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($m->municipio); ?></a></td>
								<td><a href="#"><?php echo $m->temperatura; ?></a></td>
								<td><a href="#"><?php echo utf8_encode($menu->getName($m->provincia, 'provincias')); ?></a></td>
								<td><a href="#"><?php echo utf8_encode($m->fuente); ?></a></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=md-pm&m&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMun('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/md-pm.js"></script>