<?php 
$mat = new materias();	
$mats = $mat->getAllRecords();

$categoria = new categorias();	
$cats = $categoria->getAllRecords();
	
$cultivo = new cultivos();
$culti = $cultivo->getAllRecords();

$maquinaria = new maquinarias();
$maquinarias = $maquinaria->getAllRecords();

$labor = new labores();
$labors = $labor->getAllRecords();

$c = new empresa_labores();
if(isset($_GET['labor'])){
	$mic = $c->getRecordE($_GET['labor']);
} else {
	$mic = new empresa_labores();
	$vars = $mic->getAllFields();
	
	foreach($vars as $var)
		$mic->$var = '';
}
?>
<div class="formulaire machines">
	<div class="box">
		<div class="title">
			<h2>Inventario de Labores</h2>
			<span onclick="window.location='?view=lpcrop_works'" class="add">List</span>
		</div>
		<div class="content forms" style="height:270px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<!--<div id="subhead">
				<a href="#"><img src="gfx/table-first.gif" /></a>
				<input id="user" type="text" class="medium" value="" />
				<a href="#"><img src="gfx/table-last.gif" /></a>
			</div>-->
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Cultivos</legend>
					
					<div class="finput" id="btip">
						<span>Cultivo</span>
						<select id="cultivo" name="cultivo">
							<?php foreach($culti as $c) { ?>
							<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->cultivo) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
							<?php } ?>
						</select>
					</div>
					<fieldset>
					<legend>Labores</legend>
					<div id="lesinputs users">
						<fieldset class="type">
							<div class ="finput" style=" float: left; margin-top:15px; margin-right: 10px; border: 1px solid white; width: 80px;">
								<input type="checkbox" name="check[]" value="0" id="transport" />
									<label for="transport">Propio</label>
								
								<input type="checkbox" name="check[]" value="0" id="transform" />
									<label for="transform">Contradato</label>
								
								
							</div>
						</fieldset>
						
						<fieldset class="men">
						
							<div class="finput" id="btip">
								<span>Categorias</span>
								<select id="categoria" name="categoria">
									<option value="">Select Categoria</option>
									<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="finput" id="btip">
								<span>Labor</span>
								<select id="labor" name="labor">
									<option value="">Select Categoria</option>
									<?php foreach($labors as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->labor) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="finput" id="btip">
								<span >Maquinaria</span>
								<select id="maquinaria" name="maquinaria">
									<option value="">Select Maquinaria</option>
									<?php foreach($maquinarias as $m) { ?>
									<option value="<?php echo $m->identificador; ?>" <?php if($m->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($m->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
						
							<div class="finput" >
							<span >Consumo/h</span>
								<input id="conso" type="text" name="conso" READONLY class="small" value="" />
							</div>
							<div class="finput">
								<span>Fuente</span>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo utf8_encode($mic->fuente); ?>" />
							</div>
							
							<!--
							-->
						</fieldset>
												
						</div>
						
							<div class="sfinput">
								<span>Horas</span>
								<input id="horas" type="text" name="horas" class="small" value="<?php echo $mic->horas; ?>"  />
							</div>
							<div class="sfinput">
								<span >Has</span>
								<input id="ha" type="text" name="ha" class="small" value="<?php echo $mic->ha; ?>"/>
							</div>
							<div class="sfinput">
								<span>F.E CO<sub>2</sub></span>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $mic->emision_co2; ?>"/>
							</div>
							<div class="sfinput" >
								<span >F.E CH<sub>4</sub></span>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $mic->emision_ch4; ?>"/>
							</div>
							<div class="sfinput">
								<span>F.E N<sub>2</sub>O</span>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $mic->emision_n2o; ?>" />
							</div>	
							<div class="sfinput">
								<span>F.E CO<sub>2</sub>eq</span>
								<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $mic->emision_co2_eq; ?>"/>
							</div>
							<div class="sfinput">
								<span>Unidad</span>
								<input id="unidad" READONLY type="text" name="unidad" class="small" value="<?php echo $mic->unidad; ?>"/>
							</div>
				</fieldset>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<div id="hide">
						<input type="hidden" name="consumo" value="" id="consumo" />
					</div>
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['labor'])) { ?> onclick="updateEwork(<?php echo $_GET['labor']; ?>);" <?php } else { ?>onclick="addEwork();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
	<div id="list" class="box" style="position:absolute; display:none;">
	<div class="title">
		<h2>Users</h2>
		<span class="hide"></span>
	</div>
</div>
<script type="text/javascript" src="js/pcrop-work.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
   <?php
		if(isset($_GET['labor'])) {
	?>	$.getJSON("_ajax/getConsumoFromLabor.php",{id: $("#labor").val(), ajax: 'true'}, function(obj){
		jQuery("#consumo").val(obj.consumo);
		var consumo = jQuery("#consumo").val();
		var horas = jQuery("#horas").val();
		var ha = jQuery("#ha").val();
		if(horas == '') {
			if(ha == '') {
				
			} else {
				var res = consumo*ha;
				jQuery("#conso").val(res);
			}
		} else {
			var res = consumo*horas;
			jQuery("#conso").val(consumo*horas);
		}	  
    });
	<?php	}
   ?>
  $("select#categoria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Cat_Labor.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Labor</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#labor-button").remove();
     $("select#labor").html(options);
	  
        $("select#labor").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  $("select#labor").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Labor_Maq.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Maquinaria</option>';
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
    });
	$.getJSON("_ajax/getConsumoFromLabor.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		//var obj = jQuery.parseJSON(obj);
		//alert(obj.consumo);
		jQuery("#consumo").val(obj.consumo);
		var consumo = jQuery("#consumo").val();
		var horas = jQuery("#horas").val();
		var ha = jQuery("#ha").val();
		if(horas == '') {
			if(ha == '') {
				
			} else {
				var res = consumo*ha;
				jQuery("#conso").val(res);
			}
		} else {
			var res = consumo*horas;
			jQuery("#conso").val(consumo*horas);
		}
		// $("#maquinaria-button").remove();
		// $("select#maquinaria").html(options);
	  
    });
  });
  $("select#maquinaria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/getMaquinaria.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);		
		jQuery("#emision_co2").val(obj.emision_co2);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_ch4").val(obj.emision_ch4);		
		jQuery("#emision_co2_eq").val(obj.emision_co2_eq);	
		jQuery("#fuente").val(obj.fuente);	
    })
  });
  $("#ha").keyup(function(){
		var consumo = jQuery("#consumo").val();
		var horas = jQuery("#horas").val();
		var ha = jQuery("#ha").val();
		if(horas == '') {
			if(ha == '') {
				
			} else {
				var res = consumo*ha;
				jQuery("#conso").val(res);
			}
		} else {
			var res = consumo*horas;
			jQuery("#conso").val(consumo*horas);
		}
	});
	$("#horas").keyup(function(){
		var consumo = jQuery("#consumo").val();
		var horas = jQuery("#horas").val();
		var ha = jQuery("#ha").val();
		if(horas == '') {
			if(ha == '') {
				
			} else {
				var res = consumo*ha;
				jQuery("#conso").val(res);
			}
		} else {
			var res = consumo*horas;
			jQuery("#conso").val(consumo*horas);
		}
	});
})
</script>