<?php
	@session_start();
	$menu = new menus();	
	$menus = $menu->getAllRecords();	
	global $lang;
?>
<div class="">
	<div class="box">
		<div class="title">
			<h2>Edit rights of menus for group <?php echo $_GET['id']; ?></h2>
			<span onclick="window.location='?view=lgroups'" class="addy">Return to list of groups</span>
		</div>
		<div class="content tabs">
			
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-2">Menus</a></li>
				</ul>
			</div>
			
			<div id="tabs-1">
				<table cellspacing="0" cellpadding="0" border="0" class="sorting"> 
					<thead> 
						<tr> 
							<th><input type="checkbox" name="check" class="checkall" /></th>
							<th>Name</th>
							
							<th>Description</th>
							<th width="10"></th>
						</tr> 
					</thead> 
					<tbody> 
					<?php foreach($menus as $user) { ?>
						<tr id="<?php echo $user->identificador; ?>"> 
							<td><input type="checkbox" name="check" /></td>
							<td><a href="#"><?php echo $user->nombre ?></a></td>
							<td><?php echo $user->descripcion; ?></td>
							<td style="padding:5px 4px;">
								<a style="float:left" href="?view=group&idgroup=<?php echo $_GET['id']; ?>&idmenu=<?php echo $user->identificador; ?>"><img src="gfx/icon-edit.png" title="Edit rights for this menu" /></a>
							</td>
						</tr>
					<?php } ?> 
					</tbody> 
				</table>
			</div>			
		</div>
	</div>
</div>
<script type="text/javascript" src="js/groups.js"></script>