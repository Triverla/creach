function likePost(id) {

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/posts/like',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: { 'X-CSRF-TOKEN': CSRF },
        success: function(response) {
            if (response.code == 200) {
                if (response.type == 'like') {
                    $('#blog-' + id + ' .like-text span').html('');
                    $('#blog-' + id + ' .like-text i').removeClass('fa-heart-o').addClass('fa-heart');
                } else {
                    $('#blog-' + id + ' .like-text span').html('');
                    $('#blog-' + id + ' .like-text i').removeClass('fa-heart').addClass('fa-heart-o');
                }
                if (response.like_count > 1) {
                    $('#blog-' + id + ' .like-text .all_likes span').html(response.like_count + ' likes');
                } else {
                    $('#blog-' + id + ' .like-text .all_likes span').html(response.like_count + ' like');
                }
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        },
        error: function() {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
        }
    });
}

function submitComment(id) {

    var data = new FormData();
    data.append('id', id);
    var comment = $('#form-new-comment textarea').val();
    var name = $('#form-new-comment #name').val();
    var email = $('#form-new-comment #email').val();
    data.append('comment', comment);
    data.append('name', name);
    data.append('email', email);


    if (comment.trim() == '') {
        $('#errorMessageModal').modal('show');
        $('#errorMessageModal #errors').html('Please write comment!');
    } else {
        $.ajax({
            url: BASE_URL + '/posts/comment',
            type: "POST",
            timeout: 5000,
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': CSRF },
            success: function(response) {
                if (response.code == 200) {
                    $('#blog-' + id + ' #form-new-comment textarea').val("");
                    $('#blog-' + id + ' .comments .comments-title').html(response.comments_title);
                    $('#blog-' + id + ' .comments .post-comments').append(response.comment);
                } else {
                    $('#errorMessageModal').modal('show');
                    $('#errorMessageModal #errors').html('Something went wrong!');
                }
            },
            error: function() {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        });
    }
}


function removeComment(id, post_id) {

    BootstrapDialog.show({
        title: 'Comment Delete!',
        message: 'Are you sure to delete comment ?',
        buttons: [{
            label: "Yes, I'm Sure!",
            cssClass: 'btn-danger',
            action: function(dialog) {

                var data = new FormData();
                data.append('id', id);


                $.ajax({
                    url: BASE_URL + '/posts/comments/delete',
                    type: "POST",
                    timeout: 5000,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: { 'X-CSRF-TOKEN': CSRF },
                    success: function(response) {
                        dialog.close();
                        if (response.code == 200) {
                            $('#post-comment-' + id + ' .panel-body').html("<p><small>Comment deleted!</small></p>");
                            $('#panel-post-' + post_id + ' .comments-title').html(response.comments_title);
                        } else {
                            $('#errorMessageModal').modal('show');
                            $('#errorMessageModal #errors').html('Something went wrong!');
                        }
                    },
                    error: function() {
                        dialog.close();
                        $('#errorMessageModal').modal('show');
                        $('#errorMessageModal #errors').html('Something went wrong!');
                    }
                });
            }
        }, {
            label: 'No!',
            action: function(dialog) {
                dialog.close();
            }
        }]
    });
}



function showLikes(id) {

    var data = new FormData();
    data.append('id', id);

    $.ajax({
        url: BASE_URL + '/posts/likes',
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: { 'X-CSRF-TOKEN': CSRF },
        success: function(response) {
            if (response.code == 200) {
                $('#likeListModal .user_list').html(response.likes);
                $('#likeListModal').modal('show');
            } else {
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong!');
            }
        },
        error: function() {
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
        }
    });
}