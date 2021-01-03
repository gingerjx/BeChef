$(() => {
    let button = $('#add-comment');
    let content = $('#add-comment-content');
    let normalColor =  content.css('color');
    
    content.click(() => content.css('color', normalColor) );

    button.click(() => {
        if (button.html() === 'Comment') {
            loggedComment();
        } else {
            unloggedComment();
        }
    });
});

function loggedComment() {
    let content = $('#add-comment-content');
    console.log("Logg");
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
            unloggedComment();
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
}

function unloggedComment() {
    location.href = "login.php";
}