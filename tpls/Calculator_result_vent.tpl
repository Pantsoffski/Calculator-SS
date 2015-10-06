<link href="modules/EcmB2BProducts/css/calculator.css" rel="stylesheet" type="text/css"/>
<script src="modules/EcmB2BProducts/javascript/jquery-1.11.0.min.js"></script>
<script src="modules/EcmB2BProducts/javascript/card.js"></script>

<table border="2" cellspacing="0" cellpadding="0" class="calcTable" align="center">
    <tr>
        <th colspan="4" class="calcThTd" id="calcTheme">{$MOD.LBL_CALCULATOR_PRODUCTS_LIST}</th>
    </tr>
    <tr class="calcDaneWe">
        <th class="calcTh">{$MOD.LBL_CALCULATOR_LP}</th>
        <th class="calcTh">{$MOD.LBL_CALCULATOR_PRODUCT_NAME}</th>
        <th class="calcTh">{$MOD.LBL_CALCULATOR_PRODUCT_QUANTITY}</th>
        <th class="calcTh" width="15%">{$MOD.LBL_CALCULATOR_PRODUCT_QUANTITY}</th>
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
            <span>5</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>18540</span>
        </td>
    </tr>
    {if isset($amenostat_naw)}
    <tr>
        <td class="calcTd calcPrNum">
            <span>2.</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>{$amenostat_naw[1]}</span>
        </td>
        <td class="calcTd calcPr">
            <span>{$amenostat_naw[0]}</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>n.d.</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>541</span>
        </td>
    </tr>
    {/if}
    {if isset($amenostat_wyw)}
    <tr>
        <td class="calcTd calcPrNum">
            <span>2.</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>{$amenostat_wyw[1]}</span>
        </td>
        <td class="calcTd calcPr">
            <span>{$amenostat_wyw[0]}</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>n.d.</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>541</span>
        </td>
    </tr>    
    {/if}
    <tr>
        <td class="calcTd calcPrNum">
            <span>3.</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>1</span>
        </td>
        <td class="calcTd calcPr">
            <span>{$dobor_centrali[3]}</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>n.d.</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>1248</span>
        </td>
    </tr>
    <tr>
        <td class="calcTd calcPrNum">
            <span>1</span>
        </td>
        <td class="calcTd calcPr">
            <span>Robocizna</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>n.d.</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>987</span>
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center">
            <input     
                class=     "calcBt"
                title=     "{$MOD.LBL_CALCULATOR_BUTTON_ADD_TO_CART}"
                type=      "button"
                name=      "button"
                onclick=   "addProductToCard('{$dobor_centrali[0]},{$dobor_centrali[4]}');
                        location.href = 'index.php?module=EcmB2BProducts&action=ShoppingCard';"
                value=     "{$MOD.LBL_CALCULATOR_BUTTON_ADD_TO_CART}"
                >

            <input     
                class=     "calcBt"
                title=     "{$MOD.LBL_CALCULATOR_BUTTON_KONTAKT}"
                type=      "button"
                name=      "button"
                onclick=   ""
                value=     "{$MOD.LBL_CALCULATOR_BUTTON_KONTAKT}"
                >
        </td>
    </tr>
</table>

<script src="modules/EcmB2BProducts/javascript/calculator.js"></script>