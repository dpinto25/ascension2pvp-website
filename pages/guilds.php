<div class="container">
	<div class="page-hd" style="background-image: url(<?php print $site_url; ?>images/ranking.png)">
		<div class="bd-c">
			<h2 class="pre-social"><?php print $lang['ranking']; ?></h2>
			<h2 class="pre-social"><?php print $lang['guilds']; ?></h2>
		</div>
	</div>
	<div class="padding-container">
		<div class="jumbotron jumbotron-fluid" style="padding: 1rem 2rem;">
			<form action="" method="POST">
				<div class="row">
					<div class="col-lg-7">
						<input type="text" name="search" class="form-control" placeholder="<?php print $lang['guild']; ?>" value="<?php if(isset($search)) print $search; ?>">
					</div>
					<div class="col-lg-5">
						<button type="submit" class="btn btn-primary"><i class="fa fa-search fa-1" aria-hidden="true"></i> <?php print $lang['search']; ?></button>
					</div>
				</div>
			</form>
		</div>
		
		<ul class="nav nav-tabs">
			<li class="nav">
				<a class="nav" href="<?php print $site_url; ?>ranking/players"><img src="<?php print $site_url; ?>images/players.png" alt="<?php print $lang['players']; ?>" title="<?php print $lang['players']; ?>"> <?php print $lang['players']; ?></a>
			</li>
			<li class="nav open">
				<a class="nav" href="#"><img src="<?php print $site_url; ?>images/guilds.png" alt="<?php print $lang['guilds']; ?>" title="<?php print $lang['guilds']; ?>"> <?php print $lang['guilds']; ?></a>
			</li>
		</ul>
		
		<table class="table table-striped table-hover">
			<thead class="thead-inverse">
				<tr>
					<th>#</th>
					<th><?php print $lang['guild']; ?></th>
					<th><?php print $lang['leader']; ?></th>
					<th><?php print $lang['empire']; ?></th>
					<th class="level-table"><?php print $lang['level']; ?></th>
					<th class="exp-table"><?php print $lang['points']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php		
					$records_per_page=10;

					if(isset($search))
					{
						$query = "SELECT id, name, master, level, ladder_point FROM guild WHERE name NOT LIKE '[%]%' AND name LIKE :search ORDER BY level DESC, ladder_point DESC, exp DESC, name ASC";
						$newquery = $paginate->paging($query,$records_per_page);
						$paginate->dataview($newquery, $search);
					} else {
						$query = "SELECT id, name, master, level, ladder_point FROM guild WHERE name NOT LIKE '[%]%' ORDER BY level DESC, ladder_point DESC, exp DESC, name ASC";
						$newquery = $paginate->paging($query,$records_per_page);
						$paginate->dataview($newquery);
					}
					
				?>
			</tbody>
		</table>
		<?php
			if(isset($search))
				$paginate->paginglink($query,$records_per_page,$lang['first-page'],$lang['last-page'],$site_url,$search);
			else
				$paginate->paginglink($query,$records_per_page,$lang['first-page'],$lang['last-page'],$site_url);
		?>
	</div>
</div>