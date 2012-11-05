<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new residuos();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new residuos();
		$vars = $mic->getAllFields();
		$type = $mic->getAllRecords();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Wastes</h2>
			<span onclick="window.location='?view=lwastes'" class="add">List</span>
		</div>
		<div class="content forms" style="height:180px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div id="subhead">
				<a href="#"><img src="gfx/table-first.gif" /></a>
				<input id="user" type="text" class="medium" value="" />
				<a href="#"><img src="gfx/table-last.gif" /></a>
			</div>
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Wastes</legend>
					<div id="lesinputs">
				
						<div class="line">
								<div class="finput" style=" margin-right:10px;">
								<label style="width:124px;">Typo Activadad</label>
							<select id="tipo_residuo" name="tipo_residuo">
							
								<option value="">Select Actividad</option>
								<option value="Produccion Agricola" >Produccion Agricola</option>
								<option value="Produccion Ganadera" <?php if($mic->tipo_residuo == 'Produccion Ganadera') echo "SELECTED"; ?> >Produccion Ganadera</option>
								<option value="Industria Carnica" <?php if($mic->tipo_residuo == 'Industria Carnica') echo "SELECTED"; ?>>Industria Carnica</option>
								<option value="Industria Quesera" <?php if($mic->tipo_residuo == 'Industria Quesera') echo "SELECTED"; ?>>Industria Quesera</option>
								<option value="Industria aceitera" <?php if($mic->tipo_residuo == 'Industria aceitera') echo "SELECTED"; ?> >Industria aceitera</option>
								<option value="Uso Domestico" <?php if($mic->tipo_residuo == 'Uso Domestico') echo "SELECTED"; ?>>Uso Domestico</option>
								
															
							</select>

							</div>

							<div class="finput" style=" margin-right:10px;" >
								<label >Nombre</label>
								<input id="nombre" type="text" name="nombre" class="medium" value="<?php echo $mic->nombre; ?>" />
							</div>
							<div class="finput" style=" margin-right:10px;">
								<label >LER</label>
								<input id="codigo_ler" type="text" name="codigo_ler" class="small" value="<?php echo $mic->codigo_ler; ?>" />
							</div>
							
							
							<!--
							-->
						</div>
						
						
						<div class="nextline">
							<div class="finput" style=" margin-right:10px;">
								<label >Fuente</label>
								<input id="fuente" type="text" name="fuente" class="small" value="<?php echo utf8_encode($mic->fuente); ?>"  />
							</div>
							
					   <div class="finput" id="btip" style=" margin-right:10px;">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
							
						</div>
						
					</div>
					
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updatewaste(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addwaste();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<div id="list" class="box" style="position:absolute; display:none;">
	<div class="title">
		<h2>Users</h2>
		<span class="hide"></span>
	</div>
</div>
<script type="text/javascript" src="js/waste.js"></script>