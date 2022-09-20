<?php
$id              = get_the_id();
$timestamp_start = get_post_meta( $id, '_drst_agenda_time', true );
$timestamp_end = get_post_meta( $id, '_drst_agenda_end_time', true);
?>

<article id="post-<?php the_ID(); ?>" class="vv-excerpt-agenda">

    <header class="vv-excerpt-agenda__header">
        <figure class="vv-excerpt-agenda__thumbnail">
            <?php the_post_thumbnail( 'post-thumbnail' ); ?>
		</figure>
    </header>
    <div class="vv-excerpt-agenda__description">        
        <h4 class="vv-excerpt-agenda__description-date">
            <time><?php echo date_i18n( 'd F Y', $timestamp_start ); ?></time>
        </h4>
        <?php the_title( sprintf( '<h2 class="vv-excerpt-agenda__description-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <p class="vv-excerpt-agenda__description-text">
            <?php the_excerpt(); ?>
        </p>
        <a href="<?php the_permalink(); ?>" class="vv-excerpt-agenda__description-link"  aria-hidden="true" tabindex="-1">Meer informatie</a>
        <div class="vv-excerpt-agenda__date">
            <p class="vv-excerpt-agenda__date-day"><time><?php echo date_i18n( 'd F Y', $timestamp_start ); ?></time></p>
            <p class="vv-excerpt-agenda__date-time"><time><?php echo date_i18n( 'h:s -', $timestamp_start ); ?><?php echo date_i18n( ' h:s', $timestamp_end ); ?></time></p>
        </div>
        <!-- <div class="vv-excerpt-agenda__description-signup">
            <a href="#" class="vv-excerpt-agenda__description-signup_button">Meld je aan</a>
        </div> -->
    </div>
</article>
