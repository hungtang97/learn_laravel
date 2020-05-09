<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users List</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div>
        <div>
            <h3 class="text-central">Edit user</h3>
            @isset($user)
            @foreach($user as $user)
            <form action="{{ url('handle-edit-user/'.$user-> id) }}" class="margin-central" method="POST">
                @isset($message)
                    <h3 class="text-danger" id="message">{{ $message }}</h3>
                    <script>
                        setTimeout(function(){
                            document.getElementById("message").style.display = "none";
                        }, 3000);
                    </script>
                @endisset
                <div class="form-group">
                    {{ csrf_field() }}
                    <label>Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $user-> username }}">
                    <p class="text-danger">{{ $errors->first('username') }}</p>
                </div>
                <div class="form-group">
                    <label>Fullname:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user-> fullname }}">
                    <p class="text-danger">{{ $errors->first('fullname') }}</p>
                </div>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Do you want to update this user?')">Update</button>
            </form>
            @endforeach
            @endisset
        </div>
        @isset($users)
        <div>
            <h3 class="text-central">Users List</h3>
            <table class="table margin-central">
                <tr>
                    <th>User ID</th>
                    <th>User name</th>
                    <th>Full name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user-> id }}</th>
                    <th>{{ $user-> username }}</th>
                    <th>{{ $user-> fullname }}</th>
                    <th>{{ $user-> created_at }}</th>
                    <th>{{ $user-> updated_at }}</th>
                    <th>
                    <a href="{{ url('users/edit/'.$user-> id) }}"><i class="fa fa-edit" style="font-size:24px"></i></a>
                        <a href="{{ url('users/del/'.$user-> id) }}" onclick="return confirm('Do you want to Delete this user?')">
                            <i class="fa fa-trash-o" style="font-size:24px"></i>
                        </a>
                    </th>
                </tr>
            @endforeach
            <table>
        </div>
        @endisset
    </div>
</body>
</html>