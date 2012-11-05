<?php
	@session_start();
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
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Machines</h2>
			<span onclick="window.location='?view=lmachines'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:300px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Industrial</a></li> 
					<li><a href="#tabs-2">Produccion</a></li>
					<li><a href="#tabs-3">Maquinaria Frio</a></li>
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
		<div id="tabs-1">
			<form id="industrial" action="" method="post">
				<fieldset>
					<legend>Industrial</legend>
						<div id="lesinputs users">
							<div class="line">
								<div class="finput">
									<label >Nombre</label>
									<input id="nombre" type="text" name="nombre" class="small" value="<?php echo $pr->nombre; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Marca</label>
									<input id="marca" type="text" name="marca" class="small" value="<?php echo $pr->marca; ?>" />
								</div>
								<div class="sfinput">
									<label >Modelo</label>
									<input id="modelo" type="text" name="modelo" class="small" value="<?php echo $pr->modelo; ?>" />
								</div>
								<div class="finput">
									<label >Material</label>
									<input id="material" type="text" name="material" class="small" value="<?php echo $pr->material; ?>" />
								</div>
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width:85px;">Combustible</label>
									<input id="combustible" type="text" name="combustible" class="small" value="<?php echo $pr->combustible; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $pr->emision_co2; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $pr->emision_ch4; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $pr->emision_n2o; ?>"/>
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $pr->emision_co2_eq; ?>" />
								</div>
								<div class="sfinput">
									<label>Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $pr->unidad; ?>" />
								</div>
							</div>
							<div class="line">
								<div class="sfinput">
									<label>Peso</label>
									<input id="peso_standard" type="text" name="peso_standard" class="small" value="<?php echo $pr->peso_standard; ?>" />
								</div>
								<div class="sfinput">
									<label>Vida Util</label>
									<input id="vida_util" type="text" name="vida_util" class="small" value="<?php echo $pr->vida_util; ?>" />
								</div>
								<div class="sfinput">
									<label>	Horas</label>
									<input id="horas" type="text" name="horas" class="small" value="<?php echo $pr->horas; ?>" />
								</div>
								<div class="sfinput">
									<label>Has</label>
									<input id="has" type="text" name="has" class="small" value="<?php echo $pr->has; ?>" />
								</div>
								<div class="sfinput">
									<label>Mj. Kg</label>
									<input id="mj_kg" type="text" name="mj_kg" class="small" value="<?php echo $pr->mj_kg; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Amortizacion</label>
									<input id="amortizacion" type="text" name="amortizacion" class="small" value="<?php echo $pr->amortizacion; ?>" />
								</div>
							</div>
							<div class="nextline">
								<div class="finput">
									<label>Fuente</label>
									<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $pr->fuente; ?>" />
								</div>
								<div class="finput" id="btip" style="float : left;">
									<label style="width:60px">Categoria</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categoria</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->categoria) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<input type="hidden" name="es_maquinaria_produccion" value="0" id="es_maquinaria_produccion" />
					<input type="hidden" name="es_maquinaria_frio" value="0" id="es_maquinaria_frio" />
					<input type="hidden" name="es_maquinaria_transformacion" value="1" id="es_maquinaria_transformacion" />
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMaquinarias(this.form.id);" <?php } else { ?> onclick="addMaquinarias(this.form.id);" <?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
		<div id="tabs-2">
			<form id="produccion" action="" method="post">
				<fieldset>
					<legend>Maquinaria Produccion</legend>
						<div id="lesinputs users">
							<div class="line">
								<div class="finput">
									<label >Nombre</label>
									<input id="nombre" type="text" name="nombre" class="small" value="<?php echo $pr->nombre; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Marca</label>
									<input id="marca" type="text" name="marca" class="small" value="<?php echo $pr->marca; ?>" />
								</div>
								<div class="sfinput">
									<label >Modelo</label>
									<input id="modelo" type="text" name="modelo" class="small" value="<?php echo $pr->modelo; ?>" />
								</div>
								<div class="finput">
									<label >Material</label>
									<input id="material" type="text" name="material" class="small" value="<?php echo $pr->material; ?>" />
								</div>
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width:85px;">Combustible</label>
									<input id="combustible" type="text" name="combustible" class="small" value="<?php echo $pr->combustible; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $pr->emision_co2; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $pr->emision_ch4; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $pr->emision_n2o; ?>"/>
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $pr->emision_co2_eq; ?>" />
								</div>
								<div class="sfinput">
									<label>Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $pr->unidad; ?>" />
								</div>
							</div>
							<div class="line">
								<div class="sfinput">
									<label>Peso</label>
									<input id="peso_standard" type="text" name="peso_standard" class="small" value="<?php echo $pr->peso_standard; ?>" />
								</div>
								<div class="sfinput">
									<label>Vida Util</label>
									<input id="vida_util" type="text" name="vida_util" class="small" value="<?php echo $pr->vida_util; ?>" />
								</div>
								<div class="sfinput">
									<label>	Horas</label>
									<input id="horas" type="text" name="horas" class="small" value="<?php echo $pr->horas; ?>" />
								</div>
								<div class="sfinput">
									<label>Has</label>
									<input id="has" type="text" name="has" class="small" value="<?php echo $pr->has; ?>" />
								</div>
								<div class="sfinput">
									<label>Mj. Kg</label>
									<input id="mj_kg" type="text" name="mj_kg" class="small" value="<?php echo $pr->mj_kg; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Amortizacion</label>
									<input id="amortizacion" type="text" name="amortizacion" class="small" value="<?php echo $pr->amortizacion; ?>" />
								</div>
							</div>
							<div class="nextline">
								<div class="finput">
									<label>Fuente</label>
									<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $pr->fuente; ?>" />
								</div>
								<div class="finput" id="btip" style="float : left;">
									<label style="width:60px">Categoria</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categoria</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->categoria) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
				</fieldset>	
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<input type="hidden" name="es_maquinaria_produccion" value="1" id="es_maquinaria_produccion" />
					<input type="hidden" name="es_maquinaria_frio" value="0" id="es_maquinaria_frio" />
					<input type="hidden" name="es_maquinaria_transformacion" value="0" id="es_maquinaria_transformacion" />
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMaquinarias(this.form.id);" <?php } else { ?> onclick="addMaquinarias(this.form.id);" <?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
        <div id="tabs-3">
			<form id="frio" action="" method="post">
				<fieldset>
					<legend>Maquinaria Frio</legend>
						<div id="lesinputs users">
							<div class="line">
								<div class="finput">
									<label >Nombre</label>
									<input id="nombre" type="text" name="nombre" class="small" value="<?php echo $pr->nombre; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Marca</label>
									<input id="marca" type="text" name="marca" class="small" value="<?php echo $pr->marca; ?>" />
								</div>
								<div class="sfinput">
									<label >Modelo</label>
									<input id="modelo" type="text" name="modelo" class="small" value="<?php echo $pr->modelo; ?>" />
								</div>
								<div class="finput">
									<label >Material</label>
									<input id="material" type="text" name="material" class="small" value="<?php echo $pr->material; ?>" />
								</div>
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width:85px;">Combustible</label>
									<input id="combustible" type="text" name="combustible" class="small" value="<?php echo $pr->combustible; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $pr->emision_co2; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $pr->emision_ch4; ?>" />
								</div>
								<div class="sfinput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $pr->emision_n2o; ?>"/>
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $pr->emision_co2_eq; ?>" />
								</div>
								<div class="sfinput">
									<label>Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $pr->unidad; ?>" />
								</div>
							</div>
							<div class="line">
								<div class="sfinput">
									<label>Peso</label>
									<input id="peso_standard" type="text" name="peso_standard" class="small" value="<?php echo $pr->peso_standard; ?>" />
								</div>
								<div class="sfinput">
									<label>Vida Util</label>
									<input id="vida_util" type="text" name="vida_util" class="small" value="<?php echo $pr->vida_util; ?>" />
								</div>
								<div class="sfinput">
									<label>	Horas</label>
									<input id="horas" type="text" name="horas" class="small" value="<?php echo $pr->horas; ?>" />
								</div>
								<div class="sfinput">
									<label>Has</label>
									<input id="has" type="text" name="has" class="small" value="<?php echo $pr->has; ?>" />
								</div>
								<div class="sfinput">
									<label>Mj. Kg</label>
									<input id="mj_kg" type="text" name="mj_kg" class="small" value="<?php echo $pr->mj_kg; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Amortizacion</label>
									<input id="amortizacion" type="text" name="amortizacion" class="small" value="<?php echo $pr->amortizacion; ?>" />
								</div>
							</div>
							<div class="nextline">
								<div class="finput">
									<label>Fuente</label>
									<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $pr->fuente; ?>" />
								</div>
								<div class="finput" id="btip" style="float : left;">
									<label style="width:60px">Categoria</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categoria</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->categoria) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<input type="hidden" name="es_maquinaria_frio" value="1" id="es_maquinaria_frio" />
					<input type="hidden" name="es_maquinaria_transformacion" value="0" id="es_maquinaria_transformacion" />
					<input type="hidden" name="es_maquinaria_produccion" value="0" id="es_maquinaria_produccion" />
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMaquinarias(this.form.id);" <?php } else { ?> onclick="addMaquinarias(this.form.id);" <?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
    </div>
	
</div> 
</div>
<script type="text/javascript" src="js/maquinarias.js">
</script>