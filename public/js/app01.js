function clean() {
    window.location.replace("/clear.php");
}

function close_popup() {
    msg = document.getElementById('msg_help');
    msg.remove();
    document.cookie = "pop_up=false";
}

const pop_up = () => (document.cookie.includes("pop_up=false")) ? close_popup() : void(0)
