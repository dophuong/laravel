/**
 * Created by phuong on 17/05/2017.
 */
var that = this;
$(document).ready(function () {
    var $commentForm = $('#commentForm');

    loadComment();

    that.replyComment = function (element, parentId, level) {
        if(level < 5){
            var $reply = element;
            $commentForm .find('#content').val('');
            if($('#user').val()){
                $commentForm .insertAfter($reply);
                $commentForm .find('#parentId').val(parentId);
                $commentForm .show();
            }
            else {
                alert('You have to login before comment !');
                window.location.href = '/login';
            }
        }else {
            alert('Cannot reply this comment !');
            return false;
        }

    }

    $commentForm.submit(function (e) {
        $commentForm.hide();
        validateForm();
        e.preventDefault();
        var formData = $commentForm.serialize();
        $.ajax({
            type:'POST',
            url:"/comment/add/" + $('#postId').val(),
            data:formData,
            success:function (msg) {
                $commentForm.hide().insertAfter($('#divComment'));
                loadComment();
            }
        });
        return false;
    });

    function validateForm() {
        var x =document.forms['commentForm']['content'].value;
        if(x == ''){
            alert('Please fill your comment !');
            return false;
        }
    }
    function loadComment() {
        $.ajax({
            type:'GET',
            url:"/comment/getComment/"+$('#postId').val(),
            success:function (data) {
                $('#divComment').empty();
                $('#divComment').append(treeLine(data));
                // showComment(data);
            }
        });
        return false;
    }

    function treeLine(data) {
        var tree = [];
        $.each(data, function (index, comment) {
            if(comment.parentId > 0){
                if(typeof tree[comment.parentId] !== 'object'){
                    tree[comment.parentId] = [];
                }
                tree[comment.parentId].push(comment);
            }
            else {
                if(typeof tree[0] !== 'object'){
                    tree[0] = [];
                }
                tree[0].push(comment);
            }
        });
        return forEachTree(tree,0,0);
    }

    function forEachTree(tree, commentParentId, level) {
        var html = '';
        $.each(tree[commentParentId],function (index, comment) {
            html += '<div class="comment">'.repeat(level);
            html += '<img src="/images/icon.png" width="30px"/>' +
                '<b>'+comment.author+'</b>' +
                '<small>'+comment.created_at+'</small>' +
                '<p>'+comment.content+'</p>' +
                '<input class="comment btn-link" onclick="replyComment(this, '+comment.id+','+level+')" value="Reply"/><br/><hr>';
            html += '</div>'.repeat(level);
            html += forEachTree(tree, comment.id,level + 1);
        });
        return html;
        // html += showCommentTree(comment);

    }

    function showCommentTree(comment) {
        html = '<img src="/images/icon.png" width="30px"/>' +
            '<b>'+comment.author+'</b>' +
            '<small>'+comment.created_at+'</small>' +
            '<p>'+comment.content+'</p>' +
            '<input class="comment btn-link" onclick="replyComment(this, '+comment.id+')" value="Reply"/><br/><hr>';
        return html;
    }

    function showComment(data) {
        var html = "";
        data.forEach(function (comment) {
            html = '<img src="/images/icon.png" width="30px"/>' +
                '<b>'+comment.author+'</b>' +
                '<small>'+comment.created_at+'</small>' +
                '<p>'+comment.content+'</p>' +
                '<button>Reply</button><br/>';
            $('#divComment').append(html);
        })
    }
})
