@extends("layouts.app")

@section("content")
    <div class="conainer vh-100">
        <div class="d-flex flex-column justify-content-lg-center align-items-center h-100">
            <h2 class="mt-5 mt-lg-2">Find Your Market</h2>
            <form method="get" class="col-lg-8 col-10 mt-3">
                <div class="input-group">
                    <span class="input-group-text fs-6">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control fs-5" name="txt_search" id="txt_search" placeholder="Search for a market...">
                </div> 
            </form>

            @if ($marks != null)    
                <div class="">
                    @foreach ($marks->items as $mark)
                        {{ $mark }}
                        {{-- <p>{{ $mark->name }}</p> --}}
                        {{-- <button class="btn btn-outline-secondary">{{ $mark->name }}</button> --}}
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection