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
            // <?php \Cart::clear(); ?>
            // shoppingCart.clearCart();
            // location.href = '';
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

        .slip {
            display: flex;
            padding: 2px 0;
            align-items: center;
            width: 100%;
            height: 25px;
        }

        .slip1 {
            margin-bottom: 10px;
            border-bottom: 2px dotted;
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
    </style>
</head>

<body>
    <div class="container-fluid receipt">
        <h4 style="text-align:center">‏تموينات جوهرة</h4>
        <h5 style="text-align:center">جدة - حي طيبة</h5>
        <h6 class="heading">فاتورة ضريبية مبسطة<br>Simplified Tax Invoice</h6>
        <div class="slip">
            <p>Slips : </p>
            {{-- <p>B {{ $id }}</p> --}}
        </div>
        <div class="slip">
            <p>Staff : </p>
            <p>Ramiz</p>
        </div>
        <div class="slip slip1">
            <p>Date : </p>
            <p>{{ date('Y-m-d') }}</p>
        </div>

        <h5 class="text-center pt-3 pos">POS</h5>

        <table class="table">
            <tr>
                <th>البيان<br>Desciption</th>
                <th>الكمية<br>Qty</th>
                <th>وحدة القياس<br>UOM</th>
                <th>المبلغ<br>Amount</th>
            </tr>

            {{-- @foreach ($products as $product)
                <tr>


                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>Piece - قطعة</td>
                    <td>{{ $product->price * $product->quantity }}</td>

                </tr>
            @endforeach --}}
        </table>
        <table class="table">
            <tr>
                <td>VAT%</td>
                <td>Net.Amt</td>
                <td>VAT</td>
                <td>Amount</td>
            </tr>
            <tr>
                <td>15%</td>
                {{-- <td>{{ $product->totalAmount - ($product->totalAmount * 15) / 100 }}</td>
                <td>{{ ($product->totalAmount * 15) / 100 }}</td>
                <td>{{ $product->totalAmount }} </td> --}}
            </tr>
        </table>
        <p>VAT 311297252800003 الرقم الضريبي</p>

        <div class="anchor" style="justify-content: space-around">
            {{-- <img src="{{ $qrcode }}" alt="qr" height="150px" width="150px"> --}}
        </div>


        <div class="para">
            <p>وفر _آ كثر _ معنا<br>Thank You<br> Visit us again <br><small>Powered By: NZ
                    Developers</small><br>Contact: 054 611 4576</p>
        </div>
        {{-- <h1 style="text-align: center"><?php echo $a; ?></h1> --}}

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
