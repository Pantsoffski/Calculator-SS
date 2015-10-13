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
            $min_moc_grzewcza_kw = 10;
            $dobor_zrodla_ciepla = product_data_from_db_by_power_and_name($db, $min_moc_grzewcza_kw, "Pompa ciepła", "%222-G%");
        }
        $produkty->retrieve($dobor_zrodla_ciepla['id']);
        $dobor_zrodla_ciepla['efficiency'] = $produkty->efficiency;
        $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
        $dobor_zrodla_ciepla['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];

        $podgrzewacz['id'] = '38bbcdc0-eed6-5de4-ce89-5615074a9ff4';
        $produkty->retrieve($podgrzewacz['id']);
        $podgrzewacz['name'] = $produkty->name;
        $cena = product_price_from_db($db, $podgrzewacz['id']);
        $podgrzewacz['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];

        $wymiennik_pionowy_ilosc = ceil(($dobor_zrodla_ciepla['efficiency'] * 1000 * 0.9) / 40); //zaokrąglanie w górę
        $wymiennik_pionowy['id'] = 'db90a5b9-7e2d-048b-3a10-5615077f15se';
        $produkty->retrieve($wymiennik_pionowy['id']);
        $wymiennik_pionowy['name'] = $produkty->name;
        $cena = product_price_from_db($db, $wymiennik_pionowy['id']);
        $suma_cena += $cena['cenao'] * $wymiennik_pionowy_ilosc;
        $wymiennik_pionowy['cena'] = $cena['cenao'] * $wymiennik_pionowy_ilosc;
        $wymiennik_pionowy['cena'] = number_format($wymiennik_pionowy['cena'], 2, ',', ' ');

        $smarty->assign("wymiennik_pionowy", array($wymiennik_pionowy['id'], $wymiennik_pionowy['name'], $wymiennik_pionowy['cena'], $wymiennik_pionowy_ilosc));
        $smarty->assign("podgrzewacz", array($podgrzewacz['id'], $podgrzewacz['name'], $podgrzewacz['cena']));
    }
    if ($_POST['LabelTypZrCiep'] == 2) { //jeśli wybrał pompę ciepła powietrze/woda
        $dobor_zrodla_ciepla = product_data_from_db_by_power_and_name($db, $min_moc_grzewcza_kw, "Pompa ciepła", "%222-S%");
        if ($dobor_zrodla_ciepla == null) {
            $min_moc_grzewcza_kw = 9;
            $dobor_zrodla_ciepla = product_data_from_db_by_power_and_name($db, $min_moc_grzewcza_kw, "Pompa ciepła", "%222-S%");
        }
        $produkty->retrieve($dobor_zrodla_ciepla['id']);
        $dobor_zrodla_ciepla['efficiency'] = $produkty->efficiency;
        $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
        $dobor_zrodla_ciepla['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];

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
            $min_moc_grzewcza_kw = 35;
            $dobor_zrodla_ciepla = product_data_from_db_by_power_and_name($db, $min_moc_grzewcza_kw, "Pompa ciepła", "%222-S%");
        }
        $produkty->retrieve($dobor_zrodla_ciepla['id']);
        $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
        $dobor_zrodla_ciepla['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
    }
    if ($_POST['LabelTypZrCiep'] == 4) { //jeśli wybrał kocioł olejowy
        $dobor_zrodla_ciepla = product_data_from_db_by_power($db, $min_moc_grzewcza_kw, "Kocioł olejowy");
        if ($dobor_zrodla_ciepla == null) {
            $min_moc_grzewcza_kw = 63;
            $dobor_zrodla_ciepla = product_data_from_db_by_power_and_name($db, $min_moc_grzewcza_kw, "Pompa ciepła", "%222-S%");
        }
        $produkty->retrieve($dobor_zrodla_ciepla['id']);
        $cena = product_price_from_db($db, $dobor_zrodla_ciepla['id']);
        $dobor_zrodla_ciepla['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
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
            }
        }
        if ($ilosc_grzejnikow_zw != 0) {
            $smarty->assign("grzejniki_zwykle", array($dobor_grzejnika_zw['id'], $dobor_grzejnika_zw['name'], $dobor_grzejnika_zw['cena'], $ilosc_grzejnikow_zw));
        }
        if ($ilosc_grzejnikow_laz != 0) {
            $smarty->assign("grzejniki_lazienkowe", array($dobor_grzejnika_laz['id'], $dobor_grzejnika_laz['name'], $dobor_grzejnika_laz['cena'], $ilosc_grzejnikow_laz));
        }
    }

    if ($_POST['LabelTypInstal'] == 3) { //jeśli wybrano ogrzewanie podłogowe
        $pow_calkowita = $_POST['calcWynikPowSumGrze'];
        $ilosc_rury = $pow_calkowita * 10;
        $ilość_obiegow = ceil($pow_calkowita / 10);
        $ilość_złączek = $ilość_obiegow * 2;
        $ilość_spinek = $ilosc_rury * 5;
        
        if($ilość_obiegow == 2){ //definiowanie wielkości rozdzielaczy obwodów grzejnych
            $wielkosc_rozdzielaczy = 'id 2';
        }elseif($ilość_obiegow >= 4){
            $wielkosc_rozdzielaczy = 'id 4';
        }elseif($ilość_obiegow >= 6){
            $wielkosc_rozdzielaczy = 'id 6';
        }elseif($ilość_obiegow >= 8){
            $wielkosc_rozdzielaczy = 'id 8';
        }elseif($ilość_obiegow >= 10){
            $wielkosc_rozdzielaczy = 'id 10';
        }else{
            $wielkosc_rozdzielaczy = 'id 12';
        }
        $produkty->retrieve($wielkosc_rozdzielaczy); //rozdzielacz
        $rozdzielacz['name'] = $produkty->name;
        $cena = product_price_from_db($db, $wielkosc_rozdzielaczy);
        $rozdzielacz['cena'] = $cena['cena'];
        $suma_cena += $cena['cenao'];
        $smarty->assign("rozdzielacz", array($wielkosc_rozdzielaczy, $rozdzielacz['name'], $rozdzielacz['cena']));
        
        $produkty->retrieve('idrury'); //rura
        $rura['name'] = $produkty->name;
        $cena = product_price_from_db($db, 'idrury');
        $paczki_rury = ceil($ilosc_rury / 200);
        $rura['cena'] = $cena['cenao'] * $paczki_rury;
        $suma_cena += $rura['cena'];
        $rura['cena'] = number_format($rura['cena'], 2, ',', ' ');
        $smarty->assign("rura", array('idrury', $rura['name'], $rura['cena'], $paczki_rury));
        
        $produkty->retrieve('idspinek'); //spinki
        $spinka['name'] = $produkty->name;
        $cena = product_price_from_db($db, 'idspinek');
        $paczki_spinki = ceil($ilość_spinek / 600);
        $spinka['cena'] = $cena['cenao'] * $paczki_spinki;
        $suma_cena += $spinka['cena'];
        $spinka['cena'] = number_format($spinka['cena'], 2, ',', ' ');
        $smarty->assign("spinka", array('idspinek', $spinka['name'], $spinka['cena'], $paczki_spinki));
    }

    $suma_cena = number_format($suma_cena, 2, ',', ' ');
    $smarty->assign("dobor_zrodla_ciepla", array($dobor_zrodla_ciepla['id'], $dobor_zrodla_ciepla['name'], $dobor_zrodla_ciepla['cena'], $suma_cena));
    $smarty->display('modules/EcmB2BProducts/tpls/Calculator_result_heat.tpl');
}

//function sanitize_calc_input($input) {
//    $a = filter_input(INPUT_POST, $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
//    return $a;
//}

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

switch ($_POST['job']) { //dodawanie do koszyka, switch w razie do rozubowy
    case 'addToCard':
        addToCard($_POST['id']);
        break;
}

function addToCard($id) { //dodawanie do koszyka
    global $app_list_strings, $current_user;

    if (count($_SESSION['items']) == 0)
        $_SESSION['items'] = array();
    $db = $GLOBALS['db'];
    $p = new EcmProduct();
    $array = explode(',', $id);
    $c = 0;
    $ac = new Account();
    $ac->retrieve($current_user->b2b_parent_id);
    foreach ($array as $v) {
        $p->retrieve($v);
        if ($v == '')
            continue;
        $ret = searchForId($v, $_SESSION['items']);
        if ($ret != '-1') {
            $_SESSION['items'][$ret]['quantity'] = $_SESSION['items'][$ret]['quantity'] +
                    1;
            continue;
        }

        $pr = $db->fetchByAssoc($db->query("SELECT pp.price FROM ecmprices_ecmproducts AS pp INNER JOIN ecmprices AS p ON pp.ecmprice_id=p.id WHERE pp.ecmproduct_id='$v'"));
        $price_start = $pr['price'];
        $item = array(
            "name" => $p->name,
            "ean" => $p->ean,
            'discount' => $p->discount + $ac->discount,
            "ean2" => $p->ean2,
            "ecmvat_value" => $p->vat_value,
            "ecmvat_id" => $p->vat_id,
            "ecmvat_name" => $p->vat_name,
            "unit_id" => $p->unit_id,
            "unit_name" => $app_list_strings['ecmproducts_unit_dom'][$p->unit_id],
            "product_code" => $p->code,
            "quantity" => 1,
            "price_start" => $price_start,
            "id" => $p->id,
            "position" => $c,
            "product_id" => $p->id
        );
        array_push($_SESSION['items'], $item);
        unset($item);
        $c++;
    }
    unset($id);
    unset($p);
    unset($array);

    echo count($_SESSION['items']);
    return;
}
