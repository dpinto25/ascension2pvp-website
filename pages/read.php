<div class="mt2cms2-c-l">
    <div class="page-hd" style="background-image: url(<?php print $site_url; ?>images/news.png)">
        <div class="bd-c">
            <h2 class="pre-social"><?php print $lang['news']; ?></h2>
			<?php if($offline) print '</br><h2 class="pre-social"><strong><font color="red">'.$lang['server-offline'].'</font></strong></h2>' ?>
        </div>
    </div>
	<div class="padding-container">
		<?php	
			if(!$offline && $database->is_loggedin())
				if($web_admin>=$jsondataPrivileges['news'])
					include 'include/functions/edit-news.php';
		?>
		<div class="post fade_in" data-page="1">
			<div class="post_title"><?php print $article['title']; ?>
						<?php
							if(!$offline && $database->is_loggedin())
								if($web_admin>=$jsondataPrivileges['news'])
								{
						?>
						<a href="<?php print $site_url; ?>?delete=<?php print $read_id; ?>" onclick="return confirm('<?php print $lang['sure?']; ?>');"><i style="color:red;" class="fa fa-trash-o fa-2" aria-hidden="true"></i></a>
						<?php
								}
						?>
			</div>
			<div class="post_content">
				<?php print $article['content']; ?>						
			</div>
			<div class="post_date"><?php print $article['time']; ?></div>
		</div>
	</div>
</div>