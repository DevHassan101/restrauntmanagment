@foreach ($products as $product)
<div class="product-card">
    {{-- Product Image --}}
    <div class="product-image-container">
        @if ($product->image)
        <img
            src="{{ asset('productimage/' . $product->image) }}"
            alt="{{ $product->name }}"
        />
        @else
        <img
            src="{{ asset('assets/img/noimage.jpg') }}"
            alt="{{ $product->name }}"
        />
        @endif
    </div>
    <div class="product-info">
        <div class="product-name">{{ $product->name }}</div>
        <div class="product-footer">
            <div class="product-price">₨{{ $product->price ?? '0' }}</div>
            <button
                class="add-btn"
                onclick="addtocart(this, 0)"
                value="{{ $product->id }}"
            >
                 <iconify-icon icon="mdi:plus" width="15"></iconify-icon>
                 Add item
            </button>
        </div>
    </div>
</div>
@endforeach
