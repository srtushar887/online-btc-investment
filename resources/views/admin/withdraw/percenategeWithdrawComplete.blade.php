@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Percentage Withdraw
                </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Withdraw List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="alldep">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Amount</th>
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


    <div class="modal fade" id="userperwithvidewcom" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.per.with.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control username">
                            <input type="hidden" name="com_id" class="form-control comid">
                        </div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="text" class="form-control useremail" >
                        </div>
                        <div class="form-group">
                            <label>User Phone</label>
                            <input type="text" class="form-control userphone">
                        </div>
                        <div class="form-group">
                            <label>User Withdraw Address</label>
                            <input type="text" class="form-control userwithadress">
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control amount" >
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="0">select any</option>
                                <option value="1">Approved</option>
                                <option value="2">Reject</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>


        function viewuserperwithcom(id)
        {

            $.ajax({
                type : "POST",
                url : "{{route('get.single.perwith')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.comid').val(id);
                    $('.username').val(data.user.name);
                    $('.useremail').val(data.user.email);
                    $('.userphone').val(data.user.phone);
                    $('.userwithadress').val(data.user.with_wallet);
                    $('.amount').val(data.amount);
                }
            });
        };

        $(document).ready(function () {



            $('#alldep').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.users.percenatge.withdraw.complete') }}",
                columns: [
                    { data: 'user.name', name: 'user.name',class : 'text-center' },
                    { data: 'user.email', name: 'user.email',class : 'text-center' },
                    { data: 'amount', name: 'amount',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });



        });
    </script>

@endsection
