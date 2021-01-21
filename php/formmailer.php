<?php

/**
 * Konfiguration 
 *
 * Bitte passen Sie die folgenden Werte an, bevor Sie das Script benutzen!
 * 
 * Das Skript bitte in UTF-8 abspeichern (ohne BOM).
 */

// An welche Adresse sollen die Mails gesendet werden? bitte formal richtige adresse eintragen!!!!
$zieladresse = 'koral-76@yandex.ru';

// Welche Adresse soll als Absender angegeben werden?
// (Manche Hoster lassen diese Angabe vor dem Versenden der Mail ueberschreiben)
// $absenderadresse = '';

// Welcher Absendername soll verwendet werden?
// $absendername = 'Formmailer';

// Welchen Betreff sollen die Mails erhalten?
$betreff = 'Feedback von meiner Website';

// Zu welcher Seite soll als "Danke-Seite" weitergeleitet werden?
// Wichtig: Sie muessen hier eine gueltige HTTP-Adresse angeben!
// ----------------------- !!!!!! nächste zeile anpassen!
$urlDankeSeite = 'pages/thanks.html';

// Welche(s) Zeichen soll(en) zwischen dem Feldnamen und dem angegebenen Wert stehen?
$trenner = ":\t"; // Doppelpunkt + Tabulator

/**
 * Ende Konfiguration
 */

if ($_SERVER['REQUEST_METHOD'] === "POST") {

	$header = array();
	$header[] = "From: ".mb_encode_mimeheader($absendername, "utf-8", "Q")." <".$absenderadresse.">";
	$header[] = "MIME-Version: 1.0";
	$header[] = "Content-type: text/plain; charset=utf-8";
	$header[] = "Content-transfer-encoding: 8bit";
	
    $mailtext = "";

    foreach ($_POST as $name => $wert) {
        if (is_array($wert)) {
		    foreach ($wert as $einzelwert) {
			    $mailtext .= $name.$trenner.$einzelwert."\n";
            }
        } else {
            $mailtext .= $name.$trenner.$wert."\n";
        }
    }

    mail(
    	$zieladresse, 
    	mb_encode_mimeheader($betreff, "utf-8", "Q"), 
    	$mailtext,
    	implode("\n", $header)
    ) or die("Die Mail konnte nicht versendet werden.");
    header("Location: $urlDankeSeite");
    exit;
}

header("Content-type: text/html; charset=utf-8"); 

?>