var guacdHostname = '192.168.1.194';
var guacdPort = '8031';
var token = localStorage.getItem('token');
if(token){
    display(token);
    $('#infos-window').hide();
}else{
    $('#infos-window').show();
}

$('#connect').click(function () {
    var hostname = $('#hostname').val();
    var port = $('#port').val();
    var protocol = $('#protocol').val();
    var user = $('#user').val();
    var password = $('#password').val();
    
    if($('#guacd-our').is(':checked')){
        guacdHostname = $('#guacd-hostname').val();
        guacdPort = $('#guacd-port').val();
        if(!guacdHostname || !guacdPort){
            alert('Guacamole Proxy 参数不正确,请重新输入!')
        }
    }

    if(hostname && port && protocol && password){
        $('#loading').show();
        var url = '/generate/token';
        $.post(
            url,
            {hostname:hostname,port:port,protocol:protocol,user:user,password:password},
            function (token) {
                display(token);
                localStorage.setItem('token',token);
            }
        );
    }else{
        alert('Remote server 参数不正确,请重新输入!');
    }
});
$('#disconnect').click(function () {
    if(!confirm('确定退出?')){
        return false;
    }
    localStorage.removeItem('token');
    window.location.reload();
});


function display(token) {
    var display = document.getElementById("display");
    var height = window.innerHeight-10;
    var width = window.innerWidth-10;
    var guac = new Guacamole.Client(
        new Guacamole.WebSocketTunnel("ws://"+ guacdHostname +":"+ guacdPort +"/")
    );

    guac.onerror = function (error) {
        alert('连接失败:( , 请重试');
        console.log(error);
        $('#loading').hide();
        return false;
    };

    guac.connect("token=" + token + "&width="+ width +"&height="+ height +"&dpi=100");
    // guac.connect("token=" + token + "&width=1024&height=768&dpi=100");

    display.appendChild(guac.getDisplay().getElement());

    window.onunload = function () {
        guac.disconnect();
    };

    var mouse = new Guacamole.Mouse(guac.getDisplay().getElement());

    mouse.onmousedown =
        mouse.onmouseup =
            mouse.onmousemove = function (mouseState) {
                guac.sendMouseState(mouseState);
            };

    var keyboard = new Guacamole.Keyboard(document);
    keyboard.onkeydown = function (keysym) {
        guac.sendKeyEvent(1, keysym);
    };
    keyboard.onkeyup = function (keysym) {
        guac.sendKeyEvent(0, keysym);
    };
    $('#loading').hide();
    $('#infos-window').hide();
}
