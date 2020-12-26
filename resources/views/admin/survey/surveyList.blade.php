@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Survey Question List</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.create.survey.question')}}"><button class="btn btn-success btn-sm">Create Question</button></a>
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
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="delsurvey" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.survey.question.delete')}}" method="post">
                    @csrf
                <div class="modal-body">
                   <div class="form-group">
                       are you sure to delete this question ?
                       <input type="hidden" class="deletsurvey" name="delete_survey">
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
                    "url": "{{route('admin.get.survey')}}"
                },
                columns: [
                    { data: 'question', name: 'question',class: 'text-center', class : 'text-left' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class: 'text-left',},
                ]
            });
        })
    </script>
@endsection
