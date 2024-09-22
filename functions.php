<?php
/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function tt3child_register_acf_blocks() {

    register_block_type( __DIR__ . '/template-parts/blocks/hero1/' );
    register_block_type( __DIR__ . '/template-parts/blocks/hero2/' );
    register_block_type( __DIR__ . '/template-parts/blocks/location/' );
    register_block_type( __DIR__ . '/template-parts/blocks/documents/' );
    register_block_type( __DIR__ . '/template-parts/blocks/questions' );
    register_block_type( __DIR__ . '/template-parts/blocks/about-section' );
    register_block_type( __DIR__ . '/template-parts/blocks/about-cards' );
    register_block_type( __DIR__ . '/template-parts/blocks/about-history' );
    register_block_type( __DIR__ . '/template-parts/blocks/info-posts' );
    register_block_type( __DIR__ . '/template-parts/blocks/apoteke' );
    register_block_type( __DIR__ . '/template-parts/blocks/blog' );
    register_block_type( __DIR__ . '/template-parts/blocks/blog-home' );
    register_block_type( __DIR__ . '/template-parts/blocks/pacijent-prava' );
    register_block_type( __DIR__ . '/template-parts/blocks/pacijent-kontakt' );
    register_block_type( __DIR__ . '/template-parts/blocks/organisation' );
    register_block_type( __DIR__ . '/template-parts/blocks/organisation-map' );
    register_block_type( __DIR__ . '/template-parts/blocks/odbor-direktora' );
}

add_action( 'init', 'tt3child_register_acf_blocks' );

function logo_montefarm() {
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'logo_montefarm' );

function montefarm_enqueue() {
    wp_enqueue_style('main', get_template_directory_uri() . '/style.css', array(), '1.0.0');
    wp_enqueue_style('montefarm-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', [], '1.0.0');
}
add_action('wp_enqueue_scripts', 'montefarm_enqueue');

// function montefarm_enqueue_scripts() {
//     wp_enqueue_script('questions-index', get_template_directory_uri() . '/index.js', array(), '1.0.0', true);

// }
// add_action('wp_enqueue_scripts', 'montefarm_enqueue_scripts');

function theme_scripts() {
    wp_enqueue_script( 'index-js', get_template_directory_uri() . '/template-parts/blocks/questions/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function enqueue_swiper_scripts_and_styles() {
    $defer = ['strategy' => 'defer'];

    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), $defer);

    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_scripts_and_styles');


/// aos animation
function add_aos_animation() {
    $defer = ['strategy' => 'defer'];

    wp_enqueue_style('AOS_animate', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
    wp_enqueue_script('AOS', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', null, true, $defer);
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/assets/js/theme.js', null, true, $defer);
}
add_action( 'wp_enqueue_scripts', 'add_aos_animation' );

// gsap scroll animation

// The proper way to enqueue GSAP script in WordPress

// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );


//
// function enqueue_custom_scripts() {
//     wp_enqueue_script('jquery');
//     wp_enqueue_script('ajax-pagination', get_template_directory_uri() . '/assets/js/ajax-pagination.js', array('jquery'), null, true);
//     wp_localize_script('ajax-pagination', 'ajaxpagination', array(
//         'ajax_url' => admin_url('admin-ajax.php')
//     ));
//     wp_enqueue_script('custom-accordion', get_template_directory_uri() . '/assets/js/custom-accordion.js', array('jquery'), null, true);
//     wp_enqueue_script('cards-expand', get_template_directory_uri() . '/assets/js/cards-expand.js', array('jquery'), null, true);

// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

//

function enqScripts() {
    wp_enqueue_script('ajax-filter', get_template_directory_uri() .  '/index.js', array('jquery'), null, true);

    wp_localize_script('ajax-filter', 'siteConfig', array(
        'ajaxUrl'   => admin_url('admin-ajax.php'),
        'ajaxNonce' => wp_create_nonce('ajaxNonce')
    ));
}

add_action('wp_enqueue_scripts', 'enqScripts');

function getPostsCb() {

$category = isset($_POST['category']) ? $_POST['category'] : "";
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 5;


$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $page,
);

if($category && $category !== 'all'){
    $args['category_name'] = $category;
}

$query = new WP_Query($args);

if($query -> have_posts()) :
    while ($query->have_posts()) : $query-> the_post(); 
    $post_id = get_the_ID();
    $file_url = get_field('file', $post_id);
    ?>
    <div>
        <div class="flex justify-between">
            <div>
                <p class="block lg:hidden text-sm font-normal text-[#143264] mb-4"> 
                    <?php echo the_date('d.m.Y') ?>
                </p>
                <h3 class="text-lg lg:text-2xl font-normal w-full lg:w-[60%] text-[#1a1a18] mb-8 lg:mb-4">
                    <?php the_title();?>
                </h3>
            </div>
            <div class="w-full mb-8 lg:w-auto lg:mb-0">
                <p class="hidden lg:block text-end text-sm text-[#143264] mb-4"><?php echo the_date('d.m.Y') ?></p>
                <a href="<? echo $file_url ?>" download class=" mb-6 lg:mb-0 py-1 px-8 border-solid border-[#0E559D] border-2 rounded-3xl text-[#0e559d]">Preuzmite</a>
            </div>
        </div>
    </div>
    <?php 
    endwhile;
    else: 
        echo "<p>No posts found</p>";
    endif;
    $posts_html = ob_get_clean(); 
    echo $posts_html;
    die();
}

add_action('wp_ajax_getPosts', 'getPostsCb');
add_action('wp_ajax_nopriv_getPosts', 'getPostsCb');




