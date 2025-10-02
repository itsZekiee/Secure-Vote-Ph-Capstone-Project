<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Basic Laravel App</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        h1 { color: #333; }
    </style>
</head>
<body>
<h1>Welcome to the Basic Laravel Application!</h1>
<p>This is the content of your <code>index.blade.php</code> file.</p>

{{-- Example of a Blade directive --}}
@if (true)
    <p>This message is shown because the condition is true.</p>
@endif

{{-- You can pass variables from the controller like this --}}
{{-- <p>Hello, {{ $name ?? 'World' }}!</p> --}}
</body>
</html>
