<?php

// $expiration = time() - 3600;
// $menu_html_cache = "cache/m-".$_SESSION['u']['utilisateur'].".html";

// if(file_exists($menu_html_cache) && filemtime($menu_html_cache) > $expiration) {
	// include($menu_html_cache);
// } else {
	// ob_start();
	// $menu_html = '<ul id="mainmenu" class="sf-menu">';
	// $menu_html .= '<li class="current"><a href="tableaudebord">Tableau de Bord</a></li>';
	// $m = new menu();
	// $topmenu = $m->getMenus();
	// foreach($topmenu as $tm) {
		// $menu_html .= "<li><a href=\"$tm->lienmenu\">$tm->titremenu</a>";
		// if($m->isParent($tm->id)) $menu_html .= $m->afficheMenus($tm->id); 
		// $menu_html .= '</li>';
	// }
	// $menu_html .= '</ul>';
	// echo($menu_html);
	// $menu_html = ob_get_contents();
	// ob_end_clean();
	// file_put_contents($menu_html_cache, $menu_html);
	// echo($menu_html);
//}
global $lang;
global $user;
?>
<ul> 
	<?php if($user->hasViewRight(1) == 'Y'){ ?><li class="current"><a href="dashboard.php"><?php echo $lang->phrases['menu_config']; ?></a>
		<ul> 
			<li><a href="#"><?php echo $lang->phrases['menu_config_master']; ?></a>
				<ul> 
					<li><a href="?view=btc"><?php echo $lang->phrases['menu_config_master_basic']; ?></a></li>
					<li><a href="#"><?php echo $lang->phrases['menu_config_mi']; ?></a>
						<ul> 
							<li><a href="?view=mi-crops"><?php echo $lang->phrases['menu_config_mi_crops']; ?></a></li>
							<li><a href="?view=mi-animals"><?php echo $lang->phrases['menu_config_mi_animals']; ?></a></li>
							<li><a href="?view=machine"><?php echo $lang->phrases['menu_config_mi_machines']; ?></a></li>
							<li><a href="?view=work"><?php echo $lang->phrases['menu_config_mi_works']; ?></a></li>
							<li><a href="?view=installation"><?php echo $lang->phrases['menu_config_mi_installations']; ?></a></li>
							<li><a href="?view=vehicle"><?php echo $lang->phrases['menu_config_mi_vehicles']; ?></a></li>
							<li><a href="?view=waste"><?php echo $lang->phrases['menu_config_mi_wastes']; ?></a></li>
							<li><a href="?view=waste-tr"><?php echo $lang->phrases['menu_config_mi_wastes_t']; ?></a></li>
							<li><a href="?view=material"><?php echo $lang->phrases['menu_config_mi_materials']; ?></a></li>
							<li><a href="?view=au-services"><?php echo $lang->phrases['menu_config_mi_aux_serv']; ?></a></li>
							<li><a href="?view=mi-consumables"><?php echo $lang->phrases['menu_config_mi_consumables']; ?></a></li>
							<li><a href="?view=energy"><?php echo $lang->phrases['menu_config_mi_energy']; ?></a></li>
							<li><a href="?view=product"><?php echo $lang->phrases['menu_config_mi_products']; ?></a></li>
							<!--<li><a href="?view=contaminat"><?php echo $lang->phrases['menu_config_mi_contaminats']; ?></a></li>-->
						</ul>
					</li>
					<li><a href="?view=end-transform"><?php echo $lang->phrases['menu_config_master_end']; ?></a></li>
					<li><a href="?view=transform-process"><?php echo $lang->phrases['menu_config_master_tp']; ?></a></li>
					<li><a href="?view=md-pm"><?php echo $lang->phrases['menu_config_master_pm']; ?></a></li>
					<li><a href="?view=gases"><?php echo $lang->phrases['menu_config_md_gas']; ?></a></li>
					<li><a href="?view=manejos"><?php echo $lang->phrases['menu_config_md_manejos']; ?></a></li>
				</ul> 
			</li>
			<li><a href="#"><?php echo $lang->phrases['menu_config_security']; ?></a>
				<ul> 
					<li><a href="?view=lmenus"><?php echo $lang->phrases['menu_config_s_menus']; ?></a></li>
					<li><a href="?view=lgroups"><?php echo $lang->phrases['menu_config_s_groups']; ?></a></li>
					<li><a href="?view=lusers<?php if(isset($_SESSION['u']['enterprise']) && !is_null($_SESSION['u']['enterprise'])) echo "&enterprise=" . $_SESSION['u']['enterprise']; ?>"><?php echo $lang->phrases['menu_config_s_users']; ?></a></li>
					<li><a href="?view=tracking"><?php echo $lang->phrases['menu_config_s_tracking']; ?></a></li>
				</ul>
			</li>
		</ul>
		<?php } ?>
	</li> 
	<?php if($user->hasViewRight(4) == 'Y'){ ?><li><a href="#"><?php echo $lang->phrases['menu_enterprise_data']; ?></a>
		<ul> 
			<li><a href="?view=enterprise_data"><?php echo $lang->phrases['menu_enterprise_data']; ?></a></li>
		</ul>
	</li><?php } ?>
	<?php if($user->hasViewRight(5) == 'Y'){ ?><li><a href="#"><?php echo $lang->phrases['menu_production']; ?></a>
		<ul> 
			<li><a href="#"><?php echo $lang->phrases['menu_prod_crop']; ?></a>
				<ul> 
					<li><a href="?view=pcrop_catalog"><?php echo $lang->phrases['menu_pcrop_catalog']; ?></a></li>
					<li><a href="?view=pcrop_materials"><?php echo $lang->phrases['menu_pcrop_materials']; ?></a></li>
					<li><a href="?view=pcrop_works"><?php echo $lang->phrases['menu_pcrop_works']; ?></a></li>
					<li><a href="?view=pcrop_products"><?php echo $lang->phrases['menu_pcrop_products']; ?></a></li>
					<li><a href="?view=pcrop_wastetr"><?php echo $lang->phrases['menu_pcrop_wastetr']; ?></a></li>
				</ul>
			</li>
			<li><a href="#"><?php echo $lang->phrases['menu_prod_animals']; ?></a>
				<ul> 
					<li><a href="?view=panimal_catalog"><?php echo $lang->phrases['menu_panimal_catalog']; ?></a></li>
					<li><a href="?view=panimal_materials"><?php echo $lang->phrases['menu_panimal_materials']; ?></a></li>
					<li><a href="?view=panimal_products"><?php echo $lang->phrases['menu_panimal_products']; ?></a></li>
					<li><a href="?view=panimal_wastetr"><?php echo $lang->phrases['menu_panimal_wastetr']; ?></a></li>
				</ul>
			</li>
			<li><a href="?view=prod_machines"><?php echo $lang->phrases['menu_prod_machines']; ?></a></li>
			<li><a href="?view=prod_installations"><?php echo $lang->phrases['menu_prod_installations']; ?></a></li>
			<li><a href="?view=prod_energy"><?php echo $lang->phrases['menu_prod_energy']; ?></a></li>
			<li><a href="?view=prod_consumables"><?php echo $lang->phrases['menu_prod_consumables']; ?></a></li>
			<li><a href="?view=prod_aux"><?php echo $lang->phrases['menu_prod_aux']; ?></a></li>
		</ul>
	</li><?php } ?>
	<?php if($user->hasViewRight(6) == 'Y'){ ?><li><a href="#"><?php echo $lang->phrases['menu_processing']; ?></a>
		<ul> 
			<li><a href="?view=proc_pp"><?php echo $lang->phrases['menu_proc_pp']; ?></a></li>
			<li><a href="?view=proc_wt"><?php echo $lang->phrases['menu_proc_wt']; ?></a></li>
			<li><a href="?view=proc_machines"><?php echo $lang->phrases['menu_proc_machines']; ?></a></li>
			<li><a href="?view=proc_installations"><?php echo $lang->phrases['menu_proc_installations']; ?></a></li>
			<li><a href="?view=proc_energy"><?php echo $lang->phrases['menu_proc_energy']; ?></a></li>
			<li><a href="?view=proc_aux"><?php echo $lang->phrases['menu_proc_aux']; ?></a></li>
			<li><a href="?view=proc_consumables"><?php echo $lang->phrases['menu_proc_consumables']; ?></a></li>
		</ul>
	</li><?php } ?>
	<?php if($user->hasViewRight(8) == 'Y'){ ?><li><a href="#"><?php echo $lang->phrases['menu_dist']; ?></a>
		<ul> 
			<li><a href="?view=distribution"><?php echo $lang->phrases['menu_dist']; ?></a></li>
		</ul>
	</li><?php } ?>
	<?php if($user->hasViewRight(9) == 'Y'){ ?><li><a href="#"><?php echo $lang->phrases['menu_result']; ?></a>
		<ul> 
			<li><a href="?view=result_func"><?php echo $lang->phrases['menu_result_func']; ?></a>
				<ul> 
					<li><a href="?view=result_cf"><?php echo $lang->phrases['menu_result_cf']; ?></a></li>
				</ul>
			</li>
		</ul>
	</li><?php } ?>
</ul>