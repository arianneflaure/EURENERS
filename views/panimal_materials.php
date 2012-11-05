<?php 
$mat = new materias();	
$mats = $mat->getAllRecords();

$categoria = new categorias();	
$cats = $categoria->getAllRecords();
	
$cultivo = new animales();
$culti = $cultivo->getAllRecords();

$c = new empresa_materias_primas();
if(isset($_GET['materia_prima'])){
	$mic = $c->getRecordE($_GET['materia_prima']);
} else {
	$mic = new empresa_materias_primas();
	$vars = $mic->getAllFields();
	//var_dump($vars); die();
	foreach($vars as $var)
		$mic->$var = '';
}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Inventario Materias Primas</h2>
			<span onclick="window.location='?view=lpanimal_materials'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:300px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Materia Prima</a></li> 
					<!--<li><a href="#tabs-2">Transporte</a></li>-->
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
		<div id="tabs-1">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Materias Primas</legend>
						<div id="lesinputs users">
							<div class="finput" id="btip">
								<label style="width:60px">Animal</label>
								<select id="animal" name="animal">
									<?php foreach($culti as $c) { ?>
									<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->animal) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<fieldset>
							<legend>Materias Primas</legend>
							<div class="line">
								<div class="finput" id="btip">
									<label style="width:60px">Categorias</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categoria</option>
										<?php foreach($cats as $t) { ?>
											<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="finput" id="btip">
									<label >Materias</label>
									<select id="materia_prima" name="materia_prima" >
										<option value="">Select categoria</option>
										<?php foreach($mats as $m) { ?>
										<option value="<?php echo $m->identificador; ?>" <?php if($m->identificador == $mic->materia_prima) echo "SELECTED" ?>><?php echo utf8_encode($m->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="sfinput">
									<label >Candidad</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="<?php echo $mic->cantidad; ?>" />
								</div>
								<div class="finput">
									<label >Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $mic->unidad; ?>" READONLY />
								</div>
								
							</div>
							<div class="nextline">
								
							<div class="finput">
									<label >Descripcion</label>
									<input id="descripcion" type="text" name="descripcion" class="big" value="<?php echo utf8_encode($mic->descripcion); ?>" />
							</div>
							<div class="finput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $mic->emision_co2; ?>" />
							</div>
							</div>
							<div class="line">
							
								
								<div class="finput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $mic->emision_ch4; ?>" />
								</div>
								<div class="finput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>"/>
								</div>
								<div class="finput">
									<label >F.E CO<sub>2</sub>eq</label>
									<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>" />
								</div>
								<div class="finput">
									<label>Fuente</label>
									<input id="fuente" type="text" name="fuente" class="small" value="<?php echo utf8_encode($mic->fuente); ?>" />
								</div>
								
							</div>
							</fieldset>
						</div>
						
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['materia_prima'])) { ?> onclick="updateEMaterial(<?php echo $_GET['materia_prima']; ?>);" <?php } else { ?>onclick="addEmaterial();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
				</div>
			</form>
		</div><!--
		<div id="tabs-2">
			<form id="userform2" action="" method="post">
				<fieldset>
					<legend>Transporte</legend>
						<div id="lesinputs users">
							<div class="finput" id="btip">
								<label style="width:85px;">Materia Prima</label>
								<select id="residuo" name="residuo" >
								<option value="">Select Materia Prima</option>
							
								</select>
							</div>
							<fieldset>
							<legend>Materias Primas</legend>	
							<div class="line">
								<div class="finput" id="btip">
								<label style="width:85px;">Categorias</label>
								<select id="categoria" name="categoria">
								<option value="">Select Categorias</option>
							
								</select>
								</div>
								<div class="finput" id="btip">
								<label style="width:85px;">Vehiculos</label>
								<select id="categoria" name="categoria" class="small">
								<option value="">Vehiculos</option>
							
								</select>
								</div>
								
								<input type="checkbox" name="Fase" id="Fase" /> <label for="Fase">Propio</label>
								<input type="checkbox" name="transformacion" id="transformacion" style="margin-right:100px;"/> <label for="transformacion">Externo</label>
								<div class="finput" id="btip">
								<label >Reccorido</label>
								<select id="categoria" name="categoria" class="small">
								<option value="">Reccorido</option>
							
								</select>
								</div>
								
								
							</div>
							<div class="nextline">
								<div class="finput">
									<label style="width:85px;">Proveedar</label>
									<input id="consumo" type="text" name="consumo" class="small" value="" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Distancia(km)</label>
									<input id="consumo" type="text" name="consumo" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value=""/>
								</div>
								
							</div>
							
							<div class="line">
							<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="	emision_co2_eq" type="text" name="	emision_co2_eq" class="small" value="" />
							</div>
							<div class="sfinput">
									<label>Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >Fuente</label>
									<input id="fuente" type="text" name="fuente" class="medium" value="" />
								</div>
							</div>
							</fieldset>
							</div>
							
				</fieldset>	
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" onclick=""><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
				</div>
			</form>
		</div>-->
        
    </div>
	
</div> 
</div>
<script type="text/javascript" src="js/materials.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#categoria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Cat_Materia.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Materia</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#materia_prima-button").remove();
     $("select#materia_prima").html(options);
	  
        $("select#materia_prima").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  $("select#materia_prima").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/getMateria.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);		
		jQuery("#emision_co2").val(obj.emision_co2);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_ch4").val(obj.emision_ch4);		
		jQuery("#emision_co2_eq").val(obj.emision_co2_eq);	
		jQuery("#fuente").val(obj.fuente);	
    })
  })
})
</script>