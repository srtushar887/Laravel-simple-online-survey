@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">User Pin Used</h4>

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
                                <th>Used Pin</th>
                                <th>Created Date</th>

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


        $(document).ready(function () {
            $('#survey').DataTable({
                "processing": true,
                "serverSide": true,
                "bSort": false,
                "ajax": {
                    "type": "GET",
                    "url": "{{route('admin.get.userusedpin')}}"
                },
                columns: [
                    { data: 'users.name', name: 'users.name',class: 'text-center', class : 'text-left' },
                    { data: 'used_pin_number', name: 'used_pin_number',class: 'text-center', class : 'text-left' },
                    { data: 'created_at', name: 'created_at',class: 'text-center', class : 'text-left' },
                ]
            });
        })
    </script>
@endsection
