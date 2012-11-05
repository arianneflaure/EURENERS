<?php
	@session_start();
	$menu = new animales_emisiones();	
	$menus = $menu->getAllRecordsFromAnimal($_GET['id']);	
	//global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>Factores de Emision segun Temperatura for <?php echo utf8_encode($menu->getName($_GET['id'], 'animales')); ?></h2>
					<span onclick="window.location='?view=mi-animals-efactor&animal=<?php echo $_GET['id'] ?>'" class="add">Add</span>
					<span onclick="window.location='?view=lmi-animals'" title="List Basic type" class="addy">Back to list of Animals</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th width="15"><input type="checkbox" name="check" class="checkall" /></th>
								<th>Temperatura</th>
								<th>CO<sub>2</sub></th>
								<th>CH<sub>4</sub></th>
								<th>N<sub>2</sub>O</th>
								<th>CO<sub>2</sub>eq</th>
								<th>Unidad</th>
								<th>Fuente</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?> 
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo $m->temperatura; ?></a></td>
								<td><?php echo $m->emision_co2; ?></td>
								<td><?php echo $m->emision_ch4; ?></td>
								<td><?php echo $m->emision_n2o; ?></td>
								<td><?php echo $m->emision_co2_eq; ?></td>
								<td><?php echo $m->unidad; ?></td>
								<td><?php echo $m->fuente; ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=mi-animals-efactor&id=<?php echo $m->identificador; ?>&animal=<?php echo $_GET['id'] ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteMiaEF('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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