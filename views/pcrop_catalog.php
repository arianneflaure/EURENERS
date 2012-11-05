<?php
	@session_start();
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$cultivo = new cultivos();
	$culti = $cultivo->getAllRecords();
	$c = new empresa_cultivos();
	if(isset($_GET['cultivo'])){
		$mic = $c->getRecordE($_GET['cultivo']);
	} else {
		$mic = new empresa_cultivos();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
	
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Inventario Cultivos</h2>
			<span onclick="window.location='?view=lpcrop_catalog'" class="add">List</span>
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
					<legend>Cultivos</legend>
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
							<label style="width:60px">Cultivo</label>
							<select id="cultivo" name="cultivo">
								
								<?php foreach($culti as $c) { ?>
								<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->cultivo) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
								<?php } ?>
								
							</select>
						</div>
						<div class="sfinput">
							<label> Sup(Ha)</label>
							<input id="superficie" name="superficie" type="text" class="small" value="<?php echo $mic->superficie; ?>" />
						</div>
						<div class="sfinput">
							<label style="width:115px;">Redimiento(Kg/Ha)</label>
							<input id="rendimiento" name="rendimiento" type="text" class="small" value="<?php echo $mic->rendimiento; ?>" />
						</div>
						
						
						
					</div>
					
					<div class="nextline microps">
						<div class="sfinput">
							<label style="width:90px;"> Produccion(Kg)</label>
							<input id="production" name="production" type="text" class="small" value="" READONLY />
						</div>
						<div class="sfinput">
							<label>Residuo Cultivo</label>
							<input id="residuo_cultivo" name="residuo_cultivo" type="text" class="small" value="<?php echo $mic->residuo_cultivo; ?>" />
						</div>
						<div class="sfinput">
							<label>%Residuo</label>
							<input id="porcentaje_residuo" name="porcentaje_residuo" type="text" class="small" value="<?php echo $mic->porcentaje_residuo; ?>" />
						</div>
						
					</div>
					
				
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['cultivo'])) { ?><input type="hidden" name="cultivo" value="<?php echo $_GET['cultivo']; ?>" id="cultivo" /><?php } ?>
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['cultivo'])) { ?> onclick="updateEcrop(<?php echo $_GET['cultivo']; ?>);" <?php } else { ?>onclick="addEcrop();"<?php } ?>><span>Accept</span></button>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/pcrop-catalog.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
	$("select#categoria").change(function(){
		//alert('charge les materia stp');
		$.getJSON("_ajax/select_Cat_Cultivo.php",{id: $(this).val(), ajax: 'true'}, function(j){
			var options = '';
			options += '<option value="">Select Cultivo</option>';
			for (var i = 0; i < j.length; i++) {
				options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
			}
			$("#cultivo-button").remove();
			$("select#cultivo").html(options);

			$("select#cultivo").selectmenu({
				style: 'dropdown',
				transferClasses: true,
				width: null
			});
		})
	});
	$("#production").keyup(function(){
		var performance = $('#rendimiento').val();
		var superficie = $('#superficie').val();
		if(performance != "" && superficie != "")
			$("#production").val(performance*superficie);
	});
	$("#rendimiento").keyup(function(){
		var performance = $('#rendimiento').val();
		var superficie = $('#superficie').val();
		if(performance != "" && superficie != "")
			$("#production").val(performance*superficie);
	});
	$("#superficie").keyup(function(){
		var performance = $('#rendimiento').val();
		var superficie = $('#superficie').val();
		if(performance != "" && superficie != "")
			$("#production").val(performance*superficie);
	});
	var performance = $('#rendimiento').val();
	if(performance != '') {
		var superficie = $('#superficie').val();
		if(performance != "" && superficie != "")
			$("#production").val(performance*superficie);
	}
})
</script>