<section class="container mx-auto">
<div class="" id="category-filter">
    <button class="category-btn hidden" data-category="all">All</button>
</div>

<div id="filter-buttons-container category-filter" class="mb-4">
        <div class="hidden lg:flex flex-wrap space-x-2" id="filter-buttons">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) : ?>
                <button class="category-btn text-xl font-semibold text-[#929292] px-6 py-2 lg:border-2 lg:border-solid lg:border-[#0E559D] rounded-3xl lg:text-[#0E559D] cursor-pointer mt-4" data-category="<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
            <?php endforeach; ?>
        </div>
        <div class="lg:hidden relative">
            <div class="flex justify-between items-center">
                <h2 class="text-xl lg:text-4xl font-bold text-[#001047]"><?php echo $infoTitle; ?></h2>
                <button id="filter-dropdown-toggle" class="lg:hidden flex items-center ml-4 px-6 py-2 bg-gradient-to-r from-[#1580EB] to-[#0C4885] rounded-3xl text-base text-white shadow-[0px_10px_20px_0px_rgba(20,50,100,0.35);]">Filter<i class="ml-3"><?php echo file_get_contents(get_template_directory() . "/assets/svg/filter.svg"); ?></i></button>
            </div>
            <div id="filter-dropdown-menu" class="hidden absolute left-0 mt-2 w-full bg-white rounded-2xl p-5 shadow-[0px_10px_20px_0px_rgba(20,50,100,0.35);] border">
                <!-- <button class="filter-dropdown-item active block px-4 py-2 text-left w-full" data-category=""><?php _e('Sve Kategorije'); ?></button> -->
                <?php foreach ($categories as $category) : ?>
                    <button class="filter-dropdown-item category-btn block px-4 py-2 text-left w-full" data-category="<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<div id="post-list">

</div>

<div class="flex justify-center" id="pagination">

</div>
</section>