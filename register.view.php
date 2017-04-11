<?php include 'header.php'; #manda llamar a la parte superior la cual es una plantilla?>
        <div class="formregister">
            <div class="formreg">
                <div class="regisform">
                    <h1>Registrarse</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <!--Lo que hace el php de arriba es que, se redireccione a la pagina misma, y el action regrese al php con la logica enviando todo con el metodo post-->
                        <label for="">Nombre</label><br>
                        <input type="text" name="name" placeholder="Nombre de usuario"><br>
                        <label for="">Email</label><br>
                        <input type="email" name="email" placeholder="Correo electronico"><br>
                        <label for="">Contraseña</label><br>
                        <input type="password" name="passwd" placeholder="Contraseña"><br>
                        <label for="">Pais</label><br>
                        <input type="text" name="country" placeholder="Pais"><br>
                        <input type="submit" class="btnregis">
                        <br><br>
                        <?php if (!empty($errores)): ?>
                            <!--Si errores no esta vacia, entonces añade este div con el contenido de errores, la cual sera un li-->
                            <div style="font-size: 0-7em;">
                                <ul style="list-style: none;">
                                    <?php echo $errores; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </form>
                    <br>
                    <p>Ya tienes una cuenta? ingresa <a href="login.php">aqui</a></p>
                </div>
            </div>
            <div class="factsregis">
                <div class="factsreg">
                    <div class="logofacts"></div>
                    <div class="randfact">
                        <h1>Sabias que?</h1><br>
                        <p>En el siglo X existió una especie de biblioteca muy rara, ya que su propietario, el visir persa Abdul Kassem Ismael, transportaba sus más de 117.000 libros en las jorobas de 400 camellos que estaban adiestrados para caminar en fila manteniendo el orden alfabético de los libros.</p>
                        <p>La palabra libro proviene del latín “liber” que básicamente es la parte interior de la corteza de los árboles</p>
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; #manda llamar la plantilla del pie de pagina?>