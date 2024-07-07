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
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: calc(100% - 40px);
            margin: 20px;
            text-align: center;
            table-layout: auto;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 10px;
        }
        .tabledate{
            border: none;
            text-align: left;
            padding: 0;
            font-size: 22px;
        }
    </style>
    <script>
        window.print();
    </script>
</head>

<body>
    <div class="container">
        <h1 class="main">
            NZ-Restraunt
        </h1>
        <h2 class="sub">Summary Report</h2>
        <table>
            <thead>
                <tr>
                    <th class="tabledate">
                        Date: {{$date}}
                    </th>
            
                </tr>
                <tr>
                    <th>Total Orders</th>
                    <th>Total Amount</th>
                    <th>Total Cash Amount</th>
                    <th>Total Card Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $totalorders }}</td>
                    <td>{{ $totalamount }}</td>
                    <td>{{ $totalcashamount }}</td>
                    <td>{{ $totalcardamount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
