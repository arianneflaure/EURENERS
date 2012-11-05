<?php
	@session_start();
	$categoria = new categorias();	
	$cats = $categoria->getAllVehiculoRecords();
	
	$maquinaria = new maquinarias();
	if(isset($_GET['categoria']))
		$veh = $maquinaria->getAllVehicleFromCategory($_GET['categoria']);
	else
		$veh = $maquinaria->getAllRecords();
	
	$recorridos = new recorridos();
	if(isset($_GET['maquinaria']))
		$rec = $recorridos->getAllRecorridosFromVehicule($_GET['maquinaria']);
	else
		$rec = $recorridos->getAllRecords();
	
	$productos = new empresa_unidades_funcionales();	
	$prods = $productos->getAllProductsFromE();	
	
	$c = new empresa_distribucion_unidad_funcional();
	if(isset($_GET['producto_final'])){
		$mic = $c->getRecordE($_GET['producto_final'], $_GET['maquinaria']);
	} else {
		$mic = new empresa_distribucion_unidad_funcional();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Distribucion del Producto</h2>
			<span onclick="window.location='?view=ldistribution'" class="add">List</span>
		</div>
		
		
		<div class="content forms tabs" style="height:230px;">
			
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
		
		<div id="tabs-1">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Distribucion</legend>
				<div class="finput" id="btip" style="margin: 5px;">
					<label >Producto</label>
					<select id="producto_final" name="producto_final">
						<option value="">Select producto final</option>
						<?php foreach($prods as $c) { ?>
							<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->producto_final) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
						<?php } ?>	
					</select>
				</div>
				<fieldset>
					<legend>Transporte</legend>
						<div id="lesinputs users">
							
							
							<div class="line">
								<div class="finput" id="btip">
									<label >Categorias</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categoria</option>
										<?php foreach($cats as $c) { ?>
										<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="finput" id="btip">
									<label>Vehiculo</label>
									<select id="maquinaria" name="maquinaria" >
										<option value="">Select categoria</option>
										
										<?php if(isset($_GET['producto_final'])) foreach($veh as $v) { ?>
										<option value="<?php echo $v->identificador; ?>" <?php if($v->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($v->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="finput" id="btip">
									<label>Recorrido</label>
									<select id="recorrido" name="recorrido" >
										<option value="">Select vehiculo</option>
										<?php if(isset($_GET['producto_final'])) foreach($rec as $r) { ?>
										<option value="<?php echo $r->identificador; ?>" <?php if($r->identificador == $mic->recorrido) echo "SELECTED" ?>><?php echo utf8_encode($r->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
								
								
							</div>
							<div class="nextline">
								<div class="sfinput" style="float:left; margin-right:20px">
									<label style="width: 85px;">Receptor</label>
									<input id="receptor" type="text" name="receptor" class="medium" value="<?php echo $mic->receptor; ?>" />
								</div>
								<div class="sfinput">
									<label style="width:100px">Distancia (km)</label>
									<input id="distancia" type="text" name="distancia" class="medium" value="<?php echo $mic->distancia; ?>" />
								</div>
							
							</div>
							
						</div>
						
				</fieldset>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['producto_final'])) { ?> onclick="updateDistribution(<?php echo $_GET['producto_final'] . '-' . $_GET['maquinaria']; ?>);" <?php } else { ?>onclick="addDistribution();"<?php } ?>><span>Accept</span></button>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				
			</form>
		</div>
		
       </div>
       </div>
       </div>

<script type="text/javascript" src="js/distribution.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
  $("select#categoria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Cat_Vehicules.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Vehiculo</option>';
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
	  options += '<option value="">Select Recorrido</option>';
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
  
  $("select#producto").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/getProducto.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);	
    })
  });
 
	$("#rendimiento").keyup(function(){
		var performance = $('#rendimiento').val();
		var amount = $('#cantidad').val();
		if(performance != "" && amount != "")
			$("#prod").val(performance*amount);
	});
})
</script>