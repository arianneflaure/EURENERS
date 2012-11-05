<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$consumible= new consumibles();
	$con = $consumible->getAllRecords();
	
	$vehiculo = new maquinarias();
	$vehiculos = $vehiculo->getAllVehicle();
	
	$c = new empresa_consumibles();
	if(isset($_GET['consumible']) && isset($_GET['maquinaria'])){
		$mic = $c->getRecord($_GET['consumible']);
	} else {
		$mic = new empresa_consumibles();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
	
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Inventario  consumibles</h2>
			<span onclick="window.location='?view=lprod_consumables'" class="add">List</span>
		</div>
		<div class="content forms">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Consumibles</legend>
					<div class="line microps">
						<div class="finput" id="btip">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
							
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="finput" id="btip">
							<label style="width:85px">Consumible</label>
							<select id="consumible" name="consumible">
								<option value="">Select Categoria</option>
							
								<?php foreach($con as $p) { ?>
								<option value="<?php echo $p->identificador; ?>" <?php if($p->identificador == $mic->consumible) echo "SELECTED" ?>><?php echo utf8_encode($p->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
					
					
						<div class="sfinput">
							<label > Distancia</sub></label>
							<input id="distancia" name="distancia" type="text" class="small" value="<?php echo $mic->distancia; ?>" />
						</div>
						<div class="sfinput">
							<label>Vehiculo</label>
							<select id="maquinaria" name="maquinaria">
								
								<?php foreach($vehiculos as $p) { ?>
								<option value="<?php echo $p->identificador; ?>" <?php if($p->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($p->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						
						
						
					</div>
					
					<div class="nextline microps">
							<div class="finput">
								<label style="width:50px;">F.E CO<sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $mic->emision_co2; ?>" />
							</div>
							<div class="finput">
								<label style="width:50px;" >F.E CH<sub>4</sub></label>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $mic->emision_ch4; ?>" />
							</div>
							<div class="finput">
								<label style="width:50px;">F.E N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>" />
							</div>
							<div class="finput">
								<label style="width:70px;">F.E CO<sub>2</sub>eq</label>
								<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>" />
							</div>
							
						
					</div>
					<div class="line ">
						<div class="sfinput">
								<label>Unidad</label>
								<input id="unidad" type="text" READONLY name="unidad" class="small" value="<?php echo $mic->unidad; ?>" />
							</div>
						<div class="finput">
							<label>Fuente</label>
							<input id="fuente" name="fuente" type="text" class="big" value="<?php echo $mic->fuente; ?>" />
						</div>
						
						
					</div>
					
				
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
					<button class="green medium" type="button" <?php if(isset($_GET['consumible'])) { ?> onclick="updateEconsumible(<?php echo $_GET['consumible']; ?>);" <?php } else { ?>onclick="addEconsumible();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/prod-consumables.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#categoria").change(function(){
    $.getJSON("_ajax/select_Cat_Consumables.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Consumible</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#consumible-button").remove();
     $("select#consumible").html(options);
	  
        $("select#consumible").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
  $("select#consumible").change(function(){
    $.getJSON("_ajax/getConsumible.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);			
		jQuery("#emision_co2").val(obj.emision_co2);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_ch4").val(obj.emision_ch4);		
		jQuery("#emision_co2_eq").val(obj.emision_co2_eq);	
		jQuery("#fuente").val(obj.fuente);	
    })
  })
});
</script>