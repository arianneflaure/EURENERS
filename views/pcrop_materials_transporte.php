<?php 
$mat = new materias();	
$mats = $mat->getAllRecords();

$categoria = new categorias();	
$cats = $categoria->getAllRecords();

$vehicule = new maquinarias();	
$vehicules = $vehicule->getAllVehicle();	

$recorrido = new recorridos();	
$recorridos = $recorrido->getAllRecords();
	
$cultivo = new cultivos();
$culti = $cultivo->getAllRecords();

$c = new empresa_materias_primas_transporte();
if(isset($_GET['maquinaria'])){
	$mic = $c->getRecordE($_GET['materia_prima'], $_GET['maquinaria']);
} else {
	$mic = new empresa_materias_primas_transporte();
	$vars = $mic->getAllFields();
	//var_dump($vars); die();
	foreach($vars as $var)
		$mic->$var = '';
}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Inventario Materias Primas Transporte</h2>
			<span onclick="window.location='?view=lpcrop_materials'" class="addy">Back to Materias Primas</span>
			<span onclick="window.location='?view=lpcrop_materials_transporte&materia_prima=<?php echo $_GET['materia_prima'] ?>'" class="addy">List Materias Primas Transporte</span>
		</div>
		<div class="content forms tabs" style="height:300px;">
			<div class="tabmenu">
				<ul> 
					<!--<li><a href="#tabs-1">Materia Prima</a></li>--> 
					<li><a href="#tabs-2">Transporte</a></li>
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
		<div id="tabs-2">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Transporte</legend>
						<div id="lesinputs users">
							<fieldset>
							<legend>Materias Primas</legend>	
							<div class="line">
								<div class="finput" id="btip">
									<label style="width:85px;">Categorias</label>
									<select id="categoria" name="categoria">
									<option value="">Select Categorias</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
									</select>
								</div>
								<div class="finput" id="btip">
									<label style="width:85px;">Vehiculos</label>
									<select id="maquinaria" name="maquinaria" class="">
									<option value="">Vehiculos</option>
									<?php foreach($vehicules as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
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
								<input type="radio" name="es_propio" id="propri" checked="checked" value="1" /> 
								<label for="propri">Propio</label>
								
								<input type="radio" name="es_propio" id="es_propio" value="0" /> 
								<label for="es_propio">Externo</label>
								
								<div class="finput">
									<label style="width:85px;">Proveedar</label>
									<input id="proveedor" type="text" name="proveedor" class="small" value="<?php echo $mic->proveedor; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Distancia(km)</label>
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
									<label style="margin-top : 12px">F.E N<sub>2</sub>O</label>
									<input style="margin-top : 12px" id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>"/>
								</div>
								
							</div>
							
							<div class="line">
							<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>" />
							</div>
							<div class="sfinput">
									<label>Unidad</label>
									<input id="unidad" type="text" name="unidad" READONLY class="small" value="<?php echo $mic->unidad; ?>" />
								</div>
								<div class="sfinput">
									<label >Fuente</label>
									<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $mic->fuente; ?>" />
								</div>
							</div>
							</fieldset>
							</div>
							
				</fieldset>	
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" onclick="<?php if(isset($_GET['maquinaria'])) { ?>updateTransport();<?php } else { ?>addTransport();<?php } ?>"><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<?php if(isset($_GET['materia_prima'])) { ?><input type="hidden" name="materia" value="<?php echo $_GET['materia_prima']; ?>" id="materia" /><?php } ?>
					<?php if(isset($_GET['maquinaria'])) { ?><input type="hidden" name="maquinaria" value="<?php echo $_GET['maquinaria']; ?>" id="maquinaria" /><?php } ?>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
				</div>
			</form>
		</div>
        
    </div>
	
</div> 
</div>
<script type="text/javascript" src="js/materials.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#categoria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Cat_Vehicules.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Vehicule</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#maquinaria-button").remove();
     $("select#maquinaria").html(options);
	  
        $("select#maquinaria").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
   $("select#maquinaria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Veh_Recorridos.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select recoridos</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#recorrido-button").remove();
     $("select#recorrido").html(options);
	  
        $("select#recorrido").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
  
  $("select#recorrido").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/getRecorrido.php",{id: $(this).val(), ajax: 'true'}, function(obj){
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