<link href="modules/EcmB2BProducts/css/calculator.css" rel="stylesheet" type="text/css"/>
<script src="modules/EcmB2BProducts/javascript/jquery-1.11.0.min.js"></script>
<script src="modules/EcmB2BProducts/javascript/card.js"></script>

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
            <span>1.</span>
        </td>
        <td class="calcTd calcPr">
            <span>{$dobor_centrali[1]}</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>18 540,00</span>
        </td>
    </tr>
    {if isset($amenostat_naw)}
        <tr>
            <td class="calcTd calcPrNum">
                <span>2.</span>
            </td>
            <td class="calcTd calcPr">
                <span>{$amenostat_naw[0]}</span>
            </td>
            <td class="calcTd calcPrNum">
                <span>{$amenostat_naw[1]}</span>
            </td>
            <td class="calcTd calcPrCen">
                <span>541,00</span>
            </td>
        </tr>
    {/if}
    {if isset($amenostat_wyw)}
        <tr>
            <td class="calcTd calcPrNum">
                <span>
                    {if isset($amenostat_naw)}
                        3.
                    {else}
                        2.
                    {/if}
                </span>
            </td>
            <td class="calcTd calcPr">
                <span>{$amenostat_wyw[0]}</span>
            </td>
            <td class="calcTd calcPrNum">
                <span>{$amenostat_wyw[1]}</span>
            </td>
            <td class="calcTd calcPrCen">
                <span>541,00</span>
            </td>
        </tr>    
    {/if}
    <tr>
        <td class="calcTd calcPrNum">
            <span>
                {if isset($amenostat_naw) && isset($amenostat_wyw)}
                    4.
                {else}
                    3.
                {/if}
            </span>
        </td>
        <td class="calcTd calcPr">
            <span>{$dobor_centrali[2]}</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>1 248,44</span>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="calcTd calcPrCen">
            <span>20 329,44</span>
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
                onclick=   "addProductToCard('{$dobor_centrali[0]},{$dobor_centrali[3]}');
                        location.href = 'index.php?module=EcmB2BProducts&action=ShoppingCard';"
                value=     "{$MOD.LBL_CALCULATOR_BUTTON_ADD_TO_CART}"
                >
        </td>
    </tr>
</table>

<script src="modules/EcmB2BProducts/javascript/calculator.js"></script>