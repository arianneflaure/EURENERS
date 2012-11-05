<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new gases();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new gases();
		$vars = $mic->getAllFields();
		foreach($vars as $var)
			$mic->$var = '';
			$mic->es_co2 = 0;
			$mic->es_ch4 = 0;
			$mic->es_n2o = 0;
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Gases</h2>
			<span onclick="window.location='?view=lgases'" class="add">List</span>
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
					<legend>Gases</legend>
					<div id="lesinputs">
				
						<div class="line">
							<div class="finput" style=" margin-right:10px;" >
								<label>Nombre</label>
								<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo $mic->nombre; ?>" />
							</div>
							<div class="finput" style=" margin-right:10px;">
								<label style="width:54px;">GWP</label>
								<input id="gwp" type="text" name="gwp" class="small" value="<?php echo $mic->gwp; ?>" />
							</div>
							<div class="finput" style=" margin-right:10px;">
								<label >Formula</label>
								<input id="formula" type="text" name="formula" class="small" value="<?php echo $mic->formula; ?>" />
							</div>	
						</div>
					
						<div class="nextline">
							<div class="finput" style=" margin-right:10px;">
								<label >Fuente</label>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo utf8_encode($mic->fuente); ?>"  />
							</div>
							
					   <div class="finput" id="btip" style=" margin-right:10px;">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						</div>
					</div>
				</fieldset>
				<input type="hidden" name="es_co2" value="<?php echo $mic->es_co2; ?>" id="es_co2" />
				<input type="hidden" name="es_ch4" value="<?php echo $mic->es_ch4; ?>" id="es_ch4" />
				<input type="hidden" name="es_n2o" value="<?php echo $mic->es_n2o; ?>" id="es_n2o" />
				<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updategase(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addgase();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/gases.js"></script>