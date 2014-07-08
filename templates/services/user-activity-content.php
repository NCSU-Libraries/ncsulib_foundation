<?php
	$nodes = $page['content']['system_main']['nodes'];

	foreach($nodes as $key => $node){
		if(is_numeric($key)){
			$bundle = $node['#bundle'];
?>
	<?php if($bundle == 'device'){ ?>


		<?php  } ?>
	<?php  } ?>
<?php  } ?>
