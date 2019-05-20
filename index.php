<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <title>Compare databases</title>
</head>
<body>
<div class="container pt-5">
    <div class="row">
        <div class="col">
            <h3>База данных 1</h3>
            <form method="post" action="controllers/register.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Host:</label>
                    <input type="text" class="form-control" name="host-1" placeholder="localhost">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Database:</label>
                    <input type="text" class="form-control" name="database-1" placeholder="zaymer">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">User:</label>
                    <input type="text" class="form-control" name="user-1" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password:</label>
                    <input type="password" class="form-control" name="password-1" placeholder="password">
                </div>
        </div>
        <div class="col">
            <h3>База данных 2</h3>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Host:</label>
                    <input type="text" class="form-control" name="host-2" placeholder="localhost">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Database:</label>
                    <input type="text" class="form-control" name="database-2" placeholder="zaymer">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">User:</label>
                    <input type="text" class="form-control" name="user-2" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password:</label>
                    <input type="password" class="form-control" name="password-2" placeholder="password">
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Далее</button>
        </form>
    </div>
</div>
</div>
</body>
</html>