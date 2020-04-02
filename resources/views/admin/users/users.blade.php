@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">User List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="alldep">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Balance</th>
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


    <div class="modal fade" id="admindeleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this user ?
                            <input type="hidden" name="user_delete_id"  class="form-control deluserid">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>

        function admindeluser(id)
        {
            $('.deluserid').val(id)
        }

        $(document).ready(function () {



            $('#alldep').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.users') }}",
                columns: [
                    { data: 'name', name: 'name',class : 'text-center' },
                    { data: 'email', name: 'email',class : 'text-center' },
                    { data: 'balance', name: 'balance',class : 'text-center' },
                    { data: 'created_at', name: 'created_at',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });



        });
    </script>

@endsection
