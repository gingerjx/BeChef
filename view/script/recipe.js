$(() => {
    let commentButton = $('#add-comment');
    let commentContent = $('#add-comment-content');
    let normalColor =  commentContent.css('color');
    
    commentContent.click(() => commentContent.css('color', normalColor) );
    commentButton.click(() => {
        if (button.html() === 'Comment') {
            loggedComment();
        } else {
            unlogged();
        }
    });

    let likeIcon = $('#like-button');
    likeIcon.click(() => {
        toggleLike();
    });

    let saveIcon = $('#save-button');
    saveIcon.click(() => {
        toggleSave();
    });

    let commentIcon = $('#comment-button');
    commentIcon.click(() => {
        console.log("scroll");
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#recipe-comments").offset().top
        }, 1000);
    });
});

function loggedComment() {
    let content = $('#add-comment-content');
    if (content.val() === '') {
        content.val('Comment cannot be empty');
        content.css('color', '#CD6155');
        return;
    }

    let request = $.ajax({
        type: 'post',
        url: 'service/addComment.php',
        data: {"content": content.val()},
    });

    request.done((data) => {
        if (data == "unlogged")
            unlogged();
        else if (data == "fail") {
            content.val('Unable to add comment. Please try later or contact our administration');
            content.css('color', '#CD6155');
        }
        else {
            addComment(data);
        }
    })

    request.fail(() => {
        //TODO
    })

    $('#add-comment-content').val('');
}

function addComment(data) {
    let comment = JSON.parse(data)
    let commentElement = `  <div class="comment-title">
                                <b>${comment.fullname}</b>
                                <span>${comment.addDate}</span>
                            </div>
                            <p class="comment-content">${comment.content}</p>`;
    $('#add-comment-title').before(commentElement);

    let commentsNumber = $('#comments-number');
    let number = parseInt(commentsNumber.html()) + 1;
    commentsNumber.html(number);
}

function unlogged() {
    location.href = "login.php";
}

function toggleLike() {
    let request = $.ajax({
        type: 'post',
        url: 'service/checkRatings.php',
        data: {"action": "like"},
    });

    request.done((data) => {
        if (data == "liked") {
            $('#like-icon').attr('src', 'view/images/heart-red.svg');
            let likeNumber = $('#like-number');
            let number = parseInt(likeNumber.html()) + 1;
            likeNumber.html(number);
        }
        else {
            $('#like-icon').attr('src', 'view/images/heart.svg');
            let likeNumber = $('#like-number');
            let number = parseInt(likeNumber.html()) - 1;
            likeNumber.html(number);
        }
    })

    request.fail(() => {
        //TODO
    })
}

function toggleSave() {
    let request = $.ajax({
        type: 'post',
        url: 'service/checkRatings.php',
        data: {"action": "save"},
    });

    request.done((data) => {
        if (data == "saved") {
            $('#save-icon').attr('src', 'view/images/disk-yellow.svg');
            let saveNumber = $('#save-number');
            let number = parseInt(saveNumber.html()) + 1;
            saveNumber.html(number);
        }
        else {
            $('#save-icon').attr('src', 'view/images/disk.svg');
            let saveNumber = $('#save-number');
            let number = parseInt(saveNumber.html()) - 1;
            saveNumber.html(number);
        }
    })

    request.fail(() => {
        //TODO
    })
}

