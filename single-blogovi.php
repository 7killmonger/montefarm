<?php
$args = [
    'post_type' => 'blogovi',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
];
$latest_three_posts = get_posts($args);

get_header();
while ( have_posts() ) :
    the_post();
    $post_id = get_the_ID();
    $title = get_the_title();
    $content = get_the_content();
    $featured_image = get_field('featured_image', $post_id);
    $author_pic= get_field('slika_autora_teksta', $post_id);
    $author= get_field('autor_teksta', $post_id);
    $author_pharmacy= get_field('apoteka_autora', $post_id);
    echo '<div class="container mx-auto mb-20">
            <div>
                <h2 class="text-center text-3xl lg:text-5xl font-bold mb-20">' . $title . '</h2>
                <div class="flex justify-center items-center mt-2 mb-20">
            <a href="https://www.instagram.com/_montefarm_/" class="mr-4">'.file_get_contents(get_template_directory() . "/assets/svg/ig.svg").'</a>
            <a href="https://www.facebook.com/profile.php?id=2052555634788036&_rdr" class="mr-4">'.file_get_contents(get_template_directory() . "/assets/svg/facebook.svg").'</a>
                </div>
                <img src="' . $featured_image['url'] . '" alt="' . $title . '" class="object-cover object-center w-full max-h-[35rem] rounded-2xl mb-20">
                <div class="flex justify-center">
                <div class="text-base font-normal w-[95%] lg:w-[70%]">' . $content . '</div>
            </div>
                <div class="flex items-center gap-6 mt-20 ">
                    <div class="h-[100px] w-[100px] overflow-hidden rounded-3xl">
                    <img src=' . $author_pic['url'] . '" alt="slika-autora" class="object-cover w-full rounded-2xl">
                    </div>
                    <div>
                    <h3 class="text-lg font-medium text-[#404040]">'.$author.'</h3>
                    <h4 class="text-base font-normal text-[#767676]">'.$author_pharmacy.'</h4>
                    </div>
                </div>
            </div>
           </div>';

endwhile;
?>


<div class="container mx-auto ">
    <p class="font-bold">Najnovije</p>
    <div class="flex flex-wrap justify-between gap-8 mt-5">
        <?php
        foreach($latest_three_posts as $post) {
            setup_postdata($post);
            $date = get_the_date();
            $featured_image= get_field('featured_image', $post->ID);
            $title = get_the_title();
            $link = get_the_permalink();
            $featured_image = get_field('featured_image', $post->ID);
            $right_arrow = file_get_contents(get_template_directory()."/assets/svg/arrow-right.svg");

            echo'
                <div class="cards bg-white w-full lg:w-[31%] rounded-2xl shadow-[0_2px_12px_0_rgba(0,0,0,0.1)] cursor-pointer">
                    <img src="'.$featured_image['url'].'" alt="'.$featured_image['alt'].'" class="object-cover w-full h-[15rem] rounded-2xl">
                    <div class="p-5">
                    <p class="text-base font-normal text-[#0E559D] mt-4 mb-4">'.$date.'</p>
                    <h3 class="title text-2xl font-bold text-[#929292] mb-4">'.$title.'</h3>
                    <a href="'.$link.'" class="link flex text-[#0E559D] mt-auto mb-4">Pročitajte više<i class="ml-2">'.$right_arrow.'</i></a>
                    </div>
                </div>
                ';
        }
        ?>
    </div>
</div>
<script>
    document.querySelectorAll('.cards').forEach(slide => {
    slide.addEventListener('click', function() {
        this.querySelector('.link').click();
    });
});
</script>

<?php get_footer(); ?>

