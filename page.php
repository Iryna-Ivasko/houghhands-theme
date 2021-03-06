<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

    <main class="main-content">

        <?php while (have_posts()) : the_post(); ?>
            <?php if (get_the_content() || $content_title = get_field('content_title')): ?>
                <section class="page-content">
                    <div class="row column">
                        <article <?php post_class() ?> >
                            <?php if ($content_title = get_field('content_title')): ?>
                                <h2 class="page-content__title text-center"><?php echo $content_title; ?></h2>
                            <?php endif; ?>


                            <div class="page-content__entry text-center">
                                <?php the_content(); ?>
                                <?php edit_post_link(__('Edit', 'foundationpress'), '<span class="edit-link">', '</span>'); ?>
                            </div>

                            <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'foundationpress'), 'after' => '</p></nav>')); ?>

                        </article>
                    </div>
                </section>
            <?php elseif (is_shop()): ?>
                <section class="page-content">
                    <div class="row"  data-equalizer data-equalize-by-row="true" data-equalizer="title">
                        <?php the_content(); ?>
                    </div><!-- END of .post-type -->
                </section>
            <?php endif; ?>
        <?php endwhile; ?>

    </main>

<?php get_footer();
