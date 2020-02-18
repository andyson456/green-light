<!DOCTYPE html>
<html>
<style>
    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<body>
<h1>Server Density Master Response</h1>
<a href="/get_device_alerts">Alerts</a>
<table class="table" style="width: 100%">
    <tr>
        <th style="border: 1px solid #dddddd; padding: 8px">ID:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Account ID:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Name:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Group:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Device:</th>
    </tr>
    @foreach($response as $res)
        <tr>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res['_id'])}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res['accountId'])}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res['name'])}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res['group'])}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                <a href="/master_responses/addDevice" class="btn btn-xs btn-info pull-right">Add Device</a>
            </td>
        </tr>

    @endforeach

</table>
</body>
</html>
