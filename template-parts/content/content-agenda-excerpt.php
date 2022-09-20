<?php
$id              = get_the_id();
$timestamp_start = get_post_meta( $id, '_drst_agenda_time', true );
?>

<div>
    <h4 class="vv-agenda__date">
    <a href="<?php echo esc_url( get_permalink() ); ?>">
        <time><?php echo date_i18n('d F Y', $timestamp_start ); ?></time>
    </a>
    </h4>
</div>
<div class="vv-agenda__description">
    <?php the_excerpt(); ?>               
</div>
