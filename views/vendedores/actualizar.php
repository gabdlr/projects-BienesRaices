<main class="contenedor">
        <h1>Actualizar Vendedor</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo  $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
        </form>
        <a href="/admin" class="centrar boton boton-verde">Volver</a>
</main>
