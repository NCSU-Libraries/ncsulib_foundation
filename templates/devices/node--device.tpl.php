<?php
/**
 * Device node
 * Path: /devices/[name of device]
 * Author: Charlie Morris
 * Date: July 2013
 *
 */
  drupal_add_css(drupal_get_path('theme', 'ncsulibraries').'/styles/devices.css');
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($content['field_technology_category']): ?>
    <?php
    $category = field_get_items('node', $node, 'field_technology_category');
    $category_name = field_view_value('node', $node, 'field_technology_category', $category[0]);
    $category_alias = drupal_lookup_path('alias', 'node/'. $category[0]['target_id']);

    $manufacturer = field_get_items('node', $node, 'field_device_manufacturer');
    $manufacturer_name = field_view_value('node', $node, 'field_device_manufacturer', $manufacturer[0]);
    ?>

      <ul class="breadcrumbs">
        <li><a href="/">Home</a></li>
        <li><a href="/techlending">Technology Lending</a></li>
        <li><a href="/<?php print $category_alias; ?>"><?php print render($category_name); ?></a></li>
        <li class="current"><?php print render($manufacturer_name) . " " . $title ?></li>
      </ul>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <div class="flow-right">
      <?php print render($content['field_device_image']); ?>
    </div>
     <?php print render($content['field_request_form_url']); ?>
    <?php print render($content['body']); ?>

    <div class="hb"></div>
  </div>
</div>
