<?php
	@session_start();
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$animal = new animales();	
	$ans = $animal->getAllRecords();
	
	$prod = new empresa_animales();
	if(isset($_GET['animal'])){
		$pr = $prod->getRecordE($_GET['animal']);
	} else {
		$pr = new empresa_animales();
		$vars = $pr->getAllFields();
		foreach($vars as $var)
			$pr->$var = '';
	}
	
?>
<div class="">
	<div class="box">
		<div class="title">
			<h2>Inventario Animales</h2>
			<span onclick="window.location='?view=lpanimal_catalog'" class="add">List</span>
		</div>
		<div class="content" style="padding:2px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div id="tabs-1" style="padding : 0">
			<form id="userform" name="userform">
				<fieldset>
					<legend>Animales</legend>
						<fieldset>
							
							<div class="finput" id="btip" style="float : left; margin-top : 12px">
								<label style="width:70px; margin-left : 0;">Categoria</label>
								<select id="categoria" name="categoria">
									<option value="">Select Categoria</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							
							<div class="finput" id="btip" style="float : left; margin-top : 12px; margin-left : 15px;">
								<label style="width:50px; margin-left : 0;">Animal</label>
								<select id="animal" name="animal" class="">
									<option value="">Select Categoria</option>
									<?php foreach($ans as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $pr->animal) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="sfinput" style="float : left; margin-top : 12px; margin-left : 15px;">
								<label style="width:20px; margin-left : 0;">N</label>
								<input id="numero" type="text" name="numero" class="small" value="<?php echo $pr->numero; ?>" style="width:30px" />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px; margin-left : 15px;">
								<label style="width:60px; margin-left : 0;">Dias Exp.</label>
								<input id="dias_en_explotacion" name="dias_en_explotacion" type="text" class="small" value="<?php echo $pr->dias_en_explotacion; ?>" style="width:30px" />
							</div>
								
							<div class="finput" style="float : left; margin-top : 12px; margin-left : 15px;">
								<label style="width:80px; margin-left : 0;">Ciclos/Plaza</label>
								<input id="ciclos_plaza" name="ciclos_plaza" type="text" class="small" value="<?php echo $pr->ciclos_plaza; ?>" style="width:30px" />
							</div>	

							<div class="finput" style="float : left; margin-top : 12px;">
								<label style="width:70px; margin-left : 10px;">% Pastoreo</label>
								<input id="porcentaje_pastoreo" name="porcentaje_pastoreo" type="text" class="small" value="<?php echo $pr->porcentaje_pastoreo; ?>" style="width:30px" />
							</div>

							<div class="finput" style="float : left; margin-top : 12px;margin-left: -10px;">
								<label style="width:70px; margin-left : 10px;">F.E CO<sub>2</sub></label>
								<input id="emision_co2" name="emision_co2" type="text" class="small" value="<?php echo $pr->emision_co2; ?>" style="width:30px" />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px;margin-left: 15px;">
								<label style="width:50px; margin-left : 10px;">F.E CH<sub>4</sub></label>
								<input id="emision_ch4" name="emision_ch4" type="text" class="small" value="<?php echo $pr->emision_ch4; ?>" style="width:30px" />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px;margin-left: 15px;">
								<label style="width:50px; margin-left : 10px;">F.E N<sub>2</sub>O</label>
								<input id="emision_n2o" name="emision_n2o" type="text" class="small" value="<?php echo $pr->emision_n2o; ?>" style="width:30px" />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px;margin-left: 15px;">
								<label style="width:60px; margin-left : 10px;">F.E CO<sub>2</sub>eq</label>
								<input id="emision_co2_eq" name="emision_co2_eq" type="text" class="small" value="<?php echo $pr->emision_co2_eq; ?>" style="width:30px" />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px;margin-left: 15px;">
								<label style="width:60px; margin-left : 10px;">Unidad</label>
								<input id="unidad" name="unidad" type="text" class="small" value="<?php echo $pr->unidad; ?>" style="width:50px" />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px;margin-left: 15px;">
								<label style="width:60px; margin-left : 10px;">Fuente</label>
								<input id="fuente" name="fuente" type="text" class="small" value="<?php echo $pr->fuente; ?>"  />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px;">
								<label style="width:150px; margin-left : 0px;">Kg Nitrogeno Excretado</label>
								<input id="" name="" type="text" class="small" value="<?php echo $pr->numero; ?>"  />
							</div>
							
							<div class="finput" style="float : left; margin-top : 12px;margin-left: 15px;">
								<label style="width:90px; margin-left : 10px;">Temperatura</label>
								<input id="temp" name="temp" type="text" READONLY class="small" value="<?php echo (int) $prod->getEnterpriseTemperature($_SESSION['u']['enterprise']); ?>"  />
							</div>
							<?php if(isset($_GET['animal'])) { ?><input type="hidden" name="animal" value="<?php echo $_GET['animal']; ?>" id="animal" /><?php } ?>
							<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
							<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
							<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
						</fieldset>
				</fieldset>
			</form>
				<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
					<button class="green medium" type="button" <?php if(isset($_GET['animal'])) { ?> onclick="updateProdA(<?php echo $_GET['animal']; ?>);" <?php } else { ?>onclick="addProdA();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
<script type="text/javascript" src="js/prod-animal.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#categoria").change(function(){
    $.getJSON("_ajax/select_Cat_Animales.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Animal</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#animal-button").remove();
     $("select#animal").html(options);
	  
        $("select#animal").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
  $("#rendimiento").keyup(function(){
		var performance = $('#rendimiento').val();
		var amount = $('#cantidad').val();
		if(performance != "" && amount != "")
			$("#prod").val(performance*amount);
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