<html>
    <head>
        <meta charset="utf8" />
        <title>NewsLetter - Forge IT Solutions</title>
        {include file="default/header.tpl" }
        <link rel="stylesheet" href="resource/login.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap">
                        <p class="form-title">
                            <img src="resource/logo.png" style="width: 80px;"/><br/>
                            NEWSLETTER
                        </p>
                        <form class="login" >
                            <input type="text" name="login" placeholder="Informe o login" id="input_login" required="true"/>
                            <input type="password" name="senha" placeholder="Informe a senha" id="input_password" required="true"/>
                            <input type="button" value="Entrar" class="btn btn-danger btn-sm" id="login"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {include file="default/javascript.tpl" }
        <script type="text/javascript" src="resource/login.js" ></script>
    </body>
</html>