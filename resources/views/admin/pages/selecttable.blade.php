<!doctype html>
<html lang="en">

<head>
    <title>Restaurant Tables</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap");
        body {
            background-color: white;
            font-family: "Outfit", sans-serif !important;
        }

        .tables-header {
            padding: 20px 24px;
        }

        .tables-header h2 {
            font-size: 36px;
            font-weight: 500;
            color: #f57088ff;
        }

        .table-card {
            background-color: white;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 2px 3px #ef90a170;
            border: 2px solid #ef90a2;
            position: relative;
            border-radius: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .table-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .table-card.available:hover {
            border-color: #4caf50;
        }

        .table-card.booked:hover {
            border-color: #f44336;
        }

        .card-header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-number {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
        }

        .status-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.available {
            background-color: #4caf50;
            color: white;
        }

        .status-badge.booked {
            background-color: #f44336;
            color: white;
        }

        .table-icon-container {
            width: 80px;
            height: 60px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .table-card.available .table-icon-container {
            background: #e8f5e9;
        }

        .table-card.booked .table-icon-container {
            background: #ffebee;
        }

        .table-icon {
            font-size: 36px;
        }

        .table-card.available .table-icon {
            color: #4caf50;
        }

        .table-card.booked .table-icon {
            color: #f44336;
        }

        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            color: #5f6368;
            font-size: 14px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            margin-right: 10px;
            font-size: 18px;
            color: #e20029ff;
            min-width: 20px;
        }

        .info-label {
            font-weight: 500;
            margin-right: 6px;
            color: #757575;
        }

        .info-value {
            font-weight: 600;
            color: #2c3e50;
        }

        .divider {
            height: 2px;
            background: #ef90a2;
            margin: 16px 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="tables-header">
            <h2 class="d-flex align-items-center">
                <iconify-icon icon="hugeicons:restaurant" width="40" height="40"  style="margin-right: 10px; color: #f57088ff;"></iconify-icon>
                Our Tables
            </h2>
        </div>

        <div class="row px-4">
            @foreach ($tables as $table)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="table-card {{ $table->status == true ? 'available' : 'booked' }}" 
                         onclick="navigateToPos({{ $table->id }})">
                        
                        <div class="card-header-section">
                            <div class="table-number">Table {{ $table->table }}</div>
                            <span class="status-badge {{ $table->status == true ? 'available' : 'booked' }}">
                                {{ $table->status == true ? 'Available' : 'Booked' }}
                            </span>
                        </div>

                        <div class="table-icon-container">
                            <iconify-icon class="table-icon" 
                                icon="{{ $table->status == true ? 'material-symbols:table-restaurant' : 'roentgen:table-and-two-chairs-roof-and-walls' }}">
                            </iconify-icon>
                        </div>

                        <div class="divider"></div>

                        <div class="info-row">
                            <iconify-icon class="info-icon" icon="mdi:floor-plan"></iconify-icon>
                            <span class="info-label">Floor:</span>
                            <span class="info-value">{{ $table->floor }}</span>
                        </div>

                        <div class="info-row">
                            <iconify-icon class="info-icon" icon="mdi:account-group"></iconify-icon>
                            <span class="info-label">Capacity:</span>
                            <span class="info-value">{{ $table->capacity }} Person</span>
                        </div>

                        <div class="info-row">
                            <iconify-icon class="info-icon" icon="mdi:account-tie"></iconify-icon>
                            <span class="info-label">Waiter:</span>
                            <span class="info-value">{{ $table->waiter }}</span>
                        </div>

                        <input type="hidden" value="{{ $table->id }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    <script>
        function navigateToPos(tableId) {
            window.location.href = "{{ url('pos/') }}" + '/' + tableId;
        }
    </script>
</body>

</html>