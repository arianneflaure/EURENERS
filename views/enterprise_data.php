<?php
	global $user;
	@session_start();
	$prov = new provincias();	
	$provs = $prov->getAllRecords();
	//var_dump($_SESSION['u']['idgroupe']);
	$empresa = new empresas();
	if($_SESSION['u']['idgroupe'] == 2)
		$_GET['id'] = $_SESSION['u']['enterprise'];
		
	//var_dump($_GET['id']);
	if(isset($_GET['id'])){
		$empresa = $empresa->getRecord($_GET['id']);
		$dateini = explode(" ", $empresa->fecha_inicio);
		$dateini = explode("-", $dateini[0]);
		$array = array();
		$lastelt = count($dateini) - 1;
		while($lastelt >= 0) {
			$array[] = $dateini[$lastelt];
			$lastelt--;
		}
		$empresa->fecha_inicio = implode(".", $array);
		
		$dateini = explode(" ", $empresa->fecha_fin);
		$dateini = explode("-", $dateini[0]);
		$array = array();
		$lastelt = count($dateini) - 1;
		while($lastelt >= 0) {
			$array[] = $dateini[$lastelt];
			$lastelt--;
		}
		$empresa->fecha_fin = implode(".", $array);
	} else {
		$empresa = new empresas();
		$emp = $empresa->getAllFields();
		foreach($emp as $var)
			$empresa->$var = '';
	} 	
	
	//var_dump($empresa); die('Toto');
	global $lang;
	
?>
<div class="">
	<div class="box">
		<div class="title">
			<h2>Enterprise Data</h2>
			<?php if($user->hasListRight(4) == 'Y') { ?><span onclick="window.location='?view=lenterprise_data'" class="add">List</span> <?php } ?>
		</div>
		<div class="content tabs">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Datos Empresa</a></li> 
					<!--<li><a href="#tabs-2">Datos Usuario</a></li>-->
				</ul>
			</div>
			
			<div id="tabs-1" style="padding : 0">
			<form id="dataenterprise">
				<fieldset>
					<legend>Enterprise</legend>
						<fieldset>
							<legend>General informations</legend>
							 <div class="finput" style="float: left; margin-right: 20px;border : 0;">
								Nombre
								<input id="nombre" type="text" name="nombre" class="big" value="<?php echo $empresa->nombre; ?>" style="margin-left : 20px;" />
							</div>
							 <div class="sfinput" style="border : 0;">
								Codigo
								<input id="codigo" type="text" name="codigo" class="small" value="<?php echo $empresa->codigo; ?>" style="margin-left : 20px;" />
							</div>
							<fieldset style="margin-top:10px; width : 310px; padding-right :0; float : left">
								<legend>General informations</legend>
								<div style="border : 0;">
									<input type="checkbox" name="es_agricola" id="es_agricola" value="1" <?php if($empresa->es_agricola == 1) echo "CHECKED"; ?> />
									<label for="es_agricola" style="margin-right:10px">Agricola</label>
								</div>
								<div style="border : 0;">
									<input type="checkbox" name="es_ganadera" id="es_ganadera" value="1" <?php if($empresa->es_ganadera == 1) echo "CHECKED"; ?> />
									<label for="es_ganadera" style="margin-right:10px">Ganadera</label>
								</div>
								<div style="border : 0;">
									<input type="checkbox" name="es_transformacion" id="es_transformacion" value="1" <?php if($empresa->es_transformacion == 1) echo "CHECKED=TRUE"; ?> />
									<label for="es_transformacion" style="margin-right:-10px">Transformacion</label>
								</div>
							</fieldset>
							<div style="float: left;line-height: 50px; margin-left: 25px; margin-top: 15px;">
								<span class="date">Fecha I.</span> <input type="text" name="fecha_inicio" id="fecha_inicio" class="datepicker" value="<?php echo $empresa->fecha_inicio; ?>"	/> 
							</div>
							<div style="float: left;line-height: 50px; margin-left: 25px; margin-top: 15px;">
								<span class="date">Fecha F.</span> <input type="text" name="fecha_fin" id="fecha_fin" class="datepicker" value="<?php echo $empresa->fecha_fin; ?>" /> 
							</div>
						</fieldset>
						<fieldset>
							<legend>Domicilio Social</legend>
							<div class="finput" id="btip" style=" margin-right:10px; float : left;">
								<label style="margin: 3px -39px 0 0;">Provincia</label>
								<select id="provincia" name="provincia">
									<option value="">Select provincia</option>
									<?php foreach($provs as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $empresa->provincia) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							 <div class="finput" id="mun" style=" margin-right:10px; float : left;">
								<label style="margin: 3px -39px 0 0;">Municipio</label>
								<select id="municipio" name="municipio">
									<?php if(isset($_GET['id'])) { 
									$p = new municipios;
									$muns = $p->getMunicipiosFromProvincia($empresa->provincia);
									foreach($muns as $mun) {
									?>
									<option value="<?php echo $mun->identificador; ?>" <?php if($mun->identificador == $empresa->municipio) echo "SELECTED" ?>><?php echo utf8_encode($mun->nombre); ?></option>
									<?php } 
									} else { ?>
									<option value="">Select municipio first</option>
									<?php } ?>
								</select>
							</div>
							 <div class="sfinput" style="border : 0;float : left;margin-left:50px;">
								C.P.
								<input id="codigo_postal" type="text" name="codigo_postal" class="small" value="<?php echo $empresa->codigo_postal; ?>" style="margin-left : 20px;" />
							</div>
							 <div class="finput" style="border : 0;float : left;margin-top:15px">
								Direccion
								<input id="direccion" type="text" name="direccion" class="medium" value="<?php echo $empresa->direccion; ?>" style="margin-left : 20px;" />
							</div>
							 <div class="sfinput" style="border : 0;float : left;margin-left:20px;margin-top:15px">
								Num
								<input id="numero" type="text" name="numero" class="small" value="<?php echo $empresa->numero; ?>" style="margin-left : 20px;" />
							</div>
							 <div class="sfinput" style="border : 0;float : left;margin-left:20px;margin-top:15px">
								Telef.
								<input id="telefono" type="text" name="telefono" class="small" value="<?php echo $empresa->telefono; ?>" style="margin-left : 20px;" />
							</div>
							
						</fieldset>
						
						
					<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
						<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateEnterprise(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addEnterprise();"<?php } ?>><span>Accept</span></button>
						<button class="green medium" type="button"><span>Cancel</span></button>
					</div>
				</fieldset>
			</form>
			</div><!--
			<div id="tabs-2">
				<form id="datauser">
				<fieldset>
					<legend>Datos Usuario</legend>
						 <div class="finput" style="float: left; margin-right: 20px;border : 0;">
							Nombre
							<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo ""; ?>" style="margin-left : 20px;" />
						</div>
						 <div class="sfinput" style="border : 0;">
							Appelidos
							<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo ""; ?>" style="margin-left : 20px;" />
						</div>
						<div class="sfinput" style="border : 0; float : left; margin-top : 15px">
							Email
							<input id="nombre" type="text" name="nombre" class="small" value="<?php echo ""; ?>" style="margin-left : 20px;" />
						</div>
						<div class="sfinput" style="border : 0; float : left; margin-top : 15px">
							Tfono.
							<input id="nombre" type="text" name="nombre" class="small" value="<?php echo ""; ?>" style="margin-left : 20px;" />
						</div>
						
						<div style="float: left; line-height: 10px; margin-left: 10px; margin-top: 15px;">
							<span style="">Grupo</span>
							<select id="group" name="group" class="">
								<option  value="1">Administrator</option>
								<option  value="2">User</option>
							</select>
						</div>
						<div style="float: left; line-height: 10px; margin-left: 10px; margin-top: 15px;">
							<span style="">Idioma</span>
							<select id="idioma" name="idioma">
								<option  value="es">Spanish</option>
								<option  value="en">English</option>
							</select>
						</div>
						<fieldset style="margin: 58px auto 10px;   width: 60%;">
							<legend>Acceso Eureners</legend>
							
							 <div class="sfinput" style="border : 0;float : left;margin-left:20px;margin-top:15px">
								Usuario
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo ""; ?>" style="margin-left : 20px;" />
							</div>
							 <div class="sfinput" style="border : 0;float : left;margin-left:20px;margin-top:15px">
								Clave Acceso
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo ""; ?>" style="margin-left : 20px;" />
							</div>
							
						</fieldset>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
			<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
				<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateEnterprise(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addEnterprise();"<?php } ?>><span>Accept</span></button>
				<button class="green medium" type="button"><span>Cancel</span></button>
			</div>
			</form>
				
			</div>-->
			
			
		</div>
	</div>
</div>
<script type="text/javascript" src="js/enterprise_data.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#provincia").change(function(){
	
    $.getJSON("_ajax/selectMunicipio.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#municipio-button").remove();
     $("select#municipio").html(options);
	  
        $("select#municipio").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  })
})
</script>