@extends('layouts.frontend')

@section('content')


<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $post->title }}</h1>
    </div>
</div>


<div class="container">
    <div class="row medium-padding120">
        <main class="main" id="blog-{{ $post->id}}">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <h4 class="text-center"><a href="{{ url('/post/'.$post->slug) }}"><i class="fa fa-arrow-left"></i>Return to main post </a></h4>

                    
                </article>

                

                <div class="pagination-arrow">

                    @if($prev)
                    <a href="{{ route('post.single', ['slug' => $prev->slug ]) }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{ $prev->title }}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif

                    @if($next)
                    <a href="{{ route('post.single', ['slug' => $next->slug ]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ $next->title }}</p>
                        </div>
                    </a>
                    @endif

                </div>


                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                    <div class="comments-title">
                    <p class="text-muted">
    <small>
        @if($post->getCommentCount() > 0)
        <span class="text-center"><i class="fa fa-comment-o" aria-hidden="true"></i>&nbsp;@if($post->getCommentCount() > 1){{ $post->getCommentCount().' comments' }}@else{{ $post->getCommentCount().' comment' }}@endif</span>
        @else
            <p class="text-center"><i class="fa fa-comment" aria-hidden="true"></i>No comments yet. Be the first to comment</p>
        @endif
    </small>
</p>
                    </div>
                    <div class="post-comments">

                        @foreach($post->comments()->orderBY('id', 'DESC')->with('user')->get()->reverse() as $comment)

                        @include('includes.single_comment')


                        @endforeach

                    </div>


                    @include('includes.comment-form')



                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">

                            @foreach($post->tags as $tag)
                            <a href="{{ route('tag.single',['id'=>$tag->id]) }}" class="w-tags-item">{{$tag->tag}}</a>
                            @endforeach

                        </div>
                    </div>
                </aside>
            </div>




            <!-- End Sidebar-->

        </main>
    </div>
</div>
<!-- form-->




@endsection()