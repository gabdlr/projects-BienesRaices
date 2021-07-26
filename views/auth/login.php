    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>
        <?php foreach($errores as $error):?>
            <div class="alerta error"><?php echo $error; ?></div>
            <?php endforeach; ?>
        <form method="POST" class="formulario">
        <fieldset>
                <legend>Credenciales</legend>
                <label for="email">E-mail</label>
                <input type="email" name="email" value="" placeholder="Tu email" id="email" >
                <label for="password">Password</label>
                <input type="password" placeholder="Tu password" name="password" id="password" >
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>
