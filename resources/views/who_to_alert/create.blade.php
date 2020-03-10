<!DOCTYPE html>
<html>
<body>
<h2>Create User Device information</h2>

<form action="{{ action('WhoToAlertController@store')}}" method="POST">
    @csrf
    @method('POST')
    <input id="idhidden" name="idhidden" type="hidden" value={{$id}}>
    <input id="device_id" type="text" name="device_id" placeholder="Device Name">
    <br>
    <input id="users" type="text" name="users" placeholder="User">
    <br>
    <div class="form-group row">
        <div class="col-sm-8">
            <select class="form-control" id="category" name="category" required focus>
                <option value="" disabled selected>Please select a device category</option>
                <option value="Carrier Public Internet">Carrier Public Internet</option>
                <option value="Storage Backend">Storage Backend</option>
                <option value="Infrastructure">Infrastructure</option>
                <option value="Compute Cloud">Compute Cloud</option>
                <option value="Customer Instances">Customer Instances</option>
                <option value="Web hosting">Web hosting</option>
            </select>
        </div>
    </div>
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
