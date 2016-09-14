// {#Salva NF#}
jQuery(document).ready(function () {
    jQuery('#ajax_form').submit(function () {
        var dados = jQuery(this).serializeArray();

        var table = document.getElementById('tabelaprodutos');
        var rowLength = table.rows.length;
        var prods = [];

        for(var i=1; i<rowLength; i+=1){
            var row = table.rows[i];

            prods[i-1] = [  row.cells[0].children[0].value,
                            row.cells[1].children[0].value,
                            row.cells[2].children[0].value,
                            row.cells[3].children[0].value,
                            row.cells[4].children[0].value,
                            row.cells[5].children[0].value,
                            row.cells[6].children[0].value,
                            row.cells[7].children[0].value
                         ]
        }

        jQuery.ajax({
            type: "POST",
            url: "SalvarNota",
            data: {dados: dados, produtos: prods},
            success: function (data) {
                console.log();

                if (data.success == true){
                    var numeroNota = document.getElementById("numeroNota");
                    numeroNota.value = data.retorno.RetornoNota.Nota;
                    alert('Nota N° ' + data.retorno.RetornoNota.Nota + ' emitida com sucesso! Protocolo de autenticidade: ' + data.retorno.RetornoNota.autenticidade);

                    var r = confirm("Deseja imprimir NFSe?");

                    if (r == true) {
                        var win = window.open(data.retorno.RetornoNota.LinkImpressao, '_blank');
                        win.focus();
                    }
                    
                }
                else if (data.success == false) {
                    alert('Nota não enviada. Erros: ' + data.mensagens);
                }


            }
        });

        return false;
    });
});

// {#Busca Clientes#}
$(document).on('input', '.NomeCliente', function () {
    var str = $(this).val(); // this.value
    $.ajax({
        url: 'loadClientes',
        data: {str: str},
        type: 'post',
        success: function (data) {
            $("#NomeCliente").autocomplete({
                source: data,
                delay: 200
            });
        }
    });
})

// {#DatePicker#}
$(function () {
    $('#datetimepicker4').datepicker({
        pickTime: false
    });
});

// {#Insere Linha#}
function inserirLinhaTabela() {
    var table = document.getElementById("tabelaprodutos");
    var numOfRows = table.rows.length;
    //var numOfCols = table.rows[numOfRows-1].cells.length;

    var newRow = table.insertRow(numOfRows);

    var rowNumber = numOfRows - 1;

    newCell = newRow.insertCell(0);
    newCell.innerHTML = '<input type="text" id="idServico' + rowNumber + '" name="idServico' + rowNumber + '" class="ServicoItem">';

    newCell = newRow.insertCell(1);
    newCell.innerHTML = '<input type="text" id="DescricaoItem' + rowNumber + '" name="DescricaoItem' + rowNumber + '" class="">';

    newCell = newRow.insertCell(2);
    newCell.innerHTML = '<input type="text" id="ItemQtd' + rowNumber + '" name="ItemQtd' + rowNumber + '" class="input-table text-right Totals">';

    newCell = newRow.insertCell(3);
    newCell.innerHTML = '<input type="text" id="ItemPreco' + rowNumber + '" name="ItemPreco' + rowNumber + '" class="input-table text-right Totals">';

    newCell = newRow.insertCell(4);
    newCell.innerHTML = '<input type="text" id="ItemDesconto' + rowNumber + '" name="ItemDescontol' + rowNumber + '" class="input-table text-right Totals">';

    newCell = newRow.insertCell(5);
    newCell.innerHTML = '<input type="text" id="ItemISS' + rowNumber + '" name="ItemISS' + rowNumber + '" class="input-table text-right Totals">';

    newCell = newRow.insertCell(6);
    newCell.innerHTML = '<input type="text" id="ItemPercIss' + rowNumber + '" name="ItemPercIss' + rowNumber + '" class="input-table text-right Totals">';

    newCell = newRow.insertCell(7);
    newCell.innerHTML = '<input type="text" id="ItemTotal' + rowNumber + '" name="ItemTotal' + rowNumber + '" class="input-table text-right SubTotals">';

    newCell = newRow.insertCell(8);
    newCell.innerHTML = '×';
    newCell.setAttribute('onclick', 'RemoveTableRow(this)');
    newCell.setAttribute('id', 'btnRemoveLinha');
    newCell.setAttribute('class', 'sale-delete-row');
}

// {#Remove Linha#}
(function ($) {
    RemoveTableRow = function (handler) {
        var tr = $(handler).closest('tr');
        tr.fadeOut(400, function () {
            tr.remove();
        });
        return false;
    };
})(jQuery);

// {#Busca Servico#}
$(document).on('input', '.ServicoItem', function () {

    var obj = this;

    $.ajax({
        url: 'loadItemServico',
        data: {str: ''},
        type: 'post',
        success: function (data) {
            $(".ServicoItem").autocomplete({
                source: data,
                delay: 200
            });

            var tr = jQuery(obj).closest('tr');

            if (tr[0].rowIndex = 1) {
                var servtd = jQuery(tr[0].children[0]);
                var desctd = jQuery(tr[0].children[1]);
                var qtdtd  = jQuery(tr[0].children[2]);
                var valtd  = jQuery(tr[0].children[3]);
                var destd  = jQuery(tr[0].children[4]);
                var isstd  = jQuery(tr[0].children[5]);
                var pistd  = jQuery(tr[0].children[6]);
                var subtd  = jQuery(tr[0].children[7]);

                var servicoItem    = jQuery(servtd[0].firstElementChild);
                var descricaoItem  = jQuery(desctd[0].firstElementChild);
                var quantidadeItem = jQuery(qtdtd[0].firstElementChild);
                var valorItem      = jQuery(valtd[0].firstElementChild);
                var descontoItem   = jQuery(destd[0].firstElementChild);
                var issItem        = jQuery(isstd[0].firstElementChild);
                var percIssItem    = jQuery(pistd[0].firstElementChild);
                var subTotalItem   = jQuery(subtd[0].firstElementChild);
            }

            else {
                var servtd = jQuery(tr[0].childNodes[0]);
                var desctd = jQuery(tr[0].childNodes[1]);
                var qtdtd  = jQuery(tr[0].childNodes[2]);
                var valtd  = jQuery(tr[0].childNodes[3]);
                var destd  = jQuery(tr[0].childNodes[4]);
                var isstd  = jQuery(tr[0].childNodes[5]);
                var pistd  = jQuery(tr[0].childNodes[6]);
                var subtd  = jQuery(tr[0].childNodes[7]);

                var servicoItem    = jQuery(servtd[0].childNodes[0]);
                var descricaoItem  = jQuery(desctd[0].childNodes[0]);
                var quantidadeItem = jQuery(qtdtd[0].childNodes[0]);
                var valorItem      = jQuery(valtd[0].childNodes[0]);
                var descontoItem   = jQuery(destd[0].childNodes[0]);
                var issItem        = jQuery(isstd[0].childNodes[0]);
                var percIssItem    = jQuery(pistd[0].childNodes[0]);
                var subTotalItem   = jQuery(subtd[0].childNodes[0]);
            }

            $.ajax({
                url: 'getValoresServico',
                data: {idServico: servicoItem[0].value},
                type: 'post',
                success: function (data) {
                    servicoItem[0].value    = data[0].id;
                    descricaoItem[0].value  = data[0].descricao;
                    quantidadeItem[0].value = '1';
                    valorItem[0].value      = data[0].valor.toFixed(2);
                    descontoItem[0].value   = '0.00';
                    percIssItem[0].value    = data[0].percIss.toFixed(2);

                    $porcentagemISS = parseFloat(data[0].percIss);
                    $valorItem      = parseFloat(valorItem[0].value);
                    $desc           = parseFloat(descontoItem[0].value);

                    $descontoCondicionado = 'N';

                    if ($porcentagemISS > 0 && $descontoCondicionado == 'N') {
                        issItem[0].value = (valorItem[0].value / 100) * $porcentagemISS;
                        subTotalItem[0].value = $valorItem + parseFloat(issItem[0].value) - $desc;
                    } else if ($porcentagemISS > 0 && $descontoCondicionado == 'S') {
                        issItem[0].value = ((valorItem[0].value - $desc) / 100) * $porcentagemISS;
                        subTotalItem[0].value = $valorItem + parseFloat(issItem[0].value) - $desc;
                    } else {
                        subTotalItem[0].value = $valorItem - $desc;
                    }

                    subTotalItem[0].value = parseFloat(subTotalItem[0].value).toFixed(2);

                    $percIrrf   = parseFloat(data[0].percIrrf) || 0;
                    $percCsl    = parseFloat(data[0].percCsl) || 0;
                    $percPis    = parseFloat(data[0].percPis) || 0;
                    $percCofins = parseFloat(data[0].percCofins) || 0;
                    
                    // var valorins    = document.getElementsByName('inss');
                    var valorcof    = document.getElementsByName('cofins');
                    // var valoriss    = document.getElementsByName('iss');
                    var valorcsl    = document.getElementsByName('csl');
                    var valorpis    = document.getElementsByName('pis');
                    var valorirr    = document.getElementsByName('irrf');

                    var cofins = parseFloat(valorcof[0].value);
                    var csl    = parseFloat(valorcsl[0].value);
                    var pis    = parseFloat(valorpis[0].value);
                    var irrf   = parseFloat(valorirr[0].value);

                    cofins += (parseFloat(subTotalItem[0].value) / 100) *  $percCofins;
                    csl    += (parseFloat(subTotalItem[0].value) / 100) *  $percCsl;
                    pis    += (parseFloat(subTotalItem[0].value) / 100) *  $percPis;
                    irrf   += (parseFloat(subTotalItem[0].value) / 100) *  $percIrrf;

                    valorcof[0].value = cofins.toFixed(2);
                    valorcsl[0].value = csl.toFixed(2);
                    valorpis[0].value = pis.toFixed(2);
                    valorirr[0].value = irrf.toFixed(2);
                }
            });
        }
    });
})

//Totaliza/Subtotaliza Campos
$(document).on('blur', '.Totals', function () {
    var obj = this;
    subtotaliza(obj);
    totaliza();
})

//Totaliza
function totaliza(){
    var inputs      = document.getElementsByClassName('SubTotals');
    var result      = document.getElementsByName('valorTotLiq');
    var sum = 0;

    var basecalc    = document.getElementsByName('base_calculo');

    var valorded    = document.getElementsByName('valor_deducao');
    var valorins    = document.getElementsByName('inss');
    var valorcof    = document.getElementsByName('cofins');
    var valoriss    = document.getElementsByName('iss');
    var valorcsl    = document.getElementsByName('csl');
    var valorpis    = document.getElementsByName('pis');
    var valorirr    = document.getElementsByName('irrf');


    for(var i=0; i<inputs.length; i++) {
        var ip = inputs[i];

        if (ip.name && ip.name.indexOf("total") < 0) {
            sum += parseFloat(ip.value) || 0;
        }

    }

    basecalc[0].value = sum.toFixed(2);

    var inss    = parseFloat(valorins[0].value);
    var cofins  = parseFloat(valorcof[0].value);
    var iss     = parseFloat(valoriss[0].value);
    var csl     = parseFloat(valorcsl[0].value);
    var pis     = parseFloat(valorpis[0].value);
    var irrf    = parseFloat(valorirr[0].value);
    var deducao = parseFloat(valorded[0].value);


    sum -= inss - cofins - csl - pis - irrf - deducao;
    sum += iss;

    result[0].value = sum.toFixed(2);

}

//Subtotaliza
function subtotaliza(obj) {
    var tr = jQuery(obj).closest('tr');

    if (tr[0].rowIndex = 1) {
        var qtdtd = jQuery(tr[0].children[2]);
        var valtd = jQuery(tr[0].children[3]);
        var destd = jQuery(tr[0].children[4]);
        var isstd = jQuery(tr[0].children[5]);
        var pistd = jQuery(tr[0].children[6]);
        var subtd = jQuery(tr[0].children[7]);

        var quantidadeItem = jQuery(qtdtd[0].firstElementChild);
        var valorItem = jQuery(valtd[0].firstElementChild);
        var descontoItem = jQuery(destd[0].firstElementChild);
        var issItem = jQuery(isstd[0].firstElementChild);
        var percIssItem = jQuery(pistd[0].firstElementChild);
        var subTotalItem = jQuery(subtd[0].firstElementChild);
    } else {
        var qtdtd = jQuery(tr[0].childNodes[2]);
        var valtd = jQuery(tr[0].childNodes[3]);
        var destd = jQuery(tr[0].childNodes[4]);
        var isstd = jQuery(tr[0].childNodes[5]);
        var pistd = jQuery(tr[0].childNodes[6]);
        var subtd = jQuery(tr[0].childNodes[7]);

        var quantidadeItem = jQuery(qtdtd[0].childNodes[0]);
        var valorItem = jQuery(valtd[0].childNodes[0]);
        var descontoItem = jQuery(destd[0].childNodes[0]);
        var issItem = jQuery(isstd[0].childNodes[0]);
        var percIssItem = jQuery(pistd[0].childNodes[0]);
        var subTotalItem = jQuery(subtd[0].childNodes[0]);
    }

    $descontoCondicional = 'N';

    if ($descontoCondicional == 'N') { //aplica o incondicional
        $totalParcial = (valorItem[0].value * quantidadeItem[0].value) - descontoItem[0].value;
        issItem[0].value = ($totalParcial / 100) * percIssItem[0].value;
        subTotalItem[0].value = parseFloat($totalParcial) + parseFloat(issItem[0].value);
    } else {
        $totalParcial = (valorItem[0].value * quantidadeItem[0].value);
        issItem[0].value = ($totalParcial / 100) * percIssItem[0].value;
        subTotalItem[0].value = parseFloat($totalParcial) - parseFloat(descontoItem[0].value) + parseFloat(issItem[0].value);
    }

    subTotalItem[0].value = parseFloat(subTotalItem[0].value).toFixed(2)
}

//tenta retransmitir nota
function reenviarNf(obj) {
    console.log(obj);
    var dados = obj;
    jQuery.ajax({
        type: "POST",
        url: "reenviarNota",
        data: {id: dados},
        success: function (data) {
            console.log();

            if (data.success == true){
                alert('Nota N° ' + data.retorno.RetornoNota.Nota + ' emitida com sucesso! Protocolo de autenticidade: ' + data.retorno.RetornoNota.autenticidade);
                location.reload();
            }
            else if (data.success == false) {
                alert('Nota não enviada. Erros: ' + data.mensagens);
            }


        }
    });
}

//Imprime NFSE
function ImprimirNf(obj) {
    console.log(obj);
    var dados = obj;
    jQuery.ajax({
        type: "POST",
        url: "ImprimirNf",
        data: {id: dados},
        success: function (data) {

            if (data.success == true){
                var win = window.open(data.url, '_blank');
                win.focus();
            }
            else if (data.success == false) {
                alert('Nota não encontrada. Contate o administrador.');
            }

        }
    });
}

//Cancela NFSE
function CancelarNf(obj) {
    console.log(obj);
    var dados = obj;

    var codcancelamento = prompt("Por favor informe o motivo do cancelamento : \n (2) – Serviço não prestado \n (4) – Duplicidade da nota", "");

    if (codcancelamento !=  2 && codcancelamento != 4) {
        alert('Código Inválido! Por favor informar (2 ou 4)');
        return false;
    }

    jQuery.ajax({
        type: "POST",
        url: "CancelarNf",
        data: {id: dados, cod_cancelamento: codcancelamento},
        success: function (data) {

            if (data.success == true){
                alert('Nota Cancelada.');
                location.reload();
            }
            else if (data.success == false) {
                alert('Nota não cancelada. Contate o administrador.');
            }

        }
    });
}


