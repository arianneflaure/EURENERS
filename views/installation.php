<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new instalaciones();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new instalaciones();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Installations</h2>
			<span onclick="window.location='?view=linstallation'" class="add">List</span>
		</div>
		<div class="content forms" style="height:240px">
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
					<legend>Installation</legend>
					<div id="lesinputs">
					<div class="installation">
						<div class="line">
							<div class="finput">
								<label>Nombre</label>
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo utf8_encode($mic->nombre); ?>"  />
							</div>
							<div class="finput">
								<label >Material/es</label>
								<input id="material" type="text" name="material" class="medium" value="<?php echo $mic->material; ?>" />
							</div>
							<div class="sfinput">
								<label style="width: 80px;">Amortizacion</label>
								<input id="amortizacion" type="text" name="amortizacion" class="small" value="<?php echo $mic->amortizacion; ?>"  />
							</div>
							<div class="sfinput">
								<label>Mj</label>
								<input id="mjul_m2" type="text" name="mjul_m2" class="small" value="<?php echo $mic->mjul_m2; ?>"  />
							</div>
						</div>
						
						
						<div class="nextline">
							
							<div class="sfinput">
								<label style="width: 50px;">F.E CO<Sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $mic->emision_co2; ?>" style="margin-right : 10px;"/>
							</div>
							<div class="sfinput">
								<label style="width: 50px;">F.E CH<sub>4</sub></label>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $mic->emision_ch4; ?>" style="margin-right : 10px;"/>
							</div>
							<div class="sfinput">
								<label style="width: 50px;">F.E N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>" style="margin-right : 10px;"/>
							</div>
							<div class="sfinput">
								<label style="width: 60px;">F.E CO<Sub>2eq</sub></label>
								<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>" style="margin-right : 10px;"/>
							</div>
							<div class="sfinput">
								<label>Unidad</label>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $mic->unidad; ?>" />
							</div>
							<div class="finput">
								<label>Fuente</label>
								<input id="fuente" type="text" name="fuente" class="small" value="<?php echo utf8_encode($mic->fuente); ?>" />
							</div>
						</div>
						<div class="line">
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
					</div>
					<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateInstallation(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addInstallation();"<?php } ?>><span>Accept</span></button>
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
<script type="text/javascript" src="js/installation.js"></script>