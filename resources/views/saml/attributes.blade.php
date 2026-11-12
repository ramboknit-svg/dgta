<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SAML Attributes</title>
   
<body class="p-4">
    <h3>SAML Attributes</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Attribute</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
        @foreach($attributes as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ is_array($value) ? implode(', ', $value) : $value }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">Dashboard</a>
</body>
</html>
