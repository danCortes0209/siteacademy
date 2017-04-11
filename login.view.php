<?php include 'header.php'; #manda llamar a la parte superior la cual es una plantilla?>
        <div class="formcontent">
            <div class="formi">
                <div class="inputsform">
                    <h1>Iniciar Sesion</h1>
                    <br>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <!--Lo que hace el php de arriba es que, se redireccione a la pagina misma, y el action regrese al php con la logica enviando todo con el metodo post-->
                        <label for="">Nombre</label><br>
                        <input type="text" name="name" placeholder="Nombre de usuario"><br>
                        <label for="">Contraseña</label><br>
                        <input type="password" name="passwd" placeholder="Contraseña"><br>
                        <input type="submit" class="btnlogin">
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
                    <p>Aun no tienes una cuenta? creala <a href="register.php">aqui</a></p>
                </div>
            </div>
            <div class="factsabout">
                <div class="factslog">
                    <div class="logofacts"></div>
                    <div class="randfact">
                        <h1>Sabias que?</h1>
                        <br>
                        <p>En Cataluña, el Día del Libro -o Sant Jordi, como es mas conocido-, se tiene la tradición de regalar un libro y una rosa, sin embargo el motivo de el obsequio floral es bastante incierto, pero está relacionada con la Feria de rosas que se celebraba ese día en el siglo XV y también, con el día de los enamorados</p>
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; #manda llamar la plantilla del pie de pagina?>
