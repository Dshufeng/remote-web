<!DOCTYPE html>
<html>

<head>
    <title>远程桌面</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/guacamole.css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<div id="control">
    <div id="name">远程桌面</div>

    <img id="keyboard" class="control" src="/img/keyboard.svg" title="Send CTRL+ALT+DEL">
    <img id="fullscreen" class="control" src="/img/fullscreen.svg" title="Toggle fullscreen">
    <img id="info" class="control" src="/img/info.svg" title="Show information">
    <img id="disconnect" class="control" src="/img/close.svg" title="Close connection">
</div>

<div id="infos-window">
    <div id="infos-menubar">
        <img id="infos-close" src="/img/close.svg" title="Close">
    </div>
    <div id="infos-content">
        <h1>Connection Information</h1>
        <table>
            <tr>
                <th colspan="2">Remote server</th>
            </tr>
            <tr>
                <td><label for="hostname">Hostname:</label></td>
                <td><input id="hostname" type="text" placeholder="IP or hostname..."></td>
            </tr>
            <tr>
                <td><label for="port">Port:</label></td>
                <td><input id="port" type="text" placeholder="Port..."></td>
            </tr>
            <tr>
                <td><label for="protocol">Protocol: </label></td>
                <td><select id="protocol">
                        <option value="vnc" selected>VNC (default)</option>
                        <option value="rdp">RDP</option>
                        <option value="ssh">SSH</option>
                        <option value="telnet">Telnet</option>
                    </select></td>
            </tr>
            <tr>
                <td><label for="password">User:</label></td>
                <td><input id="user" type="text" placeholder="User..."></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input id="password" type="password" placeholder="Password..."></td>
            </tr>
        </table>

        <table>
            <tr>
                <th colspan="2">Guacamole Proxy</th>
            </tr>
            <tr>
                <td><label for="guacd-our">Use our proxy:</label></td>
                <td><input id="guacd-our" type="checkbox"><label for="guacd-our">&nbsp;yes I do</label></td>
            </tr>
            <tr>
                <td><label for="guacd-hostname">Hostname:</label></td>
                <td><input id="guacd-hostname" type="text" placeholder="IP or hostname..."></td>
            </tr>
            <tr>
                <td><label for="guacd-port">Port:</label></td>
                <td><input id="guacd-port" type="text" placeholder="Port..." value=""></td>
            </tr>
        </table>

        <table>
            <tr>
                <th colspan="2"></th>
            </tr>
            <tr>
                <td><label for="share">Share:</label></td>
                <td>
                    <input id="share" type="text" readonly value="avoca.do/#D4FDX2">
<!--                    <img id="copy" src="/static/img/copy.svg" title="Copy to clipboard">-->
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button id="connect">Connect</button>
                </td>
            </tr>
        </table>
    </div>
</div>

<div id="display"></div>

<div id="loading">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
<div id="loading-title">Establishing connection...</div>

<script type="text/javascript" src="/js/all.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/tunnel.js"></script>
<script>

</script>
</body>

</html>