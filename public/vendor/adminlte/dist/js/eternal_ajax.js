
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    const URL = '/panel/';

    $(".excluir-adm-item").click(function (e) {

        e.preventDefault();
        let id_clicado = $(this).attr("id");
        let id_item = id_clicado.substring(id_clicado.indexOf('-') + 1);

        $.ajax({

            type: 'POST',

            url: URL + 'dNeill',

            data: {
                id_item: id_item
            },
            dataType: 'json',
            cash: false,
            success: function () {
                location.replace(URL +'Neill');

            },
            error: function (result) {
                let erro = 'erro na requisição ajax' + result;
                alert(erro);

            }

        });


    });
