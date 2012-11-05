<?php
	@session_start();
	global $lang;
	$menu = null;
	$menus = new menus();
	if(isset($_GET['id'])){
		$menu = $menus->getRecord($_GET['id']);
	} else {
		$menu = new stdClass;
		$menu->nombre = '';
		$menu->descripcion = '';
	}
?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Edit Menus and links</h2>
			<span onclick="window.location='?view=lmenus'" class="add">List</span>
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
					<legend>Menu or link</legend>
					<div class="line">
						<div class="finput">
							<label>Name</label>
							<input id="nombre" name="nombre" type="text" class="small" value="<?php echo $menu->nombre; ?>" />
						</div>
						<div class="finput">
							<label>Description</label>
							<input id="descripcion" name="descripcion" type="text" class="medium" value="<?php echo $menu->descripcion; ?>" />
						</div>
					</div>
					<div id="nextline" style="height: 30px; margin-top: 30px;  padding: 5px;">
						<!--<div class="finput">
							<label>Link</label>
							<input id="link" type="text" class="medium" value="<?php //echo $menu->link; ?>" />
						</div>-->
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMenu(this.form.id);" <?php } else { ?> onclick="addMenu(this.form.id);" <?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/menus.js"></script>