<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>#lscm.data</title>
	<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
	<div class="table-responsive table-striped">
	  <table class="table">
		  <thead>
			<tr>
			  <th scope="col">Doc.Root</th>
			  <th scope="col">Site URL</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				$data = "/usr/local/lsws/admin/lscdata/lscm.data";
				if(!file_exists($data)){die("data error");}
				$lscm_data = file_get_contents($data);
				if(!empty($lscm_data)){
					$lscm_data = unserialize($lscm_data);
					if($lscm_data){
						foreach($lscm_data as $user){
							if(in_array($user["status"],array(72,264))){
								continue;
							}
							PHP_EOL;
			?><tr>
			  <td><?php echo $user["docroot"];?></td>
			  <td><?php echo $user["site_url"];?></td>
			</tr>
			<?php 
					PHP_EOL;
					}
				}
			}
			?>			
		  </tbody>
	  </table>
	</div>
</div>
</body>
</html>
