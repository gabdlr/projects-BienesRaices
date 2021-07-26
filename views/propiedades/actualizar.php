<main class="contenedor">
        <h1>Actualizar Propiedad</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo  $error; ?>
            </div>
        <?php endforeach; ?>
        <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
        <a href="/admin" class="centrar boton boton-verde">Volver</a>      
    </main>