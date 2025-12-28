<!doctype html>
<html lang="en">

<head>
    <title>Restaurant POS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bg-pink-light{
            background-color: #ef90a125;
        }

        body {
            font-family: "Outfit", sans-serif !important;
            background: #f8f9fa;
            overflow: hidden;
        }

        /* Header Styles */
        .modern-header {
            background: #ffffff;
            border-bottom: 1px solid #ef90a2;
            padding: 1rem 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .brand-title {
            font-size: 23px;
            font-weight: 700;
            color: #ef90a2;
            margin: 0;
        }

        .header-info {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .info-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.75rem;
            background-color: #ffc5d0dc;
            border-radius: 8px;
            font-size: 0.875rem;
            color: rgba(241, 93, 120, 1);
        }

        .info-badge iconify-icon {
            font-size: 1.1rem;
            color: #fa4667ff;
        }

        .info-label {
            font-weight: 500;
            color: #fa4667ff;
        }

        .header-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn-modern {
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            border: none;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-outline-modern {
            background: #ffffff;
            color: #c20024ff;
            border: 1px solid #e20029ff;
        }

        .btn-outline-modern:hover {
            background: #e20029ff;
            color: white;
            border-color: #d1d5db;
        }

        .btn-primary-modern {
            background: #e20029ff;
            color: white;
        }

        .btn-primary-modern:hover {
            background: #d10026ff;
        }

        /* Main Layout */
        main {
            height: calc(100vh - 73px);
            overflow: hidden;
        }

        .main-container {
            display: flex;
            height: 100%;
            gap: 0;
        }

        /* Order Panel (Left) */
        .order-panel {
            width: 400px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .order-header {
            padding: 1.25rem;
            background: #ffffff;
            border-right: 1px solid #ef90a2;
            border-bottom: 1px solid #ef90a2;
        }

        .order-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #e4627aff;
            margin-bottom: 0.75rem;
        }

        .order-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.875rem;
            color: #cc4059ff;
        }

        .order-items-container {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            border-right: 1px solid #ef90a2;
            background-color: white;
        }

        .order-item {
            background: #ef90a125;
            border: 1px solid #ef90a2;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.2s;
        }

        .order-item:hover {
            border-color: #ef90a2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }

        .item-name {
            font-weight: 600;
            color: #d10329ff;
            font-size: 0.9375rem;
        }

        .item-price {
            color: red;
            font-weight: 600;
            font-size: 0.9375rem;
        }

        .item-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: transparent;
            border: 1px solid #ef90a2;
            border-radius: 8px;
            padding: 0.25rem;
        }

        .qty-btn {
            width: 28px;
            height: 28px;
            border: none;
            background: #ffbac7cb;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            color: red;
        }

        .qty-btn:hover {
            background: #ff9eb0c7;
        }

        .qty-value {
            min-width: 32px;
            text-align: center;
            font-weight: 600;
            color: #d10329ff;
            font-size: 0.875rem;
        }

        .delete-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: #ffbac7cb;
            color: red;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .delete-btn:hover {
            background: #ff9eb0c7;
        }

        .order-footer {
            border-top: 1px solid #ef90a2;
            border-right: 1px solid #ef90a2;
            padding: 1.25rem;
            background: #ffffff;
        }

        .special-instructions {
            margin-bottom: 1rem;
        }

        .special-instructions label {
            font-size: 15px;
            font-weight: 600;
            color: #e4627aff;
            margin-bottom: 0.5rem;
            display: block;
        }

        .special-instructions textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ef90a2;
            border-radius: 8px;
            font-size: 0.875rem;
            resize: none;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
        }

        .special-instructions textarea:focus {
            outline: none;
            border-color: #dd6279ff;
            box-shadow: 0 0 0 3px #e972885b;
        }

        .order-summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding: 1rem;
            background: #ff9daf52;
            border-radius: 8px;
        }

        .summary-item {
            text-align: center;
        }

        .summary-label {
            font-size: 0.80rem;
            color: #d14f67ff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .summary-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #a70120ff;
        }

        .order-actions {
            display: flex;
            gap: 0.75rem;
        }

        .order-actions button {
            flex: 1;
        }

        /* Products Panel (Middle) */
        .products-panel {
            flex: 1;
            background-color: rgba(250, 250, 250);
            overflow-y: auto;
            padding: 1.5rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1rem;
        }

        .product-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.2s;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-color: #d83755ff;
        }

        .product-image-container {
            width: 100%;
            height: 140px;
            overflow: hidden;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            padding: 1rem;
        }

        .product-name {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
            font-size: 0.9375rem;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-weight: 700;
            color: #ec536fff;
            font-size: 1.125rem;
        }

        .add-btn {
            padding: 0.5rem 1rem;
            background: #e24763ff;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .add-btn:hover {
            background: #e20029ff;
            transform: scale(1.02);
        }

        /* Categories Panel (Right) */
        .categories-panel {
            width: 280px;
            background: #ffffff;
            border-left: 1px solid #e5e7eb;
            padding: 1.5rem;
            overflow-y: auto;
        }

        .panel-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 0.950rem;
            font-weight: 600;
            color: #ec5571ff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title iconify-icon {
            font-size: 1.25rem;
            color: #e4627aff;
        }

        .category-btn,
        .deal-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            background: #ef90a125;
            border: 1px solid #ef90a2;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
            text-align: left;
            font-weight: 500;
            color: #d10329ff;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .category-btn:hover,
        .deal-btn:hover {
            background: #e20029ff;
            color: white;
        }

        .category-btn.active,
        .deal-btn.active {
            background: #eff6ff;
            border-color: #3b82f6;
            color: #3b82f6;
            font-weight: 600;
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid #ef90a2;
            padding: 1.5rem;
            background: #ef90a125;
            border-radius: 16px 16px 0 0;
        }

        .modal-title {
            font-weight: 700;
            color: #fc0834ff;
            font-size: 1.50rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid #ef90a2;
            padding: 1.5rem;
            background: #ef90a125;
        }

        .form-label {
            font-weight: 500;
            color: #be0023ff;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #ef90a2;
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #ef90a2;
        }

        .summary-row:last-child {
            border-bottom: none;
            font-weight: 700;
            font-size: 1.125rem;
            color: #1f2937;
        }

        .summary-row-label {
            font-weight: 500;
            color: #ee002cff;
        }

        .summary-row-value {
            font-weight: 600;
            color: #d10329ff;
        }

        /* Scrollbar Styles */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #ef90a150;
        }

        ::-webkit-scrollbar-thumb {
            background: #ef90a2;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #e0798cff;
        }

        /* Empty State */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
            text-align: center;
            color: #ef90a1af;
        }

        .empty-state iconify-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state p {
            margin: 0;
            font-size: 0.875rem;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .categories-panel {
                width: 240px;
            }
        }

        @media (max-width: 992px) {
            .order-panel {
                width: 350px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .header-info {
                display: none;
            }

            .main-container {
                flex-direction: column;
            }

            .order-panel {
                width: 100%;
                max-height: 40vh;
            }

            .categories-panel {
                display: none;
            }
        }

    </style>
</head>

<body>
    <header>
        <nav class="modern-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-4">
                        <h1 class="brand-title d-flex justify-content-center align-items-center">
                            <iconify-icon icon="ri:restaurant-2-fill" width="30" height="30" style="color: #e4627aff" ></iconify-icon>
                           &nbsp; Restaurant POS
                        </h1>
                        <div class="header-info">
                            <div class="info-badge">
                                <iconify-icon icon="mdi:floor-plan"></iconify-icon>
                                <span><span class="info-label">Floor:</span> 1</span>
                            </div>
                            <div class="info-badge">
                                <iconify-icon icon="mdi:table-furniture"></iconify-icon>
                                <span><span class="info-label">Table:</span> 5</span>
                            </div>
                            <div class="info-badge">
                                <iconify-icon icon="mdi:account-group"></iconify-icon>
                                <span><span class="info-label">Capacity:</span> 7</span>
                            </div>
                            <div class="info-badge">
                                <iconify-icon icon="mdi:account-tie"></iconify-icon>
                                <span><span class="info-label">Waiter:</span> Sadaqat</span>
                            </div>
                        </div>
                    </div>
                    <div class="header-actions">
                        <a href="{{ url('select/table') }}" class="btn-modern btn-outline-modern">
                            <iconify-icon icon="mdi:table-chair"></iconify-icon>
                            Table Select
                        </a>
                        <a href="{{ url('/') }}" class="btn-modern btn-outline-modern">
                            <iconify-icon icon="mdi:logout"></iconify-icon>
                            Exit
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="main-container">
            <!-- Order Panel (Left) -->
            <div class="order-panel">
                <div class="order-header">
                    <h2 class="order-title">Current Order</h2>
                    <div class="order-meta">
                        <span><iconify-icon icon="mdi:table-furniture"></iconify-icon> Table 5</span>
                        <span><iconify-icon icon="mdi:clock-outline"></iconify-icon> 11:45 AM</span>
                    </div>
                </div>

                <div class="order-items-container" id="cartItems">

                </div>

                <div class="order-footer">
                    <div class="special-instructions">
                        <label for="page-textarea d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:note-text-outline"></iconify-icon>
                            Special Instructions
                        </label>
                        <textarea id="page-textarea" rows="3" data-page-id="page{{ $id }}"
                            placeholder="Add any special requests...">{{ session('pages.page' . $id) }}</textarea>
                    </div>

                    <div class="order-summary">
                        <div class="summary-item">
                            <div class="summary-label">Total</div>
                            <div class="summary-value total">0</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Items</div>
                            <div class="summary-value totalitem">0</div>
                        </div>
                    </div>

                    <div class="order-actions">
                        <form action="{{ url('kot/print/' . $id) }}" method="post" style="flex: 1;">
                            @csrf
                            <button class="btn-modern btn-outline-modern w-100" type="submit">
                                <iconify-icon icon="mdi:printer"></iconify-icon>
                                Print KOT
                            </button>
                        </form>
                        <button class="btn-modern btn-primary-modern" data-bs-toggle="modal"
                            data-bs-target="#completeorder">
                            <iconify-icon icon="mdi:check-circle-outline"></iconify-icon>
                            Complete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Products Panel (Middle) -->
            <div class="products-panel">
                <div class="products-grid" id="productlist">
                    @foreach ($products as $product)
                    <div class="product-card">
                        <div class="product-image-container">
                            @if ($product->image)
                            <img src="{{ asset('productimage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                            <img src="{{ asset('assets/img/noimage.jpg') }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="product-footer">
                                <div class="product-price">₨{{ $product->price ?? '0' }}</div>
                                <button class="add-btn" onclick="addtocart(this, 0)" value="{{ $product->id }}">
                                    <iconify-icon icon="mdi:plus" width="15"></iconify-icon>
                                    Add item
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Categories Panel (Right) -->
            <div class="categories-panel">
                <div class="panel-section">
                    <h3 class="section-title">
                        <iconify-icon icon="mdi:shape"></iconify-icon>
                        Categories
                    </h3>
                    @foreach ($categories as $category)
                    <button class="category-btn categorybutton" value="{{ $category->id }}">
                        <iconify-icon icon="mdi:tag-outline"></iconify-icon>
                        {{ $category->name }}
                    </button>
                    @endforeach
                </div>

                <div class="panel-section">
                    <h3 class="section-title">
                        <iconify-icon icon="mdi:star-circle"></iconify-icon>
                        Deals
                    </h3>
                    @foreach ($deals as $deal)
                    <button class="deal-btn dealbutton" value="{{ $deal->id }}">
                        <iconify-icon icon="mdi:sale"></iconify-icon>
                        {{ $deal->name }}
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Complete Order Modal -->
        <div class="modal fade" id="completeorder" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg overflow-y-auto" role="document">
                <div class="modal-content overflow-y-auto">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex justify-content-center align-items-center" id="modalTitleId">
                            <iconify-icon icon="ri:restaurant-2-fill" width="30" height="30" style="color: #e20029ff; " ></iconify-icon>
                            &nbsp;
                            Complete Order - Dine In
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('dinein/' . $id) }}" method="post">
                        @csrf
                        <div class="modal-body overflow-y-auto">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="p-3 bg-pink-light rounded">
                                        <div class="summary-row">
                                            <span class="summary-row-label">Subtotal</span>
                                            <span class="summary-row-value "> <span class="total">0</span> Rs </span>
                                        </div>
                                        <div class="summary-row">
                                            <span class="summary-row-label">Total Items</span>
                                            <span class="summary-row-value totalitem"></span>
                                        </div>
                                        <div class="summary-row">
                                            <span class="summary-row-label">{{ $tax?->name }} ({{ $tax?->percentage
                                                }}%)</span>
                                            <span class="summary-row-value"> <span class="taxamountt">0</span> Rs </span>
                                        </div>
                                        <div class="summary-row">
                                            <span class="summary-row-label">After Tax</span>
                                            <span class="summary-row-value"> <span class="aftertax">0</span> Rs</span>
                                        </div>
                                        <div class="summary-row">
                                            <span class="summary-row-label">Discount</span>
                                            <span class="summary-row-value"> <span id="discountamount">0</span> Rs</span>
                                        </div>
                                        <div class="summary-row">
                                            <span class="summary-row-label">Grand Total</span>
                                            <span class="summary-row-value"> <span id="afterdiscount">0</span> Rs </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="payment_type" class="form-label">
                                        <iconify-icon icon="mdi:credit-card"></iconify-icon>
                                        Payment Type
                                    </label>
                                    <select class="form-select" name="payment_type" id="payment_type" required>
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="discount" class="form-label">
                                        <iconify-icon icon="mdi:percent"></iconify-icon>
                                        Discount
                                    </label>
                                    <select class="form-select" name="discount" id="discount">
                                        <option value="">Select discount</option>
                                        @foreach ($discounts as $discount)
                                        <option value="{{ $discount->id }}">
                                            {{ $discount->name . ' - ' . $discount->percentage . '%' }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" name="tax" id="tax" value="{{ $tax?->id }}">

                                <div class="col-md-12">
                                    <label for="recieve" class="form-label">
                                        <iconify-icon icon="mdi:cash"></iconify-icon>
                                        Amount Received
                                    </label>
                                    <input type="number" class="form-control" name="recieve" id="recieve"
                                        placeholder="Enter amount received" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-modern btn-outline-modern" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn-modern btn-primary-modern">
                                <iconify-icon icon="mdi:check" width="15"></iconify-icon>
                                Complete Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            function fetchtotal() {
                $.ajax({
                    url: "{{ url('fetch-total') }}",
                    method: "GET",
                    data: {
                        tableid: {{ $id }}
        },
            success: function (response) {
                $(".total").html(response.total);
                $(".totalitem").html(response.totalitem);
                $(".aftertax").html((({{ $tax-> percentage }} / 100) * response.total) +
                    response.total);
        $(".taxamountt").html((({{ $tax-> percentage }} / 100) * response.total));
        console.log("total" + response.total)
        console.log("totalitem" + response.totalitem)
                    },
        error: function(xhr, status, error) {
            // Handle the error here
            console.log(error);
        }
                });
            }

        fetchtotal();


        $(".categorybutton").click(function () {
            var categoryid = $(this).val();
            $.ajax({
                url: "{{ url('fetch-products') }}",
                method: "GET",
                data: {
                    categoryid: categoryid
                }, // Send the button value to the Laravel route
                success: function (response) {
                    // Extract the HTML from the JSON response
                    var html = response.html;

                    // Add the HTML to your target div
                    $("#productlist").html(html);
                },
                error: function (xhr, status, error) {
                    // Handle the error here
                    console.log(error);
                }
            });
        });
        $(".dealbutton").click(function () {
            var dealid = $(this).val();

            $.ajax({
                url: "{{ url('fetch-dealitems') }}",
                method: "GET",
                data: {
                    dealid: dealid
                }, // Send the button value to the Laravel route
                success: function (response) {
                    // Extract the HTML from the JSON response
                    var html = response.html;

                    // Add the HTML to your target div
                    $("#productlist").html(html);
                    addtocart(0, dealid)
                },
                error: function (xhr, status, error) {
                    // Handle the error here
                    console.log(error);
                }
            });
        });
        $("#discount").change(function () {
            var discountid = $(this).val();
            $.ajax({
                url: "{{ url('fetch-discount') }}",
                method: "GET",
                data: {
                    discountid: discountid,
                    tableid: {{ $id }}
                    }, // Send the button value to the Laravel route
            success: function (response) {
                $("#discountamount").html(response);
                var afterdiscount = parseFloat($(".aftertax").html()) - response;
                $("#afterdiscount").html(afterdiscount);
            },
            error: function (xhr, status, error) {
                // Handle the error here
                console.log(error);
            }
                });
            });


        var textarea = document.getElementById('page-textarea');
        textarea.addEventListener('input', function () {
            // Get the updated text from the textarea
            var updatedText = textarea.value;

            // Get the page ID from the textarea's data attribute
            var pageId = textarea.getAttribute('data-page-id');

            // Make an AJAX request to save the session data
            $.ajax({
                url: '/save-session-instruction',
                method: 'GET',
                data: {
                    pageId: pageId,
                    text: updatedText
                },
                success: function (response) {
                    // Handle the success response if needed
                    console.log(response)
                    // alert({{ session('pages.' . $id) }})
                },
                error: function (xhr, status, error) {
                    // Handle any error that occurs during the AJAX request
                }
            });
        });
        });
    </script>


    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script>
        function fetchtotal() {
            $.ajax({
                url: "{{ url('fetch-total') }}",
                method: "GET",
                data: {
                    tableid: {{ $id }}
                },
        success: function(response) {
            $(".total").html(response.total);
            $(".totalitem").html(response.totalitem);
            $(".aftertax").html((({{ $tax-> percentage }} / 100) * response.total) + response.total);
        $(".taxamountt").html((({{ $tax-> percentage }} / 100) * response.total));
        console.log("total" + response.total)
        $(".totalitem").html(response.totalitem);
                },
        error: function(xhr, status, error) {
            // Handle the error here
            console.log(error);
        }
            });
        }


        // function fetchcarts() {
        //     $.ajax({
        //         url: "{{ url('fetch-carts') }}",
        //         method: "GET",
        //         data: {
        //             id: {{ $id }}
        //         },
        //         success: function(response) {

        //             $("#cartItems").empty();
        //             $.each(response.carts, function(index, item) {
        //                 // Create the HTML elements with the desired styling
        //                 var col1 = $("<div>", {
        //                     class: "col-md-4",
        //                     text: item.name
        //                 });
        //                 var col2 = $("<div>", {
        //                     class: "col-md-2",
        //                     text: item.price
        //                 });
        //                 var col3 = $("<div>", {
        //                     class: "col-md-4"
        //                 });

        //                 var col4 = $("<div>", {
        //                     class: "col-md-2"
        //                 });
        //                 var input = $("<input>", {
        //                     type: "number",
        //                     name: "",
        //                     id: item.id,
        //                     value: item.quantity,
        //                     disabled: true
        //                 });
        //                 var deleteButton = $("<button>", {
        //                     class: "btn btn-danger btn-sm delete-button",
        //                     text: "Delete",
        //                     onclick: 'removecart(this)',
        //                     value: item.id
        //                 });

        //                 var increase = $("<button>", {
        //                     value: item.id,
        //                     onclick: "increaseQuantity(this)"
        //                 }).append($('<i>', {
        //                     class: 'fa fa-plus',
        //                     'aria-hidden': 'true'
        //                 }));

        //                 var decrease = $("<button>", {
        //                     value: item.id,
        //                     onclick: "decreaseQuantity(this)"
        //                 }).append($('<i>', {
        //                     class: 'fa fa-minus',
        //                     'aria-hidden': 'true'
        //                 }));
        //                 console.log("loop" + item.name);
        //                 // Append the elements to the div
        //                 $("#cartItems").append(col1, col2, col3.append(decrease), col3.append(input),
        //                     col3.append(increase), col4.append(
        //                         deleteButton));
        //             });

        //             console.log(response)
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle the error here
        //             console.log(error);
        //         }
        //     });
        // }

        // fetchcarts();

        function fetchcarts() {
            $.ajax({
                url: "{{ url('fetch-carts') }}",
                method: "GET",
                data: {
                    id: {{ $id }}
        },
        success: function(response) {
            $("#cartItems").empty();

            // If no items, show empty state
            if (response.carts.length === 0) {
                var emptyState = $('<div>', {
                    class: 'empty-state'
                }).append(
                    $('<iconify-icon>', {
                        icon: 'mdi:cart-outline'
                    }),
                    $('<p>', {
                        text: 'No items in order'
                    })
                );
                $("#cartItems").append(emptyState);
                return;
            }

            $.each(response.carts, function (index, item) {
                // Create main order item container
                var orderItem = $("<div>", {
                    class: "order-item"
                });

                // Create item header (name and price)
                var itemHeader = $("<div>", {
                    class: "item-header"
                });

                var itemName = $("<div>", {
                    class: "item-name",
                    text: item.name
                });

                var itemPrice = $("<div>", {
                    class: "item-price",
                    text: "₨" + item.price
                });

                itemHeader.append(itemName, itemPrice);

                // Create item controls (quantity and delete)
                var itemControls = $("<div>", {
                    class: "item-controls"
                });

                // Quantity control container
                var quantityControl = $("<div>", {
                    class: "quantity-control"
                });

                // Decrease button
                var decreaseBtn = $("<button>", {
                    class: "qty-btn",
                    value: item.id,
                    onclick: "decreaseQuantity(this)",
                    type: "button"
                }).append($('<iconify-icon>', {
                    icon: 'mdi:minus'
                }));

                // Quantity value
                var qtyValue = $("<span>", {
                    class: "qty-value",
                    id: item.id,
                    text: item.quantity
                });

                // Increase button
                var increaseBtn = $("<button>", {
                    class: "qty-btn",
                    value: item.id,
                    onclick: "increaseQuantity(this)",
                    type: "button"
                }).append($('<iconify-icon>', {
                    icon: 'mdi:plus'
                }));

                quantityControl.append(decreaseBtn, qtyValue, increaseBtn);

                // Delete button
                var deleteBtn = $("<button>", {
                    class: "delete-btn",
                    value: item.id,
                    onclick: 'removecart(this)',
                    type: "button"
                }).append($('<iconify-icon>', {
                    icon: 'mdi:delete-outline'
                }));

                itemControls.append(quantityControl, deleteBtn);

                // Append all parts to order item
                orderItem.append(itemHeader, itemControls);

                // Append to cart
                $("#cartItems").append(orderItem);

                console.log("Added item: " + item.name);
            });

            console.log(response);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
           });
        }

        fetchcarts();

        function addtocart(productid, dealid) {
            var pid = productid.value;
            var did = dealid;
            var pinstruction = $("#additeminstruction").val();
            var dinstruction = dinstruction;
            // Make the AJAX request
            $.ajax({
                url: "{{ url('addtocart') }}",
                method: "GET",
                data: {
                    productid: pid,
                    dealid: did,
                    id: {{ $id }},
        pinstruction: pinstruction,
            dinstruction: dinstruction,
                },
        success: function(response) {
            // Handle the successful response
            console.log(response);

            fetchcarts();
            fetchtotal();
            $("#additeminstruction").val('');
            $('#additem').modal('hide');
            $("#dealiteminstruction").val('');
            
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.log(error);
        }
            });

        }

        function removecart(a) {
            var id = a.value;
            // Make the AJAX request
            $.ajax({
                url: "{{ url('removecart') }}",
                method: "GET",
                data: {
                    id: id,
                    tableid: {{ $id }}
                },
        success: function(response) {
            // Handle the successful response
            console.log(response);

            fetchcarts();
            fetchtotal();
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.log(error);
        }
            });
        }

        function increaseQuantity(a) {
            var id = a.value;
            $.ajax({
                url: "{{ url('increasequantity') }}",
                method: "GET",
                data: {
                    id: id,
                    tableid: {{ $id }}
                },
        success: function(response) {
            // Handle the successful response
            console.log(response);

            fetchcarts();
            fetchtotal();
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.log(error);
        }
            });

        }

        function decreaseQuantity(a) {
            var id = a.value;
            $.ajax({
                url: "{{ url('decreasequantity') }}",
                method: "GET",
                data: {
                    id: id,
                    tableid: {{ $id }}
                },
        success: function(response) {
            // Handle the successful response
            console.log(response);

            fetchcarts();
            fetchtotal();
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.log(error);
        }
            });
        }
    </script>
</body>

</html>