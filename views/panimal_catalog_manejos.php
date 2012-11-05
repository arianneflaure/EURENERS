<?php
	$categoria = new manejos();	
	$cats = $categoria->getAllRecords();
	
	$maquinaria = new maquinarias();	
	$maq = $maquinaria->getAllRecords();

	$c = new empresa_animales_manejos();
	if(isset($_GET['animal']) && isset($_GET['manejo'])){
		$mic = $c->getRecordE($_GET['animal'], $_GET['manejo']);
	} else {
		$mic = new empresa_animales_manejos();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Edit Manejo for <?php echo utf8_encode($c->getName($_GET['animal'], 'animales')); ?></h2>
			<span onclick="window.location='?view=lpanimal_catalog_manejos&animal=<?php echo $_GET['animal'] ?>'" class="add">List</span>
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
					<legend></legend>
					<fieldset>
					<div id="lesinputs">
				
						<div class="line">
                            
						<div class="finput" id="btip">
							<label style="width:60px">Manejo</label>
							<select id="manejo" name="manejo">
								<option value="">Select Manejo</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->manejo) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="finput" id="btip">
							<label style="width:85px;">Porcentaje</label>
							<input id="porcentaje" name="porcentaje" type="text" class="medium" value="<?php echo $mic->porcentaje; ?>" />
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
					<?php if(isset($_GET['animal'])) { ?><input type="hidden" name="animal" value="<?php echo $_GET['animal']; ?>" id="animal" /><?php } ?>
					<?php if(isset($_GET['manejo'])) { ?><input type="hidden" name="manejo" value="<?php echo $_GET['manejo']; ?>" id="manejo" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['animal']) && isset($_GET['manejo'])) { ?> onclick="updateAManejos(<?php echo $_GET['animal']; ?>);" <?php } else { ?>onclick="addAManejos();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				    </div>
				
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/prod-manejos.js"></script>