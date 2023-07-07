<?php
/**
 * @package Bravisthemes
 */
get_header(); ?>
<div class="container">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main">
                <div class="pxl-error-inner">
                    <img class="wow fadeInUp" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/04-bg.png'); ?>" alt="ptitle-particle2" />
                    <h1 class="pxl-error-title wow fadeInUp"><?php echo esc_html__('Page Not Found', 'builderrin'); ?></h1>
                    <div class="pxl-error-excerpt wow fadeInUp">
                        <span><?php echo esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'builderrin'); ?></span>
                    </div>
                    <form role="search" method="get" class="search-form wow fadeInUp" action="<?php echo esc_url(home_url( '/' )); ?>">
                        <div class="searchform-wrap">
                            <input type="text" placeholder="Search Here......" name="s" class="search-field" />
                            <button type="submit" class="search-submit"></button>
                        </div>
                    </form>
                    <a class="btn btn-default wow fadeInUp" href="<?php echo esc_url(home_url('/')); ?>">
                        <span class="pxl-wobble" data-animation="pxl-xspin"><?php echo esc_html__('Go Back Home', 'builderrin'); ?></span>
                    </a>
                </div>
            </main>
        </div>
    </div>
</div>
<div class="pxl-error-image"></div>
<?php get_footer();
