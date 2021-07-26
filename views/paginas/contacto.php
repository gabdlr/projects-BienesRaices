<main class="contenedor">

    <h1>Contacto</h1>

    <?php if($mensaje):?>

    <p class="alerta exito"><?php echo $mensaje;?></p>

    <?php endif;?>

    

    <picture>

        <source srcset="/public/build/img/destacada3.webp" type="image/webp">

        <source srcset="/public/build/img/destacada3.jpg" type="image/jpeg">

        <img loading="lazy" src="/public/build/img/destacada3.jpg" alt="imagen contacto">

    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="/contacto" method="POST">

        <fieldset>

            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>

            <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

            <label for="mensaje" id="mensaje" required>Mensaje</label>

            <textarea name="contacto[mensaje]" id="mensaje" cols="30" rows="10"></textarea>

        </fieldset>

        <fieldset>

            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra</label>

            <select id="opciones" name="contacto[tipo]" required>

                <option value="" disabled selected>-- Seleccione</option>

                <option value="Compra">Compra</option>

                <option value="Vende">Vende</option>

            </select>

            <label for="presupuesto">Precio o presupuesto</label>

            <input type="number" placeholder="Tu precio o presupuesto" id="precio" name="contacto[precio]" required>

        </fieldset>

        <fieldset>

            <legend>¿Cómo desea ser contactado?</legend>

            <div class="forma-contacto">

                <label for="contactar-telefono">Teléfono</label>

                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">E-mail</label>

                <input name="contacto[contacto]" type="radio" value="email" id="contactar-email" required>

            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" class="boton-verde">

    </form>

</main>

