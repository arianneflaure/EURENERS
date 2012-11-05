<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$servicio = new servicios();
	$serv = $servicio->getAllRecords();
	
	$energia = new energias();
	$energ = $energia->getAllRecords();
	
	$c = new empresa_servicios();
	if(isset($_GET['servicio_auxiliar'])){
		$mic = $c->getRecordE($_GET['servicio_auxiliar']);
	} else {
		$mic = new empresa_servicios();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire btc">
	<div class="box">
		<div class="title">
			<h2>Production | Inventario  Servicios Auxiliares</h2>
			<span onclick="window.location='?view=lproc_aux'" class="add">List</span>
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
					<legend>Inventario de Servicios</legend>
						<div class="line">
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
							<label style="width:60px">Servicio</label>
							<select id="servicio_auxiliar" name="servicio_auxiliar">
								<option value="">Select Categoria</option>
								<?php foreach($serv as $p) { ?>
								<option value="<?php echo $p->identificador; ?>" <?php if($p->identificador == $mic->servicio_auxiliar) echo "SELECTED" ?>><?php echo utf8_encode($p->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="finput" id="btip">
							<label style="width:85px">Tipo Energia</label>
							<select id="energia" name="energia">
								
								<?php foreach($energ as $d) { ?>
								<option value="<?php echo $d->identificador; ?>" <?php if($d->identificador == $mic->energia) echo "SELECTED" ?>><?php echo utf8_encode($d->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						</div>
						<div class="nextline">
						<div class="finput">
							<label>Potencia</label>
							<input id="potencia" name="potencia" type="text" class="small" value="<?php echo $mic->potencia; ?>" />
						</div>
						<div class="finput">
							<label>Horas</label>
							<input id="horas" name="horas" type="text" class="small" value="<?php echo $mic->horas; ?>" />
						</div>
						</div>
					
					</fieldset>
					<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<input type="hidden" name="es_produccion" value="0" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="1" id="es_transformacion" />
					<button class="green medium" type="button" <?php if(isset($_GET['servicio_auxiliar'])) { ?> onclick="updateEcaux(<?php echo $_GET['servicio_auxiliar']; ?>);" <?php } else { ?>onclick="addEaux();"<?php } ?>><span>Accept</span></button>
					
					<button class="green medium" type="button"><span>Cancel</span></button>
				    </div>
					
				
				
				
			</form> 
		</div>
		</div>
	</div>
<script type="text/javascript" src="js/prod-aux.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#categoria").change(function(){
    $.getJSON("_ajax/select_Cat_Aux.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Servicio</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#servicio_auxiliar-button").remove();
     $("select#servicio_auxiliar").html(options);
	  
        $("select#servicio_auxiliar").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
  $("select#servicio_auxiliar").change(function(){
    $.getJSON("_ajax/getEnergia.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);		
		jQuery("#mix").val(obj.mix);		
		jQuery("#emision_co2").val(obj.emision_co2);		
		jQuery("#emision_n2o").val(obj.emision_n2o);		
		jQuery("#emision_ch4").val(obj.emision_ch4);		
		jQuery("#emision_co2_eq").val(obj.emision_co2_eq);	
		jQuery("#fuente").val(obj.fuente);	
    })
  })
});
</script>