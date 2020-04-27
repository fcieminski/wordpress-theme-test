<section>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('blog-small') ?>" alt="">
                <?php endif; ?>
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Czytaj dalej</a>
            </div>
    <?php endwhile;
    else : endif; ?>
</section>