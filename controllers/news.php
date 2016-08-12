<?php
	/**
	 * Implements theme_field()
	 *
	 * NEWS feature photo
	 */
	function ncsulib_foundation_field__field_news_feature_photo__news($variables){
	  $output = '';
	  $img_uri = $variables['items'][0]['#item']['uri'];
	  $img_url_str = explode('public://',$img_uri);
	  $img_str = image_style_url("738_max_width", $img_url_str[1]);

	  // when using in a non drupal env need to insert domain
	  if (strpos($img_str, 'www.lib.ncsu.edu') !== FALSE){
	      $img_url = $img_str;
	  } else{
	      $img_url_part = explode('http://default',$img_str);
	      $img_url = 'http://www.lib.ncsu.edu'.$img_url_part[1];
	  }

	  if($variables['element']['#view_mode'] == 'teaser'){
	    $output .= '<img src="'.$img_url.'" width="100%">';
	  } else{

	    $title = $variables['items'][0]['#item']['alt'];
	    $output = '<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
	    $output .= '<meta itemprop="url" content="'.$img_url.'">';
	    $output .= '<meta itemprop="width" content="738">';
	    $output .= '<meta itemprop="height" content="415">';
	    $output .= '<img src="'.$img_url.'" width="100%" itemprop="image">';
	    $output .= '<small itemprop="caption">'.$title.'</small>';
	    $output .= '</div>';
	  }

	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * NEWS feature video
	 */
	function ncsulib_foundation_field__field_news_featured_video__news($variables){
	  $teaser_uri = $variables['element']['#object']->field_teaser_photo['und'][0]['uri'];
	  $teaser_url = image_style_url('large',$teaser_uri);
	  $video_uri = $variables['element']['#object']->field_news_featured_video['und'][0]['uri'];
	  $url = file_create_url($video_uri);

	  $output = '';
	  $output = '<video width="100%" controls poster="'.$teaser_url.'">';
	  $output .= '<source src="'.$url.'" type="video/mp4">]';
	  $output .= 'Your browser does not support the video tag.';
	  $output .= '</video>';

	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * NEWS staff member field
	 */
	function ncsulib_foundation_field__field_staff_members__news($variables){
	  $output = '';
	  $output = '<div id="news-staff">';

	  foreach($variables['element']['#object']->field_staff_members['und'] as $s){
	    $first_name = $s['entity']->field_firstname['und'][0]['value'];
	    $last_name = $s['entity']->field_lastname['und'][0]['value'];
	    $title = $s['entity']->field_title['und'][0]['value'];
	    $photo = $s['entity']->field_staff_photo['und'][0]['uri'];
	    $photo_url = ($photo != '') ? image_style_url('medium', $photo) : 'https://www.lib.ncsu.edu/sites/default/files/gender_neutral-1.jpg';
	    $unity = $s['entity']->name;
	    // kpr($s['entity']->field_staff_photo);
	    $output .= '<a href="/staff/'.$unity.'">';
	    $output .= '<div class="staff-member">';
	    $output .= '<div class="staff-photo">';
	    $output .= '<img src="'.$photo_url.'" width="100% alt="'.$first_name.' '.$last_name.'" />';
	    $output .= '</div>';
	    $output .= '<div class="staff-details">';
	    $output .= '<div class="staff-name">'.$first_name.' '.$last_name.'</div>';
	    $output .= '<div class="staff-title">'.$title.'</div>';
	    $output .= '</div>';
	    $output .= '</div>';
	    $output .= '</a>';
	  }

	  $output .= '</div>';

	  return $output;

	}
?>
