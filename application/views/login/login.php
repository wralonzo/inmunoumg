<html>

<head>
    <title>Login Form Using Materialize Css</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
            background: #ddd;
        }

        .btn {
            margin-top: 10px;

        }

        .container {
            margin: 100px auto;
            width: 35%;

        }

        @media(max-width: 952px) {
            .container {
                width: 60%;
            }
        }

        @media(max-width: 475px) {
            .container {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row card hoverable">
            <div class="card-content ">
                <h4 class="center blue-text">Login Form</h4>
                <form class="row s12">
                    <div class="col s12">
                        <div class="input-field">
                            <input type="text" name="" placeholder="Username*">
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field">
                            <input type="password" name="" placeholder="Password*">
                        </div>
                    </div>
                    <div class="col s12">
                        <p><label><input type="checkbox"></label></p>
                    </div>
                    <div class="col s12 center">
                        <button type="button" class="btn btn-large waves-effect waves-light blue">Login<i class="material-icons right">send</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>