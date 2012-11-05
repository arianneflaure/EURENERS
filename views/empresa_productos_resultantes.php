<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$producto = new  productos_finales();	
	$prods = $producto->getAllRecords();
	
	$c = new empresa_unidades_funcionales();
	if(isset($_GET['producto_final'])){
		$p = $c->getRecordE($_GET['producto_final'], $_GET['enterprise']);
	} else {
		$p = new empresa_unidades_funcionales();
		$vars = $p->getAllFields();
		foreach($vars as $var)
			$p->$var = '';
	}
	//var_dump($p); die;
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Final Products for enterprise</h2>
			<span onclick="window.location='?view=lempresa_productos_resultantes&enterprise=<?php echo $_GET['enterprise']; ?>'" class="add">List</span>
		</div>
		<div class="content forms" style="height:230px">
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
					<legend>Products</legend>
					<div id="lesinputs">
				
						<div class="line">
							<div class="finput">
								<label  style="width:104px;">Tipo Producto</label>
								<select id="tipo_producto" name="tipo_producto">
									<option value="">Select tipo</option>
									<option value="Produccion Agricola" <?php if($p->tipo_producto == 'Produccion Agricola') echo "SELECTED"; ?>>Produccion Agricola</option>
									<option value="Produccion Ganadera" <?php if($p->tipo_producto == 'Produccion Ganadera') echo "SELECTED"; ?>>Produccion Ganadera</option>
									<option value="Transformacion Queso" <?php if($p->tipo_producto == 'Transformacion Queso') echo "SELECTED"; ?>>Transformacion Queso</option>
									<option value="Transformacion Carne" <?php if($p->tipo_producto == 'Transformacion Carne') echo "SELECTED"; ?>>Transformacion Carne</option>
									<option value="Transformacion Aceite" <?php if($p->tipo_producto == 'Transformacion Aceite') echo "SELECTED"; ?>>Transformacion Aceite</option>
								</select>
							</div>
							<div class="finput">
								<label  style="width:124px;">Categoria Producto</label>
								<select id="categoria" name="categoria">
									<option value="">Select Categoria</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $p->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="finput">
								<label  style="width:64px;">Nombre</label>
								<select id="producto_final" name="producto_final">
									<option value="">Select Producto</option>
									<?php foreach($prods as $pd) { ?>
									<option value="<?php echo $pd->identificador; ?>" <?php if($pd->identificador == $p->producto_final) echo "SELECTED" ?>><?php echo utf8_encode($pd->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="finput" style="margin-top:10px">
								<label >Description</label>
								<input id="descripcion" type="text" name="descripcion" class="medium" value="<?php echo $p->descripcion; ?>" />
							</div>
							
							<!--
							-->
						</div>
						
						
						<div class="nextline">
							<div class="finput">
								<label >Cantidad</label>
								<input id="cantidad" type="text" name="cantidad" class="small" value="<?php echo $p->cantidad; ?>" />
							</div>
							<div class="finput">
								<label >Unidad</label>
								<input id="unidad" type="text" READONLY name="unidad" class="small" value="<?php echo $p->unidad; ?>" />
							</div>							
						</div>
						<div class="line">
							
						</div>
					</div>
					
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<?php if(isset($_GET['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_GET['enterprise']; ?>" id="empresa" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['producto_final'])) { ?> onclick="updateProdF(<?php echo $_GET['producto_final']; ?>);" <?php } else { ?>onclick="addProdF();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/final_enterprise_product.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){

  $("select#categoria").change(function(){
    $.getJSON("_ajax/select_Cat_ProdFinales.php",{id: $(this).val(), ajax: 'true'}, function(j){
      var options = '';
	  options += '<option value="">Select producto</option>';
      for (var i = 0; i < j.length; i++) {
        options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
      }
	  $("#producto_final-button").remove();
     $("select#producto_final").html(options);
	  
        $("select#producto_final").selectmenu({
            style: 'dropdown',
            transferClasses: true,
            width: null
        });
    })
  });
  
 $("select#producto_final").change(function(){
    $.getJSON("_ajax/getProductoFinal.php",{id: $(this).val(), ajax: 'true'}, function(obj){
		jQuery("#unidad").val(obj.unidad);
    })
  })
});
</script>