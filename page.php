<?php get_header(); ?>
<?php if (is_active_sidebar('page-sidebar')) : ?>
    <?php dynamic_sidebar('page-sidebar') ?>
<?php endif; ?>
<div class="container">
    <h1><?php the_title(); ?></h1>
    <?php get_template_part('includes/section', 'content'); ?>

</div>

<?php get_footer(); ?>