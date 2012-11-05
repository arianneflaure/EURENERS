<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new cultivos();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new cultivos();
		$vars = $mic->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Cultivos</h2>
			<span onclick="window.location='?view=lmi-crops'" class="add">List</span>
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
						<div class="finput first">
							<label style="width:60px">Nombre</label>
							<input id="nombre" name="nombre" type="text" class="small" value="<?php echo $mic->nombre; ?>" />
						</div>
						<div class="sfinput">
							<label> N</label>
							<input id="extraccion_kg_n" name="extraccion_kg_n" type="text" class="small" value="<?php echo $mic->extraccion_kg_n; ?>" />
						</div>
						<div class="sfinput">
							<label> P<sub>2</sub>O<sub>5</sub></label>
							<input id="extraccion_kg_p" name="extraccion_kg_p" type="text" class="small" value="<?php echo $mic->extraccion_kg_p; ?>" />
						</div>
						<div class="sfinput">
							<label> K<sub>2</sub>O</label>
							<input id="extraccion_kg_k" name="extraccion_kg_k" type="text" class="small" value="<?php echo $mic->extraccion_kg_k; ?>" />
						</div>
						<div class="sfinput">
							<label style="width:30px"> C</label>
							<input id="kg_ct" name="kg_ct" type="text" class="small" value="<?php echo $mic->kg_ct; ?>" />
						</div>
						<div class="finput">
							<label>Unidad</label>
							<input id="unidad" name="unidad" type="text" class="small" value="<?php echo $mic->unidad; ?>" />
						</div>
						
					</div>
					
					<div class="nextline microps">
						<div class="sfinput">
							<label>Mjul</label>
							<input id="mj" name="mj" type="text" class="small" value="<?php echo $mic->mj; ?>" />
						</div>
						<div class="sfinput">
							<label>FracRenew</label>
							<input id="fracrenew" name="fracrenew" type="text" class="small" value="<?php echo $mic->fracrenew; ?>" />
						</div>
						<div class="sfinput">
							<label>Slope</label>
							<input id="slope" name="slope" type="text" class="small" value="<?php echo $mic->slope; ?>" />
						</div>
						<div class="sfinput">
							<label>Intercept</label>
							<input id="intercept" name="intercept" type="text" class="small" value="<?php echo $mic->intercept; ?>" />
						</div>
						<div class="sfinput">
							<label style="width:40px">NAG</label>
							<input id="nag" name="nag" type="text" class="small" value="<?php echo $mic->nag; ?>" />
						</div>
						<div class="sfinput">
							<label style="width:40px">NBG</label>
							<input id="nbg" name="nbg" type="text" class="small" value="<?php echo $mic->nbg; ?>" />
						</div>
						<div class="sfinput">
							<label>RBG-Bio</label>
							<input id="rbg_bio" name="rbg_bio" type="text" class="small" value="<?php echo $mic->rbg_bio; ?>" />
						</div>
					</div>
					
					<div class="line microps">
						<div class="sfinput">
							<label style="width:80px">Materi seco</label>
							<input id="materia_seca" name="materia_seca" type="text" class="small" value="<?php echo $mic->materia_seca; ?>" />
						</div>
						<div class="sfinput">
							<label style="width:90px">Residuo cultivo</label>
							<input id="residuo_cultivo" name="residuo_cultivo" type="text" class="small" value="<?php echo $mic->residuo_cultivo; ?>" />
						</div>
						<div class="sfinput">
							<label>% Residuo</label>
							<input id="porcentaje_residuo" name="porcentaje_residuo" type="text" class="small" value="<?php echo $mic->porcentaje_residuo; ?>" />
						</div>
						<div class="input first">
							<label>Fuente</label>
							<input id="fuente" name="fuente" type="text" class="medium" value="<?php echo $mic->fuente; ?>" />
						</div>
						
						
												
					</div>
					
					<div class="nextline microps">
						<div class="finput" id="btip">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%; text-align: center;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMic(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addMic();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/mi-crops.js"></script>