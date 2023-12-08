<?php
include('./src/extra/left.php');
include('./src/extra/middle.php');
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>Reise nach Bangkok</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style/style.css">
    <link rel="shortcut icon" href="./src/icons/my_picure.png" src="./src/icons/my_picure.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container">
        <div class="left-column">
            <?php if (!isset($_POST['submit'])) { ?>
                <h3>Wählen Sie ihre Wünsche was Sie genau suchen:</h3>
                <form id="myForm" action="" method="post">
                    <label for="departureLocation">Abfahrtsort:</label>
                    <select name="departureLocation" id="departureLocation" required>
                        <option value="" disabled selected>Abfahrtsort</option>
                        <option value="1">Berlin-Tegel</option>
                        <option value="2">Frankfurt am Main</option>
                        <option value="3">München</option>
                        <option value="4">Düsseldorf</option>
                        <option value="5">Hamburg</option>
                        <option value="6">Stuttgard</option>
                        <option value="7">Köln / Bonn</option>
                    </select>
                    <label for="drive">Transportmittel:</label>
                    <select name="drive" id="drive" required>
                        <option value="" disabled selected>Transportmittel</option>
                        <option value="1">Auto</option>
                        <option value="2">Bus</option>
                        <option value="3">Schiff (Fähre)</option>
                        <option value="4">Zug</option>
                        <option value="5">Flugzeug</option>
                        <option value="6">Fahrrad</option>
                    </select>
                    <label for="star">Hotel Sterne:</label>
                    <select name="star" id="star" required>
                        <option value="" disabled selected>Sterne des Hotels</option>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                    <label for="excursion">Abenteueroption:</label>
                    <select name="excursion" id="excursion" required>
                        <option value="" disabled selected>Abenteueroptionen</option>
                        <option value="beach">Strandausflug</option>
                        <option value="city">Stadtbesichtigung</option>
                        <option value="adventure">Abenteuertour</option>
                    </select>
                    <label for="participants">Anzahl der Teilnehmer:</label>
                    <input type="number" name="participants" id="participants" min="1" required>
                    <label for="extras">Wähle Extras:</label>
                    <select name="extras" id="extras" multiple>
                        <option value="guide">Reiseleiter</option>
                        <option value="meals">Verpflegungspaket</option>
                        <option value="activities">Zusätzliche Aktivitäten</option>
                    </select>
                    <label for="comments">Weitere Kommentare:</label>
                    <textarea name="comments" id="comments" rows="4"
                        placeholder="Deine Wünsche oder Anmerkungen"></textarea>
                    <label for="departureDate">Abreisetag:</label>
                    <input type="date" name="departureDate" required>
                    <label for="tripDuration">Reisedauer (Tage):</label>
                    <input type="number" name="tripDuration" min="1" required>
                    <button id="sendB" type="submit" name="submit">Buchung abschicken</button>
                </form>
            <?php } else { ?>
                <h3>Ihre ausgewählte Angaben und Informationen:</h3>
                <div class="auswahl_angaben">
                    <p>Transportmittel:
                        <?php echo $drive ?>
                    </p>
                    <?php echo transpCost[$_POST["drive"]] ?>
                    <p>Sterne:
                        <?php echo $star ?>
                    </p>
                    <p>Abenteueroptionen:
                        <?php echo $excursion ?>
                    </p>
                    <p>Teilnehmer:
                        <?php echo $participants ?>
                    </p>
                    <p>Extra:
                        <?php echo $extras ?>
                    </p>
                    <p>Abreise:
                        <?php echo $departureDate ?>
                    </p>
                    <p>Reisedauer:
                        <?php echo $tripDuration ?>
                    </p>
                    <p></p>
                </div>
            <?php }
            ; ?>
        </div>
        <div class="middle-column">
            <h3>Willkommen auf unsere Seite für die Buchung eines Ausfluges in Thailand!</h3>
            <?php
            foreach ($hotelList as $hotelItem) {
                echo $hotelItem;
            }
            ;
            ?>
        </div>
        <div class="right-column">
            <h3>Hier können Sie die wichtige Dinge schnell überprüfen:</h3>
            <label style="text-align:left;" for="amount">Betrag:</label>
            <input oninput="numberValidate(this)" style="margin-bottom: 3px; width:73%;" type="number" id="amount"
                placeholder="Geben Sie hier den Betrag ein"><span style="font-size:22px;font-weight:600;">
                €</span><br />
            <small>Das heutige Kurs ist: <em id="cur"></em></small>
            <div class="result_box">
                <p id="result">Endergebnis: </p>
            </div>
            <div class="line-break"></div>
            <div class="rule_list_outer">
                <div class="rule_list_inner">
                    <div class="rule_head">
                        <p class="rule_head_parag">FAQ</p>
                    </div>
                    <div class="line-break"></div>
                    <div class="rule_body">
                        <div class="rule_body_item">
                            <a href="#modal_0">
                                <div class="faq_item_head">
                                    <p>Darf ich im Zug ohne Fahrschein fahren?</p>
                                </div>
                            </a>
                            <div id="modal_0" class="modal faq_item_body">
                                <p>

                                </p>
                                <a href="#" class="box-close">
                                    ×
                                </a>
                            </div>
                        </div>
                        <div class="rule_body_item">
                            <a href="#modal_1">
                                <div class="faq_item_head">
                                    <p>Darf ich im Zug ohne Fahrschein fahren?</p>
                                </div>
                            </a>
                            <div id="modal_1" class="modal faq_item_body">
                                <p>

                                </p>
                                <a href="#" class="box-close">
                                    ×
                                </a>
                            </div>
                        </div>
                        <div class="rule_body_item">
                            <a href="#modal_2">
                                <div class="faq_item_head">
                                    <p>Darf ich im Zug ohne Fahrschein fahren?</p>
                                </div>
                            </a>
                            <div id="modal_2" class="modal faq_item_body">
                                <p>

                                </p>
                                <a href="#" class="box-close">
                                    ×
                                </a>
                            </div>
                        </div>
                        <div class="rule_body_item">
                            <a href="#modal_3">
                                <div class="faq_item_head">
                                    <p>Darf ich im Zug ohne Fahrschein fahren?</p>
                                </div>
                            </a>
                            <div id="modal_3" class="modal faq_item_body">
                                <p>

                                </p>
                                <a href="#" class="box-close">
                                    ×
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="downB" onclick="down_jump()"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
    <button id="upB" onclick="up_jump()"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
    <button data-open-modal>Open</button>
    <dialog data-modal>
        <div>This is Modal</div>
        <button data-close-modal>Close</button>
    </dialog>
    <?php include('./src/extra/footer.php'); ?>
    <script src="./src/js/script.js"></script>
</body>

</html>