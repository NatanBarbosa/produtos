<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

</head>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-3 border p-3" id="container">

                <h2>Faça login</h2>
                <form action="login/doLogin.php" method="post">
                    <label for="login" class="font-weight-bold">Email</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="digite vosso login" required autofocus>

                    <br>

                    <label for="senha" class="font-weight-bold">Senha</label> 
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="digite vossa senha" required>

                    <br>
                    <?if( isset($_GET['erro']) &&  $_GET['erro']=='invalido' ){ ?>
                        <span class="text-danger">Login invalido</span>
                    <?}?>
                    <button type="submit" class="btn btn-block btn-success">Logar!</button>


                </form>

            </div>
        </div>
    </div>

</body>

</html>