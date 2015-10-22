<?php

global $mod_strings;

$db = $GLOBALS['db'];

$smarty = new Sugar_Smarty();
$produkty = new EcmB2BProduct();
$smarty->assign("MOD", $mod_strings);

if (!isset($_POST['LabelHeatRoom']) || !isset($_POST['LabelVent1'])) { //pokazywanie strony kalkulatora
    $smarty->display('modules/EcmB2BProducts/tpls/Calculator.tpl');
}

if (isset($_POST['LabelHeatRoom']) && $_POST['form_check'] == 1) { //wybór strony wyników kalkulatora - ogrzewania lub wentylacji
    display_calc_results_heat($smarty, $produkty, $db);
} elseif (isset($_POST['LabelVentRoom']) && $_POST['form_check'] == 0) {
    display_calc_results_vent($smarty, $produkty, $db);
}

function display_calc_results_vent($smarty, $produkty, $db) {
    $kubatura = $_POST['calcWynikKubSumWent'];
    $min_wydajnosc_centr = $kubatura * 0.7;
    $centrala_dobor = product_data_from_db_by_efficiency($db, $min_wydajnosc_centr); //pozyskiwanie danych wymaganej centrali
    $cena = product_price_from_db($db, $centrala_dobor['id']); //cena centrali
    $cantrala_cena = $cena['cena'];
    $suma_cena = $cena['cenao'];

    if ($kubatura <= 300) { //dopasowywanie zestawu montazowego
        $produkty->retrieve('49ae087c-56bb-e6a9-9f11-560d07b2b8ea');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = '49ae087c-56bb-e6a9-9f11-560d07b2b8ea';
        $cena = product_price_from_db($db, $zestaw_mon['id']);
        $zestaw_mon['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
    } elseif ($kubatura <= 400) {
        $produkty->retrieve('75f00037-2273-3c18-acf3-560d07b38107');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = '75f00037-2273-3c18-acf3-560d07b38107';
        $cena = product_price_from_db($db, $zestaw_mon['id']);
        $zestaw_mon['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
    } elseif ($kubatura <= 500) {
        $produkty->retrieve('a24706a4-68b7-a980-ef1c-560d07cb6639');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = 'a24706a4-68b7-a980-ef1c-560d07cb6639';
        $cena = product_price_from_db($db, $zestaw_mon['id']);
        $zestaw_mon['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
    } elseif ($kubatura <= 600) {
        $produkty->retrieve('f24706a4-68b7-a980-ef1c-560d07cb6748');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = 'f24706a4-68b7-a980-ef1c-560d07cb6748';
        $cena = product_price_from_db($db, $zestaw_mon['id']);
        $zestaw_mon['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
    } elseif ($kubatura > 600) {
        $produkty->retrieve('f55706a4-68b7-a980-ef1c-560d07cb7721');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = 'f55706a4-68b7-a980-ef1c-560d07cb7721';
        $cena = product_price_from_db($db, $zestaw_mon['id']);
        $zestaw_mon['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
    }

    $ameno_nawiewny = 0;
    $ameno_wywiewny = 0;
    foreach ($_POST['LabelVentRoom'] as $index => $value) { //dobór anemostatu (zaworu wentylacyjnego)
        if ($value <= 3) {
            $ameno_nawiewny++;
            if ($_POST['calcWynikKub'][$index] > 90) { //dodatkowy amenostat dla pomioeszczeń pow 90m3
                $ameno_nawiewny++;
            }
        } elseif ($value > 3 && $value <= 9) {
            $ameno_wywiewny++;
            if ($_POST['calcWynikKub'][$index] > 90) { //dodatkowy amenostat dla pomioeszczeń pow 90m3
                $ameno_wywiewny++;
            }
        }
    }
    if ($ameno_nawiewny != 0) { //przypisywanie id jeśli są jakieś nawiewne
        $ameno_naw['id'] = 'edbd6063-98f9-686d-f7ea-560d07e391ad';
        $produkty->retrieve($ameno_naw['id']);
        $ameno_naw['name'] = $produkty->name;
        $cena = product_price_from_db($db, $ameno_naw['id']);
        $ameno_naw['cena'] = $cena['cenao'] * $ameno_nawiewny;
        $suma_cena += $ameno_naw['cena'];
        $ameno_naw['cena'] = number_format($ameno_naw['cena'], 2, ',', ' ');
        $smarty->assign("amenostat_naw", array($ameno_naw['name'], $ameno_nawiewny, $ameno_naw['cena'], $ameno_naw['id']));
    }
    if ($ameno_wywiewny != 0) { //przypisywanie id jeśli są jakieś wywiewne
        $ameno_wyw['id'] = 'f0773ad8-7711-fdda-3900-560d07f85903';
        $produkty->retrieve($ameno_wyw['id']);
        $ameno_wyw['name'] = $produkty->name;
        $cena = product_price_from_db($db, $ameno_wyw['id']);
        $ameno_wyw['cena'] = $cena['cenao'] * $ameno_wywiewny;
        $suma_cena += $ameno_wyw['cena'];
        $ameno_wyw['cena'] = number_format($ameno_wyw['cena'], 2, ',', ' ');
        $smarty->assign("amenostat_wyw", array($ameno_wyw['name'], $ameno_wywiewny, $ameno_wyw['cena'], $ameno_wyw['id']));
    }

    $suma_cena = number_format($suma_cena, 2, ',', ' ');
    $smarty->assign("dobor_centrali", array($centrala_dobor['id'], $centrala_dobor['name'], $cantrala_cena, $zestaw_mon['name'], $zestaw_mon['id'], $zestaw_mon['cena'], $suma_cena));
    $smarty->display('modules/EcmB2BProducts/tpls/Calculator_result_vent.tpl');
}

function display_calc_results_heat($smarty, $produkty, $db) {
    $kubatura = $_POST['calcWynikKubSumGrze'];
    $wsp_izolacji = $_POST['LabelWspIzo'];
    $min_moc_grzewcza = $kubatura * $wsp_izolacji;
    $min_moc_grzewcza_kw = $min_moc_grzewcza / 1000; //w kW
    $suma_cena = 0;

    if ($_POST['LabelTypZrCiep'] == 1) { //jeśli wybrał pompę ciepła solanka/woda
        $dobor_zrodla_ciepla = product_data_from_db_by_power_and_name($db, $min_moc_grzewcza_kw, "Pompa ciepła", "%222-G%");
        if ($dobor_zrodla_ciepla == null) {
            $dobor_zrodla_ciepla['id'] = null;
            $dobor_zrodla_ciepla['name'] = 'Brak w cenniku, pompa dobierana indywidualnie';
            $dobor_zrodla_ciepla['cena'] = '0,00';

            $wymiennik_pionowy['id'] = null;
            $wymiennik_pionowy['name'] = 'Długość wymiennika pionowego dla pompy ciepła dobierana indywidualnie';
            $wymiennik_pionowy['cena'] = '0,00';
            $wymiennik_pionowy_ilosc = '0';
        } else {
            $produkty->retrieve($dobor_zrodla_ciepla['id']);
            $dobor_zrodla_ciepla['efficiency'] = $produkty->efficiency;
            $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
            $dobor_zrodla_ciepla['cena'] = $cena['cena'];
            $suma_cena += $cena['cenao'];

            $wymiennik_pionowy_ilosc = ceil(($dobor_zrodla_ciepla['efficiency'] * 1000 * 0.9) / 40); //zaokrąglanie w górę
            $wymiennik_pionowy['id'] = 'db90a5b9-7e2d-048b-3a10-5615077f15se';
            $produkty->retrieve($wymiennik_pionowy['id']);
            $wymiennik_pionowy['name'] = $produkty->name;
            $cena = product_price_from_db($db, $wymiennik_pionowy['id']);
            $suma_cena += $cena['cenao'] * $wymiennik_pionowy_ilosc;
            $wymiennik_pionowy['cena'] = $cena['cenao'] * $wymiennik_pionowy_ilosc;
            $wymiennik_pionowy['cena'] = number_format($wymiennik_pionowy['cena'], 2, ',', ' ');
        }

        $podgrzewacz['id'] = '38bbcdc0-eed6-5de4-ce89-5615074a9ff4';
        $produkty->retrieve($podgrzewacz['id']);
        $podgrzewacz['name'] = $produkty->name;
        $cena = product_price_from_db($db, $podgrzewacz['id']);
        $podgrzewacz['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];

        $smarty->assign("wymiennik_pionowy", array($wymiennik_pionowy['id'], $wymiennik_pionowy['name'], $wymiennik_pionowy['cena'], $wymiennik_pionowy_ilosc));
        $smarty->assign("podgrzewacz", array($podgrzewacz['id'], $podgrzewacz['name'], $podgrzewacz['cena']));
    }
    if ($_POST['LabelTypZrCiep'] == 2) { //jeśli wybrał pompę ciepła powietrze/woda
        $dobor_zrodla_ciepla = product_data_from_db_by_power_and_name($db, $min_moc_grzewcza_kw, "Pompa ciepła", "%222-S%");
        if ($dobor_zrodla_ciepla == null) {
            $dobor_zrodla_ciepla['id'] = null;
            $dobor_zrodla_ciepla['name'] = 'Brak w cenniku, pompa dobierana indywidualnie';
            $dobor_zrodla_ciepla['cena'] = '0,00';
        } else {
            $produkty->retrieve($dobor_zrodla_ciepla['id']);
            $dobor_zrodla_ciepla['efficiency'] = $produkty->efficiency;
            $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
            $dobor_zrodla_ciepla['cena'] = $cena['cena'];
            $suma_cena += $cena['cenao'];
        }

        $podgrzewacz['id'] = '38bbcdc0-eed6-5de4-ce89-5615074a9ff4';
        $produkty->retrieve($podgrzewacz['id']);
        $podgrzewacz['name'] = $produkty->name;
        $cena = product_price_from_db($db, $podgrzewacz['id']);
        $podgrzewacz['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
        $smarty->assign("podgrzewacz", array($podgrzewacz['id'], $podgrzewacz['name'], $podgrzewacz['cena']));
    }
    if ($_POST['LabelTypZrCiep'] == 3) { //jeśli wybrał kocioł gazowy
        $dobor_zrodla_ciepla = product_data_from_db_by_power($db, $min_moc_grzewcza_kw, "Kocioł gazowy");
        if ($dobor_zrodla_ciepla == null) {
            $dobor_zrodla_ciepla['id'] = null;
            $dobor_zrodla_ciepla['name'] = 'Brak w cenniku, kocioł gazowy dobierany indywidualnie';
            $dobor_zrodla_ciepla['cena'] = '0,00';
        } else {
            $produkty->retrieve($dobor_zrodla_ciepla['id']);
            $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
            $dobor_zrodla_ciepla['cena'] = $cena['cena'];
            $suma_cena += $cena['cenao'];
        }
    }
    if ($_POST['LabelTypZrCiep'] == 4) { //jeśli wybrał kocioł olejowy
        $dobor_zrodla_ciepla = product_data_from_db_by_power($db, $min_moc_grzewcza_kw, "Kocioł olejowy");
        if ($dobor_zrodla_ciepla == null) {
            $dobor_zrodla_ciepla['id'] = null;
            $dobor_zrodla_ciepla['name'] = 'Brak w cenniku, kocioł olejowy dobierany indywidualnie';
            $dobor_zrodla_ciepla['cena'] = '0,00';
        } else {
            $produkty->retrieve($dobor_zrodla_ciepla['id']);
            $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
            $dobor_zrodla_ciepla['cena'] = $cena['cena'];
            $suma_cena += $cena['cenao'];
        }
    }

    if ($_POST['LabelTypInstal'] == 2) { //jeśli wybrano ogrzewanie grzejnikowe
        $kategoria_zwykle = 'Grzejniki';
        $kategoria_lazienkowe = 'Grzejniki łazienkowe';
        $ilosc_grzejnikow_zw = 0;
        $ilosc_grzejnikow_laz = 0;

        foreach ($_POST['LabelHeatRoom'] as $index => $value) {
            $potrzebna_moc = $_POST['calcWynikKub'][$index] * $wsp_izolacji;
            if ($value < 9) { //jeśli nie wybrał łazienki
                if ($potrzebna_moc < 2631) {
                    $dobor_grzejnika_zw = product_data_from_db_by_power($db, $potrzebna_moc, $kategoria_zwykle);
                } else {
                    $dobor_grzejnika_zw = product_data_from_db_by_power($db, 2631, $kategoria_zwykle);
                    $ilosc_grzejnikow_zw++;
                }
                $cena = product_price_from_db($db, $dobor_grzejnika_zw['id']);
                $dobor_grzejnika_zw['cena'] = $cena['cena'];
                $suma_cena += $cena['cenao'];
                $ilosc_grzejnikow_zw++;
                
                $produkty->retrieve('b2a25d97-1b2d-2de7-20f6-5615079a0b97'); //zestaw przyłączeniowy do grzejnika zwykłego
                $zestaw_przyl_zw['name'] = $produkty->name;
                $cena = product_price_from_db($db, 'b2a25d97-1b2d-2de7-20f6-5615079a0b97');
                $zestaw_przyl_zw['cena'] = $cena['cenao'] * $ilosc_grzejnikow_zw;
                $suma_cena += $zestaw_przyl_zw['cena'];
                $zestaw_przyl_zw['cena'] = number_format($zestaw_przyl_zw['cena'], 2, ',', ' ');
                
            } elseif ($value == 9) { //jeśli wybrał łazienkę
                if ($potrzebna_moc < 359) {
                    $dobor_grzejnika_laz = product_data_from_db_by_power($db, $potrzebna_moc, $kategoria_lazienkowe);
                } else {
                    $dobor_grzejnika_laz = product_data_from_db_by_power($db, 359, $kategoria_lazienkowe);
                    $ilosc_grzejnikow_laz++;
                }
                $cena = product_price_from_db($db, $dobor_grzejnika_laz['id']);
                $dobor_grzejnika_laz['cena'] = $cena['cena'];
                $suma_cena += $cena['cenao'];
                $ilosc_grzejnikow_laz++;
                
                $produkty->retrieve('ad0715ff-c9d1-90ad-1b0b-56150705cf7f'); //zestaw przyłączeniowy do grzejnika łazienkowego
                $zestaw_przyl_laz['name'] = $produkty->name;
                $cena = product_price_from_db($db, 'ad0715ff-c9d1-90ad-1b0b-56150705cf7f');
                $zestaw_przyl_laz['cena'] = $cena['cenao'] * $ilosc_grzejnikow_laz;
                $suma_cena += $zestaw_przyl_laz['cena'];
                $zestaw_przyl_laz['cena'] = number_format($zestaw_przyl_laz['cena'], 2, ',', ' ');
            }
        }
        if ($ilosc_grzejnikow_zw != 0) {
            $smarty->assign("grzejniki_zwykle", array($dobor_grzejnika_zw['id'], $dobor_grzejnika_zw['name'], $dobor_grzejnika_zw['cena'], $ilosc_grzejnikow_zw));
            $smarty->assign("zestaw_przyl_zwykly", array('b2a25d97-1b2d-2de7-20f6-5615079a0b97', $zestaw_przyl_zw['name'],  $zestaw_przyl_laz['cena'], $ilosc_grzejnikow_zw));
        }
        if ($ilosc_grzejnikow_laz != 0) {
            $smarty->assign("grzejniki_lazienkowe", array($dobor_grzejnika_laz['id'], $dobor_grzejnika_laz['name'], $dobor_grzejnika_laz['cena'], $ilosc_grzejnikow_laz));
            $smarty->assign("zestaw_przyl_lazienkowy", array('ad0715ff-c9d1-90ad-1b0b-56150705cf7f', $zestaw_przyl_laz['name'], $zestaw_przyl_laz['cena'], $ilosc_grzejnikow_laz));
        }
    }

    if ($_POST['LabelTypInstal'] == 3) { //jeśli wybrano ogrzewanie podłogowe
        $pow_calkowita = $_POST['calcWynikPowSumGrze'];
        $ilosc_rury = $pow_calkowita * 10;
        $ilosc_obiegow = ceil($pow_calkowita / 10);
        $ilosc_zlaczek = $ilosc_obiegow * 2;
        $ilosc_spinek = $ilosc_rury * 5;
        $ilosc_roz_szaf = 1;

        if ($ilosc_obiegow == 2) { //definiowanie wielkości rozdzielaczy obwodów grzejnych
            $wielkosc_rozdzielaczy = '4956949b-7e75-a4a3-aa3b-5615079a6dc6';
            $wielkosc_szafki = '67df9ef6-d408-6813-b1e8-5615073fa32d';
        } elseif ($ilosc_obiegow == 3) {
            $wielkosc_rozdzielaczy = '4c21f5a7-dc88-f7e7-ebd2-561507823c4c';
            $wielkosc_szafki = '67df9ef6-d408-6813-b1e8-5615073fa32d';
        } elseif ($ilosc_obiegow == 4) {
            $wielkosc_rozdzielaczy = '4eda2cc8-2c71-6b7f-c247-561507050f95';
            $wielkosc_szafki = '67df9ef6-d408-6813-b1e8-5615073fa32d';
        } elseif ($ilosc_obiegow == 5) {
            $wielkosc_rozdzielaczy = '51a5f898-5016-8aef-81b9-561507d9b8f1';
            $wielkosc_szafki = '6aa36386-3cf2-5362-6f4f-5615074a4280';
        } elseif ($ilosc_obiegow == 6) {
            $wielkosc_rozdzielaczy = '5471d357-a088-3788-bfeb-561507f58be6';
            $wielkosc_szafki = '6aa36386-3cf2-5362-6f4f-5615074a4280';
        } elseif ($ilosc_obiegow == 7) {
            $wielkosc_rozdzielaczy = '573fc45a-ba45-f4e5-e3c7-5615079152b8';
            $wielkosc_szafki = '6d651bca-be19-151f-1d74-561507ca8d65';
        } elseif ($ilosc_obiegow == 8) {
            $wielkosc_rozdzielaczy = '5a11a2ea-033a-6e3d-5abf-56150726d4e4';
            $wielkosc_szafki = '6d651bca-be19-151f-1d74-561507ca8d65';
        } elseif ($ilosc_obiegow == 9) {
            $wielkosc_rozdzielaczy = '5cdcd104-b186-6fe6-715b-561507765b55';
            $wielkosc_szafki = '7028979f-c304-d19c-131f-56150749cb89';
        } elseif ($ilosc_obiegow == 10) {
            $wielkosc_rozdzielaczy = '5fa1de14-2952-1a61-f36f-561507454418';
            $wielkosc_szafki = '7028979f-c304-d19c-131f-56150749cb89';
        } elseif ($ilosc_obiegow == 11) {
            $wielkosc_rozdzielaczy = '62623f67-8c1a-8d16-f3ce-561507b11285';
            $wielkosc_szafki = '72e509c4-5e75-ef1c-3ff0-561507a6b45d';
        } elseif ($ilosc_obiegow == 12) {
            $wielkosc_rozdzielaczy = '6522f6bf-e2a8-b979-ccd6-561507bf2423';
            $wielkosc_szafki = '75a95617-6a06-0c7b-478c-561507e905c9';
        } else {
            $wielkosc_rozdzielaczy = '6522f6bf-e2a8-b979-ccd6-561507bf2423';
            $wielkosc_szafki = '72e509c4-5e75-ef1c-3ff0-561507a6b45d';
            $ilosc_roz_szaf = ceil($ilosc_obiegow / 12);
            $ilosc_zlaczek = $ilosc_roz_szaf * 12;
        }
        $produkty->retrieve($wielkosc_rozdzielaczy); //rozdzielacz
        $rozdzielacz['name'] = $produkty->name;
        $cena = product_price_from_db($db, $wielkosc_rozdzielaczy);
        $rozdzielacz['cena'] = $cena['cenao'] * $ilosc_roz_szaf;
        $suma_cena += $rozdzielacz['cena'];
        $rozdzielacz['cena'] = number_format($rozdzielacz['cena'], 2, ',', ' ');
        $smarty->assign("rozdzielacz", array($wielkosc_rozdzielaczy, $rozdzielacz['name'], $rozdzielacz['cena'], $ilosc_roz_szaf));

        $produkty->retrieve($wielkosc_szafki); //szafka
        $szafka['name'] = $produkty->name;
        $cena = product_price_from_db($db, $wielkosc_szafki);
        $szafka['cena'] = $cena['cenao'] * $ilosc_roz_szaf;
        $suma_cena += $szafka['cena'];
        $szafka['cena'] = number_format($szafka['cena'], 2, ',', ' ');
        $smarty->assign("szafka", array($wielkosc_szafki, $szafka['name'], $szafka['cena'], $ilosc_roz_szaf));

        $produkty->retrieve('43d195b3-108c-fd26-2b6f-561507d7f2f1'); //złączka
        $zlaczka['name'] = $produkty->name;
        $cena = product_price_from_db($db, '43d195b3-108c-fd26-2b6f-561507d7f2f1');
        $zlaczka['cena'] = $cena['cenao'] * $ilosc_zlaczek;
        $suma_cena += $zlaczka['cena'];
        $zlaczka['cena'] = number_format($zlaczka['cena'], 2, ',', ' ');
        $smarty->assign("zlaczka", array('43d195b3-108c-fd26-2b6f-561507d7f2f1', $zlaczka['name'], $zlaczka['cena'], $ilosc_zlaczek));

        $produkty->retrieve('3e3b3d31-7bc1-bc10-1cda-561507668b61'); //rura
        $rura['name'] = $produkty->name;
        $cena = product_price_from_db($db, '3e3b3d31-7bc1-bc10-1cda-561507668b61');
        $paczki_rury = ceil($ilosc_rury / 200);
        $rura['cena'] = $cena['cenao'] * $paczki_rury;
        $suma_cena += $rura['cena'];
        $rura['cena'] = number_format($rura['cena'], 2, ',', ' ');
        $smarty->assign("rura", array('3e3b3d31-7bc1-bc10-1cda-561507668b61', $rura['name'], $rura['cena'], $paczki_rury));

        $produkty->retrieve('4692dd4a-282f-a00c-3ce0-561507b84835'); //spinki
        $spinka['name'] = $produkty->name;
        $cena = product_price_from_db($db, '4692dd4a-282f-a00c-3ce0-561507b84835');
        $paczki_spinki = ceil($ilosc_spinek / 600);
        $spinka['cena'] = $cena['cenao'] * $paczki_spinki;
        $suma_cena += $spinka['cena'];
        $spinka['cena'] = number_format($spinka['cena'], 2, ',', ' ');
        $smarty->assign("spinka", array('4692dd4a-282f-a00c-3ce0-561507b84835', $spinka['name'], $spinka['cena'], $paczki_spinki));
    }

    $suma_cena = number_format($suma_cena, 2, ',', ' ');
    $smarty->assign("dobor_zrodla_ciepla", array($dobor_zrodla_ciepla['id'], $dobor_zrodla_ciepla['name'], $dobor_zrodla_ciepla['cena'], $suma_cena));
    $smarty->display('modules/EcmB2BProducts/tpls/Calculator_result_heat.tpl');
}

function product_data_from_db_by_efficiency($db, $efficiency_need) {
    $efficiency_need_max = $efficiency_need + 500;
    $result = $db->query("select id,name from ecmproducts where efficiency between $efficiency_need and $efficiency_need_max and product_category_name='Centrala' order by efficiency desc");
    while (($row = $db->fetchByAssoc($result)) != null) {
        $n['id'] = $row['id'];
        $n['name'] = $row['name'];
    }
    return $n;
}

function product_data_from_db_by_power($db, $power_need, $cat_name) {
    $power_need_max = $power_need + 1000;
    $result = $db->query("select id,name from ecmproducts where efficiency between $power_need and $power_need_max and product_category_name = '$cat_name' order by efficiency desc");
    while (($row = $db->fetchByAssoc($result)) != null) {
        $n['id'] = $row['id'];
        $n['name'] = $row['name'];
    }
    return $n;
}

function product_data_from_db_by_power_and_name($db, $power_need, $cat_name, $name_like) {
    $power_need_max = $power_need + 1000;
    $result = $db->query("select id,name from ecmproducts where efficiency between $power_need and $power_need_max and product_category_name = '$cat_name' and name like '$name_like' order by efficiency desc");
    while (($row = $db->fetchByAssoc($result)) != null) {
        $n['id'] = $row['id'];
        $n['name'] = $row['name'];
    }
    return $n;
}

function product_price_from_db($db, $id) {
    $result = $db->query("select price from ecmprices_ecmproducts where ecmproduct_id = '$id'");
    while (($row = $db->fetchByAssoc($result)) != null) {
        $p['cenao'] = $row['price'];
        $p['cena'] = number_format($p['cenao'], 2, ',', ' '); //waluta z liczby
    }
    return $p;
}
