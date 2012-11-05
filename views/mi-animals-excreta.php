<?php 
	@session_start();
	global $lang;
	@session_start();
	if(isset($_GET['provincia']) && isset($_GET['animal'])){
		$menu = new provincias_animales_excreta();	
		$excreta = $menu->getRecordE($_GET['animal'], $_GET['provincia']);
	} else {
		$excreta = new provincias_animales_excreta();
		$vars = $excreta->getAllFields();
		foreach($vars as $var)
			$excreta->$var = '';
	}
		
	$provincia = new provincias();
	$provs = $provincia->getAllRecords();
?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Edit Animal Excreta</h2>
			<span onclick="window.location='?view=lmi-animals-excreta&id=<?php echo $_GET['animal'] ?>'" title="List of Excreta" class="addy">List of Excreta  <?php if(isset($_GET['provincia'])) echo "for " . utf8_encode($menu->getName($_GET['animal'], 'animales')); ?></span>
			<span onclick="window.location='?view=lmi-animals'" title="List Basic type" class="addy">List of Animals</span>
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
							<label>Provincia</label>
							<select id="provincia" name="provincia">
								<option value="">Select Provincia</option>
								<?php foreach($provs as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $excreta->provincia) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="finput" id="desc">
							<label>Porcentaje Excreta</label>
							<input id="porcentaje_excreta" name="porcentaje_excreta" type="text" class="medium" value="<?php echo $excreta->porcentaje_excreta; ?>" />
						</div>
					</div>
					
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['animal'])) { ?><input type="hidden" value="<?php echo $_GET['animal']; ?>" id="animal" name="animal" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['animal']) && isset($_GET['provincia'])) { ?> onclick="updateExcreta();" <?php } else { ?>onclick="addExcreta();"<?php } ?> ><span>Accept</span></button>
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
<script type="text/javascript" src="js/mi-animals.js"></script>
<script type="text/javascript">

</script>

