<?php
	$c = new manejos();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new manejos();
		$vars = $mic->getAllFields();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Manejos</h2>
			<span onclick="window.location='?view=lmanejos'" class="add">List</span>
		</div>
		<div class="content forms" style="height:180px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Manejos</legend>
					<div id="lesinputs">
				
						<div class="line">
							<div class="finput" style=" margin-right:10px;" >
								<label>Nombre</label>
								<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo $mic->nombre; ?>" />
							</div>
							<div class="finput" style=" margin-right:10px;">
								<label style="width:54px;">CO<sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $mic->emision_co2; ?>" />
							</div>
							<div class="finput" style=" margin-right:10px;">
								<label >CH<sub>4</sub></label>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $mic->emision_ch4; ?>" />
							</div>	
						</div>
						<div class="nextline">
							<div class="finput" style=" margin-right:10px;" >
								<label>Unidad</label>
								<input id="unidad" type="text" name="unidad" class="medium" value="<?php echo $mic->unidad; ?>" />
							</div>
							<div class="finput" style=" margin-right:10px;">
								<label style="width:54px;">N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>" />
							</div>
							<div class="finput" style=" margin-right:10px;">
								<label >CO<sub>2</sub>eq</label>
								<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>" />
							</div>	
						</div>
						<div class="line">
							<div class="finput" style=" margin-right:10px;">
								<label >Fuente</label>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo utf8_encode($mic->fuente); ?>"  />
							</div>
							
					   <div class="finput" id="btip" style=" margin-right:10px;">
							
						</div>
						</div>
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateManejos(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addManejos();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/manejos.js"></script>