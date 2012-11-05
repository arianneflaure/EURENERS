<?php 
	@session_start();
	global $lang;
	@session_start();
	if(isset($_GET['id'])){
		$menu = new animales_emisiones();	
		$excreta = $menu->getRecord($_GET['id']);
	} else {
		$excreta = new animales_emisiones();
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
			<h2>Edit Animal Emission Factor</h2>
			<span onclick="window.location='?view=lmi-animals-efactor&id=<?php echo $_GET['animal'] ?>'" title="List of Emission Factor" class="addy">List of factor for <?php if(isset($_GET['animal'])) echo utf8_encode($provincia->getName($_GET['animal'], 'animales')); ?></span>
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
							<label>Temperatura</label>
							<input id="temperatura" type="text" name="temperatura" class="medium" value="<?php echo $excreta->temperatura; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>CO<sub>2</sub></label>
							<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $excreta->emision_co2; ?>" />
						</div>
					</div>
					<div class="nextline">
						<div class="finput">
							<label>CH<sub>4</sub></label>
							<input id="emision_ch4" type="text" name="emision_ch4" class="medium" value="<?php echo $excreta->emision_ch4; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>N<sub>2</sub>O</label>
							<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $excreta->emision_n2o; ?>" />
						</div>
					</div>
					<div class="line">
						<div class="finput">
							<label>CO<sub>2</sub>eq</label>
							<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="medium" value="<?php echo $excreta->emision_co2_eq; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>Unidad</label>
							<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $excreta->unidad; ?>" />
						</div>
					</div>
					<div class="nextline">
						<div class="finput">
							<label>Fuente</label>
							<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $excreta->fuente; ?>" />
						</div>
						
					</div>
					
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" value="<?php echo $_GET['id']; ?>" id="identificador" name="identificador" /><?php } ?>
					<?php if(isset($_GET['animal'])) { ?><input type="hidden" value="<?php echo $_GET['animal']; ?>" id="animal" name="animal" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateEFactor(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addEfactor();"<?php } ?> ><span>Accept</span></button>
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

