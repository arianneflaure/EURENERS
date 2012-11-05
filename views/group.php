<?php 
	@session_start();
	$rights;
	global $lang;
	global $user;
	$rights = $user->getGroupRightsForMenu($_GET['idmenu'], $_GET['idgroup']);
	//var_dump($rights); die;
?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Edit rights of menu <?php echo $_GET['idmenu']; ?> for group <?php echo $_GET['idgroup']; ?></h2>
			<span onclick="window.location='?view=groups&id=<?php echo $_GET['idgroup']; ?>'" title="List Category" class="addy">List menus to edit</span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Categories</legend>
					<div class="line">
						<div class="finput">
							<label>View</label>
							<select id="view" name="view" class="small">
								<option value="Y" <?php if($rights->view == 'Y') echo 'SELECTED'; ?>>Yes</option>
								<option value="N" <?php if($rights->view == 'N') echo 'SELECTED'; ?>>No</option>
							</select>
						</div>
						<div class="finput">
							<label>Edition</label>
							<select id="edit" name="edit" class="small">
								<option value="Y" <?php if($rights->edition == 'Y') echo 'SELECTED'; ?>>Yes</option>
								<option value="N" <?php if($rights->edition == 'N') echo 'SELECTED'; ?>>No</option>
							</select>
						</div>
						<div class="finput">
							<label>Deletion</label>
							<select id="delete" name="delete" class="small">
								<option value="Y" <?php if($rights->deletion == 'Y') echo 'SELECTED'; ?>>Yes</option>
								<option value="N" <?php if($rights->deletion == 'N') echo 'SELECTED'; ?>>No</option>
							</select>
						</div>
						<div class="finput">
							<label>List</label>
							<select id="list" name="list" class="small">
								<option value="Y" <?php if($rights->list == 'Y') echo 'SELECTED'; ?>>Yes</option>
								<option value="N" <?php if($rights->list == 'N') echo 'SELECTED'; ?>>No</option>
							</select>
						</div>						
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['idmenu'])) { ?><input type="hidden" value="<?php echo $_GET['idmenu']; ?>" id="idmenu" name="idmenu" /><?php } ?>
					<?php if(isset($_GET['idgroup'])) { ?><input type="hidden" value="<?php echo $_GET['idgroup']; ?>" id="idgroup" name="idgroup" /><?php } ?>
					<button class="green medium" type="button" onclick="updateRights();"><span>Accept</span></button>
				</div>
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/groups.js"></script>