<article id="post-<?php the_ID(); ?>" class="vv-excerpt">

    <header class="vv-excerpt__header">
		<figure class="vv-excerpt__thumbnail">
			<a class="vv-excerpt__thumbnail-link" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail' ); ?>
			</a>
		</figure>
    </header>

	<div class="vv-excerpt__content-wrapper">
		<?php the_title( sprintf( '<h2 class="vv-excerpt__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="vv-excerpt__description">
            <?php the_excerpt(); ?>
		    <a class="vv-excerpt__description-more" href="<?php the_permalink(); ?>">Lees meer</a>
		</div>
		<div class="vv-excerpt__date">
			<time><?php echo get_the_date() ?></time>
		</div>
	</div>
</article>
