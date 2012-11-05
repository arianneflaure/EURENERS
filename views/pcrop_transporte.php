<?php

$categoria = new categorias();	
$cats = $categoria->getAllRecords();
	
$cultivo = new cultivos();
$culti = $cultivo->getAllRecords();

$vehicule = new maquinarias();
$trats = $vehicule->getAllVehicle();

$recorrido = new recorridos();	
$recorridos = $recorrido->getAllRecords();

$residuo = new empresa_residuos();
$residuos = $residuo->getAllRecordsEProd();

$c = new empresa_residuos_transporte();
if(isset($_GET['empresa_residuo']) && isset($_GET['maquinaria'])){
	$mic = $c->getRecordE($_GET['empresa_residuo'], $_GET['maquinaria']);
} else {
	$mic = new empresa_residuos_transporte();
	$vars = $mic->getAllFields();
	//var_dump($vars); die();
	foreach($vars as $var)
		$mic->$var = '';
}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Residuos y Transporte</h2>
			<span onclick="window.location='?view=lpcrop_transporte&empresa_residuo=<?php echo $_GET['empresa_residuo'] ?>'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:280px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-3">Transporte</a></li>
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
		<div id="tabs-3">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Residuo y Transporte</legend>
					<div id="lesinputs users">
						<!--<div class="finput" id="btip">
							<label >Residuo</label>
							<select id="residuo" name="residuo" >
							<option value="">Select Residuo</option>
						
							</select>
						</div>-->
						<fieldset>
						<legend>Transporte of Gestar</legend>
						
							<div class="line">
								<div class="finput" id="btip">
									<label style="width:80px">Categorias</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categorias</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>								
								</div>
								<div class="finput" id="btip">
									<label style="width:80px">Vehiculo</label>
									<select id="maquinaria" name="maquinaria">
										<option value="">Select Categorias</option>
										<?php foreach($trats as $tr) { ?>
										<option value="<?php echo $tr->identificador; ?>" <?php if($tr->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($tr->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="finput" id="btip">
									<label >Reccorido</label>
									<select id="recorrido" name="recorrido" class="">
									<option value="">Reccorido</option>
									<?php foreach($recorridos as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
									</select>
								
									</select>
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width:85px;">Receptor</label>
									<input id="receptor" type="text" name="receptor" class="small" value="<?php echo $mic->receptor; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Distancia(Km)</label>
									<input id="distancia" type="text" name="distancia" class="small" value="<?php echo $mic->distancia; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $mic->emision_co2; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $mic->emision_ch4; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>"/>
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>" />
								</div>
								
							</div>
							<div class="line">
								<div class="finput">
									<label >Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $mic->unidad; ?>" />
								</div>
								<div class="finput">
									<label >Fuente</label>
									<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $mic->fuente; ?>" />
								</div>
							</div>
						</fieldset>
						</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<input type="hidden" name="residuo" value="<?php echo $_GET['empresa_residuo']; ?>" id="residuo" />
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
					<button class="green medium" type="button" <?php if(isset($_GET['maquinaria'])) { ?> onclick="updateETransport(<?php echo $_GET['maquinaria']; ?>);" <?php } else { ?>onclick="addEtransport();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
    </div>
	
</div> 
</div>
<script type="text/javascript" src="js/pcrop-wastetr.js"></script>