@extends("layouts.app")

@section("content")
    <div class="conainer vh-100">
        <div class="d-flex flex-column justify-content-lg-center align-items-center h-100">
            <h2 class="mt-5 mt-lg-2">Find Your Market</h2>

            <div class="col-lg-8 col-10 mt-3 position-relative">
                <div class="input-group">
                    <span class="input-group-text fs-6">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control fs-5" id="txt_search" placeholder="Search for a market..." autocomplete="off">
                </div> 

                <div class="autocompleteList"></div>
            </div>


            {{-- @if ($marks != null)
            <div style="overflow-y: scroll;padding: 10px;">
                @foreach ($marks->items as $mark)
                    <div class="">
                        {{ $mark->name }}
                        <p class="fs-5">City: {{ $mark->name }}</p>
                        <p class="fs-6">state: {{ $mark->state_abbreviation }}</p>
                    </div>
                @endforeach
            </div>
            @endif --}}
        </div>
    </div>
@endsection