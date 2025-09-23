<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    @yield("content")

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#txt_search').on('input', function () {
                let val = $(this).val();

                if (val.length >= 3) {

                    var settings = {
                        "url": "https://api.parcllabs.com/v1/search/markets?query=" + val,
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Authorization": "EphIk5y3KCwlBglN3t4lZWWciV6-wDh9ysil74NVD9s",
                            "Accept": "application/json"
                        },
                    };

                    $.ajax(settings).done(function (response) {
                        let suggestions = response.items;
                        
                        let autocompleteList = $('.autocompleteList');

                        if (suggestions && suggestions.length > 0) {
                            $.each(suggestions, function (index, item) {
                                let listItem = $('<p style="cursor:pointer">').text(item.name);

                                listItem.on('click', function () {
                                    window.location.href = 'select/'+item.parcl_id;
                                });

                                autocompleteList.append(listItem);
                                autocompleteList.css({
                                    'overflow-y': 'scroll',
                                    'padding': '10px',
                                    'height': '200px'
                                });
                            });
                        }

                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        console.error("Error al obtener sugerencias: ", textStatus, errorThrown);
                    });
                } else{
                    $('.autocompleteList').empty();
                    $('.autocompleteList').css();
                }
            });
        });
    </script>
</body>

</html>