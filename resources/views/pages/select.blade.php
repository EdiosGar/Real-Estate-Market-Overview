@extends("layouts.app")

@section("content")
    <div class="container-fluid mt-1">
        <div class="d-flex row-cols-2 col-lg-10 mb-3">
            <div class="col border col-4 me-5 p-2">
                <p class="fs-6 text-secondary">Market</p>
                <p class="fs-4 text-dark fw-bold text-break">{{ $markets->items[0]->name }}</p>
            </div>

            <div class="col border col-lg-4 p-2">
                <p class="fs-6 text-secondary">Median sale (latest)</p>
                <p class="fs-4 text-dark fw-bold">$ {{ $prices->items[0]->price->median->sales }}
                </p>
            </div>
        </div>

        <div class="d-flex col-12 mb-3 border p-2">
            <p class="fs-4 fw-bold">Median Sale Price (trend)</p>
            <div class="" id="graficoPrecio" style="high:300px">

            </div>
        </div>

        <div class="d-flex col-12 mb-3 border p-2">
            <p class="fs-4 fw-bold">Market Activity & Inventory</p>
            <div class="" id="graficoPrecio" style="high:300px">
                
            </div>
        </div>
    </div>
@endsection