<!DOCTYPE html>
<html>

<body>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>

<h2>Edit Device information</h2>

<form action="{{ action('TicketController@update', $ticket->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <input id="idhidden" name="idhidden" type="hidden" value={{$id}}>
    <input id="tech" type="text" name="tech" placeholder="Tech Name">
    <br>
    <input id="ticket" type="text" name="ticket" placeholder="Ticket">
    <br>
    <input id="note" type="text" name="note" placeholder="Notes">
    <br>
    <br><br>
    <button id="submit_button">Submit</button>
</form>

<script>
    var accessTokenString = localStorage.getItem("token");
    var gitlabUrl = "http://gitlab.getfoundeugene.com/oauth/authorize?client_id=c68b38e2c326e748875783ba53dc64c4a366f48660dd94778d738591f159f25a&redirect_uri=https://tolocalhost.com/gitlab/callback&response_type=code&state=test&scope=read_user+openid";

    if (!accessTokenString || accessTokenString.length === 0)
    {
        window.location.href=gitlabUrl;
    }
    try{
        let fullResult = JSON.parse(accessTokenString);
        if (!fullResult.access_token || fullResult.access_token.length === 0)
        {
            window.location.href=gitlabUrl;
        }
    } catch {
        window.location.href=gitlabUrl;
    }
</script>
</body>
</html>
