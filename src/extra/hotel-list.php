<?php
include('middle.php');
$hotelList = "
<div class=\"container_hotel\">
    <div class=\"box_image\">
        <img src=\"$hotelImage\" alt=\"image_hotel\" loading=\"lazy\">
    </div>
    <div class=\"box_information\">
        <div class=\"box_text\">
            <p class=\"hotel_name\">$hotelName</p>
            <p class=\"priceRating\">$hotelPriceRange</p>
        </div>
        <div class=\"box_info\">
            <div class=\"box_facilities_outer\">
                <div class=\"box_facilities_inner\">
                    $hotelFasilities
                </div>
            </div>
            <div class=\"box_extra_info\">
                <span class=\"location_hotel\">$hotelLocation</span>
                <span class=\"star_hotel\">$hotelRating</span>
            </div>
        </div>
    </div>
</div>
"
?>