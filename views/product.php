<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$c = new productos();
	if(isset($_GET['id'])){
		$p = $c->getRecord($_GET['id']);
	} else {
		$p = new productos();
		$vars = $p->getAllFields();
		foreach($vars as $var)
			$p->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Products</h2>
			<span onclick="window.location='?view=lproduct'" class="add">List</span>
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
								<label  style="width:124px;">Tipo Producto</label>
								<select name="tipo_producto">
									<option value="Produccion Agricola" <?php if($p->tipo_producto == 'Produccion Agricola') echo "SELECTED"; ?>>Produccion Agricola</option>
									<option value="Produccion Ganadera" <?php if($p->tipo_producto == 'Produccion Ganadera') echo "SELECTED"; ?>>Produccion Ganadera</option>
									<option value="Transformacion Queso" <?php if($p->tipo_producto == 'Transformacion Queso') echo "SELECTED"; ?>>Transformacion Queso</option>
									<option value="Transformacion Carne" <?php if($p->tipo_producto == 'Transformacion Carne') echo "SELECTED"; ?>>Transformacion Carne</option>
									<option value="Transformacion Aceite" <?php if($p->tipo_producto == 'Transformacion Aceite') echo "SELECTED"; ?>>Transformacion Aceite</option>
									

								</select>
							</div>
							<div class="finput">
								<label >Nombre</label>
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo $p->nombre; ?>" />
							</div>
							<div class="finput">
								<label >Unidad</label>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $p->unidad; ?>" />
							</div>
							
							<!--
							-->
						</div>
						
						
						<div class="nextline">
							<div class="finput">
								<label>Valor Energetico</label>
								<input id="valor_energetico" type="text" name="valor_energetico" class="small" value="<?php echo $p->valor_energetico; ?>" />
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">Precio</label>
								<input id="precio" type="text" name="precio" class="small" value="<?php echo $p->precio; ?>" />
							</div>	
							<div class="sfinput">
								<label style="margin-right : 0px;">Ext. N</label>
								<input id="extraccion_kg_n" type="text" name="extraccion_kg_n" class="small" value="<?php echo $p->extraccion_kg_n; ?>" />
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">Ext. P</label>
								<input id="extraccion_kg_p" type="text" name="extraccion_kg_p" class="small" value="<?php echo $p->extraccion_kg_p; ?>" />
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">Ext. K</label>
								<input id="extraccion_kg_k" type="text" name="extraccion_kg_k" class="small" value="<?php echo $p->extraccion_kg_k; ?>"/>
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">Fij. C</label>
								<input id="fijacion_c" type="text" name="fijacion_c" class="small" value="<?php echo $p->fijacion_c; ?>" />
							</div>
							
									
						</div>
						<div class="line">
							<div class="finput">
								<label>Fuente</label>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo $p->fuente; ?>" style="margin-left : 30px;" />
							</div>
							<div class="finput" id="btip" style="float : left; ">
								<label style="width:60px">Categoria</label>
								<select id="categoria" name="categoria">
									<option value="">Select Categoria</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $p->categoria) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateProd(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addProd();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/product.js"></script>