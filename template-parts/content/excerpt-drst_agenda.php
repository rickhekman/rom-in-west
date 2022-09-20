<?php
$id              = get_the_id();
$timestamp_start = get_post_meta( $id, '_drst_agenda_time', true );
?>

<article id="post-<?php the_ID(); ?>" class="vv-excerpt">

    <header class="vv-excerpt__header">
        <figure class="vv-excerpt__thumbnail">
        <?php the_post_thumbnail( 'post-thumbnail' ); ?>
		</figure>
    </header>
    <div class="vv-excerpt__description">        
        <h4 class="vv-excerpt__description-date">
            <time><?php echo date_i18n( 'd-m-y', $timestamp_start ); ?></time>
        </h4>
        <?php the_title( sprintf( '<h2 class="vv-excerpt__description-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <p class="vv-excerpt__description-text">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem necessitatibus provident beatae aliquam tempora error numquam dolor minima, architecto sunt ex eum neque modi est repellendus odit eos! Molestias, labore!
        </p>
        <a href="<?php the_permalink(); ?>" class="vv-excerpt__description-link"  aria-hidden="true" tabindex="-1">Meer informatie</a>
        <div class="vv-excerpt__date">
            <p class="vv-excerpt__date-day">15 juni 2021</p>
            <p class="vv-excerpt__date-time">16:00 - 17:00</p>
        </div>
        <div class="vv-excerpt__signup">
            <a href="#" class="vv-excerpt__signup-button">Meld je aan</a>
        </div>
    </div>
    
</article>
