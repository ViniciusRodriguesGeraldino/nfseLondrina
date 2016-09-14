$("#cliente_fone").mask("(99) 99999-9999");

$("#cliente_fone").on("blur", function() {
    var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

    if( last.length == 3 ) {
        var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
        var lastfour = move + last;
        var first = $(this).val().substr( 0, 9 );

        $(this).val( first + '-' + lastfour );
    }
})

$("#cliente_celular").mask("(99) 99999-9999");

$("#cliente_celular").on("blur", function() {
    var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

    if( last.length == 3 ) {
        var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
        var lastfour = move + last;
        var first = $(this).val().substr( 0, 9 );

        $(this).val( first + '-' + lastfour );
    }
})

$('form[name="cliente"]').submit(function() {
    $("#cliente_cpfcnpj").unmask();
});

$("#cliente_cpfcnpj").keydown(function(){
    try {
        $("#cliente_cpfcnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cliente_cpfcnpj").val().length;

    if(tamanho <= 11){
        $("#cliente_cpfcnpj").mask("999.999.999-99");
    } else {
        $("#cliente_cpfcnpj").mask("99.999.999/9999-99");
    }
});


$(document).ready( function() {
    $('#cliente_cep').change(function() {

        var selected = $(this).val()
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "http://api.postmon.com.br/v1/cep/"+selected, false);
        xhr.send();

        console.log(xhr);

        if(xhr.statusText == 'OK' && xhr.status == 200){
            var dadosJson = JSON.parse(xhr.response);
            console.log(dadosJson);

            var endereco = document.getElementById('cliente_endereco');
            endereco.value = dadosJson.logradouro;
            var bairro = document.getElementById('cliente_bairro');
            bairro.value = dadosJson.bairro;
            var cidade = document.getElementById('cliente_cidade');
            cidade.value = dadosJson.cidade;
            var estado = document.getElementById('cliente_uf');
            estado.value = dadosJson.estado;
            var codIbge = document.getElementById('cliente_codCid');
            codIbge.value = dadosJson.cidade_info.codigo_ibge;
        }

    });
});