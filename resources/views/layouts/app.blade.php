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
        const keyAPI = "Tkcmtt4P8ZEhjW_PQtklh2lOTYIie9eoMPgMRYGSPy8";
        $(document).ready(function () {
            // Autocomplet
            $('#txt_search').on('input', function () {
                let val = $(this).val();

                if (val.length >= 3) {

                    var settings = {
                        "url": "https://api.parcllabs.com/v1/search/markets?query=" + val,
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Authorization": keyAPI,
                            "Accept": "application/json"
                        },
                    };

                    $.ajax(settings).done(function (response) {
                        let suggestions = response.items;

                        let autocompleteList = $('.autocompleteList');

                        if (suggestions && suggestions.length > 0) {
                            $.each(suggestions, function (index, item) {
                                var html = "<p style='cursor:pointer'>";
                                let listItem = $(html).text(item.name);

                                listItem.on('click', function () {
                                    window.location.href = '/' + item.parcl_id;
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
                        console.error(textStatus, errorThrown);
                    });
                } else {
                    $('.autocompleteList').empty();
                    $('.autocompleteList').css();
                }
            });
        });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>

        @if (isset($prices) && isset($markets) && isset($activity))
        var id = $('#conteSelection').attr('parcl_id');

        if(window.location.pathname == '/'+id){
            const precioData = @json($prices);

            const activityData = @json($activity);

            var labelsP = []
            var arrayDataP = []
            var arrayDataNewListen = []
            var arrayDataNewRental = []
            precioData.items.forEach(element => {
                labelsP.push(element.date)
                arrayDataP.push(element.price.median.sales)
            });
            activityData.items.forEach(element => {
                arrayDataNewListen.push(element.new_listings_for_sale)
                arrayDataNewRental.push(element.new_rental_listings)
            })

    
            const graphP = document.querySelector("#graphP");
            const graphA = document.querySelector("#graphA");
    
            const dataP = {
                labels: labelsP,
                datasets: [{
                    label: "Median Price",
                    data: arrayDataP,
                    backgroundColor: 'rgba(144, 69, 248, 0.8)'
                }]
            };

            const dataSetSales = {
                label: "Sale",
                data: arrayDataP,
                borderColor: 'rgba(69, 140, 248, 0.8)',
                fill: false,
                tension: 0.1
            }

            const dataSetNewListen = {
                label: "New listings for sale",
                data: arrayDataNewListen,
                borderColor: 'rgba(248, 37, 37, 0.8)',
                fill: false,
                tension: 0.1
            }

            const dataSetNewRental = {
                label: "New rental listings",
                data: arrayDataNewRental,
                borderColor: 'rgba(69, 248, 84, 0.8)',
                fill: false,
                tension: 0.1
            }

            const configP = {
                type: 'line',
                data: dataP,
            };

            const dataG2 = {
                labels: labelsP,
                datasets: [dataSetSales,dataSetNewListen,dataSetNewRental]
            }

            const configG2 = {
                type: 'line',
                data: dataG2,
            }
    
            new Chart(graphP, configP);
            new Chart(graphA, configG2);
        }
        @endif
    </script>
</body>

</html>