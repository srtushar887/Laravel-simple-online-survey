@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Survey Question Create</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.survey.question.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Post Title</label>
                                    <input type="text" name="title" class="form-control">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Post URL Link</label>
                                    <input type="text" name="url" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Post Image (if have)</label>
                                    <input type="file" name="image" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Description</label>
                                    <textarea type="text" cols="5" rows="5" class="form-control" name="question" ></textarea>

                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection



