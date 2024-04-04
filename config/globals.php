<?php

$months = ["Januar", "Februar", "Marz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];

$today = date('Y-m-d');

$ship_info = [
    'email' => 'E-Mail-Adresse',
    'vers_name' => 'Vor-/Nachname',
    'vers_strasse' => 'Strasse',
    'vers_ort' => 'Stadt',
    'staat' => 'Staat',
    'vers_postl' => 'PLZ',
    'telefon' => 'Tel.',
    'cc_type' => 'Kreditkartentyp',
    'cc_number' => 'Kredirkartennummer',
    'cc_exp' => 'Gultig bis'
];

$cc_types = [
    'visa' => 'Visa',
    'mc' => 'Master Card',
    'amex' => 'American Express'
];

$bestelung_fields_lengths = [
    'email' => '55',
    'vers_name' => '40',
    'vers_strasse' => '55',
    'vers_ort' => '40',
    'vers_postl' => '10',
    'telefon' => '15',
    'cc_number' => '20'
];

$stateCode = 
[
    'BE',
    'DA',
    'DE',
    'FO',
    'FI',
    'FR',
    'EL',
    'GA',
    'IT',
    'LI',
    'LU',
    'MO',
    'NL',
    'AT',
    'PL',
    'SV',
    'CH',
    'ES',
    'TR'
];

$stateName = [
    'Belgien',
    'Daenemark',
    'Deutschland',
    'Farmer Inseln',
    'Finnland',
    'Frankreich',
    'Griechenland',
    'Irland',
    'Italien',
    'Liechenstein',
    'Luxemburg',
    'Monaco',
    'Niederlande',
    'Osterreich',
    'Polen',
    'Schweden',
    'Schweiz',
    'Spanien',
    'Turkei'
];



$url = "/baumarkt2";



