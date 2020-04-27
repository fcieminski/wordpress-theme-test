<?php get_header(); ?>
<div class="container">
    <?php get_template_part('includes/section', 'archive'); ?>
</div>
<?php previous_posts_link(); ?>
<?php next_posts_link(); ?>

<?php get_footer(); ?>