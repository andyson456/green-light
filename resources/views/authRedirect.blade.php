<!DOCTYPE html>
<html>

<body>

<script>
    var token = {!! $gitlabResponseBody !!}
        console.dir(token);
    localStorage.setItem("token", JSON.stringify(token));
    window.location.href="/";
</script>

</body>
</html>
