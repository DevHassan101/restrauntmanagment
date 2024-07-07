<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style rel="stylesheet" media="print">
        body {
            color: black;
        }
    </style>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        window.onload = window.print();


        window.onafterprint = function() {
            location.href = '/';
        }

        function abc() {
            window.print();
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .receipt {
            width: 80mm;
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 2px dotted;
            padding: 5px 0;
        }

        .slips {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .slip {
            width: 48%;
            margin-bottom: 10px;
        }

        p {
            padding: 0;
            margin: 0
        }

        .slip1 {
            width: 100%;
            justify-content: space-between
        }


        .pos {
            border-bottom: 1px solid black;
        }

        .second_table {
            border-bottom: 1px dotted;
        }

        .anchor {
            display: flex;
            border-bottom: 2px dotted;
        }

        .anchor a {
            margin-right: 5px;
        }

        .para {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px dotted;
            font-weight: bold;
        }

        .last_anchor {
            font-size: 10px;
        }

        @media print {
            #back {
                display: none;
            }
        }

        .amountsection {
            display: flex;
            flex-direction: column;
        }

        .amountsection>div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px dotted #ccc;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }

        .headingg {
            font-weight: bold;
        }

        .value {
            margin-left: 10px;
        }

        .align-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container-fluid receipt">
        <h4 style="text-align:center">NZ - Restruant</h4>
        <h6 class="heading">Order Receipt</h6>
        <div class="slips">

            <div class="slip">
                <p>Order ID : {{ $id }}</p>
            </div>
            <div class="slip">
                <p>Staff : {{ $data->staff }}</p>
            </div>
            <div class="slip">
                <p>Floor : {{ $data->floor }}</p>
            </div>
            <div class="slip">
                <p>Table : {{ $data->table }}</p>
            </div>
            <div style="display: flex;">
                <p>Date :</p>
                <span class="align-right">{{ date('Y-m-d H:i:s') }}</span>
            </div>
        </div>

        <h5 class="text-center pt-3 pos">Order Items</h5>

        <table class="table">
            <tr>
                <th>البيان<br>Item</th>
                <th>الكمية<br>Qty</th>
                <th>المبلغ<br>Amount</th>
            </tr>

            @foreach ($products as $product)
                <tr>


                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td class="align-right">{{ $product->price * $product->quantity }}</td>

                </tr>
            @endforeach
            @foreach ($deals as $product)
                <tr>


                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td class="align-right">{{ $product->price * $product->quantity }}</td>

                </tr>
            @endforeach
            <tr>
                <td> Subtotal</td>
                <td>{{ $data->items }}</td>
                <td class="align-right">{{ $data->subtotal }}</td>
            </tr>
        </table>
        <div class="amountsection">
            <div>
                <p class="headingg">Tax:</p>
                <p class="value">{{ $data->tax }}</p>
            </div>
            <div>
                <p class="headingg">Discount:</p>
                <p class="value">{{ $data->discount }}</p>
            </div>
            <div>
                <p class="headingg">Total:</p>
                <p class="value">{{ $data->total }}</p>
            </div>
        </div>


        {{-- <p>VAT 311297252800003 الرقم الضريبي</p> --}}


        {{-- <div class="anchor" style="justify-content: space-around"> --}}
        {{-- <img src="{{ $qrcode }}" alt="qr" height="150px" width="150px"> --}}
        {{-- </div> --}}


        <div class="para">
            <p>وفر _آ كثر _ معنا<br>Thank You<br> Visit us again <br><small>Powered By: NZ
                    Developers</small><br>Contact: 054 611 4576</p>
        </div>
        <h1 style="text-align: center"><?php //echo $a;
        ?></h1>

        <div class="text-center">
            <button name="" id="back" onclick="abc()" class="btn btn-primary rounded-0 mt-5" href=""
                role="button"><i class="fa fa-backward"></i>Print</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
