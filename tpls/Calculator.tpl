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

<form name="ecmproductsCalculator" id="ecmproductsCalculator" method="POST" action="index.php?module=EcmB2BProducts&action=Calculator">
    <input id="form_check" name="form_check" type="hidden"/>
    <input id="calcWynikKubSumWent" name="calcWynikKubSumWent" type="hidden"/>

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
                    <option value="7" >Łazienka</option>
                    <option value="8" >Garderoba</option>
                    <option value="9" >Pralnia</option>
                </select>
                <button class="deleteX" type="button">X</button></td>
            <td class="calcTdH"><input class="calcDl" name='LabelVentDl' type="number" value="5" step="0.1" required/></td>
            <td class="calcTdH"><input class="calcSz" name='LabelVentSz' type="number" value="5" step="0.1" required/></td>
            <td class="calcTdH"><input class="calcWy" name='LabelVentWy' type="number" value="5" step="0.1" required/></td>
            <td class="calcTdH"><div class="calcWynikPow"></div></td>
            <td class="calcTdH"><div class="calcWynikKub"></div></td>
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
                <select id="Selectorek" name='Label1'>
                    <option value="3.5" title="(prosty budynek z drewna lub blachy falistej)">Nieizolowany</option>
                    <option value="2.45" title="(prosta konstrukcja, pojedyncza warstwa z cegieł, proste okna i dach)">Słaba izolacja</option>
                    <option value="1.45" title="(konstrukcja standardowa, podwójna warstwa cegieł, niewiele okien, standardowo zamknięty dach)">Średnia izolacja</option>
                    <option value="0.75" title="(konstrukcja zaawansowana, podwójnie izolowana cegła, niewiele okien podwójnych, solidny fundament, dach z materiałów dobrze izolujących)">Dobra izolacja</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="calcTdH calcTdHdodat" colspan="7"><b>{$MOD.LBL_CALCULATOR_TYPE_HEAT}</b>
                <select name='Label6'>
                    <option value="1">Grzejnik ścienny</option>
                    <option value="2">Podłogowa</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="calcTdH calcTdHdodat" colspan="7"><b>{$MOD.LBL_CALCULATOR_HEAT_SOURCE}</b>
                <select name='Label7'>
                    <option value="1">Pompa ciepła</option>
                    <option value="2">Gaz</option>
                    <option value="3">Olej opałowy</option>
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
            <td class="calcTdH"><input class="calcWy" name='LabelVentWy' type="number" value="5" step="0.1" required/></td>
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