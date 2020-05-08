<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users List</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div>
        <div>
            <h3 class="text-central">Add new users</h3>
            <form action="{{ url('handle-form') }}" class="margin-central" method="POST">
                <div class="form-group">
                    {{ csrf_field() }}
                    <label>Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                    <p class="text-danger">{{ $errors->first('username') }}</p>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Fullname:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
                    <p class="text-danger">{{ $errors->first('fullname') }}</p>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="agree" name="agree" value="0">
                    <label class="form-check-label">
                        I agree to<a href="https://viblo.asia/terms" target="_blank" rel="noopener">
                        Viblo Terms of Service
                </a></label>
                </div>
                <button type="submit" class="btn btn-primary">ADD</button>
            </form>
        </div>
        <div>
            <h3 class="text-central">Users List</h3>
            <table class="table margin-central">
                <tr>
                    <th>User ID</th>
                    <th>User name</th>
                    <th>Full name</th>
                    <th>created at</th>
                    <th>updated at</th>
                </tr>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user-> id }}</th>
                    <th>{{ $user-> username }}</th>
                    <th>{{ $user-> fullname }}</th>
                    <th>{{ $user-> created_at }}</th>
                    <th>{{ $user-> updated_at }}</th>
                </tr>
            @endforeach
            <table>
        </div>
    </div>
</body>
</html>