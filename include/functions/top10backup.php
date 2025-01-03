<?php
	$date1=date_create($top10backup_date);
	$date2=date_create(date("Y-n-j"));
	$diff=date_diff($date1, $date2);
	if($diff->days)
	{
		$json = file_get_contents('include/db/ranking.json');
		$date = json_decode($json,true);
	
		$date['top10backup']['date'] = date("Y-n-j");
		
		//Top 10 players
		$top = array();
		$top = topPlayers(5);
		
		$players = "";
		foreach($top as $player)
		{
			$empire=get_player_empire($player["account_id"]);
			$players.= '<div style="margin-right: 0px; margin-left: 0px;" class="row mt2cms_rank_content"><div class="col-md-2 ranking-icon"></div><div class="col-md-6">'.$player["name"].'</div><div class="col-md-4"><img src="'.$site_url.'images/empire/'.$empire.'.jpg" alt="'.empire_name($empire).'"></div></div>';
		}
		$date['top10backup']['players'] = $players;
		
		//Top 10 guilds
		$top = array();
		$top = topGuilds(5);
		
		$guilds = "";
		foreach($top as $guild)
		{
			$empire=get_guild_empire($guild["master"]);
			$guilds.= '<div style="margin-right: 0px; margin-left: 0px;" class="row mt2cms_rank_content"><div class="col-md-2 ranking-icon"></div><div class="col-md-6">'.$guild["name"].'</div><div class="col-md-4"><img src="'.$site_url.'images/empire/'.$empire.'.jpg" alt="'.empire_name($empire).'"></div></div>';
		}
		$date['top10backup']['guilds'] = $guilds;
		
		$json_new = json_encode($date);
	
		file_put_contents('include/db/ranking.json', $json_new);
		
		//API Metin2 CMS
		include 'api.php';
		
		include 'delete_accounts.php';
	}
?>