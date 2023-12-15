<?php

$hotelJsonPath = 'src/data/hotel.json';
$hotelJson = json_decode(file_get_contents($hotelJsonPath), true);
$hotelList = [];
$star_value = isset($_POST["star"]) ? $_POST["star"] : null;
if (isset($_POST['submit'])) {
    for ($i = 0; $i <= 3; $i++) {
        $hotel = $hotelJson["hotels"][$star_value][$i];
        $hotelLink=$hotel["link"];
        $hotelImage = $hotel["image"];
        $hotelName = $hotel["name"];
        $hotelPriceRange = $hotel["priceRange"];
        $hotelFacilities = is_array($hotel["facilities"]) ? implode('</span><span>', $hotel["facilities"]) : $hotel["facilities"];
        $hotelLocation = $hotel["location"];
        $hotelRating = $hotel["rating"];
        $hotelList[] = "
            <a href=\"$hotelLink\">
                <div>
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
                                        <span>$hotelFacilities</span>
                                    </div>
                                </div>
                                <div class=\"box_extra_info\">
                                    <span class=\"location_hotel\">$hotelLocation</span>
                                    <span class=\"star_hotel\">$hotelRating</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        ";
    };
};
?>