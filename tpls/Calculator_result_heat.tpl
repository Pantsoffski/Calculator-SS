<link href="modules/EcmB2BProducts/css/calculator.css" rel="stylesheet" type="text/css"/>
<script src="modules/EcmB2BProducts/javascript/jquery-1.11.0.min.js"></script>

<table border="2" cellspacing="0" cellpadding="0" class="calcTable" align="center">
    <tr>
        <th colspan="4" class="calcThTd" id="calcTheme">{$MOD.LBL_CALCULATOR_PRODUCTS_LIST}</th>
    </tr>
    <tr class="calcDaneWe">
        <th class="calcTh" width="5%">{$MOD.LBL_CALCULATOR_LP}</th>
        <th class="calcTh">{$MOD.LBL_CALCULATOR_PRODUCT_NAME}</th>
        <th class="calcTh" width="5%">{$MOD.LBL_CALCULATOR_PRODUCT_QUANTITY}</th>
        <th class="calcTh" width="15%">{$MOD.LBL_CALCULATOR_PRODUCT_PRICE}</th>
    </tr>
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$dobor_zrodla_ciepla[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$dobor_zrodla_ciepla[2]}</span>
        </td>
    </tr>
    {if isset($wymiennik_pionowy)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$wymiennik_pionowy[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$wymiennik_pionowy[3]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$wymiennik_pionowy[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($podgrzewacz)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$podgrzewacz[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$podgrzewacz[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($grzejniki_zwykle)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$grzejniki_zwykle[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$grzejniki_zwykle[3]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$grzejniki_zwykle[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($grzejniki_lazienkowe)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$grzejniki_lazienkowe[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$grzejniki_lazienkowe[3]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$grzejniki_lazienkowe[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($rozdzielacz)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$rozdzielacz[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$rozdzielacz[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($rura)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$rura[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$rura[3]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$rura[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($szafka)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$szafka[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$szafka[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($zlaczka)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$zlaczka[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$zlaczka[3]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$zlaczka[2]}</span>
        </td>
    </tr>
    {/if}
    {if isset($spinka)}
    <tr>
        <td class="calcTd calcPrNum">
            <div class="calcLp"></div>
        </td>
        <td class="calcTd calcPr">
            <span>{$spinka[1]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$spinka[3]}</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>{$spinka[2]}</span>
        </td>
    </tr>
    {/if}
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="calcTd calcPrCen">
            <span>{$dobor_zrodla_ciepla[3]}</span>
        </td>
    </tr>
    <tr>
        <td colspan="4" align="center">
            <input
                style=     "float: left"
                class=     "calcBt"
                title=     "{$MOD.LBL_CALCULATOR_BUTTON_BACK}"
                type=      "button"
                name=      "button"
                onclick=   "history.go(-1);
                        return true;"
                value=     "{$MOD.LBL_CALCULATOR_BUTTON_BACK}"
                >
            <input
                class=     "calcBt"
                title=     "{$MOD.LBL_CALCULATOR_BUTTON_ADD_TO_CART}"
                type=      "button"
                name=      "button"
                onclick=   "
                        id = '{$dobor_zrodla_ciepla[0]}{if isset($wymiennik_pionowy)},{$wymiennik_pionowy[0]}{/if}{if isset($podgrzewacz)},{$podgrzewacz[0]}{/if}{if isset($grzejniki_zwykle)},{$grzejniki_zwykle[0]}{/if}{if isset($grzejniki_lazienkowe)},{$grzejniki_lazienkowe[0]}{/if}{if isset($rozdzielacz)},{$rozdzielacz[0]}{/if}{if isset($rura)},{$rura[0]}{/if}{if isset($szafka)},{$szafka[0]}{/if}{if isset($zlaczka)},{$zlaczka[0]}{/if}{if isset($spinka)},{$spinka[0]}{/if}';
                        quantity = '1{if isset($wymiennik_pionowy)},{$wymiennik_pionowy[3]}{/if}{if isset($podgrzewacz)},1{/if}{if isset($grzejniki_zwykle)},{$grzejniki_zwykle[3]}{/if}{if isset($grzejniki_lazienkowe)},{$grzejniki_lazienkowe[3]}{/if}{if isset($rozdzielacz)},1{/if}{if isset($rura)},{$rura[3]}{/if}{if isset($szafka)},1{/if}{if isset($zlaczka)},{$zlaczka[3]}{/if}{if isset($spinka)},{$spinka[3]}{/if}';
                        addProductToCard(id,quantity);
                        location.href = 'index.php?module=EcmB2BProducts&action=ShoppingCard';
                           "
                value=     "{$MOD.LBL_CALCULATOR_BUTTON_ADD_TO_CART}"
                >
        </td>
    </tr>
</table>

<script src="modules/EcmB2BProducts/javascript/calculator.js"></script>