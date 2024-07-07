@extends('admin.layouts.app')

@section('title', 'Home Page')
@section('subtitle', '')
@section('maintitle', '')

@section('content')
    <div class="card">
        <div class="card-header">
            @if (session('success'))
                <div id="alert" class="alert alert-success">
                    <strong>Success: </strong>
                    {{ session('success') }}
                </div>
            @elseif (session('failed'))
                <div id="alert" class="alert alert-danger">
                    <strong>Failed: </strong>
                    {{ session('failed') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-3">
                    <h3>
                        Summary Reports
                    </h3>
                </div>
                <div class="col-md-6 d-flex">
                    <label for="">Start Date</label>
                    <input type="date" class="form-control mx-1 w-auto" id="dateInputStart" aria-describedby="helpId">
                    <label for="">End Date</label>
                    <input type="date" class="form-control mx-1 w-auto" id="dateInputEnd" aria-describedby="helpId">
                </div>
                <div class="col-md-3 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-primary mx-2" id="showbutton">Show</button>
                    <button type="button" class="btn btn-primary mx-2" id="printbutton">Print</button>
                    <button type="button" class="btn btn-primary mx-2" id="exportbutton">Export</button>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <div id="summaryReport">

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#showbutton").click(function(e) {
                var dateInputValueStart = $("#dateInputStart").val();
                var dateInputValueEnd = $("#dateInputEnd").val();

                if (dateInputValueStart === "") {
                    alert('Please Fill Date First.')
                } else {
                    $.ajax({
                        url: "{{ url('report/getsummary') }}", // Update with your route or endpoint
                        method: 'GET',
                        data: {
                            startdate: dateInputValueStart,
                            enddate: dateInputValueEnd
                        },
                        success: function(response) {
                            // Create the table HTML dynamically using the response data
                            var tableHTML = '<table class="table">';
                            tableHTML +=
                                '<thead><tr><th>Date</th><th>Total Orders</th><th>Total Amount</th><th>Total Cash Amount</th><th>Total Card Amount</th></tr></thead>';
                            tableHTML += '<tbody>';

                            // Iterate over the response data and append rows to the table
                            for (var i = 0; i < response.length; i++) {
                                var summary = response[i];
                                tableHTML += '<tr>';
                                tableHTML += '<td>' + summary.order_date + '</td>';
                                tableHTML += '<td>' + summary.total_orders + '</td>';
                                tableHTML += '<td>' + summary.total_amount + '</td>';
                                tableHTML += '<td>' + summary.total_cash_amount + '</td>';
                                tableHTML += '<td>' + summary.total_card_amount + '</td>';
                                tableHTML += '</tr>';
                            }

                            tableHTML += '</tbody></table>';

                            // Update the content of the summaryReport div with the table HTML
                            $('#summaryReport').html(tableHTML);
                            console.log(response);
                        },

                        error: function() {
                            console.log('Error retrieving summary report');
                        }
                    });
                }
            });
            $('#printbutton').click(function(e) {
                e.preventDefault(); // Prevent default anchor tag behavior

                var dateValue = $('#dateInput').val();
                if (dateValue === '') {
                    alert('Please Fill Date First.')
                } else {
                    window.location.href = "{{ url('print/summary') }}?date=" + dateValue;
                }
            });
            $('#exportbutton').click(function(e) {
                e.preventDefault(); // Prevent default anchor tag behavior

                var dateValue = $('#dateInput').val();
                if (dateValue === '') {
                    alert('Please Fill Date First.')
                } else {
                    window.location.href = "{{ url('export/summary') }}?date=" + dateValue;
                }
            });
        });
    </script>
@endsection
