<h1>John</h1>

<?php
$loop = new WP_Query( array( 'post_type' => 'fab4bio') );

while ( $loop->have_posts() ) : $loop->the_post();
    $title = get_the_title();
    $johnbio = "John Lennon";
$cont = get_the_content();
            $thumb = get_the_post_thumbnail();

        if ($title == $johnbio){ ?>
            <div class="entry-content text-center">
                <?php echo $thumb; ?>
                 <br><br>
                <?php echo $cont; ?>
            </div>

<?php   }
?>

<?php endwhile; ?>

