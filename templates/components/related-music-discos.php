<p>Músicas</p>
 <?php if (have_rows('musicas-em-discos')) : ?>
        <div>
            <?php while (have_rows('musicas-em-discos')) : the_row(); ?>
                <?php $destaque_musicas_discos = get_sub_field('musica-disco'); ?>
                <?php if ($destaque_musicas_discos) : ?>
                    <?php $post = $destaque_musicas_discos; ?>
                    <?php setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
                         <?php the_title(); ?>
                      </a><br>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

