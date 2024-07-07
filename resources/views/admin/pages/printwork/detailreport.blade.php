<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .main {
            text-align: center;
            margin: 0;
            text-decoration: underline;
            font-size: 40px
        }

        .sub {
            text-align: center;
            margin: 0
        }

        .container {
            position: relative;
            height: 100vh;
            /* Set the container height to the full viewport height */
        }

        table {
            margin: 0 auto;
            width: 100%;
            max-width: 800px; /* Set a maximum width for the table */
            text-align: center;
            table-layout: fixed;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 10px;
            word-wrap: break-word; /* Allow cell content to wrap within the cell */
        }

        @media print {
            thead {
                display: table-header-group; /* Ensure the table header appears on each printed page */
            }

            tbody {
                display: table-row-group; /* Ensure the table rows appear on each printed page */
            }

            tr {
                page-break-inside: avoid; /* Avoid breaking table rows across printed pages */
            }

            .print-button {
                display: none; /* Hide the buttons when printing */
            }
        }
    </style>
</head>

<body onload="printPage()">
    <div class="container">
        <h1 class="main">
            NZ-Restraunt
        </h1>
        <h2 class="sub">Detials Report</h2>
        <h3 class="sub">
            From: {{ $date }} To: {{$date}}</h3>
        <table>
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Order ID</th>
                    <th>Table</th>
                    <th>Payment Type</th>
                    <th>Discount</th>
                    <th>Tax</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                    <th>Receive</th>
                    <th>Refund</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <th>{{$order->id}}</th>
                        <th>{{$order->table}}</th>
                        <th>{{$order->payment_type}}</th>
                        <th>{{$order->discount}}</th>
                        <th>{{$order->tax}}</th>
                        <th>{{$order->subtotal}}</th>
                        <th>{{$order->total}}</th>
                        <th>{{$order->recieve}}</th>
                        <th>{{$order->refund}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="text-align: center; margin-top: 20px;" class="print-button">
            <button onclick="printPage()">Print</button>
            <button onclick="goBack()">Go Back</button>
        </div>
    </div>

    <script>
        function printPage() {
            window.print();
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
