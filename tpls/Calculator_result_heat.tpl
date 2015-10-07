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
            <span>Piec węglowy 16 kW</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>7 249,00</span>
        </td>
    </tr>
    <tr>
        <td class="calcTd calcPrNum">
            <span>2.</span>
        </td>
        <td class="calcTd calcPr">
            <span>Grzejnik</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>2</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>541,88</span>
        </td>
    </tr>
    <tr>
        <td class="calcTd calcPrNum">
            <span>3.</span>
        </td>
        <td class="calcTd calcPr">
            <span>Zestaw montażowy</span>
        </td>
        <td class="calcTd calcPrNum">
            <span>1</span>
        </td>
        <td class="calcTd calcPrCen">
            <span>1 248,00</span>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="calcTd calcPrCen">
            <span>9 038,88</span>
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
                onclick=   "addProductToCard('');
                        location.href = 'index.php?module=EcmB2BProducts&action=ShoppingCard';"
                value=     "{$MOD.LBL_CALCULATOR_BUTTON_ADD_TO_CART}"
                >
        </td>
    </tr>
</table>

<script src="modules/EcmB2BProducts/javascript/calculator.js"></script>