<div class="media post-write-comment">
    <form id="form-new-comment">
        <div class="pull-left">
            <a href="">
                <img class="media-object img-circle" src="">
            </a>
        </div>
        <div class="media-body">
            <textarea style="border-radius: 5px; border-color: aquamarine " class="form-control" rows="1" placeholder="Comment"></textarea>
            @if(!Auth::check())
            <div class="row">
                <div class="col-md-4">
                    <input id="name" style="border-radius: 5px; border-color: aquamarine" type="text" class="form-control" name="name" placeholder="Full Name" required/>
                </div>
                <div class="col-md-8">
                    <input id="email" style="border-radius: 5px; border-color: aquamarine" type="text" class="form-control" name="email" placeholder="Email Address" required/>
                </div>
            </div>
            @endif
        </div>
        <button type="button" class="btn btn-primary btn-xs pull-right" onclick="submitComment({{ $post->id }})">
            Submit
        </button>
    </form>
</div>