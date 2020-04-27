<section>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div>
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
            </div>

    <?php endwhile;
    else : endif; ?>
</section>