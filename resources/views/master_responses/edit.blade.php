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

</body>
</html>




