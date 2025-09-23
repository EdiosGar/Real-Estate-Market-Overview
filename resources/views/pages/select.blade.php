@extends("layouts.app")

@section("content")
    <div class="container-fluid mt-1"  id="conteSelection" parcl_id="{{ $markets->items[0]->parcl_id}}">
        <div class="d-flex row-cols-2 col-lg-12 mb-3">
            <div class="col border col-lg-6 p-2">
                <p class="fs-6 text-secondary">Market</p>
                <p class="fs-4 text-dark fw-bold text-break">{{ $markets->items[0]->name }}</p>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="col border col-lg-7 p-2">
                    <p class="fs-6 text-secondary">Median sale (latest)</p>
                    <p class="fs-4 text-dark fw-bold">$ {{ $prices->items[0]->price->median->sales }}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="d-flex row-cols-lg-2 col-lg-12">
            <div class="col border col-lg-6 p-2">
                <p class="fs-4 fw-bold">Median Sale Price (trend)</p>
                <canvas id="graphP"></canvas>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="col border col-lg-7 p-2">
                    <p class="fs-4 fw-bold">Market Activity & Inventory</p>
                    <canvas id="graphA"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection