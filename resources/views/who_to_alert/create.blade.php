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

</body>
</html>
