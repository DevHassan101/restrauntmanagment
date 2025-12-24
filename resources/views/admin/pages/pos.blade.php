<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .prow {
            background-color: #fa9302 !important;
            margin: 1px;
            margin-top: 0px;
            color: white !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prow .col-md-3 {
            border: none
        }

        .row {
            max-height: 100%
        }

        .cat-col {
            background-color: #fa9302 !important;
            border: 3px solid #8f5300;
            padding: 20px;
             !important
        }

        .cat-col h5 {
            color: white;
            border: 1px solid #8f5300;
            border-radius: 5px;
            box-shadow: 0 0 10px rgb(143, 83, 0);
        }

        .cat-col button {
            background-color: transparent;
            border: none;
            display: block;
            width: 100%;
        }


        .cat-col h6 {
            color: white;
            border: 1px solid #8f5300;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgb(143, 83, 0);
            transition: all 0.3s;

        }

        .cat-col h4:hover {
            background-color: #18005ef1;
            cursor: pointer;
        }

        a {
            text-decoration: none
        }

        .product-col {
            border-top: 3px solid #8f5300;
            border-bottom: 3px solid #8f5300;
            padding: 25px !important;
            /* padding-left: 30px !important; */
        }

        .bill-col {
            background-color: #fa9302 !important;
            border: 3px solid #8f5300 !important;
            padding: 10px !important;
        }

        .bg-nz {
            background-color: #fa9302;
            border-bottom: 1px solid #8f5300;
        }

        .btn-outline-nz {
            background-color: transparent;
            color: #8f5300;
            border: 1px solid #8f5300;
        }

        .btn-outline-nz:hover {
            background-color: #8f5300 !important;
            color: white !important;
            border: 1px solid #8f5300 !important;
        }

        #heading {
            color: #8f5300;
        }


        #cartItems button {
            background-color: transparent;
            color: #8f5300;
            border: 1px solid #8f5300
        }

        .bill-col .col-md-2 {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
            padding: 3px
        }

        .bill-col .col-md-4 {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
            padding: 3px
        }

        .col-md-1 {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
            padding: 3px
        }

        .bill-col .col-md-4 input {
            border: 1px solid #8f5300;
            background-color: transparent;
            width: 60%;
            color: white;
            margin: 4px
        }

        .col-md-5 {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
            padding: 3px
        }

        .col-md-3 {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
            padding: 5px
        }

        .card-title {
            color: #8f5300 !important;
        }

        main {
            overflow: hidden;
            height: 90vh;
        }

        .mainrow {
            height: 100%;
        }


        .bill-col {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .upper-div {
            flex: 1;
            /* Make the upper div grow and fill the available space */
            overflow-y: auto;
            overflow-x: hidden;
        }

        .bottom-div {
            flex-shrink: 0;
            /* Prevent the bottom div from shrinking */
            position: sticky;
            bottom: 0;
            border: 1px solid #8f5300;
            padding: 10px;
            color: white;
            min-height: 100px;
            margin-top: 70px
        }

        .modal {
            background-color: #8f530085;
            color: #8f5300;
        }

        .modal-content {
            background-color: #fa9302;
            border: 1px solid #8f5300
        }

        .modal-input {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
        }

        .modal-textarea {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
        }

        .modal-select {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
        }

        .modal-select option {
            color: #000;
        }

        .modal-input:focus {
            border: 1px solid #8f5300;
            background-color: transparent;
            color: white;
        }

        .available {
            border: 1px solid #8f5300;
            background-color: transparent;
            cursor: pointer;
        }

        .notavailable {
            border: 1px solid #8f5300;
            background-color: black;
            cursor: no-drop
        }

        .tablerow {
            border: 1px solid #8f5300;
            height: 90%;
            overflow: scroll;
            overflow-x: hidden
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-nz">
            <div class="container">
                <a class="navbar-brand" href="#" id="heading">Restraunt - POS {{ session('tableid') }}</a>
                
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-current="page" id="heading">
                                Floor: {{ $data->floor }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-current="page" id="heading">
                                Table Name: {{ $data->id }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-current="page" id="heading">
                                Capacity: {{ $data->capacity }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-current="page" id="heading">
                                Waiter: {{ $data->waiter }}
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex my-2 my-lg-0">
                        <a href="{{ url('/') }}" class="btn btn-outline-nz my-2 my-sm-0" type="submit">Exit</a>
                    </div>
                    <div class="d-flex my-2 my-lg-0 mx-2">
                        <a href="{{ url('select/table') }}" class="btn btn-outline-nz my-2 my-sm-0" type="submit">Table
                            Select</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <div class="row border mainrow">
            <div class="col-md-5 bill-col">
                <div class="upper-div">
                    <div class="row text-white text-center mx-1">
                        <div class="col-md-4">Name</div>
                        <div class="col-md-2">Price</div>
                        <div class="col-md-4">Quantity</div>
                        <div class="col-md-2">
                            Delete
                        </div>
                    </div>
                    <div class="row text-white text-center mx-1" id="cartItems">

                    </div>

                </div>
                <div class="bottom-div">
                    <div class="mb-3">
                        <label for="" class="form-label">Special Instructions</label>
                        <textarea style="color: #000" class="form-control" name="" rows="3" data-page-id="page{{ $id }}"
                            id="page-textarea">{{ session('pages.page' . $id) }}</textarea>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <h4>Total Price: <span class="total"></span></h4>
                        </div>
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <h4>Total Items: <span class="totalitem"></span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <form action="{{ url('kot/print/' . $id) }}" method="post">
                                @csrf
                                <button class="btn btn-outline-nz" type="submit">
                                    PRINT KOT
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <button class="btn btn-outline-nz" data-bs-toggle="modal" data-bs-target="#completeorder">
                                Complete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 product-col">
                <div class="row" id="productlist">
                    @foreach ($products as $product)
                        <div class="row prow">
                            <div class="col-md-2">
                                @if ($product->image)
                                    <img class="card-img-top" src="{{ asset('productimage/' . $product->image) }}"
                                        alt="Title" height="50px" width="70px">
                                @else
                                    <img class="card-img-top" src="{{ asset('assets/img/noimage.jpg') }}"
                                        alt="Title" height="50px" width="70px">
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

                </div>
            </div>
            <div class="col-md-3 cat-col">
                <div class="row p-2">
                    <div class="col-md-6">

                        <h5 class="text-center text-white  p-2">CATEGORIES</h5>
                        @foreach ($categories as $category)
                            <button value="{{ $category->id }}" class="categorybutton">
                                <h6>{{ $category->name }}</h6>
                            </button>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-center text-white p-2">DEALS</h5>
                        @foreach ($deals as $deal)
                            <button value="{{ $deal->id }}" class="dealbutton">
                                <h6>{{ $deal->name }}</h6>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Dine In -->
        <div class="modal fade" id="completeorder" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Dine In</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ url('dinein/' . $id) }}" method="post">
                        @csrf

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">

                                    <h5>Subtotal: <span class="total"></span></h5>
                                </div>
                                <div class="col-md-6">

                                    <h5>Total Items: <span class="totalitem"></span></h5>
                                </div>
                                <div class="col-md-6">

                                    <h5>{{ $tax?->name }}: <span class="tax">{{ $tax?->percentage }} % (<span
                                                class="taxamountt"></span>)</span>
                                    </h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>
                                        After Tax: <span class="aftertax"> </span>
                                    </h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>
                                        Discount: <span id="discountamount"> </span>
                                    </h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>
                                        Total: <span id="afterdiscount"> </span>
                                    </h5>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Payment Type</label>
                                    <select class="form-select modal-select" name="payment_type" id="payment_type"
                                        required>
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Discount</label>
                                    <select class="form-select modal-select" name="discount" id="discount">
                                        <option value="">Select one</option>
                                        @foreach ($discounts as $discount)
                                            <option value="{{ $discount->id }}">
                                                {{ $discount->name . ' - ' . $discount->percentage . ' %' }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <small class="text-muted" id="discountamount"></small> --}}
                                </div>
                                <input type="hidden" class="form-control modal-input" name="tax" id="tax"
                                    aria-describedby="helpId" value="{{ $tax?->id }}"required>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Amount Recieve</label>
                                    <input type="number" class="form-control modal-input" name="recieve"
                                        id="recieve" aria-describedby="helpId" placeholder="" required>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-nz" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-nz">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <div class="modal fade" id="dealmodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Add Deal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-white text-center" id="dealitemtable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr class="">
                                            <td scope="row">R1C1</td>
                                            <td>R1C2</td>
                                            <td>R1C3</td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">Item</td>
                                            <td>Item</td>
                                            <td>Item</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Instruction</label>
                                <textarea class="modal-textarea form-control" name="dealiteminstruction" id="dealiteminstruction" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-nz" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-nz" id="dealsavebutton"
                            value="">Save</button>
                    </div>

                </div>

            </div>
        </div>



    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

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
                        $(".aftertax").html((({{ $tax->percentage }} / 100) * response.total) +
                            response.total);
                        $(".taxamountt").html((({{ $tax->percentage }} / 100) * response.total));
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

            function fetchcarts() {
                $.ajax({
                    url: "{{ url('fetch-carts') }}",
                    method: "GET",
                    data: {
                        id: {{ $id }}
                    },
                    success: function(response) {

                        $("#cartItems").empty();
                        $.each(response.carts, function(index, item) {
                            // Create the HTML elements with the desired styling
                            var col1 = $("<div>", {
                                class: "col-md-4",
                                text: item.name
                            });
                            var col2 = $("<div>", {
                                class: "col-md-2",
                                text: item.price
                            });
                            var col3 = $("<div>", {
                                class: "col-md-4"
                            });
                            var col4 = $("<div>", {
                                class: "col-md-2"
                            });
                            var increase = $("<button>", {
                                value: item.id,
                                onclick: "increaseQuantity(this)"
                            }).append($('<i>', {
                                class: 'fa fa-plus',
                                'aria-hidden': 'true'
                            }));

                            var decrease = $("<button>", {
                                value: item.id,
                                onclick: "decreaseQuantity(this)"
                            }).append($('<i>', {
                                class: 'fa fa-minus',
                                'aria-hidden': 'true'
                            }));



                            var input = $("<input>", {
                                type: "number",
                                name: "",
                                id: item.id,
                                value: item.quantity,
                                disabled: true

                            });
                            var deleteButton = $("<button>", {
                                class: "btn btn-danger btn-sm delete-button",
                                text: "Delete",
                                onclick: 'removecart(this)',
                                value: item.id
                            });


                            console.log("loop" + item.name);
                            // Append the elements to the div
                            $("#cartItems").append(col1, col2, col3.append(decrease), col3
                                .append(input), col3.append(
                                    increase), col4.append(deleteButton));
                        });
                        console.log(response)
                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.log(error);
                    }
                });
            }

            fetchcarts();



            $(".categorybutton").click(function() {
                var categoryid = $(this).val();
                $.ajax({
                    url: "{{ url('fetch-products') }}",
                    method: "GET",
                    data: {
                        categoryid: categoryid
                    }, // Send the button value to the Laravel route
                    success: function(response) {
                        // Extract the HTML from the JSON response
                        var html = response.html;

                        // Add the HTML to your target div
                        $("#productlist").html(html);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.log(error);
                    }
                });
            });
            $(".dealbutton").click(function() {
                // $('#dealmodal').modal('show');
                var dealid = $(this).val();

                $.ajax({
                    url: "{{ url('fetch-dealitems') }}",
                    method: "GET",
                    data: {
                        dealid: dealid
                    }, // Send the button value to the Laravel route
                    success: function(response) {
                        // Extract the HTML from the JSON response
                        var html = response.html;

                        // Add the HTML to your target div
                        $("#productlist").html(html);
                        addtocart(0, dealid)
                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.log(error);
                    }
                });
            });
            $("#discount").change(function() {
                var discountid = $(this).val();
                $.ajax({
                    url: "{{ url('fetch-discount') }}",
                    method: "GET",
                    data: {
                        discountid: discountid,
                        tableid: {{ $id }}
                    }, // Send the button value to the Laravel route
                    success: function(response) {
                        $("#discountamount").html(response);
                        var afterdiscount = parseFloat($(".aftertax").html()) - response;
                        $("#afterdiscount").html(afterdiscount);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.log(error);
                    }
                });
            });


            var textarea = document.getElementById('page-textarea');
            textarea.addEventListener('input', function() {
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
                    success: function(response) {
                        // Handle the success response if needed
                        console.log(response)
                        // alert({{ session('pages.' . $id) }})
                    },
                    error: function(xhr, status, error) {
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
                    $(".aftertax").html((({{ $tax->percentage }} / 100) * response.total) + response.total);
                    $(".taxamountt").html((({{ $tax->percentage }} / 100) * response.total));
                    console.log("total" + response.total)
                    $(".totalitem").html(response.totalitem);
                },
                error: function(xhr, status, error) {
                    // Handle the error here
                    console.log(error);
                }
            });
        }


        function fetchcarts() {
            $.ajax({
                url: "{{ url('fetch-carts') }}",
                method: "GET",
                data: {
                    id: {{ $id }}
                },
                success: function(response) {

                    $("#cartItems").empty();
                    $.each(response.carts, function(index, item) {
                        // Create the HTML elements with the desired styling
                        var col1 = $("<div>", {
                            class: "col-md-4",
                            text: item.name
                        });
                        var col2 = $("<div>", {
                            class: "col-md-2",
                            text: item.price
                        });
                        var col3 = $("<div>", {
                            class: "col-md-4"
                        });

                        var col4 = $("<div>", {
                            class: "col-md-2"
                        });
                        var input = $("<input>", {
                            type: "number",
                            name: "",
                            id: item.id,
                            value: item.quantity,
                            disabled: true
                        });
                        var deleteButton = $("<button>", {
                            class: "btn btn-danger btn-sm delete-button",
                            text: "Delete",
                            onclick: 'removecart(this)',
                            value: item.id
                        });

                        var increase = $("<button>", {
                            value: item.id,
                            onclick: "increaseQuantity(this)"
                        }).append($('<i>', {
                            class: 'fa fa-plus',
                            'aria-hidden': 'true'
                        }));

                        var decrease = $("<button>", {
                            value: item.id,
                            onclick: "decreaseQuantity(this)"
                        }).append($('<i>', {
                            class: 'fa fa-minus',
                            'aria-hidden': 'true'
                        }));
                        console.log("loop" + item.name);
                        // Append the elements to the div
                        $("#cartItems").append(col1, col2, col3.append(decrease), col3.append(input),
                            col3.append(increase), col4.append(
                                deleteButton));
                    });

                    console.log(response)
                },
                error: function(xhr, status, error) {
                    // Handle the error here
                    console.log(error);
                }
            });
        }

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
                    $('#dealmodal').modal('hide');
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
