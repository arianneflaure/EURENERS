<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	
	$maquinaria = new maquinarias();	
	$maq = $maquinaria->getAllRecords();

	$c = new empresa_maquinarias();
	if(isset($_GET['maquinaria'])){
		$mic = $c->getRecordE($_GET['maquinaria']);
	} else {
		$mic = new empresa_maquinarias();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Inventario Maquinaria</h2>
			<span onclick="window.location='?view=lprod_machines'" class="add">List</span>
		</div>
		<div class="content forms" style="height:100px">
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
					<legend>Inventario de Maquinaria</legend>
					<fieldset>
					
					<legend>Maquinaria</legend>
					<div id="lesinputs">
				
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
							<label style="width:85px">Maquinaria</label>
							<select id="maquinaria" name="maquinaria">
								
							 <?php foreach($maq as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->maquinaria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="sfinput">
							<label style="width:85px;">Antiguedad</label>
							<input id="antiguedad" name="antiguedad" type="text" class="small" value="<?php echo $mic->antiguedad; ?>" />
						</div>
						<div class="sfinput">
							<label style="width:85px;">Utilizacion</label>
							<input id="utilizacion" name="utilizacion" type="text" class="small" value="<?php echo $mic->utilizacion; ?>" />
						</div>

					</div>
					
					
						</div>
			
						</div>
						
					</div>
					<div id="newuser">
						
					</div>
					
				</fieldset>
				</fieldset>
					<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_SESSION['u']['enterprise'])) { ?><input type="hidden" name="empresa" value="<?php echo $_SESSION['u']['enterprise']; ?>" id="empresa" /><?php } ?>
					<input type="hidden" name="es_produccion" value="1" id="es_produccion" />
					<input type="hidden" name="es_transformacion" value="0" id="es_transformacion" />
					<button class="green medium" type="button" <?php if(isset($_GET['maquinaria'])) { ?> onclick="updateEmachine(<?php echo $_GET['maquinaria']; ?>);" <?php } else { ?>onclick="addEmachine();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				    </div>
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/prod-maquinaria.js"></script>