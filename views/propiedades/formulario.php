<fieldset>

    <legend>Información general</legend>

    <label for="titulo">Título:</label>

    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Título Propiedad" value="<?php echo s($propiedad->titulo);?>">

    <label for="precio">Precio:</label>

    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio);?>">

    <label for="imagen">Imagen:</label>

    <?php if ($propiedad->imagen && $_SERVER['PATH_INFO'] == "/propiedades/actualizar") {?>

        <img src="/public/imagenes/<?php echo  $propiedad->imagen ?>" class="imagen-small">

    <?php }?>

    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png" >

    <label for="descripcion">Descripción:</label>

    <textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10"><?php echo s($propiedad->descripcion);?></textarea>

</fieldset>

<fieldset>

    <legend>Información propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>

    <input type="number" id="habitaciones" name="propiedad[habitaciones]" min="1" placeholder="1" value="<?php echo s($propiedad->habitaciones);?>">

    <label for="wc">Baños:</label>

    <input type="number" id="wc" name="propiedad[wc]" min="1" placeholder="1" value="<?php echo s($propiedad->wc);?>">

    <label for="estacionamiento">Puestos de estacionamiento:</label>

    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" min="1" placeholder="1" value="<?php echo s($propiedad->estacionamiento);?>">

</fieldset>

<fieldset>

    <legend>Vendedor</legend>

    

    <select name="propiedad[vendedorId]" id="vendedor" >

        <option value="" selected disabled>--Seleccione un vendedor</option>

        <?php foreach ($vendedores as $vendedor) { ?>

            <option <?php echo $propiedad->vendedorId == $vendedor->id ? 'selected' : '' ?> value="<?php echo s($vendedor->id);?>" ><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido);?></option>

        <?php } ?>

    </select>

</fieldset>



