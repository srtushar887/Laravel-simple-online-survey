<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    <div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">

        <div class="border-top p-3 d-flex align-items-center">
            <div class="mr-auto"><a href="#" class="text-link small"><i class="fas fa-pen-alt"></i> Need to create a new post ?</a></div>
            <div class="flex-shrink-1">
                <a href="{{route('user.create.post')}}">
                    <button type="button" class="btn btn-primary btn-sm">Create Post</button>
                </a>
            </div>
        </div>
    </div>



    @foreach($posts as $post)
    <div class="box mb-3 shadow-sm border rounded bg-white osahan-post postdiv">
        <div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
            <div class="dropdown-list-image mr-3">
                @if ($post->user_type == 1)
                    <?php
                        $admin = \App\Models\Admin::where('id',$post->user_id)->first();
                    ?>
                    @if (!empty($admin->profile_image) && file_exists($admin->profile_image))
                            <img class="rounded-circle" src="{{asset($admin->profile_image)}}" alt="">
                        @else
                            <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc4gAuboBQ2Y-6kl84wtIoK8e18cFsmxvIag&usqp=CAU" alt="">
                    @endif
                @else
                    <?php
                    $user = \App\Models\User::where('id',$post->user_id)->first();
                    ?>
                    @if (!empty($user->profile_image) && file_exists($user->profile_image))
                        <img class="rounded-circle" src="{{asset($user->profile_image)}}" alt="">
                    @else
                        <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc4gAuboBQ2Y-6kl84wtIoK8e18cFsmxvIag&usqp=CAU" alt="">
                    @endif
                @endif

            </div>
            <div class="font-weight-bold">
                @if ($post->user_type == 1)
                    <?php
                        $admin = \App\Models\Admin::where('id',$post->user_id)->first();
                    ?>
                    <div class="text-truncate">{{$admin->name}}</div>
                @else
                    <?php
                    $user = \App\Models\User::where('id',$post->user_id)->first();
                    ?>
                    <div class="text-truncate">{{$user->name}}</div>
                @endif

            </div>
            <span class="ml-auto small">{{$post->created_at->diffforhumans()}}</span>
        </div>
        <div class="p-3 border-bottom osahan-post-body">
            <div class="font-weight-bold">
                <div class="small text-gray-500">{{$post->title}}</div>
                <div class="small text-gray-500">
                    <a href="{!! $post->url !!}" target="_blank">{{$post->url}}</a>
                </div>
            </div>
            <p>{!! $post->question !!}</p>
            @if (!empty($post->image) && file_exists($post->image))
                <img src="{{asset($post->image)}}" style="width: 629px;height: 474px" class="img-fluid" alt="Responsive image">
            @endif

        </div>
        <div class="p-3 border-bottom osahan-post-footer">
            <?php
                $post_like_count = \App\Models\post_like::where('post_id',$post->id)->count();
            ?>
            <button class="mr-3 text-secondary btn btn-success btn-sm" style="background-color: white"><i class="feather-heart text-danger "></i>
                {{$post_like_count}}</button>

                <?php
                $comment_count = \App\Models\post_comment::where('post_id',$post->id)->count();
                ?>

            <button class="mr-3 text-secondary btn btn-success btn-sm" style="background-color: white"><i class="feather-message-square"></i>
                {{$comment_count}}</button>
        </div>
        <div class="p-3">
            <a href="{{route('user.post.details',$post->id)}}">
                <button type="button" class="btn btn-outline-primary btn-sm mr-1">View Details</button>
            </a>
        </div>
    </div>
    @endforeach
    {{$posts->links()}}
</main>
