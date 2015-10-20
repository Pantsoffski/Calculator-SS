<link href="modules/EcmB2BProducts/css/calculator.css" rel="stylesheet" type="text/css"/>
<script src="modules/EcmB2BProducts/javascript/jquery-1.11.0.min.js"></script>

<table border="2" cellspacing="0" cellpadding="0" id="calcBtTable" align="center">
    <tr>
        <th>
            <button class="calcSwitchBt" id="calcGrzewBt" type="button">{$MOD.LBL_CALCULATOR_GRZEW_TITLE}</button>
            <button class="calcSwitchBt" id="calcWentBt" type="button">{$MOD.LBL_CALCULATOR_WENT_TITLE}</button>
        </th>
    </tr>
</table>

<form name="ecmproductsCalculator" id="ecmproductsCalculator" method="POST" action="index.php?module=EcmB2BProducts&action=Calculator" target="_blank">
    <input id="form_check" name="form_check" type="hidden"/>
    <input id="calcWynikKubSumWent" name="calcWynikKubSumWent" type="hidden"/>
    <input id="calcWynikKubSumGrze" name="calcWynikKubSumGrze" type="hidden"/>
    <input id="calcWynikPowSumGrze" name="calcWynikPowSumGrze" type="hidden"/>

    <table border="2" cellspacing="0" cellpadding="0" class="calcTable" id="calcGrzej" align="center">
        <tr>
            <th colspan="7" class="calcTh" id="calcTheme">{$MOD.LBL_CALCULATOR_GRZEW_TITLE}</th>
        </tr>
        <tr>
            <td class="calcTdH" colspan="7"><b>{$MOD.LBL_CALCULATOR_ALL_NUMBER_HEAT} <span id="calcWynikIlSumGrz"></span></b></td>
        </tr>
        <tr class="calcDaneGrz">
            <th class="calcTh">{$MOD.LBL_CALCULATOR_LP}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_ROOM_TYPE}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_LENGTH}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_WIDTH}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_HEIGHT}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_AREA}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_VOLUME}</th>
        </tr>
        <tr class="calcDaneGrz">
            <td class="calcTdH"><div class="calcLp"></div></td>
            <td class="calcTdH">
                <select name="LabelHeatRoom">
                    <option value="1" >Pokój</option>
                    <option value="2" >Korytarz</option>
                    <option value="3" >Hol</option>
                    <option value="4" >Wiatrołap</option>
                    <option value="5" >Kuchnia</option>
                    <option value="6" >WC</option>
                    <option value="7" >Pralnia</option>
                    <option value="8" >Garderoba</option>
                    <option value="9" >Łazienka</option>
                </select>
                <button class="deleteX" type="button">X</button></td>
            <td class="calcTdH"><input class="calcDl" name='LabelVentDl' type="number" value="5" step="0.1" required/></td>
            <td class="calcTdH"><input class="calcSz" name='LabelVentSz' type="number" value="5" step="0.1" required/></td>
            <td class="calcTdH"><input class="calcWy" name='LabelVentWy' type="number" value="2" step="0.1" required/></td>
            <td class="calcTdH"><div class="calcWynikPow"></div></td>
            <td class="calcTdH"><div class="calcWynikKub"></div><input name="calcWynikKub" type="hidden"/></td>
        </tr>
        <tr>
            <td></td>
            <td class="calcTd"><button class="AddNew" type="button">{$MOD.LBL_CALCULATOR_ADD_ROOM}</button></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="calcTdH" colspan="7"><b>{$MOD.LBL_CALCULATOR_ALL_ROOM_VOLUME_HEAT} <span id="calcWynikKubSumGrz"></span> m<sup>3</sup></b></b></td>
        </tr>
        <tr>
            <td class="calcTdH calcTdHdodat" colspan="7"><b>{$MOD.LBL_CALCULATOR_INSULATE}</b>
                <select id="Selectorek" name='LabelWspIzo'>
                    <option value="60">Słaba</option>
                    <option value="50">Średnia</option>
                    <option value="35">Dobra</option>
                    <option value="25">Bardzo dobra</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="calcTdH calcTdHdodat" colspan="7"><b>{$MOD.LBL_CALCULATOR_TYPE_HEAT}</b>
                <select name='LabelTypInstal'>
                    <option value="1">Tylko źródło ciepła</option>
                    <option value="2">Źródło ciepła + grzejniki</option>
                    <option value="3">Źródło ciepła + ogrzewanie podłogowe</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="calcTdH calcTdHdodat" colspan="7"><b>{$MOD.LBL_CALCULATOR_HEAT_SOURCE}</b>
                <select name='LabelTypZrCiep'>
                    <option value="1">Pompa ciepła solanka/woda</option>
                    <option value="2">Pompa ciepła powietrze/woda</option>
                    <option value="3">Kocioł gazowy</option>
                    <option value="4">Kocioł olejowy</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="7">
                <input  
                    class=    "calcBt"
                    title=     "{$MOD.LBL_CALCULATOR_BUTTON_CALCULATE}"
                    type=      "submit"
                    name=      "button"
                    onclick=   ""
                    value=     "{$MOD.LBL_CALCULATOR_BUTTON_CALCULATE}"
                    >
            </td>
        </tr>
    </table>

    <table border="2" cellspacing="0" cellpadding="0" class="calcTable" id="calcWent" align="center">
        <tr>
            <th colspan="7" class="calcTh" id="calcTheme">{$MOD.LBL_CALCULATOR_WENT_TITLE}</th>
        </tr>
        <tr>
            <td class="calcTdH" colspan="7"><b>{$MOD.LBL_CALCULATOR_ALL_NUMBER_VENT} <span id="calcWynikIlSum"></span></b></td>
        </tr>
        <tr class="calcDaneWe">
            <th class="calcTh">{$MOD.LBL_CALCULATOR_LP}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_ROOM_TYPE}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_LENGTH}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_WIDTH}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_HEIGHT}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_AREA}</th>
            <th class="calcTh">{$MOD.LBL_CALCULATOR_VOLUME}</th>
        </tr>
        <tr class="calcDaneWe">
            <td class="calcTdH"><div class="calcLp"></div></td>
            <td class="calcTdH">
                <select name="LabelVentRoom">
                    <option value="1" >Pokój</option>
                    <option value="2" >Korytarz</option>
                    <option value="3" >Hol</option>
                    <option value="4" >Wiatrołap</option>
                    <option value="5" >Kuchnia</option>
                    <option value="6" >WC</option>
                    <option value="7" >Łazienka</option>
                    <option value="8" >Garderoba</option>
                    <option value="9" >Pralnia</option>
                </select>
                <button class="deleteX" type="button">X</button></td>
            <td class="calcTdH"><input class="calcDl" name='LabelVentDl' type="number" value="5" step="0.1" required/></td>
            <td class="calcTdH"><input class="calcSz" name='LabelVentSz' type="number" value="5" step="0.1" required/></td>
            <td class="calcTdH"><input class="calcWy" name='LabelVentWy' type="number" value="2" step="0.1" required/></td>
            <td class="calcTdH"><div class="calcWynikPow"></div></td>
            <td class="calcTdH"><div class="calcWynikKub"></div><input name="calcWynikKub" type="hidden"/></td>
        </tr>
        <tr>
            <td></td>
            <td class="calcTd"><button class="AddNew" type="button">{$MOD.LBL_CALCULATOR_ADD_ROOM}</button></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="calcTdH" colspan="7"><b>{$MOD.LBL_CALCULATOR_ALL_ROOM_VOLUME_VENT} <span id="calcWynikKubSum"></span> m<sup>3</sup></b></td>
        </tr>
        <tr>
            <td align="center" colspan="7">
                <input
                    class=     "calcBt"
                    title=     "{$MOD.LBL_CALCULATOR_BUTTON_CALCULATE}"
                    type=      "submit"
                    name=      "button"
                    onclick=   ""
                    value=     "{$MOD.LBL_CALCULATOR_BUTTON_CALCULATE}"
                    >
            </td>
        </tr>
    </table>
</form>

<script src="modules/EcmB2BProducts/javascript/calculator.js"></script>