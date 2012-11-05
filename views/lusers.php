<?php
	@session_start();
	$enterprise = new empresas();	
	$user = new utilisateur();	
	if(isset($_GET['enterprise']))
		$users = $user->getListUsersFromEnterprise($_GET['enterprise']); 
	else
		$users = $user->getListUsers(); 
	//var_dump($users); die;
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>List of Users</h2>
					<span onclick="window.location='?view=user<?php if(isset($_GET['enterprise'])) echo "&enterprise=".$_GET['enterprise']; ?>'" class="add">Add</span>
				</div>
				<div class="content">
					<table cellspacing="0" cellpadding="0" border="0" class="all"> 
						<thead> 
							<tr> 
								<th><input type="checkbox" name="check" class="checkall" /></th>
								<th>Name</th>
								<th>Enterprise</th>
								<th width="161">Email</th>
								<th width="103">Phone</th>
								<th width="67">Group</th>
								<th width="30"></th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($users as $user) { ?>
							<tr id="<?php echo $user->usuario; ?>"> 
								<td><input type="checkbox" name="check" /></td>
								<td><a href="#"><?php echo $user->name ?></a></td>
								<td><?php echo $enterprise->getName($user->enterprise, 'empresas'); ?></td>
								<td><?php echo $user->email; ?></td>
								<td><?php echo $user->tel; ?></td>
								<td><?php echo $user->grupo; ?></td>
								<td style="padding:5px 4px;">
									<a style="float:left" href="?view=user&id=<?php echo $user->usuario; ?>"><img src="gfx/icon-edit.png" alt="edit" /></a>
									<a style="margin-left:2px;float:left" href="#" onclick="deleteUser('<?php echo $user->usuario; ?>')"><img src="gfx/icon-delete.png" alt="delete" /></a>
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
<script type="text/javascript" src="js/users.js"></script>
<script type="text/javascript">

</script>