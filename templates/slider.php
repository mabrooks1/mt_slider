<?php
$slides = get_posts(array(
  'post_type' => 'slides',
  'numberposts' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'category',
      'field' => 'id',
      'terms' => $id,
      'include_children' => false
    )
  )
)); ?>
<div class="slider-wrap">
    <div id="slider" class="slider-wrapper">
      <?php foreach($slides as $slide) { ?>
        <?php $id = get_post_thumbnail_id($slide->ID); ?>
        <?php echo wp_get_attachment_image($id, 'slider_sizes_' . $slide->ID, false, array( 'class' => 'img img-responsive' )); ?>
      <?php } ?>
    </div>
</div>
<script>
<!--
  jQuery(document).ready(function($) {

  });
-->
</script>
