<fieldset>

    <legend>Información general</legend>

    <label for="titulo">Nombre:</label>

    <input type="text" id="nombre" name="vendedores[nombre]" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre);?>">

    <label for="titulo">Apellido:</label>

    <input type="text" id="apellido" name="vendedores[apellido]" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido);?>">

    <label for="titulo">Teléfono:</label>

    <input type="number" id="telefono" name="vendedores[telefono]" placeholder="Telefono del vendedor" value="<?php echo (int)s($vendedor->telefono);?>">

</fieldset>