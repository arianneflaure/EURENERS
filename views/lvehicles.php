<?php
	@session_start();
	$menu = new maquinarias();	
	$menus = $menu->getAllRecords(true);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Vehicles</h2>
					<span onclick="window.location='?view=vehicle'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th><input type="checkbox" name="check" class="checkall" /></th>
								<th width="105">Name</th>
								<th width="103">Mark</th>
								<th width="103">Model</th>
								<th width="69">Fuel</th>
								<th width="69">F.E CO2</th>
								<th width="69">F.E NH4</th>
								<th width="69">F.E N2O</th>
								<th width="69">Weigh</th>
								<th width="69">Mj.Kg</th>
								<th width="103">Source</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?>
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo $m->nombre; ?></a></td>
								<td><a ><?php echo $m->marca; ?></a></td>
								<td><?php echo $m->modelo; ?></td>
								<td><?php echo $m->combustible; ?></td>
								<td><a ><?php echo $m->emision_co2; ?></a></td>
								<td><?php echo $m->emision_ch4; ?></td>
								<td><a><?php echo $m->emision_n2o; ?></a></td>
								<td><?php echo $m->peso_standard; ?></td>
								<td><?php echo $m->mj_kg; ?></td>
								<td><?php echo $m->fuente; ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=vehicle&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMenu('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/menus.js"></script>
<script type="text/javascript">

</script>