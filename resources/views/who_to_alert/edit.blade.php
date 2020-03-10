<!DOCTYPE html>
<html>

<body>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>

<h2>Edit Device information for: : <i>{{ $userDevices->users }}</i></h2>

<form action="{{ action('WhoToAlertController@update', $userDevices->id) }}" method="POST">
    @csrf
    @method('PATCH')
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
    <button id="submit_button">Submit</button>
</form>
{{--
<script>

    jQuery(document).ready(function($){

        console.log('jQuery is loaded.');

        $('#submit_button').click(function(event){
            event.preventDefault();
            console.log('Submitted.');
            var data = $('#editpost').serialize();
            confirm_edit(data);
        });
        function confirm_edit(value){
            console.log('Ajax function called.');
            $.ajax({
                url: "",
                type: 'POST',
                data: value,
                success: function(response){
                    console.log('Success');
                },
                error: function(xhr, errorCode, errorThrown){
                    console.log('Error');
                }
            })
        }
    });
</script>
--}}

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
