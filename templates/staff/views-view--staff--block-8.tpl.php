<?php
	$alpha_ary = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$name_ary = array();

	// collect all names
	foreach($view->result as $person){
		$first_name = $person->field_field_firstname[0]['rendered']['#markup'];
		$last_name = $person->field_field_lastname[0]['rendered']['#markup'];

		if($old_letter == $last_name[0]){
			array_push($name_ary[$last_name[0]], array('first_name'=>$first_name, 'last_name'=>$last_name));
		} else{
			$name_ary[$last_name[0]][0] = array('first_name'=>$first_name, 'last_name'=>$last_name);
		}

		$old_letter = $last_name[0];
	}

 ?>

<!-- layout paginator -->
<ul class="pagination">
<?php
	foreach($alpha_ary as $key=>$letter):
		if($letter != key($name_ary[strtoupper($letter)])):
?>
	<li class="unavailable"><a href=""><?= strtoupper($letter); ?></a></li>
	<?php else: ?>
	<li><a href="/1staff/results?field_firstname_value=&field_lastname_value=<?=$letter;?>"><?= strtoupper($letter); ?></a></li>
	<?php endif; ?>
<?php endforeach; ?>
</ul>
<a href="/1staff/results" class="styled">or view all</a>
<hr />
