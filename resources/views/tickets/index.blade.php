<!DOCTYPE html>
<html>
<head>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous">
    </script>

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

</head>
<body>
<h1>Master Response Tickets</h1>
<a href="{{ url('/') }}">Home</a><br>
<a href="{{ url('master_responses/get_master_responses') }}">Master Response</a><br><br>

<div id="dataTable">
</div>

<script>
    $(function() {
        $("#dataTable").jsGrid({
            height: "90%",
            width: "100%",

            editing: true,
            sorting: true,
            autoload: true,

            pageSize: 15,
            pageButtonCount: 5,

            data: {!! $userTickets !!},

            fields: [
                { name: "tech", type: "text", width: 150 },
                { name: "ticket", type: "text", width: 100 },
                { name: "note", type: "text", width: 100 },
                { name: "category", type: "text", width: 100 },
                { type: "control", editButton: true, deleteButton: false, modeSwitchButton: false },
            ],

            rowClick: function(args) {
                window.location.href=`/tickets/${args.item.id}/edit`;
            }
        });

    });
</script>

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
