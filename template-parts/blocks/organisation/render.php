
<section class="container mx-auto">
<?php
$org_repeater = get_field('org-repeater');

if ($org_repeater) {
    $first_org_group = $org_repeater[0]['org-group'];

    echo '
    <div class="flex flex-col lg:flex-row items-center justify-between">
    <img src="' . $first_org_group['org-image']['url'] . '" alt="Organization Image" class="object-cover w-full lg:w-[45%] mb-4 lg:mb-0">
     <div class="w-full lg:w-[50%]">
     <h2 class="text-2xl lg:text-4xl font-bold text-[#001047] mb-1">' . $first_org_group['ime'] . '</h2>
     <h2 class="font-bold text-base lg:text-2xl text-[#001047] mb-6">' . $first_org_group['pozicija'] . '</h2>
     <p class="font-normal text-base text-[#929292]">' . $first_org_group['opis-pozicije'] . '</p>
     </div>
     </div>';
};?>
    <div class="flex flex-wrap gap-8 mt-20 lg:mt-32">
    <?php
if ($org_repeater) {

    for ($i = 1; $i < count($org_repeater); $i++) {
        $org_group = $org_repeater[$i]['org-group'];
        echo '
        <div class="w-full lg:w-[31%] rounded-2xl shadow-[0_2px_12px_0_rgba(0,0,0,0.1)] bg-white">
        <img src="' . $org_group['org-image']['url'] . '" alt="Organization Image" class="object-cover rounded-2xl w-full">
        <div class="p-5">
         <h2 class="text-xl font-bold text-[#001047] mb-4">' . $org_group['ime'] . '</h2>
         <p class="font-medium text-xs text-[#929292] mb-4">' . $org_group['pozicija'] . '</p>
         <p class="font-normal text-base text-[#929292]">' . $org_group['opis-pozicije'] . '</p>
        </div>
         </div>';
    }
}
?>
</div>
</section>
