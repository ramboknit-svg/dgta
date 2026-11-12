<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
   
</head>
<body class="p-4 text-center">
    <h3>You have been logged out successfully.</h3>
    <p>Your application session and IAM SSO session have been cleared.</p>
    <a href="{{ route('saml.sso') }}" class="btn btn-primary">Login Again with IAM</a>
</body>
</html>
