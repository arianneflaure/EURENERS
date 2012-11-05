<?php

	$b = new recorridos();
	if(isset($_GET['idr']) & isset($_GET['recorridos'])){
		$m = $b->getRecord($_GET['idr']);		
	} else {
		$m = new recorridos();
		$vars = $m->getAllFields();
		foreach($vars as $var)
			$m->$var = '';
	}
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$prod = new maquinarias();
	if(isset($_GET['id'])){
		$pr = $prod->getRecord($_GET['id']);
	} else {
		$pr = new maquinarias();
		$vars = $pr->getAllFields();
		foreach($vars as $var)
			$pr->$var = '';
		//
	}//var_dump($pr); die;
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Vehicules</h2>
			<span onclick="window.location='?view=lmaquinarias&type=vehicle'" class="addy">List Vehicles</span>
			<!--<span onclick="window.location='?view=lrecorridos'" class="addy">List Reccoridos</span>-->
		</div>
		<div class="content forms tabs" style="height:270px;">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Vehiculos</a></li> 
					<!--<li><a href="#tabs-2">Recorridos</a></li>-->
				</ul>
			</div>
		
			<div id="tabs-1">
				<form id="userform" action="" method="post">
					<div id="lesinputs">
						<div class="line">
							<div class="finput">
								<label >Nombre</label>
								<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo $pr->nombre; ?>" />
							</div>
							<div class="finput">
								<label >Marca</label>
								<input id="marca" type="text" name="marca" class="small" value="<?php echo $pr->marca; ?>" />
							</div>
							<div class="finput">
								<label >Modelo</label>
								<input id="modelo" type="text" name="modelo" class="small" value="<?php echo $pr->modelo; ?>" />
							</div>
						</div>
						<div class="nextline">
							<div class="sfinput">
								<label  style="width:85px;" >Combustible</label>
								<input id="combustible" type="text" name="combustible" class="small" value="<?php echo $pr->combustible; ?>" />
							</div>
							<div class="sfinput">
								<label  >F.E.CO<sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $pr->emision_co2; ?>" />
							</div>
							<div class="sfinput">
								<label  >F.E.CH<sub>4</sub></label>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $pr->emision_ch4; ?>"/>
							</div>
							<div class="sfinput">
								<label >F.E.N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $pr->emision_n2o; ?>"/>
							</div>
							<div class="sfinput">
								<label  >F.E.CO<sub>2eq</sub></label>
								<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $pr->emision_co2_eq; ?>" />
							</div>
							<div class="sfinput">
								<label>Unidad</label>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $pr->unidad; ?>"  />
							</div>
						</div>
						<div class="line">
							<div class="sfinput">
								<label>Peso</label>
								<input id="peso_standard" type="text" name="peso_standard" class="small" value="<?php echo $pr->peso_standard; ?>" />
							</div>
							<div class="sfinput">
								<label >Cilindrada</label>
								<input type="text" id="cilindrada" name="cilindrada" class="small" value="<?php echo $pr->cilindrada; ?>" />
							</div>
							<div class="sfinput">
								<label >Mj.Kg</label>
								<input id="mj_kg" type="text" name="mj_kg" class="small" value="<?php echo $pr->mj_kg; ?>"/>
							</div>
							<div class="finput">
								<label>Fuente</label>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo utf8_encode($pr->fuente); ?>" />
							</div>
						</div>
						<div class="nextline">
							<div class="finput" id="btip">
								<label style="width:60px">Categoria</label>
								<select id="categoria" name="categoria">
									<option value="">Select Categoria</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
						<input type="hidden" name="es_vehiculo_transporte" value="1" id="es_vehiculo_transporte" />
						<input type="hidden" name="es_maquinaria_produccion" value="0" id="es_maquinaria_produccion" />
						<input type="hidden" name="es_maquinaria_frio" value="0" id="es_maquinaria_frio" />
						<input type="hidden" name="es_maquinaria_transformacion" value="0" id="es_maquinaria_transformacion" />
						<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
						<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateVehicle(this.form.id);" <?php } else { ?> onclick="addVehicle(this.form.id);" <?php } ?>><span>Accept</span></button>
						<button class="green medium" type="button"><span>Cancel</span></button>
					</div>
				</form>
			</div>
		
		</div> 
		
	</div>
</div>

<script type="text/javascript" src="js/vehicle.js"></script>
<script type="text/javascript" src="js/recorridos.js"></script>