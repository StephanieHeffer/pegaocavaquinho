<h1>George</h1>


<?php 
$loop = new WP_Query( array( 'post_type' => 'fab4bio') ); 

while ( $loop->have_posts() ) : $loop->the_post();
    $title = get_the_title(); 
    $georgebio = "George Harrison";
$cont = get_the_content();
            $thumb = get_the_post_thumbnail();

	if ($title == $georgebio){ ?>
	    <div class="entry-content text-center">
		<?php echo $thumb; ?>
                 <br><br>
        	<?php echo $cont; ?>
	    </div>

<?php	}
?>

<?php endwhile; ?>
