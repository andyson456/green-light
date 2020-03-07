<!DOCTYPE html>
<html>
<body>
<h2>Delete User Device information</h2>

<form action="{{ action('WhoToAlertController@destroy')}}" method="POST">
    @csrf
    @method('DELETE')
    <h2>Are you sure you want to delete this field?</h2>
    <button type="submit">Yes</button>
    <button><a href="{{ url('who_to_alert/create') }}"></a>No</button>
</form>

</body>
</html>
