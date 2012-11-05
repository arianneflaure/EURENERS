<?php
	@session_start();
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$cultivo = new animales();
	$culti = $cultivo->getAllRecords();

	$productos = new productos();	
	$prods = $productos->getAllRecords();	
	
	$animal = new animales();	
	$ans = $animal->getAllRecords();
	$c = new empresa_productos_resultantes();
	if(isset($_GET['producto'])){
		$mic = $c->getRecordE($_GET['producto']);
	} else {
		$mic = new empresa_productos_resultantes();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Inventario de Productos</h2>
			<span onclick="window.location='?view=lpanimal_products'" class="add">List</span>
		</div>
				
		<div class="content forms tabs" style="height:230px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Productos</a></li> 
					<!--<li><a href="#tabs-2">Herbaceos</a></li>-->
				
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
				<div class="finput" id="btip" style="margin: 5px;">
					<label >Animal</label>
					<select id="animal" name="animal">
						<?php foreach($culti as $c) { ?>
							<option value="<?php echo $c->identificador; ?>" <?php if($c->identificador == $mic->cultivo) echo "SELECTED" ?>><?php echo utf8_encode($c->nombre); ?></option>
						<?php } ?>	
					</select>
				</div>
				<fieldset>
					<legend>Producto</legend>
						<div id="lesinputs users">
							
							
							<div class="line">
								<div class="finput" id="btip">
								<label >Categorias</label>
								<select id="categoria" name="categoria">
									<option value="">Select Categoria</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
								</div>
								<div class="finput" id="btip">
								<label>Producto</label>
								<select id="producto" name="producto" >
									<option value="">Select categoria</option>
									<?php foreach($prods as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->producto) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
								</div>
								<div class="sfinput">
									<label >Cantidad</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="<?php echo $mic->cantidad; ?>" />
								</div>
								<div class="finput">
									<label >Unidad</label>
									<input id="unidad" type="text" name="unidad" READONLY class="small" value="<?php echo $mic->unidad; ?>" />
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width: 85px;">Rendimiento(%)</label>
									<input id="rendimiento" type="text" name="rendimiento" class="small" value="<?php echo $mic->rendimiento; ?>" />
								</div>
								<div class="sfinput">
									<label >Produccion</label>
									<input id="prod" type="text" name="prod" class="small" value="" />
								</div>
							
							</div>
							
						</div>
						
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_GET['producto'])) { ?><input type="hidden" name="producto" value="<?php echo $_GET['producto']; ?>" id="producto" /><?php } ?>
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['producto'])) { ?> onclick="updateCprod(<?php echo $_GET['producto']; ?>);" <?php } else { ?>onclick="addCprod();"<?php } ?>><span>Accept</span></button>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
				
			</form>
		</div>
		<!--
		<div id="tabs-2">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Producto Herbaceo</legend>
						<div id="lesinputs users">
							<div class="line">
								<div class="finput" id="btip">
								<label>Categorias</label>
								<select id="categoria" name="categoria">
								<option value="">Select Categorias</option>
							
								</select>
								</div>
								<div class="finput" id="btip">
								<label >Producto</label>
								<select id="residuo" name="residuo" >
								<option value="">Select Producto</option>
							
								</select>
								</div>
								<div class="sfinput">
									<label >Cantidad</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="" />
								</div>
								<div class="finput">
									<label >Unidad</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="" />
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width: 85px;">Rendimiento(%)</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >Produccion</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >Fraccion Comercial</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >%Rastrojo</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >%Quema</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label style="width: 85px;">Rendimiento Paja</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
							
							</div>
							
							</div>
							
				</fieldset>	
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" onclick=""><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>-->
       </div>
       </div>
       </div>

<script type="text/javascript" src="js/pcrop-prods.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
  $("select#categoria").change(function(){
	//alert('charge les materia stp');
    $.getJSON("_ajax/select_Cat_Producto.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select Producto</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#producto-button").remove();
     $("select#producto").html(options);
	  
        $("select#producto").selectmenu({
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
	$("#cantidad").keyup(function(){
		var performance = $('#rendimiento').val();
		var amount = $('#cantidad').val();
		if(performance != "" && amount != "")
			$("#prod").val(performance*amount);
	});
	var performance = $('#rendimiento').val();
	if(performance != '') {
		var amount = $('#cantidad').val();
		if(performance != "" && amount != "")
			$("#prod").val(performance*amount);
	}
})
</script>