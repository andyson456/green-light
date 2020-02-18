<!DOCTYPE html>
<html>
<body>
<h1>Add a device</h1>

<form class="form-horizontal" method="POST" action="{{ url('/addDevice') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="col-md-4 control-label">Device Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" min="1" max="20">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Add
            </button>
        </div>
    </div>
</form>
</body>
</html>
