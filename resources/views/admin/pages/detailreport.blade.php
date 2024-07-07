@extends('admin.layouts.app')

@section('title', 'Home Page')
@section('subtitle', 'Detail Report')
@section('maintitle', 'Detail Report')

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
                <div class="col-md-4">
                    <h3>
                        Detail Reports
                    </h3>
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" id="dateInput" aria-describedby="helpId">
                </div>
                <div class="col-md-4 d-md-flex justify-content-md-end">
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
                var dateInputValue = $("#dateInput").val();

                if (dateInputValue === "") {
                    alert('Please Fill Date First.')
                } else {
                    $.ajax({
                        url: "{{ url('report/getdetail') }}", // Update with your route or endpoint
                        method: 'GET',
                        data: {
                            date: dateInputValue
                        },
                        success: function(response) {
                            // Update the content of the summaryReport div
                            var summaryReportDiv = $('#summaryReport');

                            // Create the table HTML dynamically using the response data
                            var tableHTML = '<table class="table">';
                            tableHTML +=
                                '<thead><tr><th>Order ID</th><th>Table</th><th>Payment Type</th><th>Discount</th><th>Tax</th><th>Subtotal</th><th>Total</th><th>Receive</th><th>Refund</th></tr></thead>';
                            tableHTML += '<tbody>';

                            // Iterate over the response data and append rows to the table
                            for (var i = 0; i < response.length; i++) {
                                var order = response[i];
                                tableHTML += '<tr>';
                                tableHTML += '<td>' + order.id + '</td>';
                                tableHTML += '<td>' + order.table + '</td>';
                                tableHTML += '<td>' + order.payment_type + '</td>';
                                tableHTML += '<td>' + order.discount + '</td>';
                                tableHTML += '<td>' + order.tax + '</td>';
                                tableHTML += '<td>' + order.subtotal + '</td>';
                                tableHTML += '<td>' + order.total + '</td>';
                                tableHTML += '<td>' + order.recieve + '</td>';
                                tableHTML += '<td>' + order.refund + '</td>';
                                tableHTML += '</tr>';
                            }

                            tableHTML += '</tbody></table>';

                            // Append the table HTML to a container element
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
                    window.location.href = "{{ url('print/detail') }}?date=" + dateValue;
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
