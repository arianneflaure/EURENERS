<?php
	$categoria = new animales();	
	$cats = $categoria->getAllRecords();
	
	$maquinaria = new maquinarias();	
	$maq = $maquinaria->getAllRecords();

	$c = new provincias_animales_excreta();
	if(isset($_GET['animal'])){
		$mic = $c->getRecordE($_GET['animal'], $_GET['provincia']);
	} else {
		$mic = new provincias_animales_excreta();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Edit or record Excreta for <?php echo utf8_encode($c->getName($_GET['provincia'], 'provincias')); ?></h2>
			<span onclick="window.location='?view=lmd-p-excreta&provincia=<?php echo $_GET['provincia']; ?>'" class="add">List</span>
		</div>
		<div class="content forms" style="height:100px">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Animal excreta per provincia</legend>
					<fieldset>
					
					<legend>Animal Excreta</legend>
					<div id="lesinputs">
				
						<div class="line">
                            
							<div class="finput" id="btip">
								<label style="width:60px">Animal</label>
								<select id="categoria" name="categoria">
									<option value="">Select Animal</option>
									<?php foreach($cats as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->animal) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							
							<div class="sfinput">
								<label style="width:85px;">Excreta</label>
								<input id="porcentaje_excreta" name="porcentaje_excreta" type="text" class="small" value="<?php echo $mic->porcentaje_excreta; ?>" />
							</div>
							<div class="sfinput">
							<label style="width:85px;">Fuente</label>
							<input id="fuente" name="fuente" type="text" class="medium" value="<?php echo $mic->fuente; ?>" />
						</div>

						</div>
					
					
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