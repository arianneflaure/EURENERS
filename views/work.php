<?php
	$categoria = new categorias();	
	$cats = $categoria->getAllRecords();
	$energia = new energias();	
	$energies = $energia->getAllRecords();
	$machine = new maquinarias();	
	$machines = $machine->getAllRecords();
	$c = new labores();
	if(isset($_GET['id'])){
		$lab = $c->getRecord($_GET['id']);
	} else {
		$lab = new labores();
		$vars = $lab->getAllFields();
		//var_dump($vars); die();
		foreach($vars as $var)
			$lab->$var = '';
	}
?>
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Works</h2>
			<span onclick="window.location='?view=lwork'" class="add">List</span>
		</div>
		<div class="content forms" style="display:block;float:left">
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					
					This is a successful placed text message.
				</div>
			</div>
			<form id="userform" action="" method="post">
			<fieldset>
				<legend>Works</legend>
					
					
								
                            <div class="finput">
								<label style=" margin-right:5px;">Nombre</label>
								<input id="nombre" type="text" name="nombre" class="small" value="<?php echo $lab->nombre; ?>" style="margin-left : 20px;" />
							</div>
							<div class="finput" id="btip" style="">
								<label style="width:60px">Energia</label>
								<select id="energia" name="energia">
									<option value="">Select Energia</option>
									<?php foreach($energies as $t) { ?>
									<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $lab->energia) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="sfinput">
								<label style="margin-right : 0px;">Mj/Has</label>
								<input id="mjul_ha" type="text" name="mjul_ha" class="small" value="<?php echo $lab->mjul_ha; ?>" style="margin-right : 20px;"/>
							</div>
							<div class="finput">
								<label>Fuente</label>
								<input id="fuente" type="text" name="fuente" class="small" value="<?php echo $lab->fuente; ?>" />
							</div>
							
							
							<!--
							-->
						<div id="lesinputs users">
							
                                  <fieldset class="type" style=" width: 470px; margin-top:15px;"> 
								  <legend>Associated machine </legend>
								  
								 <div class="finput">
								<span style="float:left; margin-right: 15px;">Machine</span>
								<select id="maquinaria" name="maquinaria">
									<option value="">Select Maquinaria</option>
									<?php foreach($machines as $t) { ?>
									<option value="<?php echo $t->identificador; ?>"><?php echo $t->nombre; ?></option>
									
									<?php } ?>
								</select>
								<?php foreach($machines as $t) { ?><input type="hidden" id="<?php echo "m".$t->identificador; ?>" value="<?php echo $t->nombre; ?>" />
								<?php } ?>
							    </div>
							    <div class="finput" >
								<span style="float:left; margin-right: 15px;">Name</span>
								<input type="text" class="small" />
							   </div>
							  <div style="text-align : right">
								<button class="green medium" type="button" onclick="addMachine();" ><span>Accept</span></button>
							  </div>
								<?php if(isset($_GET['id'])) { ?><input type="hidden" name="labor" value="<?php echo $_GET['id']; ?>" id="labor" /><?php } ?>
						     </fieldset>
							 
							  <fieldset class="type"style=" width: 450px; margin-top:20px; border-width: 0">
							 <div class="sfinput" >
								<span >Consumo</span>
								<input id="consumo" type="text" name="consumo" class="small" value="<?php echo $lab->consumo; ?>" />
							</div>
							<div class="sfinput">
								<span>Unidad</span>
								<input id="unidad" type="text" name="unidad" class="small" value="<?php echo $lab->unidad; ?>" />
							</div>
							<div class="sfinput">
								<span >Redimiento</span>
								<input id="rendimiento" type="text" name="rendimiento" class="small" value="<?php echo $lab->rendimiento; ?>" />
							</div>
							<div class="sfinput" style="float : left; margin-top : 20px">
								<span >Mj/Kg Material</span>
								<input id="mj_kg_material" type="text" name="mj_kg_material" class="small" value="<?php echo $lab->mj_kg_material; ?>" />
							</div>
							<div class="nextline microps">
								<div class="finput" id="btip" style="float : left; margin-top : 12px">
									<label style="width:60px">Categoria</label>
									<select id="categoria" name="categoria">
										<option value="">Select Categoria</option>
										<?php foreach($cats as $t) { ?>
										<option value="<?php echo $t->identificador; ?>" <?php if($t->identificador == $lab->categoria) echo "SELECTED" ?>><?php echo utf8_encode($t->nombre); ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							 </fieldset>
					  
					  </div>
				<div class="centerbutton" style="width: 100%;  text-align: center; height : 50px; float : left">
				<?php if(isset($_GET['id'])) { ?><input type="hidden" name="identificador" value="<?php echo $_GET['id']; ?>" id="identificador" /><?php } ?>
					<button class="green medium" type="button" <?php if(isset($_GET['id'])) { ?> onclick="updateWork(<?php echo $_GET['id']; ?>);" <?php } else { ?>onclick="addWork();"<?php } ?>><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>			
				<?php
			if(isset($_GET['id'])) {
				$machs = $c->getAssociatedMachines($_GET['id']);
			?>
			<div style="float:left; width:99%; margin-top:10px"> 
			<table cellspacing="0" cellpadding="0" border="0" class="sorting"> 
				<thead> 
					<tr width="100%"> 
						<th><input type="checkbox" name="check" class="checkall" /></th>
						<th>Associated Maquinaria</th>
						
						<th width="30"></th>
					</tr> 
				</thead> 
				<tbody> 
				<?php
				$i = 0;
				foreach($machs as $user) { ?>
					<tr id="<?php echo $i; ?>"> 
						<td><input type="checkbox" name="check" /></td>
						<td><a href="#"><?php echo $user->nombre; ?></a></td>
						<td style="padding:5px 4px;">
							<a style="margin-left:2px;float:left" href="#" onclick="deleteMaquinarias(<?php echo $user->maquinaria; ?>, <?php echo $i; ?>)"><img src="gfx/icon-delete.png" alt="delete" title="Delete maquinaria" /></a>
						</td>
					</tr>
				<?php $i++; } ?> 
				</tbody> 
			</table>
			</div>
			<?php 
			}
			?>					
				</fieldset>
				
				
			</form>

		</div>
	</div>
</div>
<script type="text/javascript" src="js/work.js"></script>