<html>
<head>
	<title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
 
<body>
    @if(session()->has('loginError'))
    <div class="col-md-6">
    <div class="alert alert-danger alert-dismissibled fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    @endif

    <div class="container col-md-6">
        <div class="row align-items-center">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2><b>Login</b></h2>
                        </div>
                        <div class="col-sm-2">
                            <a href="/register" class="btn btn-primary" data-toggle="modal"><span>Register</span></a>						
                        </div>
                    </div>
                    <div class="row">
                        <form action="/login" method="post">
                        @csrf
                        <table class="table table-striped-columns table-bordered text-center">
                            <tr> 
                                <td>Username</td>
                                <td><input type="text" name="username" required></td>
                            </tr>
                            <tr> 
                                <td>Password</td>
                                <td><input type="password" name="password" required></td>
                            </tr>
                            <tr> 
                                <td></td>
                                <td><input type="submit" name="Submit" value="Login"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>