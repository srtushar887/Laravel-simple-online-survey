@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Active Users</h4>

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

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>


        function surveydelete(id) {
            $('.deletsurvey').val(id);
        }


        $(document).ready(function () {
            $('#survey').DataTable({
                "processing": true,
                "serverSide": true,
                "bSort": false,
                "ajax": {
                    "type": "GET",
                    "url": "{{route('admin.get.activeuser')}}"
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
