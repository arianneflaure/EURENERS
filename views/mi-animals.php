<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$c = new animales();
	if(isset($_GET['id'])){
		$mic = $c->getRecord($_GET['id']);
	} else {
		$mic = new animales();
		$vars = $mic->getAllFields();
		foreach($vars as $var)
			$mic->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Animals</h2>
			<span onclick="window.location='?view=lmi-animals'" class="add">List</span>
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
					<legend>Animals</legend>
					<div class="line mianimales">
						<div class="finput first">
							<label>Nombre</label>
							<input id="nombre" name="nombre" type="text" class="small" value="<?php echo $mic->nombre; ?>" />
						</div>
						<div class="sfinput">
							<label  style="width:100px;">Peso Animal</label>
							<input id="peso_medio"  name="peso_medio" type="text" class="small" value="<?php echo $mic->peso_medio; ?>"/>
						</div>
						<div class="sfinput">
							<label style="width:150px;">Fermentacion Enterica</label>
							<input id="fermentacion" name="fermentacion" type="text" class="small" value="<?php echo $mic->fermentacion; ?>"  />
						</div>
						<div class="finput last">
							<label>Fuente</label>
							<input name="fuente" id="fuente" type="text" class="small" value="<?php echo $mic->fuente; ?>" />
						</div>
						
					</div>
				<div class="nextline mianimales">
						<div class="sfinput">
							<label>UGM</label>
							<input id="ugm" name="ugm" type="text" class="small" value="<?php echo $mic->ugm; ?>" />
						</div>
						<div class="sfinput">
							<label>%Peso N</label>
							<input id="porcentaje_n" name="porcentaje_n" type="text" class="small" value="<?php echo $mic->porcentaje_n; ?>" />
						</div>
						<div class="sfinput">
							<label>%Peso P</label>
							<input id="porcentaje_p" name="porcentaje_p" type="text" class="small" value="<?php echo $mic->porcentaje_p; ?>" />
						</div>
						<div class="sfinput">
							<label>%Peso k</label>
							<input id="porcentaje_k" name="porcentaje_k" type="text" class="small" value="<?php echo $mic->porcentaje_k; ?>" />
						</div>
						<div class="sfinput">
							<label>Mj</label>
							<input id="mj_peso_vivo" name="mj_peso_vivo" type="text" class="small" value="<?php echo $mic->mj_peso_vivo; ?>" />
						</div>
						
					</div>
					
					
				<div class="line mianimales">
						<div class="finput" id="btip">
							<label style="width:60px">Categoria</label>
							<select id="categoria" name="categoria">
								<option value="">Select Categoria</option>
								<?php foreach($cats as $t) { ?>
								<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $mic->categoria) echo "SELECTED" ?>><?php echo $t->nombre; ?></option>
								<?php } ?>
							</select>
						</div>
				</div>
				<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
					<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateMia(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addMia();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>

				</fieldset>
			</form> 
		</div>
	</div>
</div>
<script type="text/javascript" src="js/mi-animals.js"></script>