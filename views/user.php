<?php
	@session_start();
	$user = new utilisateur();
	$enterprises = $user->getUserEnterprises();
	if(isset($_GET['id'])){
		$user = $user->getUser($_GET['id']);
	} else {
		$user = new stdClass;
		$user->usuario = '';
		$user->clave = '';
		$user->nombre = '';
		$user->telefono = '';
		$user->idioma = '';
		$user->empresa = '';
		$user->grupo = '';
		$user->apellidos = '';
		$user->email = '';
	}
	if(isset($_GET['enterprise']))
		$user->empresa = $_GET['enterprise'];
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2><?php if($user->usuario == '') echo "Add new user"; else echo "Edit user $user->nombre"; ?></h2>
			<span onclick="window.location='?view=lusers<?php if(isset($_GET['enterprise'])) echo "&enterprise=".$_GET['enterprise']; ?>'" class="add">List</span>
		</div>
		<div class="content forms" style="height:230px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div id="subhead" style="display : none;">
				<a href="#"><img src="gfx/table-first.gif" /></a>
				<input id="user" type="text" class="medium" value="" />
				<a href="#"><img src="gfx/table-last.gif" /></a>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Users</legend>
					<div id="lesinputs">
						<div class="line">
							<div class="finput">
								<label>User</label>
								<input id="username" type="text" name="username" class="small" value="<?php echo $user->usuario; ?>" />
							</div>
							<div class="finput">
								<label>Name</label>
								<input id="name" type="text" name="name" class="small" value="<?php echo $user->nombre; ?>" />
							</div>
							<div class="finput">
								<label>Phone</label>
								<input id="phone" name="phone" type="text" class="small" value="<?php echo $user->telefono; ?>" />
							</div><!--
							-->
						</div>
						<div class="nextline">
							<div class="finput">
								<label>Pass</label>
								<input id="pass" type="password" name="password" class="small" value="<?php  ?>" />
							</div>
							<div class="finput">
								<label>Surname</label>
								<input id="surname" type="text" name="surname" class="small" value="<?php echo $user->apellidos; ?>" />
							</div>
							<div class="finput">
								<label>Email</label>
								<input id="email" type="text" name="email" class="small" value="<?php echo $user->email; ?>" />
							</div>
						</div>
						<div class="line">
							<div class="finput">
								<label>Group</label>
								<select id="group" name="group" class="">
									<option <?php if($user->grupo == 1) echo "SELECTED"; ?> value="1">Administrator</option>
									<option <?php if($user->grupo == 2) echo "SELECTED"; ?> value="2">User</option>
								</select>
							</div>
							<div class="finput">
								<label>Idioma</label>
								<select id="idioma" name="idioma">
									<option <?php if($user->idioma == 'es') echo "SELECTED"; ?> value="es">Spanish</option>
									<option <?php if($user->idioma == 'en') echo "SELECTED"; ?> value="en">English</option>
								</select>
							</div><?php if(isset($_GET['enterprise'])) { ?>
								<input type="hidden" name="enterprise" id="enterprise" value="<?php echo $_GET['enterprise']; ?>" />
							<?php } else { ?>
							<div class="finput">
								<label>Enterprise</label>
								<select id="enterprise" name="enterprise" class="">
									<option value="">Select enterprise</option>
									<?php foreach($enterprises as $enterprise){ ?>
									<option <?php if($user->empresa == $enterprise->identificador) echo "SELECTED"; ?> value="<?php echo $enterprise->identificador; ?>"><?php echo $enterprise->nombre; ?></option>
									<?php } ?>
								</select>
							</div>
							<?php } ?>
						</div>
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 70%; float: left; text-align: center;">
					<button class="green medium" type="button" onclick="<?php if($user->usuario == '') echo "addUser();"; else echo "updateUser('$user->usuario');"; ?>"><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				<div style="text-align : right">
					<!--<button class="green medium" onclick="showForm('newuser');" type="button"><span>Add</span></button>-->
				</div>
			</form> 
		</div>
	</div>
</div>
<div id="list" class="box" style="position:absolute; display:none;">
	<div class="title">
		<h2>Users</h2>
		<span class="hide"></span>
	</div>
</div>
<script type="text/javascript" src="js/users.js"></script>