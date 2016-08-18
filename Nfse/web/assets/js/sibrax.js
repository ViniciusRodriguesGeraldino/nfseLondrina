// {#Salva NF#}
jQuery(document).ready(function () {
    jQuery('#ajax_form').submit(function () {
        var dados = jQuery(this).serializeArray();
        console.log("dados" + dados);
        jQuery.ajax({
            type: "POST",
            url: "SalvarNota",
            data: dados,
            success: function (data) {
                alert(data);
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
    newCell.innerHTML = '<input type="text" id="idServico' + rowNumber + '" name="idServico' + rowNumber + '" class="col6 ServicoItem">';

    newCell = newRow.insertCell(1);
    newCell.innerHTML = '<input type="text" id="DescricaoItem' + rowNumber + '" name="DescricaoItem' + rowNumber + '" class="col6">';

    newCell = newRow.insertCell(2);
    newCell.innerHTML = '<input type="text" id="ItemQtd' + rowNumber + '" name="ItemQtd' + rowNumber + '" class="col6 text-right Totals">';

    newCell = newRow.insertCell(3);
    newCell.innerHTML = '<input type="text" id="ItemPreco' + rowNumber + '" name="ItemPreco' + rowNumber + '" class="col5 text-right Totals">';

    newCell = newRow.insertCell(4);
    newCell.innerHTML = '<input type="text" id="ItemDesconto' + rowNumber + '" name="ItemDescontol' + rowNumber + '" class="col5 text-right Totals">';

    newCell = newRow.insertCell(5);
    newCell.innerHTML = '<input type="text" id="ItemISS' + rowNumber + '" name="ItemISS' + rowNumber + '" class="col5 text-right Totals">';

    newCell = newRow.insertCell(6);
    newCell.innerHTML = '<input type="text" id="ItemPercIss' + rowNumber + '" name="ItemPercIss' + rowNumber + '" class="col5 text-right Totals">';

    newCell = newRow.insertCell(7);
    newCell.innerHTML = '<input type="text" id="ItemTotal' + rowNumber + '" name="ItemTotal' + rowNumber + '" class="col5 text-right">';

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

            console.log(tr);

            if (tr[0].rowIndex = 1) {
                var servtd = jQuery(tr[0].children[0]);
                var desctd = jQuery(tr[0].children[1]);
                var qtdtd = jQuery(tr[0].children[2]);
                var valtd = jQuery(tr[0].children[3]);
                var destd = jQuery(tr[0].children[4]);
                var isstd = jQuery(tr[0].children[5]);
                var pistd = jQuery(tr[0].children[6]);
                var subtd = jQuery(tr[0].children[7]);

                var servicoItem = jQuery(servtd[0].firstElementChild);
                var descricaoItem = jQuery(desctd[0].firstElementChild);
                var quantidadeItem = jQuery(qtdtd[0].firstElementChild);
                var valorItem = jQuery(valtd[0].firstElementChild);
                var descontoItem = jQuery(destd[0].firstElementChild);
                var issItem = jQuery(isstd[0].firstElementChild);
                var percIssItem = jQuery(pistd[0].firstElementChild);
                var subTotalItem = jQuery(subtd[0].firstElementChild);
            }

            else {
                var servtd = jQuery(tr[0].childNodes[0]);
                var desctd = jQuery(tr[0].childNodes[1]);
                var qtdtd = jQuery(tr[0].childNodes[2]);
                var valtd = jQuery(tr[0].childNodes[3]);
                var destd = jQuery(tr[0].childNodes[4]);
                var isstd = jQuery(tr[0].childNodes[5]);
                var pistd = jQuery(tr[0].childNodes[6]);
                var subtd = jQuery(tr[0].childNodes[7]);

                var servicoItem = jQuery(servtd[0].childNodes[0]);
                var descricaoItem = jQuery(desctd[0].childNodes[0]);
                var quantidadeItem = jQuery(qtdtd[0].childNodes[0]);
                var valorItem = jQuery(valtd[0].childNodes[0]);
                var descontoItem = jQuery(destd[0].childNodes[0]);
                var issItem = jQuery(isstd[0].childNodes[0]);
                var percIssItem = jQuery(pistd[0].childNodes[0]);
                var subTotalItem = jQuery(subtd[0].childNodes[0]);

            }

            $.ajax({
                url: 'getValoresServico',
                data: {idServico: servicoItem[0].value},
                type: 'post',
                success: function (data) {
                    console.log(data[0]);

                    servicoItem[0].value = data[0].id;
                    descricaoItem[0].value = data[0].descricao;
                    quantidadeItem[0].value = '1';
                    valorItem[0].value = data[0].valor;
                    descontoItem[0].value = '0';
                    percIssItem[0].value = data[0].percIss;

                    $porcentagemISS = parseFloat(data[0].percIss);
                    $valorItem = parseFloat(valorItem[0].value);
                    $desc = parseFloat(descontoItem[0].value);

                    $descontoCondicionado = 'N';

                    if ($porcentagemISS > 0 && $descontoCondicionado == 'N') {
                        issItem[0].value = (valorItem[0].value / 100) * $porcentagemISS;
                        subTotalItem[0].value = $valorItem - issItem[0].value - $desc;
                    } else if ($porcentagemISS > 0 && $descontoCondicionado == 'S') {
                        issItem[0].value = ((valorItem[0].value - $desc) / 100) * $porcentagemISS;
                        subTotalItem[0].value = $valorItem - issItem[0].value - $desc;
                    } else {
                        subTotalItem[0].value = $valorItem - $desc;
                    }

                }
            });

        }
    });
})

//Totaliza Campos
$(document).on('change', '.Totals', function () {
    var obj = this;
    totaliza(obj);
})

function totaliza(obj) {
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

    //Continuar amanhã
}
