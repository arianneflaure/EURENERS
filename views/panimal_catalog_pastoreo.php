<?php 
	@session_start();
	global $lang;
	@session_start();
	if(isset($_GET['animal'])){
		$menu = new empresa_animales_pastoreo();	
		$excreta = $menu->getRecordE($_GET['animal']);
		if(is_null($excreta)) {
			$excreta = new empresa_animales_pastoreo();
			$vars = $excreta->getAllFields();
			foreach($vars as $var)
				$excreta->$var = '';
		}
	} 

?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Pastoreo Animal</h2>
			<span onclick="window.location='?view=lpanimal_catalog'" title="List animal inventario" class="add">Back</span>
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
					<legend>Pastoreo</legend>
					<div class="line">
						<div class="finput">
							<label>Enero</label>
							<input id="enero" name="enero" type="text" class="small" value="<?php echo $excreta->enero; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>Febrero</label>
							<input id="febrero" name="febrero" type="text" class="small" value="<?php echo $excreta->febrero; ?>" />
						</div>
					</div>
					<div class="nextline">
						<div class="finput">
							<label>Marzo</label>
							<input id="marzo" name="marzo" type="text" class="small" value="<?php echo $excreta->marzo; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>Abril</label>
							<input id="abril" name="abril" type="text" class="small" value="<?php echo $excreta->abril; ?>" />
						</div>
					</div>
					<div class="line">
						<div class="finput">
							<label>Mayo</label>
							<input id="mayo" name="mayo" type="text" class="small" value="<?php echo $excreta->mayo; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>Junio</label>
							<input id="junio" name="junio" type="text" class="small" value="<?php echo $excreta->junio; ?>" />
						</div>
					</div>
					<div class="nextline">
						<div class="finput">
							<label>Julio</label>
							<input id="julio" name="julio" type="text" class="small" value="<?php echo $excreta->julio; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>Agosto</label>
							<input id="agosto" name="agosto" type="text" class="small" value="<?php echo $excreta->agosto; ?>" />
						</div>
					</div>
					<div class="line">
						<div class="finput">
							<label>Septiembre</label>
							<input id="septiembre" name="septiembre" type="text" class="small" value="<?php echo $excreta->septiembre; ?>" />
						</div>
						<div class="finput" id="desc">
							<label>Octubre</label>
							<input id="octubre" name="octubre" type="text" class="small" value="<?php echo $excreta->octubre; ?>" />
						</div>
					</div>
					<div class="nextline">
						<div class="finput" id="desc">
							<label>Noviembre</label>
							<input id="noviembre" name="noviembre" type="text" class="small" value="<?php echo $excreta->noviembre; ?>" />
						</div>
						<div class="finput">
							<label>Diciembre</label>
							<input id="diciembre" name="diciembre" type="text" class="small" value="<?php echo $excreta->diciembre; ?>" />
						</div>
					</div>
					
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['animal'])) { ?><input type="hidden" value="<?php echo $_GET['animal']; ?>" id="animal" name="animal" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['animal'])) { ?> onclick="updatePastoreo(<?php echo $_GET['animal']; ?>);" <?php } ?> ><span>Accept</span></button>
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
<script type="text/javascript" src="js/pastoreo.js"></script>
<script type="text/javascript">

</script>

