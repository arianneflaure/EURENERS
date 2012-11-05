<?php
	@session_start();
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$prod = new productos_finales();
	if(isset($_GET['id'])){
		$pr = $prod->getRecord($_GET['id']);
	} else {
		$pr = new productos_finales();
		$vars = $pr->getAllFields();
		foreach($vars as $var)
			$pr->$var = '';
	}
?>
<div class="">
	<div class="box">
		<div class="title">
			<h2>Productos Finales Transformacion</h2>
			<span onclick="window.location='?view=lend-transform'" class="add">List</span>
		</div>
		<div class="content" style="padding:2px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div id="tabs-1" style="padding : 0">
			<form id="dataenterprise" name="dataenterprise">
				<fieldset>
					<legend>Productos Finales</legend>
						<fieldset>
							<div class="finput" style="float: left; margin-right: 20px;border : 0;margin-top: 10px;">
								Nombre
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo $pr->nombre; ?>" style="margin-left : 20px;" />
							</div>
							 <div class="sfinput" style="border : 0;float:left;margin-top: 10px;">
								Descripcion
								<input id="descripcion" type="text" name="descripcion" class="small" value="<?php echo $pr->descripcion; ?>" style="margin-left : 20px;" />
							</div>
							 <div class="sfinput" style="border : 0; float:left;margin-left:25px;margin-top: 10px;">
								Unidad
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $pr->unidad; ?>" style="margin-left : 20px;" />
							</div>
							<fieldset style="margin-top:10px; width : 95%px; padding-right :0; float : left">
								<legend>Factores de Emision</legend>
								<fieldset>
									
									<div class="sfinput" style="border : 0;float : left;">
										F.E CO<sub>2</sub>
									<input id="emision_uso_co2" type="text" name="emision_uso_co2" class="vsmall" value="<?php echo $pr->emision_uso_co2; ?>" style="margin-left : 5px; width : 76px; margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E CH<sub>4</sub>
									<input id="emision_uso_ch4" type="text" name="emision_uso_ch4" class="vsmall" value="<?php echo $pr->emision_uso_ch4; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E N<sub>2</sub>O
									<input id="emision_uso_n2o" type="text" name="emision_uso_n2o" class="vsmall" value="<?php echo $pr->emision_uso_n2o; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E CO<sub>2</sub>eq
									<input id="emision_uso_co2_eq" type="text" name="emision_uso_co2_eq" class="vsmall" value="<?php echo $pr->emision_uso_co2_eq; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										Fuente
									<input id="fuente_uso" type="text" name="fuente_uso" class="vsmall" value="<?php echo $pr->fuente_uso; ?>" style="margin-left : 5px;margin-right:10px;" />
									</div>
								</fieldset>
							</fieldset>
							<fieldset style="margin-top:10px; width : 95%px; padding-right :0; float : left">
								<legend>Distribucion</legend>
								<fieldset>
									
									<div class="sfinput" style="border : 0;float : left;">
										F.E CO<sub>2</sub>
									<input id="emision_distribucion_co2" type="text" name="emision_distribucion_co2" class="vsmall" value="<?php echo $pr->emision_distribucion_co2; ?>" style="margin-left : 5px; width : 76px; margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E CH<sub>4</sub>
									<input id="emision_distribucion_ch4" type="text" name="emision_distribucion_ch4" class="vsmall" value="<?php echo $pr->emision_distribucion_ch4; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E N<sub>2</sub>O
									<input id="emision_distribucion_n2o" type="text" name="emision_distribucion_n2o" class="vsmall" value="<?php echo $pr->emision_distribucion_n2o; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E CO<sub>2</sub>eq
									<input id="emision_distribucion_co2_eq" type="text" name="emision_distribucion_co2_eq" class="vsmall" value="<?php echo $pr->emision_distribucion_co2_eq; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										Fuente
									<input id="fuente_distribucion" type="text" name="fuente_distribucion" class="vsmall" value="<?php echo $pr->fuente_distribucion; ?>" style="margin-left : 5px;margin-right:10px;" />
									</div>
								</fieldset>
							</fieldset>
							<fieldset style="margin-top:10px; width : 95%px; padding-right :0; float : left">
								<legend>Comercio</legend>
								<fieldset>
									
									<div class="sfinput" style="border : 0;float : left;">
										F.E CO<sub>2</sub>
									<input id="emision_comercio_co2" type="text" name="emision_comercio_co2" class="vsmall" value="<?php echo $pr->emision_comercio_co2; ?>" style="margin-left : 5px; width : 76px; margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E CH<sub>4</sub>
									<input id="emision_comercio_ch4" type="text" name="emision_comercio_ch4" class="vsmall" value="<?php echo $pr->emision_comercio_ch4; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E N<sub>2</sub>O
									<input id="emision_comercio_n2o" type="text" name="emision_comercio_n2o" class="vsmall" value="<?php echo $pr->emision_comercio_n2o; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										F.E CO<sub>2</sub>eq
									<input id="emision_comercio_co2_eq" type="text" name="emision_comercio_co2_eq" class="vsmall" value="<?php echo $pr->emision_comercio_co2_eq; ?>" style="margin-left : 5px;width : 76px;margin-right:10px;" />
									</div>
									<div class="sfinput" style="border : 0;float : left;">
										Fuente
									<input id="fuente_comercio" type="text" name="fuente_comercio" class="vsmall" value="<?php echo $pr->fuente_comercio; ?>" style="margin-left : 5px;margin-right:10px;" />
									</div>
								</fieldset>
							</fieldset>
							<div class="line">
								<div class="finput" id="btip" style="float : left; margin-top : 12px">
									<label style="width:60px">Categoria</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categoria</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</fieldset>
						<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
						</fieldset>
				</fieldset>
			</form>
			<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
			
				<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateProd(<?php echo $_GET['id']; ?>);" <?php } else { ?> onclick="addProd();"<?php } ?>><span>Accept</span></button>
				<button class="green medium" type="button"><span>Cancel</span></button>
			</div>
			</div>
			
			
		</div>
	</div>
</div>
<script type="text/javascript" src="js/end-transform.js"></script>