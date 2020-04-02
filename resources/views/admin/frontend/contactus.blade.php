@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Contact</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Contact List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="alldep">
                        <thead>
                        <tr>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="adminviewcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.con.send.reply')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Name</label>
                            <input type="text" class="form-control name">
                            <input type="hidden" name="conod" class="form-control conid">
                        </div>
                        <div class="form-group">
                            <label> Email</label>
                            <input type="text" name="email" class="form-control email" >
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <textarea type="text" class="form-control subject"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea type="text" class="form-control usermessage"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Your Message</label>
                            <textarea type="text" class="form-control userwithadress"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>

        function adminviewcon(id)
        {

            $.ajax({
                type : "POST",
                url : "{{route('get.single.contact')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {

                    $('.conid').val(id);
                    $('.name').val(data.name);
                    $('.email').val(data.email);
                    $('.subject').val(data.subject);
                    $('.usermessage').val(data.message);
                }
            });
        };

        $(document).ready(function () {



            $('#alldep').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.users.contact') }}",
                columns: [
                    { data: 'name', name: 'name',class : 'text-center' },
                    { data: 'email', name: 'email',class : 'text-center' },
                    { data: 'created_at', name: 'created_at',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });



        });
    </script>

@endsection
