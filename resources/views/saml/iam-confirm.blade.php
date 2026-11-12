<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
</head>
<body>

<p>Please wait...</p>

<script>

var url =
    "https://iam4.army.mil/IAM/singleAppConfirmLoginResponse.htm" +
    "?domainName={{ urlencode($username) }}" +
    "&appName={{ urlencode($appName) }}" +
    "&appRoleName={{ urlencode($role) }}";

fetch(url, {
    method: 'GET',
    mode: 'no-cors'
})
.then(function() {
    window.location.href = "{{ url('/admin/dashboard') }}";
})
.catch(function() {
    window.location.href = "{{ url('/admin/dashboard') }}";
});

setTimeout(function() {
    window.location.href = "{{ url('/admin/dashboard') }}";
}, 1500);

</script>

</body>
</html>