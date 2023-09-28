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



        

    </main>
</div>

           


<?php get_footer(); ?>
