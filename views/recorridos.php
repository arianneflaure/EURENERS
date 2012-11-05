<?php

	$b = new recorridos();
	if(isset($_GET['id']) && isset($_GET['vehicule'])){
		$m = $b->getRecord($_GET['id']);		
	} else {
		$m = new recorridos();
		$vars = $m->getAllFields();
		foreach($vars as $var)
			$m->$var = '';
	}
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Recorridos for vehicules</h2>
			<!--<span onclick="window.location='?view=lmaquinarias&type=vehicle'" class="addy">List Vehicles</span>-->
			<span onclick="window.location='?view=lrecorridos&vehicule=<?php echo $_GET['vehicule']; ?>'" class="addy">List Reccoridos</span>
		</div>
		<div class="content forms tabs" style="height:160px;">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			<div class="tabmenu">
				<ul> 
					<!--<li><a href="#tabs-1">Vehiculos</a></li> -->
					<li><a href="#tabs-2">Recorridos</a></li>
				</ul>
			</div>
		
			
			<div id="tabs-2">
				<form id="recorridos" action="" method="post">
					<div id="lesinputs">
						<div class="line">
							<div class="finput">
								<label>Nombre</label>
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo $m->nombre; ?>" />
							</div>
							<div class="sfinput">
								<label  >F.E.CO<sub>2</sub></label>
								<input id="emision_co2" type="text" name="emision_co2" class="small" value="<?php echo $m->emision_co2; ?>" />
							</div>
							<div class="sfinput">
								<label  >F.E.CH<sub>4</sub></label>
								<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="<?php echo $m->emision_ch4; ?>"/>
							</div>
							<div class="sfinput">
								<label>F.E.N<sub>2</sub>O</label>
								<input id="emision_n2o" type="text" name="emision_n2o" class="small" value="<?php echo $m->emision_n2o; ?>"/>
							</div>
							<div class="sfinput">
								<label>F.E.CO<sub>2eq</sub></label>
								<input id="emision_co2_eq" type="text" name="emision_co2_eq" class="small" value="<?php echo $m->emision_co2_eq; ?>" />
							</div>
						</div>
						<div class="nextline">
							<div class="finput">
								<label >Unidad</label>
								<input id="unidad" type="text" name="unidad" class="medium" value="<?php echo $m->unidad; ?>"/>
							</div>
							<div class="finput">
								<label  >Fuente</label>
								<input id="fuente" type="text" name="fuente" class="medium" value="<?php echo utf8_encode($m->fuente); ?>" />
							</div>
						</div>
					</div>
					<div class="centerbutton" style="width: 100%; text-align: center; clear: both;">
						<div id="hiddenfields"></div>
						<?php if(isset($_GET['vehicule'])) { ?><input type="hidden" name="maquinaria" value="<?php echo $_GET['vehicule']; ?>" id="maquinaria" /><?php } ?>
						<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
						<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateRecorridos(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addRecorridos();"<?php } ?>><span>Accept</span></button>
						<button class="green medium" type="button"><span>Cancel</span></button>
					</div>	
				</form>
			</div>
        </div> 
		
	</div>
</div>

<script type="text/javascript" src="js/vehicle.js"></script>
<script type="text/javascript" src="js/recorridos.js"></script>