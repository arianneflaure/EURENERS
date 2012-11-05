<?php
	$categoria = new categorias();	
	$energia = new energias();
	$cats = $categoria->getAllRecords();
	$ene = $energia->getAllRecords();
	$c = new tratamientos();
	if(isset($_GET['id'])){
		$p = $c->getRecord($_GET['id']);
	} else {
		$p = new tratamientos();
		$vars = $p->getAllFields();
		foreach($vars as $var)
			$p->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Wastes Threatments</h2>
			<span onclick="window.location='?view=lwaste-tr'" class="add">List</span>
		</div>
		<div class="content forms" style="height:200px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<!--<div id="subhead">
				<a href="#"><img src="gfx/table-first.gif" /></a>
				<input id="user" type="text" class="medium" value="" />
				<a href="#"><img src="gfx/table-last.gif" /></a>
			</div>-->
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Tratamiento</legend>
					<div id="lesinputs">
				
						<div class="line">
							
							<div class="finput">
								<label >Nombre</label>
								<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo $p->nombre; ?>" />
							</div>
							<div class="finput">
								<label style="width:60px">Energia</label>
								<select id="energia" name="energia">
								<option value="">Select Energia</option>
								<?php foreach($ene as $n) { ?>
								<option value="<?php echo $n->identificador; ?>" <?php if($n->identificador == $p->energia) echo "SELECTED" ?>><?php echo utf8_encode($n->nombre); ?></option>
								<?php } ?>
							</select>
							</div>
							
							<!--
							-->
						</div>
						
						
						<div class="nextline">
							<div class="sfinput">
								<label >F.E CO<sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $p->emision_co2; ?>" />
							</div>
							<div class="sfinput">
								<label >F.E CH<sub>4</sub></label>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $p->emision_ch4; ?>" />
							</div>
							<div class="sfinput">
								<label >F.E N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value=<?php echo $p->emision_n2o; ?>""/>
							</div>
							<div class="sfinput">
								<label >F.E CO<sub>2eq</sub></label>
								<input id="emision_co2_eq" type="text" name="	emision_co2_eq" class="small" value="<?php echo $p->emision_co2_eq; ?>" />
							</div>
							<div class="finput">
								<label>Unidad</label>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $p->unidad; ?>" />
							</div>
							
									
						</div>
						<div class="line">
							<div class="finput">
								<label>Fuente</label>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $p->fuente; ?>" />
							</div>
						<div class="finput" id="btip" style=" margin-right:10px;">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $p->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						</div>
					</div>
					
				</fieldset>
			<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updatetratamientos(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addtratamientos();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
			</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/tratamientos.js"></script>