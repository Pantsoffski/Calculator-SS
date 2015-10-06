<?php

global $mod_strings;

$db = $GLOBALS['db'];

$smarty = new Sugar_Smarty();
$produkty = new EcmB2BProduct();
$smarty->assign("MOD", $mod_strings);

if (!isset($_POST['Label1']) || !isset($_POST['LabelVent1'])) { //pokazywanie strony kalkulatora
    $smarty->display('modules/EcmB2BProducts/tpls/Calculator.tpl');
}

if (isset($_POST['Label1']) && $_POST['form_check'] == 1) { //wybór strony kalkulatora - ogrzewania lub wentylacji
    display_calc_results_heat($smarty, $produkty, $db);
} elseif (isset($_POST['LabelVentRoom']) && $_POST['form_check'] == 0) {
    display_calc_results_vent($smarty, $produkty, $db);
}

function display_calc_results_vent($smarty, $produkty, $db) {
    $kubatura = $_POST['calcWynikKubSumWent'];
    $min_wydajnosc_centr = $kubatura * 0.7;
    $centrala_dobor = product_data_from_db_by_efficiency($db, $min_wydajnosc_centr); //pozyskiwanie danych wymaganej centrali

    if ($kubatura <= 500) { //dopasowywanie zestawu montazowego
        $produkty->retrieve('49ae087c-56bb-e6a9-9f11-560d07b2b8ea');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = '49ae087c-56bb-e6a9-9f11-560d07b2b8ea';
    } elseif ($kubatura <= 700) {
        $produkty->retrieve('75f00037-2273-3c18-acf3-560d07b38107');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = '75f00037-2273-3c18-acf3-560d07b38107';
    } elseif ($kubatura > 700) {
        $produkty->retrieve('a24706a4-68b7-a980-ef1c-560d07cb6639');
        $zestaw_mon['name'] = $produkty->name;
        $zestaw_mon['id'] = 'a24706a4-68b7-a980-ef1c-560d07cb6639';
    }

    $ameno_nawiewny = 0;
    $ameno_wywiewny = 0;
    foreach ($_POST['LabelVentRoom'] as $value) { //dobór anemostatu (zaworu wentylacyjnego)
        if ($value <= 3) {
            $ameno_nawiewny++;
        } elseif ($value > 3 && $value <= 9) {
            $ameno_wywiewny++;
        }
    }
    foreach ($_POST['calcWynikKub'] as $value) { //dodatkowy amenostat dla pomioeszczeń pow 90m3
        echo $value.' ';
        if ($value > 90) {
            if ($ameno_nawiewny != 0) {
                $ameno_nawiewny++;
            }
            if ($ameno_wywiewny != 0) {
                $ameno_wywiewny++;
            }
        }
    }
    if ($ameno_nawiewny != 0) {
        $produkty->retrieve('edbd6063-98f9-686d-f7ea-560d07e391ad');
        $ameno_naw['name'] = $produkty->name;
        $smarty->assign("amenostat_naw", array($ameno_naw['name'], $ameno_nawiewny));
    }
    if ($ameno_wywiewny != 0) {
        $produkty->retrieve('f0773ad8-7711-fdda-3900-560d07f85903');
        $ameno_wyw['name'] = $produkty->name;
        $smarty->assign("amenostat_wyw", array($ameno_wyw['name'], $ameno_wywiewny));
    }

    $smarty->assign("dobor_centrali", array($centrala_dobor['id'], $centrala_dobor['name'], $zestaw_mon['name'], $zestaw_mon['id']));
    $smarty->display('modules/EcmB2BProducts/tpls/Calculator_result_vent.tpl');
}

function display_calc_results_heat($smarty, $produkty, $db) {
//    $width = sanitize_calc_input("Label1");
//    $length = sanitize_calc_input("Label2");
//    $area = $width * $length;
//    $height = sanitize_calc_input("Label3");
//    $temp = sanitize_calc_input("Label4") + 5;
//    $insulate = sanitize_calc_input("Label5");
//    $total_volume = $width * $length * $height;
//    $total_power_kw = $total_volume * $temp * $insulate / 860;
//    $a = product_data_from_db($db, 128);
//    $b = product_data_from_db($db, 165);
//    $id_do_zamowien = "128,165";
//    $smarty->assign("robocizna", array($a['name'], $b['name']));
//    if ($_POST['Label6'] == 1) {
//        $produkty->retrieve('81');
//        $a = $produkty->name;
//        $smarty->assign("produkty", array($a));
//        $id_do_zamowien .= ",81";
//    } elseif ($_POST['Label6'] == 2) {
//        $produkty->retrieve('93');
//        $a = $produkty->name;
//        $smarty->assign("produkty", array($a));
//        $id_do_zamowien .= ",93";
//    } else {
//        $produkty->retrieve('93');
//        $a = $produkty->name;
//        $a = $produkty->ekmp_description;
//        $produkty->retrieve('81');
//        $b = $produkty->name;
//        $a = $produkty->ekmp_description;
//        $smarty->assign("produkty", array($a, $b));
//        $id_do_zamowien .= ",93,81";
//    }
//    if ($_POST['Label8'] == 1) {
//        $smarty->assign("rodzaj_pieca", "Piec węglowy");
//    } elseif ($_POST['Label8'] == 2) {
//        $smarty->assign("rodzaj_pieca", "Piec gazowy");
//    } elseif ($_POST['Label8'] == 3) {
//        $smarty->assign("rodzaj_pieca", "Piec olejowy");
//    } else {
//        $smarty->assign("rodzaj_pieca", "Instalacja elektryczna");
//    }
//    $smarty->assign("ids", $id_do_zamowien);
    $smarty->display('modules/EcmB2BProducts/tpls/Calculator_result_heat.tpl');
}

//function sanitize_calc_input($input) {
//    $a = filter_input(INPUT_POST, $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
//    return $a;
//}

function product_data_from_db_by_efficiency($db, $efficiency_need) {
    $efficiency_need_max = $efficiency_need + 500;
    $result = $db->query("select id,name,efficiency from ecmproducts where efficiency between $efficiency_need AND $efficiency_need_max order by efficiency desc");
    while (($row = $db->fetchByAssoc($result)) != null) {
        $n['id'] = $row['id'];
        $n['name'] = $row['name'];
    }
    return $n;
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
