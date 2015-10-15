<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
/* * ***************************************************************************
 * The contents of this file are subject to the RECIPROCAL PUBLIC LICENSE
 * Version 1.1 ("License"); You may not use this file except in compliance
 * with the License. You may obtain a copy of the License at
 * http://opensource.org/licenses/rpl.php. Software distributed under the
 * License is distributed on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND,
 * either express or implied.
 *
 * You may:
 * a) Use and distribute this code exactly as you received without payment or
 *    a royalty or other fee.
 * b) Create extensions for this code, provided that you make the extensions
 *    publicly available and document your modifications clearly.
 * c) Charge for a fee for warranty or support or for accepting liability
 *    obligations for your customers.
 *
 * You may NOT:
 * a) Charge for the use of the original code or extensions, including in
 *    electronic distribution models, such as ASP (Application Service
 *    Provider).
 * b) Charge for the original source code or your extensions other than a
 *    nominal fee to cover distribution costs where such distribution
 *    involves PHYSICAL media.
 * c) Modify or delete any pre-existing copyright notices, change notices,
 *    or License text in the Licensed Software
 * d) Assert any patent claims against the Licensor or Contributors, or
 *    which would in any way restrict the ability of any third party to use the
 *    Licensed Software.
 *
 * You must:
 * a) Document any modifications you make to this code including the nature of
 *    the change, the authors of the change, and the date of the change.
 * b) Make the source code for any extensions you deploy available via an
 *    Electronic Distribution Mechanism such as FTP or HTTP download.
 * c) Notify the licensor of the availability of source code to your extensions
 *    and include instructions on how to acquire the source code and updates.
 * d) Grant Licensor a world-wide, non-exclusive, royalty-free license to use,
 *    reproduce, perform, modify, sublicense, and distribute your extensions.
 *
 * The Original Code is: CommuniCore
 *                       Olavo Farias
 *                       2006-04-7 olavo.farias@gmail.com
 *
 * The Initial Developer of the Original Code is CommuniCore.
 * Portions created by CommuniCore are Copyright (C) 2005 CommuniCore Ltda
 * All Rights Reserved.
 * ****************************************************************************** */

$mod_strings = array(
//'LBL_SHOPPING_CARD_TITLE' => 'Koszyk',
    'LBL_PRODUCT_CARD' => 'Karta Produktu',
    'LBL_PRODUCTION' => 'Produkcja',
    'LBL_SRP_PRICE_EUR' => 'Cena SRP EUR',
    'LBL_LEAD_TIME' => 'Czas Realizacji',
    'LBL_ADD_TO_CASH' => 'Dodaj do koszyka',
    "LBL_PRODUCT_RAPORT" => 'Struktura produktów',
    'LBL_PRICE' => 'Cena',
    'LBL_PANEL_CATEGORIES' => 'Kategorie',
    'LBL_EAN_EXISTS' => 'Kod istnieje, wygenerować nowy?',
//add mz 2012-03-29
    'LBL_BOXES_PER_LAYER' => 'Ilośc kartonów w warstwie',
    'LBL_NUMBER_OF_LAYERS' => 'Ilośc warstw',
    'LBL_BOXES_PER_PALETTE' => 'Ilośc kartonów na palecie',
    'LBL_PIECES_PER_PALETTE' => 'Ilośc sztuk na palecie',
    'LBL_PALETTE_WEIGHT_BRUTTO' => 'Waga brutto palety',
    'LBL_MAGAZINE' => 'Stan',
//emd mz
//added 27.11.2009
    'LBL_LIST_PIECES_PER_CARTON' => 'Ppc',
    'LBL_LIST_CBM' => 'CBM mag',
    'LBL_LIST_CBM_ORDERED' => 'CBM zam',
    'LBL_LIST_QTY_3M' => 'Ilość 3 m',
    'LBL_LIST_QTY_THIS_M' => 'Ilość w tym m',
    'LBL_LIST_AVG_PRICE_3' => 'Średnia cena 3 m',
    'LBL_LIST_AVG_PRICE_THIS' => 'Średnia cena ten m',
    'LBL_LIST_SALE_3_M' => 'Sprzedaż 3 m',
    'LBL_PKWIU' => 'PKWiU',
    'LBL_KS_GROUP' => 'Grupa KS',
//added 27.11.2009
    'LBL_PANEL_PRICES' => 'Ceny',
    'LBL_PRICE_NAME' => 'Cena',
    'LBL_REPLACE' => 'Zamienniki',
    'LBL_PRICE_VALUE' => 'Kwota',
    'LBL_STOCK_NAME' => 'Magazyn',
    'LBL_LIST_ORDERED' => 'Zamówione',
    'LBL_LIST_STOCK_MONTH' => 'Magazyn m',
    'LBL_LIST_INVENTORY' => 'Mag',
//added 20.07.2009
    'LBL_ECMSTOCKDOCMOVES_SUBPANEL_TITLE' => 'Dokumenty MM',
    'LBL_ECMSTOCKDOCINSIDEINS_SUBPANEL_TITLE' => 'Dokumenty PW',
    'LBL_ECMSTOCKDOCINSIDEOUTS_SUBPANEL_TITLE' => 'Dokumenty RW',
    'LBL_ASSIGNED_TO_ID' => 'Opiekun produktu',
    'LBL_STOCK_ID' => 'Magazyn',
//added 15.07.2009
    'LBL_ORDERED' => 'Zamówione',
    'LBL_UNIT_ID' => 'Jednostka miary',
    'LBL_UNIT_NAME' => 'Jednostka miary',
//added 27.04.2009
    'LBL_STOCK_NAME' => 'Magazyn',
//added 02.04.2009
    'LBL_II_STOCK' => 'Magazyn',
    'LBL_II_QTY' => 'Ilosc',
    'LBL_II_PRICE' => 'Sredia Cena',
    'LBL_DISCOUNT' => 'Rabat (%)',
    'LBL_LIST_INVENTORY' => 'Magazyn',
    'LBL_INVENTORY_INFORMATION' => 'Informacje o Magazynie',
//added 03.02.2009
    'LBL_VAT_NAME' => 'Vat',
//added 20.01.2009
    'LBL_DEFAULT_REMARKS_PL' => 'Domyslne uwagi pl',
    'LBL_DEFAULT_REMARKS_EN' => 'Domyslne uwagi en',
    'LBL_DEFAULT_REMARKS_DE' => 'Domyslne uwagi de',
//added 13.01.2009
    'LBL_EAN_PL' => 'EAN pl',
    'LBL_SHORT_DESCRIPTION_PL' => 'Krótki opis pl',
    'LBL_LONG_DESCRIPTION_PL' => 'Dlugi opis pl',
    'LBL_REMARKS_PL' => 'Uwagi pl',
    'LBL_AVAIBLE_IN_WEEK' => 'Dostępność w tygodniach',
    'LBL_MIN_QTY_IN_STOCK' => 'Stan minimalny',
    'LBL_EAN_EN' => 'EAN en',
    'LBL_SHORT_DESCRIPTION_EN' => 'Krótki opis en',
    'LBL_LONG_DESCRIPTION_EN' => 'Dlugi opis en',
    'LBL_REMARKS_EN' => 'Uwagi en',
    'LBL_EAN_DE' => 'EAN de',
    'LBL_SHORT_DESCRIPTION_DE' => 'Krótki opis de',
    'LBL_LONG_DESCRIPTION_DE' => 'Dlugi opis de',
    'LBL_REMARKS_DE' => 'Uwagi de',
//added 12.01.2009
    'LBL_RECIPIENT_CODE' => 'Kod Odbiorcy',
// added 17.12.2008
    'LBL_MARGIN' => 'Marza',
    'LBL_PRODUCT_NAME' => 'Nazwa Produktu',
    'LBL_LIST_PRICE' => 'Cena',
// added 02.12.2008
    'LBL_EMS_ORDERED' => 'Zamówien',
    'LBL_NOTES_SUBPANEL_TITLE' => 'Notatki',
// added 25.11.2008
    'LBL_END_DATE' => 'Data Koncowa',
    'LBL_START_DATE' => 'Data Poczatkowa',
    'LBL_QTYUNIT' => 'Ilosc/Sztuk',
    'LBL_COMMISSION_RATE' => 'Prowizja',
    'LBL_CODE' => 'Kod',
    'LBL_MANUFACTURER' => 'Wytwórca',
    'LBL_PRODUCT_VATEGORY' => 'Kategoria',
    'LBL_UNIT_PRICE' => 'Cena Zakupu',
    'LBL_LIST_CODE' => 'Kod',
    'LBL_DELETE' => 'Usuń',
    'LBL_LIST_COMMISSION_RATE' => 'Prowizja',
    'LBL_LIST_QTY_PER_UNIT' => 'Ilosc w Szt.',
    'LBL_LIST_UNIT_PRICE' => 'Cena Zakupu',
    'LBL_UPLOADED' => '[zaladowane]',
    'LBL_QTY_IN_STOCK' => 'Ilosc w Magazynie',
    'LBL_QTY_IN_DEMAND' => 'Potrzebna ilosc',
    'LBL_REORDER_LEVEL' => 'Poziom zamówienia',
    'LBL_VAT' => 'Vat',
    'LBL_SELLING_PRICE' => 'Cena Sprzedazy',
    'LBL_LOCAL_EAN' => 'Kod EAN',
    'LBL_REMARKS' => 'Uwagi',
    'LBL_SHORT_DESCRIPTION' => 'Krótki Opis',
    'LBL_LONG_DESCRIPTION' => 'Dlugi Opis',
    'LBL_LOCALIZED_INFORMATION' => 'Informacje w Jezykach',
    'LBL_LOGISTIC_INFORMATION' => 'Informacje Logistyczne',
    'LBL_DRIVERS_IMAGES' => 'Sterowniki i Grafika',
    'LBL_STOCK_INFORMATION' => 'Informacje Magazynowe',
    'LBL_PRICING_INFORMATION' => 'Informacje o Cenie',
    'LBL_PRODUCT_INFORMATION' => 'Informacje o Produkcie',
// Added
    'LBL_ECMSTOCKDOCINS_SUBPANEL_TITLE' => 'Dokumenty PZ',
    'LBL_ECMSTOCKDOCOUTS_SUBPANEL_TITLE' => 'Dokumenty WZ',
    'LBL_ECMDELIVERYNOTES_SUBPANEL_TITLE' => 'Dokumenty Przewozowe',
    'LBL_ECMSALES_SUBPANEL_TITLE' => 'Zamówienia Sprzedazy',
    'LBL_ECMPURCHASEORDERS_SUBPANEL_TITLE' => 'Zamówienia Kupna',
    'LBL_QTY_IN_STOCK' => 'Ilosc na Magazynie',
    'LBL_QTY_IN_DEMAND' => 'Potrzebna Ilosc',
    'LBL_REORDER_LEVEL' => 'Poziom Zamówienia',
    'LBL_ECMSTOCKINS_SUBPANEL_TITLE' => 'Stock In',
    'LBL_ECMSTOCKOUTS_SUBPANEL_TITLE' => 'Stock Out',
    'LBL_ECMINVOICEOUTS_SUBPANEL_TITLE' => 'Faktury',
    'LBL_ECMQUOTES_SUBPANEL_TITLE' => 'Oferty',
// FOR SYSTEM USE
    'LBL_MODULE_NAME' => 'Produkty',
    'LBL_MODULE_TITLE' => 'Produkty: Strona Glówna',
    'LBL_MODULE_ID' => 'Produkty',
    'LBL_SEARCH_FORM_TITLE' => 'Wyszukiwanie',
    'LBL_LIST_FORM_TITLE' => 'Lista Produktów',
    'LBL_NEW_FORM_TITLE' => 'Nowy Produkt',
    'LBL_ECMB2BPRODUCTS' => 'Produkty:',
    'LBL_ECMB2BPRODUCTS_SUBJECT' => 'Tytul Produktu:',
    'LBL_SYSTEM_ID' => 'System ID',
// FOR LIST VIEW 
    'LBL_LIST_NAME' => 'Nazwa Produktu',
    'LBL_LIST_SUBJECT' => 'Tytul',
    'LBL_LIST_LAST_MODIFIED' => 'Ostatnio Modyfikowane',
    'LBL_LIST_MY_ECMB2BPRODUCTS' => 'Moje Przypisane Produkty',
    'LBL_LIST_ASSIGNED_TO_NAME' => 'Przypisany Uzytkownik',
    'LBL_LIST_PRODUCT_INDEX' => 'Index Produktu',
    'LBL_LIST_PRODUCT_CATEGORY_ID' => 'Kategoria',
    'LBL_LIST_PRODUCT_CATEGORY' => 'Kategoria',
    'LBL_LIST_PRODUCT_LINE_ID' => 'Linia Produktowa',
    'LBL_LIST_PRODUCT_LINE' => 'Linia Produktowa',
    'LBL_LIST_MANUFACTURER_ID' => 'Wytwórca',
    'LBL_LIST_MANUFACTURER' => 'Wytwórca',
    'LBL_LIST_CONTACT_ID' => 'Kontakt',
    'LBL_LIST_CONTACT_NAME' => 'Kontakt',
    'LBL_LIST_VENDOR_ID' => 'Dostawca',
    'LBL_LIST_VENDOR_NAME' => 'Dostawca',
    'LBL_LIST_VENDOR_PART_NO' => 'Numer Czesci Dostawcy',
    'LBL_LIST_PRODUCT_ACTIVE' => 'Aktywny',
    'LBL_LIST_SALES_START_DATE' => 'Data Rozpoczecia Sprzedazy',
    'LBL_LIST_SALES_END_DATE' => 'Data Zakonczenia Sprzedazy',
    'LBL_LIST_PARENT_TYPE' => 'Typ Przypisanie',
    'LBL_LIST_PARENT_ID' => 'Przypisane Do',
    'LBL_LIST_PARENT_NAME' => 'Przypisane Do',
    'LBL_LIST_WEBSITE' => 'Strona Internetowa',
    'LBL_LIST_PART_NO' => 'Numer czesci',
    'LBL_LIST_SERIAL_NO' => 'Numer',
    'LBL_LIST_EXCHANGE_RATE_ID' => 'Waluta',
    'LBL_LIST_EXCHANGE_RATE_NAME' => 'Waluta',
    'LBL_LIST_FOB_PRICE' => 'Cena FOB',
    'LBL_LIST_UNIT_PRICE' => 'Cena Zakupu',
    'LBL_LIST_EMS_PRICE' => 'Średnia cena zakupu',
    'LBL_LIST_COMMISSION_RATE' => 'Prowizja',
    'LBL_LIST_CUSTOM_DUTY_RATE' => 'Poziom Cla',
    'LBL_LIST_SRP_PRICE' => 'Cena SRP',
    'LBL_LIST_SRP_PROMO_PRICE' => 'Cena SRP Promo',
    'LBL_LIST_TAX_CLASS_ID' => 'Vat',
    'LBL_LIST_TAX_CLASS_NAME' => 'Vat',
    'LBL_LIST_USAGE_UNIT_ID' => 'Opakowanie',
    'LBL_LIST_USAGE_UNIT_NAME' => 'Opakowanie',
    'LBL_LIST_QTY_IN_STOCK' => 'Ilosc na Magazynie',
    'LBL_LIST_QTY_IN_DEMAND' => 'Potrzebna Ilosc',
    'LBL_LIST_EMS_QTY_IN_STOCK' => 'Ilosc na Magazynie EMS',
    'LBL_LIST_REORDER_LEVEL' => 'Poziom Zamówienia',
    'LBL_LIST_SALES_LAST_MONTH_1' => 'Sprzedaz w Ostatnim Miesiacu -1',
    'LBL_LIST_SALES_LAST_MONTH' => 'Sprzedaz w Ostatnim Miesiacu',
    'LBL_LIST_SALES_THIS_MONTH' => 'Sprzedaz w Tym Miesiacu',
    'LBL_LIST_QTY_PER_UNIT' => 'Ilosc na Szt.',
    'LBL_LIST_AVERAGE_SALE_3_MONTHS' => 'Srednia Sprzedaz w Ostatnich 3 Miesiacach',
    'LBL_LIST_SALES_PLUS_1' => 'Sprzedaz plus 1',
    'LBL_LIST_SALES_PLUS_2' => 'Sprzedaz plus 2',
    'LBL_LIST_SALES_PLUS_3' => 'Sprzedaz plus 3',
    'LBL_LIST_PRODUCT_PICTURE' => 'Grafika 1',
    'LBL_LIST_PACKING_FRONT_PICTURE' => 'Grafika 2',
    'LBL_LIST_DRIVER_1' => 'Plik 1',
    'LBL_LIST_DRIVER_2' => 'Plik 2',
    'LBL_LIST_MOQ' => 'MOQ',
    'LBL_LIST_FOB_BASIS_ID' => 'Baza FOB',
    'LBL_LIST_FOB_BASIS_NAME' => 'Baza FOB',
    'LBL_LIST_DELIVERY_TIME_FOB' => 'Czas Dostarczenia FOB',
    'LBL_LIST_PIECES_PER_CARTON' => 'Sztuk w Kartonie',
    'LBL_LIST_PRODUCT_NETTO_WEIGHT' => 'Waga Produktu Netto (kg)',
    'LBL_LIST_PRODUCT_BRUTTO_WEIGHT' => 'Waga Produktu Brutto (kg)',
    'LBL_LIST_PACKING_TYPE_ID' => 'Typ Opakowania',
    'LBL_LIST_PACKING_TYPE_NAME' => 'Typ Opakowania',
    'LBL_LIST_PACKING_DIMENSIONS_1' => 'Rzmiar opakowania (cm)',
    'LBL_LIST_PACKING_DIMENSIONS_2' => 'Rzmiar opakowania (cm)',
    'LBL_LIST_PACKING_DIMENSIONS_3' => 'Rzmiar opakowania (cm)',
    'LBL_LIST_RMA' => 'RMA (%)',
    'LBL_LIST_CARTON_DIMENSIONS_1' => 'Rzmiar kartonu (m)',
    'LBL_LIST_CARTON_DIMENSIONS_2' => 'Rzmiar kartonu (m)',
    'LBL_LIST_CARTON_DIMENSIONS_3' => 'Rzmiar kartonu (m)',
    'LBL_LIST_CARTON_NETTO_WEIGHT' => 'Waga Kartonu Netto',
    'LBL_LIST_CARTON_BRUTTO_WEIGHT' => 'Waga Kartonu Brutto',
    'LBL_LIST_CARTON_VOLUME_METER' => 'Objetosc Kartonu (cubic meter)',
    'LBL_LIST_CARTON_VOLUME_FEET' => 'Objetosc Kartonu (cubic feet)',
    'LBL_LIST_COUNTRY_OF_ORIGIN' => 'Panstwo Pochodzenia',
    'LBL_LIST_CERTIFICATE_OF_ORIGIN' => 'Certyfikat',
    'LBL_LIST_FORM_A' => 'Form A',
    'LBL_PRICE_CURRENCY' => 'Waluta',
// FOR NOTIFICATION POPUPS
    'NTC_DELETE_CONFIRMATION' => 'Czy na pewno chcesz usunac ten produkt?',
    'NTC_REMOVE_INVITEE' => 'Czy na pewno chcesz usunac kontakt z produktu?',
    'NTC_REMOVE_ACCOUNT_CONFIRMATION' => 'Czy na pewno chcesz usunac ten produkt z firmy?',
    'ERR_DELETE_RECORD' => 'Podaj numer rekordu aby usunac produkt.',
// FOR DEFAULT FIELDS
    'LBL_NAME' => 'Nazwa',
    'LBL_SUBJECT' => 'Nazwa:',
    'LBL_CREATED_BY' => 'Utworzone przez:',
    'LBL_CREATED' => 'Utworzone przez:',
    'LBL_ASSIGNED_TO' => 'Opiekun produktu:',
    'LBL_ASSIGNED_USER_ID' => 'Przypisane do:',
    'LBL_DATE_ENTERED' => 'Data Utworzenia:',
    'LBL_DATE_CREATED' => 'Data Utworzenia:',
    'LBL_DATE_MODIFIED' => 'Ostatnio Modyfikowane',
    'LBL_MODIFIED_BY' => 'Ostatnio Modyfikowane przez:',
    'LBL_MODIFIED' => 'Modifikowane przez:',
    'LBL_DATE_LAST_MODIFIED' => 'Data Modyfikacji:',
// FOR NEW FIELDS
    'LBL_PRODUCT_INDEX' => 'Indeks',
    'LBL_LAST_PURCHASE_PRICE' => 'Cena netto',
    'LBL_PRODUCT_CATEGORY_ID' => 'Kategoria',
    'LBL_PRODUCT_CATEGORY' => 'Kategoria',
    'LBL_PRODUCT_LINE_ID' => 'Linia Produktowa',
    'LBL_PRODUCT_LINE' => 'Linia Produktowa',
    'LBL_MANUFACTURER_ID' => 'Wytwórca',
    'LBL_MANUFACTURER' => 'Wytwórca',
    'LBL_CONTACT_ID' => 'Kontakt',
    'LBL_CONTACT_NAME' => 'Kontakt',
    'LBL_VENDOR_ID' => 'Dostawca',
    'LBL_VENDOR_NAME' => 'Dostawca',
    'LBL_VENDOR_PART_NO' => 'Numer części Vendora',
    'LBL_PRODUCT_ACTIVE' => 'Aktywny',
    'LBL_SALES_START_DATE' => 'Data Poczatku Sprzedazy',
    'LBL_SALES_END_DATE' => 'Data Zakonczenia Sprzedazy',
    'LBL_PARENT_TYPE' => 'Typ Przypisania',
    'LBL_PARENT_ID' => 'Przypisanie Do',
    'LBL_PARENT_NAME' => 'Przypisanie Do',
    'LBL_WEBSITE' => 'Strona Internetowa',
    'LBL_PART_NO' => 'Numer części',
    'LBL_SERIAL_NO' => 'Numer',
    'LBL_EXCHANGE_RATE_ID' => 'Waluta',
    'LBL_EXCHANGE_RATE_NAME' => 'Waluta',
    'LBL_FOB_PRICE' => 'Cena FOB',
    'LBL_UNIT_PRICE' => 'Cena Zakupu',
    'LBL_EMS_PRICE' => 'Średnia cena zakupu',
    'LBL_COMMISSION_RATE' => 'Prowizja',
    'LBL_CUSTOM_DUTY_RATE' => 'Poziom Cla',
    'LBL_SRP_PRICE' => 'Cena SRP',
    'LBL_SRP_PROMO_PRICE' => 'Cena SRP Promo',
    'LBL_TAX_CLASS_ID' => 'Vat',
    'LBL_TAX_CLASS_NAME' => 'Vat',
    'LBL_USAGE_UNIT_ID' => 'Opakowanie',
    'LBL_USAGE_UNIT_NAME' => 'Opakowanie',
    'LBL_EMS_QTY_IN_STOCK' => 'Ilosc na Magazynie EMS',
    'LBL_SALES_LAST_MONTH_1' => 'Sprzedaz w Ostatnim Miesiacu -1',
    'LBL_SALES_LAST_MONTH' => 'Sprzedaz w Ostatnim Miesiacu',
    'LBL_SALES_THIS_MONTH' => 'Sprzedaz w Tym Miesiacu',
    'LBL_QTY_PER_UNIT' => 'Ilosc na Szt.',
    'LBL_AVERAGE_SALE_3_MONTHS' => 'Srednia Sprzedaz w Ostatnich 3 Miesiacach',
    'LBL_SALES_PLUS_1' => 'Sprzedaz plus 1',
    'LBL_SALES_PLUS_2' => 'Sprzedaz plus 2',
    'LBL_SALES_PLUS_3' => 'Sprzedaz plus 3',
    'LBL_PRODUCT_PICTURE' => 'Grafika 1',
    'LBL_PACKING_FRONT_PICTURE' => 'Grafika 2',
    'LBL_DRIVER_1' => 'Sterownik 1',
    'LBL_DRIVER_2' => 'Sterownik 2',
    'LBL_MOQ' => 'MOQ',
    'LBL_FOB_BASIS_ID' => 'Baza FOB',
    'LBL_FOB_BASIS_NAME' => 'Baza FOB',
    'LBL_DELIVERY_TIME_FOB' => 'Czas Dostarczenia FOB',
    'LBL_PIECES_PER_CARTON' => 'Sztuk w Kartonie',
    'LBL_PRODUCT_NETTO_WEIGHT' => 'Waga Produktu Netto (kg)',
    'LBL_PRODUCT_BRUTTO_WEIGHT' => 'Waga Produktu Brutto (kg)',
    'LBL_PACKING_TYPE_ID' => 'Typ Opakowania',
    'LBL_PACKING_TYPE_NAME' => 'Typ Opakowania',
    'LBL_PACKING_DIMENSIONS_1' => 'Rozmiar Opakowania (cm)',
    'LBL_PACKING_DIMENSIONS_2' => 'Rozmiar Opakowania (cm)',
    'LBL_PACKING_DIMENSIONS_3' => 'Rozmiar Opakowania (cm)',
    'LBL_RMA' => 'RMA (%)',
    'LBL_CARTON_DIMENSIONS_1' => 'Rozmiar Kartonu (m)',
    'LBL_CARTON_DIMENSIONS_2' => 'Rozmiar Kartonu (m)',
    'LBL_CARTON_DIMENSIONS_3' => 'Rozmiar Kartonu (m)',
    'LBL_CARTON_NETTO_WEIGHT' => 'Waga Kartonu Netto',
    'LBL_CARTON_BRUTTO_WEIGHT' => 'Waga Kartonu Brutto',
    'LBL_CARTON_VOLUME_METER' => 'Objetosc Kartonu (cubic meter)',
    'LBL_CARTON_VOLUME_FEET' => 'Objetosc Kartonu (cubic feet)',
    'LBL_COUNTRY_OF_ORIGIN' => 'Kraj Pochodzenia',
    'LBL_CERTIFICATE_OF_ORIGIN' => 'Certyfikat',
    'LBL_FORM_A' => 'Form A',
// FOR GROUPS
    'LBL_GROUP_MASTER' => 'INFORMACJE O PRODUKCIE',
    'LBL_GROUP_PRODUCT_INDEX' => '',
    'LBL_GROUP_PRODUCT_CATEGORY_ID' => '',
    'LBL_GROUP_PRODUCT_CATEGORY' => '',
    'LBL_GROUP_PRODUCT_LINE_ID' => '',
    'LBL_GROUP_PRODUCT_LINE' => '',
    'LBL_GROUP_MANUFACTURER_ID' => '',
    'LBL_GROUP_MANUFACTURER' => '',
    'LBL_GROUP_CONTACT_ID' => '',
    'LBL_GROUP_CONTACT_NAME' => '',
    'LBL_GROUP_VENDOR_ID' => '',
    'LBL_GROUP_VENDOR_NAME' => '',
    'LBL_GROUP_VENDOR_PART_NO' => '',
    'LBL_GROUP_PRODUCT_ACTIVE' => '',
    'LBL_GROUP_SALES_START_DATE' => '',
    'LBL_GROUP_SALES_END_DATE' => '',
    'LBL_GROUP_PARENT_TYPE' => '',
    'LBL_GROUP_PARENT_ID' => '',
    'LBL_GROUP_PARENT_NAME' => '',
    'LBL_GROUP_WEBSITE' => '',
    'LBL_GROUP_PART_NO' => '',
    'LBL_GROUP_SERIAL_NO' => '',
    'LBL_GROUP_EXCHANGE_RATE_ID' => '',
    'LBL_GROUP_EXCHANGE_RATE_NAME' => '',
    'LBL_GROUP_FOB_PRICE' => '',
    'LBL_GROUP_UNIT_PRICE' => '',
    'LBL_GROUP_EMS_PRICE' => '',
    'LBL_GROUP_COMMISSION_RATE' => '',
    'LBL_GROUP_CUSTOM_DUTY_RATE' => '',
    'LBL_GROUP_SRP_PRICE' => '',
    'LBL_GROUP_SRP_PROMO_PRICE' => '',
    'LBL_GROUP_TAX_CLASS_ID' => '',
    'LBL_GROUP_TAX_CLASS_NAME' => '',
    'LBL_GROUP_USAGE_UNIT_ID' => '',
    'LBL_GROUP_USAGE_UNIT_NAME' => '',
    'LBL_GROUP_EMS_QTY_IN_STOCK' => '',
    'LBL_GROUP_SALES_LAST_MONTH_1' => '',
    'LBL_GROUP_SALES_LAST_MONTH' => '',
    'LBL_GROUP_SALES_THIS_MONTH' => '',
    'LBL_GROUP_QTY_PER_UNIT' => '',
    'LBL_GROUP_AVERAGE_SALE_3_MONTHS' => '',
    'LBL_GROUP_SALES_PLUS_1' => '',
    'LBL_GROUP_SALES_PLUS_2' => '',
    'LBL_GROUP_SALES_PLUS_3' => '',
    'LBL_GROUP_PRODUCT_PICTURE' => '',
    'LBL_GROUP_PACKING_FRONT_PICTURE' => '',
    'LBL_GROUP_DRIVER_1' => '',
    'LBL_GROUP_DRIVER_2' => '',
    'LBL_GROUP_MOQ' => '',
    'LBL_GROUP_FOB_BASIS_ID' => '',
    'LBL_GROUP_FOB_BASIS_NAME' => '',
    'LBL_GROUP_DELIVERY_TIME_FOB' => '',
    'LBL_GROUP_PIECES_PER_CARTON' => '',
    'LBL_GROUP_PRODUCT_NETTO_WEIGHT' => '',
    'LBL_GROUP_PRODUCT_BRUTTO_WEIGHT' => '',
    'LBL_GROUP_PACKING_TYPE_ID' => '',
    'LBL_GROUP_PACKING_TYPE_NAME' => '',
    'LBL_GROUP_PACKING_DIMENSIONS_1' => '',
    'LBL_GROUP_PACKING_DIMENSIONS_2' => '',
    'LBL_GROUP_PACKING_DIMENSIONS_3' => '',
    'LBL_GROUP_RMA' => '',
    'LBL_GROUP_CARTON_DIMENSIONS_1' => '',
    'LBL_GROUP_CARTON_DIMENSIONS_2' => '',
    'LBL_GROUP_CARTON_DIMENSIONS_3' => '',
    'LBL_GROUP_CARTON_NETTO_WEIGHT' => '',
    'LBL_GROUP_CARTON_BRUTTO_WEIGHT' => '',
    'LBL_GROUP_CARTON_VOLUME_METER' => '',
    'LBL_GROUP_CARTON_VOLUME_FEET' => '',
    'LBL_GROUP_COUNTRY_OF_ORIGIN' => '',
    'LBL_GROUP_CERTIFICATE_OF_ORIGIN' => '',
    'LBL_GROUP_FORM_A' => '',
// FOR SUBPANELS
    'LBL_ECMB2BPRODUCTS_SUBPANEL_TITLE' => 'Produkty',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktywnosci',
    'LBL_HISTORY_SUBPANEL_TITLE' => 'Historia',
    'LBL_ECMB2BPRODUCTS' => 'Produkty',
// FOR MENU LABELS 
    'LNK_NEW_ECMB2BPRODUCTS' => 'Utwórz Produkt',
    'LNK_LIST_ECMB2BPRODUCT' => 'Lista Produktów',
// FOR MENU LINKS
    'LNK_NEW_ECMB2BPRODUCT' => 'Utwórz Produkt',
    'LNK_ECMB2BPRODUCTS_LIST' => 'Produkty',
    'LNK_ECMB2BPRODUCTS_REPORTS' => 'Raport Produktów',
// FOR ADDITIONAL MENUS
// FOR DASHLETS
    'LBL_LIST_ECMB2BPRODUCTS' => 'Produkty',
    'LBL_COMPONENTS' => 'Komponenty',
    'LBL_ITEMS' => 'Komponenty',
    'LBL_EDITTABLE_NO' => 'Nr.',
    'LBL_EDITTABLE_CODE' => 'Kod',
    'LBL_EDITTABLE_NAME' => 'Nazwa',
    'LBL_EDITTABLE_UNIT' => 'Szt.',
    'LBL_EDITTABLE_QUANTITY' => 'Ilosc',
    'LBL_EDITTABLE_OPTIONS' => 'Opc.',
    'LBL_GRADUATED_PRICES' => 'Ceny wg. ilości sztuk',
    'LBL_PRODUCT_GRADUATED_COUNT' => 'Liczba',
    'LBL_PRODUCT_GRADUATED_PRICE' => 'Price',
    'LBL_PRODUCT_GRADUATED_ADD' => 'Dodaj',
    'LBL_PRODUCT_GRADUATED_REMOVE' => 'Usuń',
    'LBL_CATEGORY_NAME' => 'Nazwa kategori',
//mz 12.10.2011
    'LBL_EAN2' => 'EAN 2',
    'LBL_EAN' => 'EAN',
    'LBL_GENERATE_EAN' => 'Wygeneruj',
    'LBL_BE_TO_BE' => 'B2B',
    'LBL_BE_TO_SEE' => 'B2C',
//pp 21.09.2015
    'LBL_CALCULATOR_GRZEW_TITLE' => 'Kalkulator grzewczy',
    'LBL_CALCULATOR_WENT_TITLE' => 'Kalkulator wentylacji',
    'LBL_CALCULATOR_PRODUCTS_LIST' => 'Lista niezbędnych produktów',
    'LBL_CALCULATOR_PRODUCT_NAME' => 'Nazwa produktu',
    'LBL_CALCULATOR_PRODUCT_PRICE' => 'Wartość [zł]',
    'LBL_CALCULATOR_INSULATE' => 'Stan izolacji budynku:',
    'LBL_CALCULATOR_VOLUME' => 'Objętość ogrzewanego pomieszczenia',
    'LBL_CALCULATOR_TYPE_HEAT' => 'Rodzaj instalacji grzewczej:',
    'LBL_CALCULATOR_BUTTON_CALCULATE' => 'Przelicz',
    'LBL_CALCULATOR_BUTTON_ADD_TO_CART' => 'Dodaj do koszyka',
    'LBL_CALCULATOR_BUTTON_BACK' => 'Powrót',
    'LBL_CALCULATOR_HEAT_SOURCE' => 'Rodaj źródła ciepła:',
    'LBL_EFFICIENCY' => 'Efektywność',
    'LBL_CALCULATOR_PRODUCT_QUANTITY' => 'Ilość',
    'LBL_CALCULATOR_LP' => 'L.p.',
    'LBL_CALCULATOR_ROOM_TYPE' => 'Typ pomieszczenia',
    'LBL_CALCULATOR_LENGTH' => 'Długość [m]',
    'LBL_CALCULATOR_WIDTH' => 'Szerokość [m]',
    'LBL_CALCULATOR_HEIGHT' => 'Wysokość [m]',
    'LBL_CALCULATOR_AREA' => 'Powierzchnia [m<sup>2</sup>]',
    'LBL_CALCULATOR_VOLUME' => 'Kubatura [m<sup>3</sup>]',
    'LBL_CALCULATOR_ADD_ROOM' => 'Dodaj pomieszczenie',
    'LBL_CALCULATOR_ALL_ROOM_VOLUME_HEAT' => 'Kubatura pomieszczeń ogrzewanych:',
    'LBL_CALCULATOR_ALL_ROOM_VOLUME_VENT' => 'Kubatura pomieszczeń wentylowanych:',
    'LBL_CALCULATOR_ALL_NUMBER_HEAT' => 'Ilość pomieszczeń ogrzewanych:',
    'LBL_CALCULATOR_ALL_NUMBER_VENT' => 'Ilość pomieszczeń wentylowanych:',
//pp 15.10.2015
    'LBL_QUANTITY' => 'Ilość',
    'LBL_CALCULATOR_PRODUCT_PRICE2' => 'Cena [zł]',
);
?>