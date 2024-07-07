@foreach ($products as $product)
    <div class="row prow">
        <div class="col-md-2">
            @if ($product->image)
                <img class="card-img-top" src="{{ asset('productimage/' . $product->image) }}" alt="Title" height="50px"
                    width="70px">
            @else
                <img class="card-img-top" src="{{ asset('assets/img/noimage.jpg') }}" alt="Title" height="50px"
                    width="70px">
            @endif
        </div>
        <div class="col-md-7">
            <h5>{{ $product->name }}</h5>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-outline-nz" onclick="addtocart(this, 0)"
                value="{{ $product->id }}">Add Item</button>
        </div>
    </div>
@endforeach
