<!DOCTYPE html>
<html>
<body>
<h1>Edit device for: <i>{{ $masterResponse->name }}</i></h1>

<form action="{{ action('MasterResponseController@update', $masterResponse->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <input id="device_name" type="text" name="device_name" placeholder="Device Name">
    <br><br>
    <button type="submit">Submit</button>
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




