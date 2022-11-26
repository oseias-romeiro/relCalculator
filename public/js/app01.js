function clean() {
    window.location.replace("/clear.php");
}

function delete_msg() {
    msg = document.getElementById('msg_help');
    msg.remove();
}