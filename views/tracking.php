<?php
	@session_start();
	$menu = new menus();	
	$menus = $menu->getAllRecords(false);
	$c = new bd();
	global $lang;
	global $user;
	$users = $user->getListUsers();
	$u = new utilisateur();
	$daterange = "";
	if(isset($_GET['from']) && isset($_GET['to']))
		$daterange = "date BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'";
	else if(isset($_GET['from']) && !isset($_GET['to']))
		$daterange = "date > '".$_GET['from']."'";
	else if(!isset($_GET['from']) && isset($_GET['to']))
		$daterange = "date < '".$_GET['to']."'";
	
	if($daterange != "") $daterange = "AND " . $daterange;
	if(isset($_GET['user'])){
		$sql = "SELECT l.actions, DATE_FORMAT(l.date, '%d-%m-%Y' ) as date, l.idUser FROM logs AS l INNER JOIN usuarios AS u ON u.identificador = l.idUser WHERE u.usuario = '".$_GET['user']."' $daterange;";
		//var_dump($sql); die;
		$logs = $c->select($sql, "Displays Logs for tracking for the user '".$_GET['user']."'.");
	} else {
		$logs = $c->select("SELECT actions, DATE_FORMAT(date, '%d-%m-%Y' ) as date, idUser FROM logs ORDER BY date ASC LIMIT 50;", "Displays Logs for tracking.");
	}
	
?>
<div class="section">
		<div class="full">
			<div class="box">
				<div class="title">
					<h2>Tracking</h2>
					
				</div>
				<div class="filter">
					<form id="filter" action="#" method="GET">
						<fieldset class="date">
							<legend>Date</legend>
							<div class="date">
								<span class="date">Min</span>
								<input class="datepicker" id="date1" name="date1" style="margin-left:15px" />
							</div>
							<div class="date">
								<span class="date">Max</span>
								<input class="datepicker" id="date2" name="date2" style="margin-left:13px" />
							</div>
						</fieldset>
						<fieldset class="usermenu">
							<div class="user">
								<span class="user">User</span>
								<select id="user" name="user" class="">
									<option value="">All users</option>
									<?php foreach($users as $user) { ?>
									<option value="<?php echo $user->usuario; ?>"><?php echo $user->name ?></option>
									<?php } ?> 
								</select>
							</div>
							<div class="menu">
								<span class="menu">Menu</span>
								<select id="menu" name="menu" class="">
									<?php foreach($menus as $m) { ?>
									<option value="<?php echo $m->identificador; ?>"><?php echo $m->nombre; ?></option>
									<?php } ?>
								</select>
							</div>
						</fieldset>
						<fieldset class="actions">
							<legend>Actions</legend>
							<div style="width : 200px; float : left; margin-bottom : 10px">
								<input type="checkbox" name="actions[]" value="access" id="access" checked="checked" />
								<label for="access">Access</label>
								<input type="checkbox" name="actions[]" value="modification" id="modification" checked="checked" />
								<label for="modification">Modification</label>
							</div>
							<div style="width : 200px">
								<input type="checkbox" name="actions[]" value="creation" id="creation" checked="checked" />
								<label for="creation">Creation</label>
								<input type="checkbox" name="actions[]" value="deletion" id="deletion" checked="checked" />
								<label for="deletion">Deletion</label>
							</div>
							
						</fieldset>
						<fieldset class="buttons">
							<button type="button" class="blue big" onclick="restet();"><span>Clear</span></button>
							<button type="button" class="blue big" onclick="filter();"><span>Filter</span></button>
						</fieldset>
					</form>
				</div>
				<div class="content">
					<table style="clear : both;" cellspacing="0" cellpadding="0" border="0" class="sorting"> 
						<thead> 
							<tr> 
								<th>Date</th>
								<th>Menu</th>
								<th>User</th>
								<th>Action</th>
								<th>Key</th>
							</tr> 
						</thead> 
						<tbody> 
						<?php foreach($logs as $l) { ?>
							<tr id=""> 
								<td><?php echo $l->date; ?></td>
								<td><?php  ?></td>
								<td><?php echo $u->getUserName($l->idUser); ?></td>
								<td><?php echo $l->actions; ?></td>
								<td></td>
							</tr>
						<?php } ?> 
						</tbody> 
					</table>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/tracking.js"></script>
