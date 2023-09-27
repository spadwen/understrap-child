<?php
/*
 * Template Name: Carousel Template
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="carousel-container">
            <?php
            // Retrieve carousel data
            $carousel_items = get_field('carousel_items');

            //var_dump($carousel_items);

            if ($carousel_items) :
            ?>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php foreach ($carousel_items as $key => $item) : ?>
                    
                        <li data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $key; ?>" class="<?php echo ($key === 0) ? 'active' : ''; ?>"></li>
                    <?php endforeach; ?>
                </ol>

                <!-- Slides -->
                <div class="carousel-inner">
                    <?php foreach ($carousel_items as $key => $item) : ?>
                     
                        <div class="carousel-item <?php echo ($key === 0) ? 'active' : ''; ?>">
                       
                        <?php if (is_array($item['carousel_image']) && isset($item['carousel_image']['url'])) : ?>
   <img src="<?php echo esc_url($item['carousel_image']['url']); ?>" alt="<?php echo esc_attr($item['carousel_image']['alt']); ?>">
<?php endif; ?>
                            <div class="carousel-caption">
                                <h3><?php echo esc_html($item['carousel_title']); ?></h3>
                                <p><?php echo esc_html($item['carousel_caption']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Controls -->
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <?php else : ?>
            <p>No carousel items found. Please add items in the ACF field group.</p>
            <?php endif; ?>
        </div>



         <!-- Accordion Section -->
         <div class="accordion-container">
                <?php
                // Retrieve accordion data
                $accordion_items = get_field('accordion_items');
                
                if ($accordion_items) :
                ?>
                <div class="accordion" id="accordionExample">
                    <?php foreach ($accordion_items as $key => $accordion_item) : ?>
                        <div class="card">
                            <div class="card-header" id="heading<?php echo $key; ?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>">
                                        <?php echo esc_html($accordion_item['accordion_title']); ?>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse<?php echo $key; ?>" class="collapse" aria-labelledby="heading<?php echo $key; ?>" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php echo esc_html($accordion_item['accordion_content']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <!-- End Accordion Section -->

    </main>
</div>

           
<?php
/*
*  start single.php body part
*/
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main>

			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
<?php
/*
*  end single.php
*/
?>

<?php get_footer(); ?>
