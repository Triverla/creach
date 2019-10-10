<div class="comments__list">
    <div class="comments__item">
        <div class="comments__article">
            <div class="comment__content">
                <div class="comments__avatar">
                    <img class="img-responsive avatar" width="50" height="50" src="{{ asset($post->user->profile->avatar) }}" alt="Author">
                </div>
                <div class="comments__header">
                    <div class="comments__author">
                        @if($comment->name == NULL)
                    <a href="">{{$comment->getUsername()}}</a>
                        @else
                        <a href="">{{$comment->name }}</a>
                        @endif
                    </div>
                    <div class="comments__time">
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="comments__body">
                    <div class="reply">
                        {{ $comment->comment }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>