function doCalcGrzej() { //liczenie kalkulatora grzewczego
    $('.calcDaneGrz').each(function () {
        var total_area = $('.calcDl', this).val() * $('.calcSz', this).val();
        var total_area_s = (Math.round(total_area * 100) / 100).toFixed(1); //zaokrąglanie do 1 miejsca po przecinku
        $('.calcWynikPow', this).html(total_area_s);
        var total_volume = $('.calcDl', this).val() * $('.calcSz', this).val() * $('.calcWy', this).val();
        var total_volume_s = (Math.round(total_volume * 100) / 100).toFixed(1);
        $('.calcWynikKub', this).html(total_volume_s);
    });

    var total_volume_all = 0;
    $('.calcDaneGrz .calcWynikKub').each(function () {
        total_volume_all = parseInt($(this).html()) + total_volume_all;
        $('#calcWynikKubSumGrz').html(total_volume_all);
        $('#calcWynikKubSumGrze').val(total_volume_all);
    });
    
    var total_area_all = 0;
    $('.calcDaneGrz .calcWynikPow').each(function () {
        total_area_all = parseInt($(this).html()) + total_area_all;
        $('#calcWynikPowSumGrze').val(total_area_all);
    });

    var rooms_number = $('.calcDaneGrz').length - 1;
    $('#calcWynikIlSumGrz').html(rooms_number);

    $('.calcDaneGrz').each(function (index) {
        $("input[name='calcWynikKub']", this).attr('value', $('.calcWynikKub').html());
        $("input[name='calcWynikKub']", this).attr('name', 'calcWynikKub' + "[" + index + "]");
    });
}
$('table#calcGrzej').click(doCalcGrzej);

function doCalcWent() { //liczenie kalkulatora wentylacji
    $('.calcDaneWe').each(function () {
        var total_area = $('.calcDl', this).val() * $('.calcSz', this).val();
        var total_area_s = (Math.round(total_area * 100) / 100).toFixed(1); //zaokrąglanie do 1 miejsca po przecinku
        $('.calcWynikPow', this).html(total_area_s);
        var total_volume = $('.calcDl', this).val() * $('.calcSz', this).val() * $('.calcWy', this).val();
        var total_volume_s = (Math.round(total_volume * 100) / 100).toFixed(1);
        $('.calcWynikKub', this).html(total_volume_s);
    });

    var total_volume_all = 0;
    $('.calcDaneWe .calcWynikKub').each(function () { // kubatura całkowita
        total_volume_all = parseInt($(this).html()) + total_volume_all;
        $('#calcWynikKubSum').html(total_volume_all);
        $('#calcWynikKubSumWent').val(total_volume_all);
    });

    var rooms_number = $('.calcDaneWe').length - 1; // liczba pokoi
    $('#calcWynikIlSum').html(rooms_number);

    $('.calcDaneWe').each(function (index) {
        $("input[name='calcWynikKub']", this).attr('value', $('.calcWynikKub').html());
        $("input[name='calcWynikKub']", this).attr('name', 'calcWynikKub' + "[" + index + "]");
    });
}
$('table#calcWent').click(doCalcWent);

function showWent() { //pokaż kalkulator wentylacji
    $('table#calcGrzej').hide();
    $('table#calcWent').show();
    $('#form_check').val('0');
}

function showGrzew() { //pokaż kalkulator grzewczy
    $('table#calcGrzej').show();
    $('table#calcWent').hide();
    $('#form_check').val('1');
}
$('button#calcGrzewBt').click(showGrzew);
$('button#calcWentBt').click(showWent);

function addRow() { //dodawanie kolejnych wierszy
    if ($('#form_check').val() === '0') {
        $('tr.calcDaneWe:last').after('<tr class="calcDaneWe">' +
                '<td class="calcTdH"><div class="calcLp"></div></td>' +
                '<td class="calcTdH">' +
                '<select name="LabelVentRoom">' +
                '<option value="1" >Pokój</option>' +
                '<option value="2" >Korytarz</option>' +
                '<option value="3" >Hol</option>' +
                '<option value="4" >Wiatrołap</option>' +
                '<option value="5" >Kuchnia</option>' +
                '<option value="6" >WC</option>' +
                '<option value="7" >Łazienka</option>' +
                '<option value="8" >Garderoba</option>' +
                '<option value="9" >Pralnia</option>' +
                '</select>' +
                '<button class="deleteX" type="button">X</button></td>' +
                '<td class="calcTdH"><input class="calcDl" name="LabelVentDl" type="number" value="5" step="0.1" required/></td>' +
                '<td class="calcTdH"><input class="calcSz" name="LabelVentSz" type="number" value="5" step="0.1" required/></td>' +
                '<td class="calcTdH"><input class="calcWy" name="LabelVentWy" type="number" value="5" step="0.1" required/></td>' +
                '<td class="calcTdH"><div class="calcWynikPow"></div></td>' +
                '<td class="calcTdH"><div class="calcWynikKub"></div><input name="calcWynikKub" type="hidden"/></td>' +
                '</tr>');
    }

    if ($('#form_check').val() === '1') {
        $('tr.calcDaneGrz:last').after('<tr class="calcDaneGrz">' +
                '<td class="calcTdH"><div class="calcLp"></div></td>' +
                '<td class="calcTdH">' +
                '<select name="LabelHeatRoom">' +
                '<option value="1" >Pokój</option>' +
                '<option value="2" >Korytarz</option>' +
                '<option value="3" >Hol</option>' +
                '<option value="4" >Wiatrołap</option>' +
                '<option value="5" >Kuchnia</option>' +
                '<option value="6" >WC</option>' +
                '<option value="7" >Pralnia</option>' +
                '<option value="8" >Garderoba</option>' +
                '<option value="9" >Łazienka</option>' +
                '</select>' +
                '<button class="deleteX" type="button">X</button></td>' +
                '<td class="calcTdH"><input class="calcDl" name="LabelHeatDl" type="number" value="5" step="0.1" required/></td>' +
                '<td class="calcTdH"><input class="calcSz" name="LabelHeatSz" type="number" value="5" step="0.1" required/></td>' +
                '<td class="calcTdH"><input class="calcWy" name="LabelHeatWy" type="number" value="5" step="0.1" required/></td>' +
                '<td class="calcTdH"><div class="calcWynikPow"></div></td>' +
                '<td class="calcTdH"><div class="calcWynikKub"></div><input name="calcWynikKub" type="hidden"/></td>' +
                '</tr>');
    }

    $('button.deleteX').click(deleteRow);
}
$('button.AddNew').click(addRow);

function deleteRow() { //kasowanie wierszy
    if ($('#form_check').val() === '0') {
        $(this).closest('tr.calcDaneWe').remove();
    }
    if ($('#form_check').val() === '1') {
        $(this).closest('tr.calcDaneGrz').remove();
    }
}
$('button.deleteX').click(deleteRow);

function rowCount() { //liczba porządkowa oraz id name
    if ($('#form_check').val() === '1') {
        $('.calcDaneGrz').each(function (index) { //dla grzewczego
            $('.calcLp', this).html(index + '.');
            $('.calcTdH select', this).attr('name', 'LabelHeatRoom' + "[" + index + "]");

            var kubatura_kom = parseInt($('.calcWynikKub', this).html()); //kubatura z poszczególnych pomieszczeń
            $("[name^='calcWynikKub']", this).attr('name', 'calcWynikKub' + "[" + index + "]");
            $("[name^='calcWynikKub[']", this).attr('value', kubatura_kom);
        });
    }
    if ($('#form_check').val() === '0') { //dla wentylacyjnego
        $('.calcDaneWe').each(function (index) {
            $('.calcLp', this).html(index + '.');
            $('.calcTdH select', this).attr('name', 'LabelVentRoom' + "[" + index + "]");

            var kubatura_kom = parseInt($('.calcWynikKub', this).html()); //kubatura z poszczególnych pomieszczeń
            $("[name^='calcWynikKub']", this).attr('name', 'calcWynikKub' + "[" + index + "]");
            $("[name^='calcWynikKub[']", this).attr('value', kubatura_kom);
        });
    }
}
$('button#calcGrzewBt').click(rowCount);
$('button#calcWentBt').click(rowCount);
$('table#calcWent').click(rowCount);
$('table#calcGrzej').click(rowCount);

if ($('.calcPr').length) { //wywala przyciski przełączania kalkulatora jeśli widoczny jest wynik
    $('.calcSwitchBt').hide();

    $('tr > td.calcTd.calcPrNum:first-child').each(function (index) { //dodaje liczbę porządkową do wyników
        $('.calcLp', this).html(index + 1 + '.');
    });
}