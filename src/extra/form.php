<?php
include('header.php');
define("transpCost", [
    "
Uhahahahah i have nothing to show youuuuu, uuuuuuuuuuuuu!!!!!!!
    ",
    # Auto
    "
<div class=\"depLoc_outer_box\">
    <div class=\"depLoc_inner_box\">
        <p>
            <span class=\"depLoc_txt\">$departureLocation</span>
            <span class=\"arrow\"><i class=\"fa fa-arrow-right\"></i></span>
            <span class=\"depLoc_txt\">BAG</span>
        </p>
        <p class=\"time_txt\">
            <span class=\"txt_name_time\">Dauer:</span>
            <span class=\"txt_name_time\">$depLocTime</span>
        </p>
        <p><span class=\"line_start\"></span><span class=\"lineTime\"></span><span class=\"line_end\"></span></p>
        <p class=\"cost_txt\">
            <span class=\"txt_name_cost\">Kosten:</span>
            <span class=\"txt_name_cost_unl\">$travelCost</span>
        </p>
    </div>
</div>
",
    # Bus
    "
    ",
    # Schiff (Fähre)
    "
    ",
    # Zug
    "
    ",
    # Flugzeug
    "
<div class=\"depLoc_outer_box\">
    <div class=\"depLoc_inner_box\">
        <p><span class=\"depLoc_txt\">
                $departureLocation
            </span><span class=\"arrow\"><i class=\"fa fa-arrow-right\"></i></span><span class=\"Loc\">BAG</span></p>
        <p class=\"time_txt\"><span class=\"txt_name_time\">Dauer:</span><span class=\"txt_name_time\">
                $depLocTime
            </span></p>
        <p><span class=\"line_start\"></span><span class=\"lineTime\"></span><span class=\"line_end\"></span></p>
        <p class=\"cost_txt\"><span class=\"txt_name_cost\">Kosten:</span> <span class=\"txt_name_cost_unl\">
                $travelCost
            </span></p>
    </div>
</div>
",
    # Fahrrad
    "
" 
]);
?>