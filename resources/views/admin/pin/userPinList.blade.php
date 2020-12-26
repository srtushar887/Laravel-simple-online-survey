@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">User Pin</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.create.pin')}}">

                        <button class="btn btn-success btn-sm">Create New Pin</button>
                    </a>
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
                                <th>User Pin</th>
                                <th>Pin Status</th>
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
                    "url": "{{route('admin.get.userpin')}}"
                },
                columns: [
                    { data: 'user.name', name: 'user.name',class: 'text-center', class : 'text-left' },
                    { data: 'user_pin', name: 'user_pin',class: 'text-center', class : 'text-left' },
                    {
                        data: 'status',
                        render: function(data) {
                            if(data == 1) {
                                return "<span class='label label-info label-mini text-center'>Un-Unsed</span>";
                            }else if (data == 2){
                                return "<span class='label label-info label-mini text-center'>Used</span>";
                            }
                            else {
                                return "<span class='label label-info label-mini text-center'>Not Set Yet</span>";
                            }

                        },
                        defaultContent: '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0okZSQTV10ebVN9GwLfr45wbCB9tyUK_oFjmRrP9Uo000e9sU" alt="" img style="width:100%; height:100px">'
                    },
                ]
            });
        })
    </script>
@endsection
