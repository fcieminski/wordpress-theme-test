<section>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php
            $gallery = get_post_gallery($post, false);
            foreach ($gallery['src'] as $src) {
            ?>
                <img src="<?php echo $src; ?>" class="my-custom-class" alt="Gallery image" />
            <?php
            }
            $name = get_the_author_meta('first_name');
            ?>
            <p>Opublikowane przez <?php echo $name ?>, <?php the_date() ?> </p>
            <?php
            $tags = get_the_tags();
            if ($tags) :
                foreach ($tags as $tag) : ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name ?></a>
                    <p><?php $tag ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php
            $categories = get_the_category();
            foreach ($categories as $category) : ?>
                <p><?php echo $category->name ?></p>
            <?php endforeach; ?>

    <?php endwhile;
    else : endif; ?>
</section>