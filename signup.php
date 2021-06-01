<html>
<head>
<title>User Login</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div>
        

         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">

            <div class="demo-table">
            
            <div class="form-head">Registrar</div>

            <div class="field-column">
                    <div>
                        <label for="username">Nombre de Usuario</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="user_name" id="user_name" type="text"
                            class="demo-input-box">
                    </div>
                </div>

            <div class="field-column">
                    <div>
                        <label for="name">Nombre del cliente</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="name" id="name" type="text"
                            class="demo-input-box">
                    </div>
                </div>

            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Confirmar contraseña" name="clave2">
            </div>
            
            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Registrarse<label class="lnr lnr-chevron-right"></label></button>  

            </div>


        <form action="login-action.php" method="post" id="frmLogin" onSubmit="return validate();">
            <div class="demo-table">


                
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password"
                            class="demo-input-box">
                    </div>
                </div>

                <div class=field-column>
                    <div>
                        <input type="submit" name="login" value="Registrar usuario"
                        class="btnLogin"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>