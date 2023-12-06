<?php
# ------------------ Decode the JSON-File ---------------------------------
$infoJsonPath = 'src/data/info.json';
$travelJsonPath = 'src/data/travel.json';
$infoJson = json_decode(file_get_contents($infoJsonPath), true);
$travelJson = json_decode(file_get_contents($travelJsonPath), true);
# -------------------------------------------------------------------------

# ------------------ Information to the Form ------------------------------
$departureLocation = isset($_POST["departureLocation"]) ? $infoJson['depLoc'][$_POST["departureLocation"]] : null;
$drive = isset($_POST["drive"]) ? $infoJson['driveOpt'][$_POST["drive"]] : null;
$star = isset($_POST["star"]) ? $infoJson['starOpt'][$_POST["star"]] : null;
$excursion = isset($_POST["excursion"]) ? $infoJson['excurOpt'][$_POST["excursion"]] : null;
$extras = isset($_POST["extras"]) ? $infoJson['extraOpt'][$_POST["extras"]] : null;
$participants = isset($_POST["participants"]) && is_numeric($_POST["participants"]) ? $_POST["participants"] : null;
$departureDate = isset($_POST["departureDate"]) ? $_POST["departureDate"] : null;
$tripDuration = isset($_POST["tripDuration"]) && is_numeric($_POST["tripDuration"]) ? $_POST["tripDuration"] : null;
# -------------------------------------------------------------------------

$depLocTime = 0;
$travelCost = cost($drive, $travelJson, $participants);

# --------------------- Math Logic ----------------------------------------
function cost($drive, $travelJson, $participants)
{
    switch ($drive) {
        case "Auto":
            $a = 0.05; # Liter für 1 km
            $b = 750; # 750 km Reichweite
            $c = $travelJson["auto"][$_POST["departureLocation"]]; # <= 11783,9 km
            $d = ceil($c / $b); # <= 15,71186
            $e = "ca. " . number_format(((($a * $b) * 1.80) * $d), 2) . " €";
            return $e;
        case "Bus":
            break;
        case "Schiff (Fähre)":
            break;
        case "Zug":
            break;
        case "Flugzeug":
            $cost = number_format((($travelJson["flugzeug"][$_POST["departureLocation"]] * 3 / 100) * 2.11), 2) * $participants . " €";
            return $cost;
        case "Fahrrad":
            break;
        default:
            "error";
            break;
    }
}

# (8661,36 * 0,03) * 2,11 // Flugzeug
# ((11783,9 * 0,05) * 1,80)*


#Grobe Berechnung:

#Treibstoffverbrauch=(Entfernung×Treibstoffverbrauch pro Passagier)×Passagierkapazitaet

#Treibstoffkosten=Treibstoffverbrauch×Treibstoffpreis

#Treibstoffkosten=(8,903 km×3 L/100 km×600)×2.11 Euro/L
?>