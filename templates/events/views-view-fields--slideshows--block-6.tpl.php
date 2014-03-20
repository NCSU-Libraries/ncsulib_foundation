<?php
/**
 * Featured Events page
 * Path: /upcomingevents
 * Author: Erik Olson
 * Date: March 2014
 *
 * Simply adding classes in order to fit into 960gs
 */
?>

<?php foreach ($fields as $id => $field): ?>
    <?php if ($field->class == "title"):?>
    <div class="orbit-caption">
    <?php endif; ?>
    <?php print $field->wrapper_prefix; ?>
        <?php print $field->label_html; ?>
        <?php print $field->content; ?>
    <?php print $field->wrapper_suffix; ?>
    <?php if ($field->class == "body"):?>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
