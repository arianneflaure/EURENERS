<?php
	@session_start();
	$menu = new grupos();	
	$menus = $menu->getAllRecords();
	$user = new utilisateur();	
	//$users = $user->getListUsers(); 	
	global $lang;
	//$users = $menu->getListmenus(); 
	//var_dump($menus); die;
?>
<div class="">
	<div class="box">
		<div class="title">
			<h2>Permissions of Groups</h2>
			<span class="add"></span>
		</div>
		<div class="content tabs">
			
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-2">Groups</a></li>
				</ul>
			</div>
			<div id="tabs-2">
				<table cellspacing="0" cellpadding="0" border="0" class="sorting"> 
					<thead> 
						<tr> 
							<th><input type="checkbox" name="check" class="checkall" /></th>
							<th>Name</th>
							<th width="30"></th>
						</tr> 
					</thead> 
					<tbody> 
					<?php foreach($menus as $m) { ?>
						<tr id="<?php echo $m->identificador; ?>"> 
							<td><input type="checkbox" name="check" /></td>
							<td><a title="Edit the group" href="?view=editgroup&id=<?php echo $m->identificador; ?>"><?php echo $m->nombre; ?></a></td>
							<td style="padding:5px 4px;">
								<a style="float:left" href="?view=groups&id=<?php echo $m->identificador; ?>"><img src="gfx/icon-edit.png" title="Edit rights of the group" /></a>
								<a style="margin-left:2px;float:left" href="#" onclick="deleteMenu('<?php echo $m->identificador; ?>')"><img src="gfx/icon-delete.png" alt="Delete the group" /></a>
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