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
<h1>User Devices</h1>
<a href="{{ url('/') }}">Home</a><br>
<a href="{{ url('master_responses/get_master_responses') }}">Master Response</a><br><br>
<a href="{{ url("who_to_alert/{$responseID}/create") }}">Create device information</a>

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

            data: {!! $userDevices !!},

            fields: [
                { name: "device_id", type: "text", width: 150 },
                { name: "users", type: "text", width: 100 },
                { name: "category", type: "text", width: 100 },
                { type: "control", editButton: true, deleteButton: false, modeSwitchButton: false },
            ],

            rowClick: function(args) {
                window.location.href=`/who_to_alert/${args.item.id}/edit`;
            }
        });

    });
</script>
</body>
</html>
