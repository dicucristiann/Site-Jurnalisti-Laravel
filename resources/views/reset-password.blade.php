{{-- resources/views/auth/reset-password.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    {{-- Include here your CSS files --}}
</head>
<body>
<div>
    <h2>Reset Password</h2>
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        {{-- Include here the form fields for password reset --}}
        <button type="submit">Reset Password</button>
    </form>
</div>
</body>
</html>
