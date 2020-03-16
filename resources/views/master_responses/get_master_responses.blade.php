<!DOCTYPE html>
<html>
<style>
    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<head>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
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
        <h1>Server Density Master Response</h1>
        <a href="{{ url('/') }}">Home</a><br>
        <a href="{{ url("device_alerts/get_device_alerts") }}">Alerts</a>
        <div id="dataTable">

        </div>
        <script>
            $(function() {
                var ResponseTickets = function(config) {
                    jsGrid.Field.call(this, config);
                };

                ResponseTickets.prototype = new jsGrid.Field(
                    {
                        itemTemplate: function(){
                            return `<a href="{{ url('tickets/index') }}">Tickets</a>`;
                        }

                    }
                );

                jsGrid.fields.responseTickets = ResponseTickets;



                $("#dataTable").jsGrid({
                    height: "90%",
                    width: "100%",

                    sorting: true,
                    paging: true,
                    autoload: true,

                    pageSize: 15,
                    pageButtonCount: 5,

                    data: {!! $masterResponses !!},

                    fields: [
                        { name: "master_response_id", type: "text", width: 150 },
                        { name: "name", type: "text", width: 200 },
                        { name: "group", type: "text", width: 200 },
                        { name: "device_name", type: "text", valueField: "Id", textField: "Name" },
                        { name: "tickets", type: "responseTickets", width: 80 },
                        { type: "control", editButton: true, deleteButton: false, modeSwitchButton: false }
                    ],

                    rowDoubleClick: function(args) {
                        window.location.href=`/master_responses/${args.item.id}/edit`;
                    },

                    rowClick: function(args) {
                        window.location.href=`/who_to_alert/${args.item.id}/index`;
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
