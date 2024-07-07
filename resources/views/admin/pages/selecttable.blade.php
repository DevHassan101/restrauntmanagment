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
    <style>
        body {
            color: black
        }

        .available {
            border: 1px solid black;
            padding: 10px;
            cursor: pointer;
            background-color: green;
        }

        .booked {
            border: 1px solid black;
            padding: 10px;
            background-color: red;
            cursor: pointer;
        }

        .alertt {
            display: none;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: 10px;
            width: 400px;
            text-align: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .border {
            border: 1px solid #FF4081 !important;
            text-align: left;
            padding: 3px
        }

        .btn-nz {
            border: 1px solid #FF4081;
            color: #FF4081;
        }

        .btn-nz:hover {
            background-color: #FF4081 !important;
            color: white !important;
        }
    </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <form action="{{ url('bookedtable') }}" method="post">
            @csrf
            <div id="confirmationAlert" class="alertt">
                <h3>Confirmation</h3>
                <p>Are you sure you want to proceed?</p>
                <h5 class="border">Floor: <span class="confirmfloor"></span></h5>
                <h5 class="border">Table Number: <span class="confirmtable"></span></h5>
                <h5 class="border">Capacity: <span class="confirmcapacity"></span></h5>
                <h5 class="border">Waiter Name: <span class="confirmwaiter"></span></h5>
                <input type="hidden" value="10" name="tableid">
                <button id="proceed" class="btn btn-nz" type="submit">Yes</button>
                <button id="cancel" class="btn btn-nz" type="button">No</button>
            </div>
        </form>
        <div class="row">
            @foreach ($tables as $table)
                @if ($table->status == true)
                    <div class="col-md-3 available">
                        <h4>Floor: <span class="floorname">{{ $table->floor }}</span></h4>
                        <h4>Table: <span class="tablename">{{ $table->table }}</span></h4>
                        <h4>Capacity: <span class="capacity">{{ $table->capacity }} Person</span></h4>
                        <h4>Waiter: <span class="waitername">{{ $table->waiter }}</span></h4>
                        <input type="hidden" value="{{ $table->id }}">
                    </div>
                @else
                    <div class="col-md-3 booked">
                        <h4>Floor: <span>{{ $table->floor }}</span></h4>
                        <h4 class="tablename">Table: <span>{{ $table->table }}</span></h4>
                        <h4>Capacity: <span>{{ $table->capacity }} Person</span></h4>
                        <h4>Waiter: <span>{{ $table->waiter }}</span></h4>
                        <input type="hidden" value="{{ $table->id }}">
                    </div>
                @endif
            @endforeach
        </div>
    </main>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.booked').click(function() {
                var tableid = $(this).find('input[type="hidden"]').val();
                window.location.href = "{{ url('pos/') }}" + '/' + tableid;
            });
            $('.available').click(function() {
                var tableid = $(this).find('input[type="hidden"]').val();
                window.location.href = "{{ url('pos/') }}" + '/' + tableid;
            });
        });
    </script>
</body>

</html>
