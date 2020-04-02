@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Deposit History</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Deposit List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="alldep">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>TRX</th>
                            <th>Amount</th>
                            <th>Created Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready(function () {



            $('#alldep').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.deposit.hist') }}",
                columns: [
                    { data: 'user.name', name: 'user.name',class : 'text-center' },
                    { data: 'user.email', name: 'user.email',class : 'text-center' },
                    { data: 'trx', name: 'trx',class : 'text-center' },
                    { data: 'amount', name: 'amount',class : 'text-center' },
                    { data: 'created_at', name: 'created_at',class : 'text-center' },
                    {
                        data: 'status',
                        render: function(data) {
                            if(data == 0) {
                                return "<span class='label label-info label-mini text-center'>Pending</span>";
                            }else if (data == 1) {
                                return "<span class='label label-danger label-mini text-center'>Complete</span>";
                            }
                            else {
                                return "<span class='label label-danger label-mini text-center'>Not Set</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    ]
            });



        });
    </script>

@endsection
