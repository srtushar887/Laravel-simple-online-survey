@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Blocked Users</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0" id="survey">

                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Balance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete.user')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this user ?
                            <input type="hidden" name="deleteuserid" class="delete_user_id">
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



    <div class="modal fade" id="blockuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Block User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.block.user')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control">
                                <option value="0">select any</option>
                                <option value="1">Block</option>
                                <option value="2">Un-Block</option>
                            </select>
                            <input type="hidden" name="delete_block_id" class="blockuserid">
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>


        function deleteuser(id) {
            $('.delete_user_id').val(id);
        }


        function userblock(id) {
            $('.blockuserid').val(id);
        }


        function viewprofile(id) {
            $('.viewrpfile').val(id);
        }


        $(document).ready(function () {
            $('#survey').DataTable({
                "processing": true,
                "serverSide": true,
                "bSort": false,
                "ajax": {
                    "type": "GET",
                    "url": "{{route('admin.get.blockeduser')}}"
                },
                columns: [
                    { data: 'name', name: 'name',class: 'text-center', class : 'text-left' },
                    { data: 'email', name: 'email',class: 'text-center', class : 'text-left' },
                    { data: 'balance', name: 'balance',class: 'text-center', class : 'text-left' },
                    {
                        data: 'account_type',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>In-Active</span>";
                            }else if (data == 2){
                                return "<span class='label label-info label-mini text-center'>Active</span>";
                            }else if (data == 3){
                                return "<span class='label label-info label-mini text-center'>Blocked</span>";
                            }
                            else {
                                return "<span class='label label-info label-mini text-center'>Not Set Yet</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class: 'text-left',},
                ]
            });
        })
    </script>
@endsection
