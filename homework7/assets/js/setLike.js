
function setLike(user_id, post_id) {


    const url = "../../actions/likeAction.php"
    let xhr = new XMLHttpRequest()
    xhr.open('POST', url, true)
    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
    xhr.send(JSON.stringify({ user_id, post_id }));
}