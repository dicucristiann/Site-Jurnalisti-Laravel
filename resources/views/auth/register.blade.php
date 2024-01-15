<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <style>
        body { font: 14px sans-serif; }
        .wrapper { width: 360px; padding: 20px; margin: auto; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" value="{{ old('username') }}">
            <span class="invalid-feedback">{{ $errors->first('username') }}</span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
            <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}">
                <option value="" disabled selected>Select your option</option>
                <option value="journalist">Journalist</option>
                <option value="editor">Editor</option>
                <option value="reader">Reader</option>
            </select>
            <span class="invalid-feedback">{{ $errors->first('role') }}</span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-dark ml-2" value="Reset">
        </div>
        <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
    </form>
</div>
</body>
</html>
