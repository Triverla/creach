<p class="text-muted">
    <small>
        @if($post->getCommentCount() > 0)
            @if($post->getCommentCount() > 1){{ $post->getCommentCount().' comments' }}@else{{ $post->getCommentCount().' comment' }}@endif
        @else
            <p class="text-center"><i class="fa fa-comment" aria-hidden="true"></i>No comments yet. Be the first to comment</p>
        @endif
    </small>
</p>
<hr>
@if($post->getCommentCount() > 2 && (empty(3) || 2 < 3))
    <a class="btn btn-link btn-block btn-xs" style="color: #4cc2c0" href="{{ url('/post/f/'.$post->slug) }}"><i class="fa fa-bars" aria-hidden="true"></i> Show all comments</a>
@endif