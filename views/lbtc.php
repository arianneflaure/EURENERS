<?php
	@session_start();
	$menu = new categorias();	
	$menus = $menu->getAllRecords();
//var_dump($menus); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Basic type and Categories</h2>
					<span onclick="window.location='?view=btc'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th><input type="checkbox" name="check" class="checkall" /></th>
								<th>Name</th>
								<th>Description</th>
								<th>Basic Type</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($menus as $m) { ?>
							<tr id="<?php echo $m->identificador; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo utf8_encode($m->nombre); ?></a></td>
								<td><?php echo utf8_encode($m->descripcion); ?></td>
								<td><?php echo utf8_encode($m->tipobasico); ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=btc&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteBtc('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/btc.js"></script>
<script type="text/javascript">

</script>