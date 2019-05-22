<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>


    <div class="container">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                <form class="mt-5" action="database/login.php" method="post">
                    <div class="md-form mb-3">
                        <input class="form-control validate" type="text" name="user" placeholder="Username">
                    </div>
                    <div class="md-form mb-3">
                        <input class="form-control validate" type="password" name="pass" placeholder="Password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <input class="btn btn-primary" type="submit" value="ENTRA">
                    </div>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    
</body>

</html>