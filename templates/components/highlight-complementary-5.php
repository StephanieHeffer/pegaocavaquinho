<div class="">
    <?php $terms = get_the_terms(get_the_ID(), 'category'); ?>
    <?php if ($terms && !is_wp_error($terms)) { ?>
        <?php foreach ($terms as $term) { ?>

        <?php } ?>
    <?php } ?>

    <div <?php post_class('author_bio_section mb-5'); ?> style="display: -webkit-box;">
        <!-- post thumbnail -->

         <?php
$author_details .= '<div class="author_details d-flex flex-wrap">' . get_avatar(get_the_author_meta('user_email'), 90) . '<div class="author_bio align-self-center ml-md-3">' . nl2br($user_description) . '</div></div>';

         echo $author_details;
?>

        <!-- /post thumbnail -->

        <!-- chapeu -->
          <div>
            <?php $user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));?>
            <a <?php echo 'href="'.$user_posts.'"'; ?> class="highlight-chapeu d-inline-block text-uppercase my-2">
              <?php if (in_category('autor-convidado')): ?><?php the_field('nome-convidado'); ?>
              <?php else: echo get_the_author(); ?>
               <?php endif;?>
            </a>
        <!-- chapeu -->
        <!-- post title -->
        <p>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
                <?php the_title(); ?>
            </a>
        </p>
        <!-- /post title -->

        <!--<div class="excerpt">
            <a href="<?//php the_permalink(); ?>" class="" title="<?//php the_excerpt(); ?>">
                <?//php the_excerpt(); ?>
            </a>
        </div>-->
        </div>
    </div>
</div>
