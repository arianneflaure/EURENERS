<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new consumibles();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new consumibles();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Consumables</h2>
			<span onclick="window.location='?view=lmi-consumables'" class="add">List</span>
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
					<legend>Consumables</legend>
					<div class="line">
						<div class="finput first">
							<label>Nombre</label>
							<input id="nombre" name="nombre" type="text" class="small" value="<?php echo $mic->nombre; ?>" />
						</div>
						
						<div class="sfinput">
							<label>F.E CO<sub>2</sub></label>
							<input id="emision_co2" name="emision_co2" type="text" class="small" value="<?php echo $mic->emision_co2; ?>" />
						</div>
						<div class="sfinput">
							<label>F.E CH<sub>4</sub></label>
							<input id="emision_ch4" name="emision_ch4" type="text" class="small" value="<?php echo $mic->emision_ch4; ?>" />
						</div>
						<div class="sfinput">
							<label>F.E N<sub>2</sub>O</label>
							<input id="emision_n2o" name="emision_n2o" type="text" class="small" value="<?php echo $mic->emision_n2o; ?>" />
						</div>
						<div class="sfinput">
							<label>F.E CO<sub>2eq</sub></label>
							<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>" />
						</div>
						<div class="sfinput">
							<label>Unidad</label>
							<input id="unidad" name="unidad" type="text"  class="small" value="<?php echo $mic->unidad; ?>" />
						</div>
						
					</div>
						
				<div class="nextline">
						<div class="finput last">
							<label>Fuente</label>
							<input id="fuente" name="fuente" type="text" class="small" value="<?php echo $mic->fuente; ?>" style="margin-right:20px;" />
						</div>
						<div class="finput" id="btip">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
				</div>
					
				<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateConsumable(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addConsumable();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>	
				</fieldset>

				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/consumable.js"></script>