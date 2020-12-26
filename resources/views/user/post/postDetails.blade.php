@extends('layouts.user')
@section('user')
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="col-lg-12 col-md-12">
            <div class="blog-card padding-card box shadow-sm rounded bg-white mb-3 border-0">
                <img class="card-img-top" src="{{asset($post_details->image)}}" style="height: 500px;" alt="Card image cap">
                <div class="card-body">
                    <?php
                        $comment_count = \App\Models\post_comment::where('post_id',$post_details->id)->count();
                    ?>
                    <span class="badge badge-success">House/Villa</span>
                    <h2>{{$post_details->title}}</h2>
                    <h6 class="mb-3"><i class="feather-calendar"></i> {{$post_details->created_at}} /
                    @if ($comment_count <= 1)
                            {{$comment_count}} Comment
                        @else
                            {{$comment_count}} Comments
                    @endif
                    </h6>
                    <p>
                        {!! $post_details->question !!}
                    </p>
                   </div>
                <div class="card-footer border-0">
                    <div class="footer-social"><span>3</span> Like &nbsp;
                        <button class="mr-3 text-secondary btn btn-success btn-sm" style="background-color: white"><i class="feather-heart text-danger "></i> LIKE THIS POST</button>
                    </div>
                </div>
            </div>

            <div class="padding-card box shadow-sm rounded bg-white mb-3 border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4">Leave a Comment</h5>
                    <form name="sentMessage" action="{{route('user.post.comment.save')}}" method="post">
                        @csrf
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Comment <span class="text-danger">*</span></label>
                                <textarea rows="10" cols="100" class="form-control" name="comment"></textarea>
                                <input type="hidden" name="post_id_comment" value="{{$post_details->id}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                </div>
            </div>

            <div class="padding-card reviews-card box shadow-sm rounded bg-white mb-3 border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4">

                        @if ($comment_count <= 1)
                            {{$comment_count}} Comment
                        @else
                            {{$comment_count}} Comments
                        @endif
                    </h5>
                    @foreach($post_cmments as $postcomment)
                        <?php
                            $user = \App\Models\User::where('id',$postcomment->user_id)->first();
                        ?>
                    <div class="media mb-4">
                        @if (!empty($user->profile_image) && file_exists($user->profile_image))
                            <img class="d-flex mr-3 rounded" src="{{asset($user->profile_image)}}" alt="">
                        @else
                            <img class="d-flex mr-3 rounded" src="https://www.slj.com/webfiles/1604461841106/images/default-user.png" alt="">
                        @endif

                        <div class="media-body">
                            <h5 class="mt-0">{{$user->name}} <small>{{$postcomment->created_at}}</small></h5>
                            <p>{!! $postcomment->comment !!}</p>
                        </div>
                    </div>
                    @endforeach

                    {{$post_cmments->links()}}

                </div>
            </div>

        </div>
    </main>
    @include('user.include.leftbar')
    @include('user.include.rightbar')
@endsection
