<?php 
	@session_start();
	global $lang;
	$menu = null;
	$menus = new categorias();
	$tp = new tipos_basicos();
	$tps = $tp->getAllRecords();
	if(isset($_GET['id'])){
		if(isset($_GET['btyp'])) {
			$menu = $tp->getRecord($_GET['id']);
			$menu->descripcion = '';
			$menu->typo_basico = '';
		} else
			$menu = $menus->getRecord($_GET['id']);
	} else {
		$menu = new stdClass;
		$menu->nombre = '';
		$menu->descripcion = '';
		$menu->tipo_basico = '';
		
	}
?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Basic Types and Categories</h2>
			<span onclick="window.location='?view=lbtc'" title="List Category" class="addy">List Categories</span>
			<span onclick="window.location='?view=lbtyp'" title="List Basic type" class="addy">List Basic Types</span>
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
							<label>Name</label>
							<input id="nombre" type="text" class="small" value="<?php echo utf8_encode($menu->nombre); ?>" />
						</div>
						<div class="finput" id="desc">
							<label>Description</label>
							<input id="descripcion" type="text" class="medium" value="<?php echo utf8_encode($menu->descripcion); ?>" />
						</div>
					</div>
					<div id="nextline" style="height: 30px; margin-top: 30px;  padding: 5px;">
						<div class="finput" style="margin-right : 166px">
							<div style="width : 200px">
								<input type="checkbox" onclick="checktype();" name="type[]" value="basic" id="cat" />
								<label for="cat">Basic Type</label>
							</div>
						</div>
						<div class="finput" id="btip">
							<label>Basic Type</label>
							<select id="bt" name="bt">
								<option value="">Select Basic type</option>
								<?php foreach($tps as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $menu->tipo_basico) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" value="<?php echo $_GET['id']; ?>" id="id" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateBtc(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addBtc();"<?php } ?> ><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
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
<script type="text/javascript" src="js/btc.js"></script>
<script type="text/javascript">
<?php if(isset($_GET['btyp'])) { ?>
	jQuery('#cat').attr('checked', true);
	jQuery('#btip').hide();
<?php } ?>
</script>

