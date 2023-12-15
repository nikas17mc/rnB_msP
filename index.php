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
            <div class="middle_header">
                <div class="header_logo">
                    <img src="./src/picture/page_logo.png" alt="Bangkok_Logo">
                </div>
                <div class="header_h">
                    <h3>Willkommen auf unsere Seite für die Buchung eines <span class="ueberschrift_txt">Ausfluges in
                            Thailand!</span></h3>
                </div>
            </div>
            <div class="middle_main">
                <?php
                foreach ($hotelList as $hotelItem) {
                    echo $hotelItem;
                };
                ?>
            </div>
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
                            <a class="rule_body_item_link" href="#modal_0">
                                <div class="faq_item_head">
                                    <p>Jedes Glücksspiel ist verboten und ein klares warum NEIN!</p>
                                </div>
                            </a>
                            <div id="modal_0" class="modal faq_item_body">
                                <p>
                                    Das Glücksspiel in Thailand, egal welches, ist ebenfalls illegal und verboten.
                                    Die einzige Ausnahme in diesem Fall: die von der Regierung gesponserte zweimonatige
                                    Lotterie,
                                    die Sie an jeder Straßenecke von den Verkäufern kaufen können.
                                    Wenn Sie nach Thailand kommen und dabei Lust haben, auf einen Muay Thai Kampf ein
                                    Fußballspiel oder auf ein sonstiges Ereignis zu wetten,
                                    könnten Sie dabei erwischt werden und zu einer harten Strafe verurteilt werden.
                                    Thailand hat sogar einen ganzen Abschnitt, der alleine den Spielkarten gewidmet ist,
                                    den sogenannten Spielkarten-Act. Dieses Gesetz verbietet es sogar einer einzelnen
                                    Person,
                                    mehr als 120 Spielkarten zu besitzen.
                                </p>
                                <a href="#" class="box-close">
                                    X
                                </a>
                            </div>
                        </div>
                        <div class="rule_body_item">
                            <a class="rule_body_item_link" href="#modal_1">
                                <div class="faq_item_head">
                                    <p>Respektlosigkeit gegenüber Münzen oder Geldscheinen!</p>
                                </div>
                            </a>
                            <div id="modal_1" class="modal faq_item_body">
                                <p>
                                    Wenn ihnen in Deutschland versehentlich eine Münze oder ein Geldschein herunter
                                    fällt ist man schnell gewillt,
                                    die Münze oder den Geldschein mit den Füssen am davon rollen oder wegfliegen zu
                                    stoppen.
                                    Da kümmert niemand und keiner wird sich darüber Gedanken machen. In Thailand sollten
                                    sie das allerdings unbedingt vermeiden,
                                    wenn sie von den Thailändern nicht schief angesehen werden wollen. In Thailand ist
                                    in der Tat auf jeder Münze und auf jeder Banknote das Gesicht des Königs von
                                    Thailand aufgedruckt.
                                    Daher wird es hier als sehr respektlos angesehen, wenn sie sich nicht um die
                                    thailändische Währung kümmern und sie mit Füssen treten.
                                    Bekanntlich hat Thailand einige der strengsten Gesetze, wenn es darum geht, die
                                    Monarchie zu respektieren.
                                    Laut dem dafür zuständigen Artikel 112, können sie für eine Beleidung des Königs
                                    oder des Königshauses bis zu 15 Jahren hinter Gittern landen.
                                </p>
                                <a href="#" class="box-close">
                                    X
                                </a>
                            </div>
                        </div>
                        <div class="rule_body_item">
                            <a class="rule_body_item_link" href="#modal_2">
                                <div class="faq_item_head">
                                    <p>Keine Nationalflaggen anderer Länder hissen</p>
                                </div>
                            </a>
                            <div id="modal_2" class="modal faq_item_body">
                                <p>
                                    Zugegeben, die wenigsten Touristen hissen ihre Landesflagge, wenn sie in Thailand zu
                                    Besuch sind. Doch so mancher fühlt sich vielleicht mit einem Flaggensymbol wohl oder
                                    möchte ein erinnerungsträchtiges Foto schießen. Keine gute Idee, denn in ganz
                                    Thailand ist es verboten, fremde Flaggen zu tragen oder zu hissen. Es droht auch
                                    hier eine Gefängnisstrafe. Einzig die Botschaft oder die Residenz der Diplomaten ist
                                    berechtigt, andere Fahnen als die thailändische zu hissen.
                                </p>
                                <a href="#" class="box-close">
                                    X
                                </a>
                            </div>
                        </div>
                        <div class="rule_body_item">
                            <a class="rule_body_item_link" href="#modal_3">
                                <div class="faq_item_head">
                                    <p>Gebräuche beim Essen</p>
                                </div>
                            </a>
                            <div id="modal_3" class="modal faq_item_body">
                                <p>
                                    Traditionell wird in Thailand mit der rechten Hand gegessen. Die linke Hand gilt
                                    hingegen als unrein, da diese zur Reinigung beim Toilettengang verwendet wird.

                                    Anders als bei uns wird oft kein eigenes Essen bestellt, sondern es werden mehrere
                                    Gerichte in die Mitte des Tisches gestellt, so dass sich jeder bedienen kann.
                                    Vorsicht ist beim Umgang mit den Stäbchen geboten. Diese sollte man keinesfalls
                                    senkrecht in den Reis stecken, sondern immer nur danebenlegen. Senkrechte
                                    Essstäbchen erinnern an ein Totenritual, bei dem Räucherstäbchen für Verstorbene
                                    angezündet werden. Dein Gegenüber könnte so also denken, dass du ihm den Tod
                                    wünschst. Zu den guten Tischmanieren gehört es außerdem, sich am Tisch vor
                                    Anwesenden nicht die Nase zu putzen.

                                    Auch beim Bezahlen existieren kulturelle Unterschiede. Oftmals übernimmt in Thailand
                                    noch die Person mit dem höchsten Einkommen die Rechnung. Daher wird man
                                    möglicherweise beim Essen nach dem Gehalt gefragt oder es wird davon ausgegangen,
                                    dass man als Ausländer das höchste Einkommen hat. Viele Thais zahlen jedoch auch
                                    ganz normal und erwarten nicht, dass sie eingeladen werden.
                                </p>
                                <a href="#" class="box-close">
                                    X
                                </a>
                            </div>
                        </div>
                        <div class="rule_body_item">
                            <a class="rule_body_item_link" href="#modal_3">
                                <div class="faq_item_head">
                                    <p>Verhaltensregeln während der Nationalhymne</p>
                                </div>
                            </a>
                            <div id="modal_3" class="modal faq_item_body">
                                <p>
                                    Täglich um 8:00 und 18:00 Uhr wird die thailändische Nationalhymne im Radio und
                                    Fernsehen gespielt. Auch an einigen öffentlichen Orten, wie Bahnhöfen, Parks oder
                                    Shopping Malls ertönt die Nationalhymne zu dieser Uhrzeit.

                                    Wichtig dabei zu wissen ist, dass man während der Nationalhymne aufsteht und
                                    innehält. Läuft man einfach weiter und ignoriert dies, handelt es sich um eine
                                    Ordnungswidrigkeit, welche mit einem Bußgeld bestraft werden kann.

                                    Ähnliches gilt für die Königshymne, welche unabhängig von der Uhrzeit bei royalen
                                    Veranstaltungen oder auch bei Filmvorführungen im Kino abgespielt wird. Auch hier
                                    müssen sich alle Anwesenden erheben und für die Dauer der Königshymne innehalten.
                                </p>
                                <a href="#" class="box-close">
                                    X
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