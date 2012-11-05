<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new materias();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new materias();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Materials</h2>
			<span onclick="window.location='?view=lmaterial'" class="add">List</span>
		</div>
		<div class="content forms" style="height:300px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div id="subhead">
				<a href="#"><img src="gfx/table-first.gif" /></a>
				<input id="user" type="text" class="medium" value="" />
				<a href="#"><img src="gfx/table-last.gif" /></a>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Materials</legend>
					<div id="lesinputs">
				
						<div class="line">
							<div class="finput">
								<label  style="width:80px;">Material Type</label>
								<select id="tipo_materia_prima" name="tipo_materia_prima">
									<option value="">Select Material</option>
								
								<option value="Produccion Agricola" <?php if($mic->tipo_materia_prima == 'Produccion Agricola') echo "SELECTED"; ?>>Produccion Agricola</option>
								<option value="Produccion Ganadera" <?php if($mic->tipo_materia_prima == 'Produccion Ganadera') echo "SELECTED"; ?>>Produccion Ganadera</option>
								<option value="Transformacion Queso" <?php if($mic->tipo_materia_prima == 'Transformacion Queso') echo "SELECTED"; ?>>Transformacion Queso</option>
								<option value="Transformacion Carne" <?php if($mic->tipo_materia_prima == 'Transformacion Carne') echo "SELECTED"; ?>>Transformacion Carne</option>
								<option value="Transformacion aceite" <?php if($mic->tipo_materia_prima == 'Transformacion aceite') echo "SELECTED"; ?>>Transformacion aceite</option>
								<option value="Fitosanitario" <?php if($mic->tipo_materia_prima == 'Fitosanitario') echo "SELECTED"; ?>>Fitosanitario</option>
								<option value="Alimento" <?php if($mic->tipo_materia_prima == 'Alimento') echo "SELECTED"; ?>>Alimento</option>
								<option value="Fertilizante" <?php if($mic->tipo_materia_prima == 'Fertilizante') echo "SELECTED"; ?>>Fertilizante</option>
								
								</select>
							</div>
							<div class="finput">
								<label >Name</label>
								<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo utf8_encode($mic->nombre); ?>" />
							</div>
							
							<!--
							-->
						</div>
						
						
						<div class="nextline">
							<div class="finput">
								<label>Composed</label>
								<input id="compuesto" type="text" name="compuesto" class="medium" value="<?php echo $mic->compuesto; ?>"  />
							</div>
							<div class="finput">
								<label >Formulation</label>
								<input id="formulacion" type="text" name="formulacion" class="medium" value="<?php echo $mic->formulacion; ?>"/>
							</div>
							
							
						</div>
						<div class="line">
							<div class="sfinput">
								<label>F.E CO<sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $mic->emision_co2; ?>" />
							</div>
							<div class="sfinput">
								<label>F.E CH<sub>4</sub></label>
								<input id="	emision_ch4" type="text" name="	emision_ch4" class="small" value="<?php echo $mic->emision_ch4; ?>" />
							</div>
							<div class="sfinput">
								<label >F.E N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>" />
							</div>
							<div class="sfinput">
								<label >F.E CO<sub>2eq</sub></label>
								<input id="	emision_co2_eq" type="text" name="	emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?> "/>
							</div>
							<div class="finput">
								<label>Unidad</label>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $mic->unidad; ?>" />
							</div>
						</div>
						<div class="nextline">
							
						<div class="finput">
								<label>Fuente</label>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $mic->fuente; ?>" />
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
					</div>
						<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMaterias(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addMaterias();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>

				</fieldset>
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
<script type="text/javascript" src="js/materias.js"></script>