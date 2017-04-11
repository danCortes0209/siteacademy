    <?php include 'header.php'; ?>
        <div class="contenedor-formulario">
            <div class="wrap">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" name="formulario_registro" method="post">
                    <div class="input-group">
                        <input type="text" id="libro" name="libro">
                        <label class="label" for="libro">Libro: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="autor" name="autor">
                        <label class="label" for="autor">Autor: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="texto" name="texto">
                        <label class="label" for="texto">Texto: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="nivel" name="nivel">
                        <label class="label" for="nivel">Nivel: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="pregunta" name="pregunta">
                        <label class="label" for="pregunta">Pregunta: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="resp1" name="resp1">
                        <label class="label" for="resp1">Respuesta 1: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="resp2" name="resp2">
                        <label class="label" for="resp2">Respuesta 2: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="resp3" name="resp3">
                        <label class="label" for="resp3">Respuesta 3: </label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="resp4" name="resp4">
                        <label class="label" for="resp4">Respuesta 4: </label>
                    </div>
                    <input type="submit" id="btnsubmit" value="Guardar">
                </form>
            </div>
        </div>
        <script src="js/formulario.js"></script>
    <?php include 'footer.php'; ?>
