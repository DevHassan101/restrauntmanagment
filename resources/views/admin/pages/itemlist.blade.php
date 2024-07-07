@foreach ($items as $item)
    {{-- <div class="card col-md-4">
        @if ($item->image)
            <img class="card-img-top" src="{{ asset('productimage/' . $item->image) }}" alt="Title">
        @else
            <img class="card-img-top" src="{{ asset('assets/img/noimage.jpg') }}" alt="Title">
        @endif
        <div class="card-body">
            <h4 class="card-title">{{ $item->name }}</h4>
            <h5 class="card-title">Quantity: {{$item->quantity}}</h5>
        </div>
    </div> --}}
    <div class="row prow">
        <div class="col-md-2">
            @if ($item->image)
                <img class="card-img-top" src="{{ asset('productimage/' . $item->image) }}" alt="Title" height="50px"
                    width="70px">
            @else
                <img class="card-img-top" src="{{ asset('assets/img/noimage.jpg') }}" alt="Title" height="50px"
                    width="70px">
            @endif
        </div>
        <div class="col-md-7">
            <h5>{{ $item->name }}</h5>
        </div>
        <div class="col-md-3">
            Quantity: {{ $item->quantity }}
        </div>
    </div>
@endforeach
