<?php get_header(); ?>
<div class="container">
    <h3>Wyszukane <?php echo get_search_query(); ?></h3>
    <?php get_template_part('includes/section', 'searchresults'); ?>
</div>
<?php previous_posts_link(); ?>
<?php next_posts_link(); ?>

<?php get_footer(); ?>