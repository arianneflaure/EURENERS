
<div class="formulaire users">
	<div class="box">
		<div class="title">
			<h2>Residuos y Tratamiento</h2>
			<span onclick="window.location='?view=lmachine'" class="add">List</span>
		</div>
		<div class="content forms tabs" style="height:300px;">
			<div class="tabmenu">
				<ul> 
					<li><a href="#tabs-1">Residuos</a></li> 
					<li><a href="#tabs-2">Tratamiento</a></li>
					<li><a href="#tabs-3">Transporte</a></li>
				</ul>
			</div>
			<div id="message" style="display : none;">
				<div id="response" class="messages green" style="margin: 0px 0px 1px;">
					<span></span>
					This is a successful placed text message.
				</div>
			</div>
			
		<div id="tabs-1">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Animal y Residuos</legend>
						<div id="lesinputs users">
							<div class="finput" id="btip">
								<label style="width:60px">Animal</label>
								<select id="categoria" name="categoria">
								<option value="">Select Animal</option>
							
								</select>
							</div>
							<fieldset>
							<legend>Residuos</legend>
							<div class="line">
								<div class="finput" id="btip">
								<label style="width:60px">Categorias</label>
								<select id="categoria" name="categoria">
								<option value="">Select Categorias</option>
							
								</select>
								</div>
								<div class="finput" id="btip">
								<label >Residuo</label>
								<select id="residuo" name="residuo" >
								<option value="">Select Residuo</option>
							
								</select>
								</div>
								<div class="sfinput">
									<label >LER</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="" />
								</div>
								<div class="finput">
									<label >Descripcion</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="" />
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label >Candidad</label>
									<input id="cantidad" type="text" name="cantidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="finput" id="btip">
								<label >Tipo de Gestion</label>
								<select id="categoria" name="categoria">
								<option value="">Select Tipo de Gestion</option>
							
								</select>
								</div>
								
								<input type="checkbox" name="Fase" id="Fase" /> <label for="Fase">Fase de Uso</label>
								<input type="checkbox" name="transformacion" id="transformacion" style="margin-right:100px;"/> <label for="transformacion">Transformacion</label>
								
								
							</div>
							</fieldset>
						</div>
						
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" onclick=""><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
		<div id="tabs-2">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Residuo y Tratamiento</legend>
						<div id="lesinputs users">
							<div class="finput" id="btip">
								<label >Residuo</label>
								<select id="residuo" name="residuo" >
								<option value="">Select Residuo</option>
							
								</select>
							</div>
							<fieldset>
							<legend>Tratamientos</legend>	
							<div class="line">
								<div class="finput" id="btip">
								<label>Categorias</label>
								<select id="categoria" name="categoria">
								<option value="">Select Categorias</option>
							
								</select>
								</div>
								<div class="finput" id="btip">
								<label style="width:85px;">Tratamientos</label>
								<select id="categoria" name="categoria">
								<option value="">Select Tratamiento</option>
							
								</select>
								</div>
								<div class="finput" id="btip">
								<label >Energias</label>
								<select id="categoria" name="categoria">
								<option value="">Select Energias</option>
							
								</select>
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width:85px;">Consumo(Kwh)</label>
									<input id="consumo" type="text" name="consumo" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value=""/>
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="	emision_co2_eq" type="text" name="	emision_co2_eq" class="small" value="" />
								</div>
								<div class="sfinput">
									<label>Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								
							</div>
							
							<div class="line">
								<div class="sfinput">
									<label >Fuente</label>
									<input id="fuente" type="text" name="fuente" class="medium" value="" />
								</div>
							</div>
							</fieldset>
							</div>
							
				</fieldset>	
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" onclick=""><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
        <div id="tabs-3">
			<form id="userform" action="" method="post">
				<fieldset>
					<legend>Residuo y Transporte</legend>
					<div id="lesinputs users">
						<div class="finput" id="btip">
								<label >Residuo</label>
								<select id="residuo" name="residuo" >
								<option value="">Select Residuo</option>
							
								</select>
							</div>
						<fieldset>
						<legend>Transporte of Gestar</legend>
						
							<div class="line">
								<div class="finput" id="btip">
								<label>Categorias</label>
								<select id="categoria" name="categoria">
								<option value="">Select Categorias</option>
							
								</select>
								</div>
								<div class="finput" id="btip">
								<label>Vehiculo</label>
								<select id="vehiculo" name="vehiculo">
								<option value="">Select Vehiculo</option>
							
								</select>
								</div>
								<div class="finput" id="btip">
								<label>Reccorido</label>
								<select id="reccorido" name="reccorido">
								<option value="">Select Reccorido</option>
							
								</select>
								</div>
								
							</div>
							<div class="nextline">
								<div class="sfinput">
									<label style="width:85px;">Receptor</label>
									<input id="unidad" type="text" name="cantidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label style="width:85px;">Distancia(Km)</label>
									<input id="unidad" type="text" name="cantidad" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2</sub></label>
									<input id="emision_co2" type="text" name="emision_co2" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E CH<sub>4</sub></label>
									<input id="emision_ch4" type="text" name="emision_ch4" class="small" value="" />
								</div>
								<div class="sfinput">
									<label >F.E N<sub>2</sub>O</label>
									<input id="emision_n2o" type="text" name="emision_n2o" class="small" value=""/>
								</div>
								<div class="sfinput">
									<label >F.E CO<sub>2eq</sub></label>
									<input id="	emision_co2_eq" type="text" name="	emision_co2_eq" class="small" value="" />
								</div>
								
							</div>
							<div class="line">
								<div class="sfinput">
									<label>Unidad</label>
									<input id="unidad" type="text" name="unidad" class="small" value="" />
								</div>
								<div class="finput">
									<label>Fuente</label>
									<input id="peso" type="text" name="peso" class="medium" value="" />
								</div>
							</div>
						</fieldset>
						</div>
				</fieldset>
				<div class="centerbutton" style="width: 100%;  text-align: center;">
					<button class="green medium" type="button" onclick=""><span>Accept</span></button>
					<button class="green medium" type="button"><span>Cancel</span></button>
				</div>
			</form>
		</div>
    </div>
	
</div> 
</div>
<script type="text/javascript" src="js/users.js"></script>