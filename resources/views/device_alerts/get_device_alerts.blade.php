<!DOCTYPE html>
<html>
<style>
    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<body>
<h1>Server Density Alerts</h1>
<a href="{{ url('master_responses/get_master_responses') }}">Master Response</a>

<table class="table" style="width: 100%">
    <tr>
        <th style="border: 1px solid #dddddd; padding: 8px">ID:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Open:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Last Updated:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Master Response ID:</th>
        <th style="border: 1px solid #dddddd; padding: 8px">Alert Message:</th>
    </tr>
    @foreach($densityAlerts as $res)
        <tr>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res->_id)}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res->open)}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res->lastUpdated)}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res->master_response_id)}}
            </td>
            <td style="border: 1px solid #dddddd; padding: 8px">
                {{($res->device_alert)}}
            </td>
        </tr>

    @endforeach

</table>
</body>
</html>
