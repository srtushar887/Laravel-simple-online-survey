@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Mobile Recharge</h4>

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
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Phone Number</th>
                                <th>Amount</th>
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



    <div class="modal fade" id="adminmobilerecharge" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.mobile.recharge.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Select Status</label>
                            <select class="form-control" name="status">
                                <option value="0">select any</option>
                                <option value="1">Confirm</option>
                                <option value="2">Rejected</option>
                            </select>
                            <input type="hidden" class="mobilerechargeid" name="mobile_recharge_id">
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>


        function mobilerechargeid(id) {
            $('.mobilerechargeid').val(id);
        }


        $(document).ready(function () {
            $('#survey').DataTable({
                "processing": true,
                "serverSide": true,
                "bSort": false,
                "ajax": {
                    "type": "GET",
                    "url": "{{route('admin.get.mobile.recharge')}}"
                },
                columns: [
                    { data: 'recharge_id', name: 'recharge_id',class: 'text-center', class : 'text-left' },
                    { data: 'users.name', name: 'users.name',class: 'text-center', class : 'text-left' },
                    { data: 'phone_number', name: 'phone_number',class: 'text-center', class : 'text-left' },
                    { data: 'amount', name: 'amount',class: 'text-center', class : 'text-left' },
                    {
                        data: 'status',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Pending</span>";
                            }else if (data == 2){
                                return "<span class='label label-info label-mini text-center'>Complete</span>";
                            }else if (data == 3){
                                return "<span class='label label-info label-mini text-center'>Rejected</span>";
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
