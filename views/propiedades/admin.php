<main class="contenedor">

        <h1>Administrador de Bienes Raices</h1>

        

        <?php 



            $resultado = $_GET['resultado'] ?? null;

        

            if($resultado) {

            $mensaje = mostrarNotificacion(intval($resultado));

            $mensaje = s($mensaje);

            if($mensaje) {

                echo "<p class=\"alerta exito\">{$mensaje}</p>";

            }

        }

        ?>

        <div class="admin-bar">

        <a href="/logout" class="boton boton-rojo">Cerrar Sesión</a>

        </div>

        <h2>Propiedades</h2>

        <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Titulo</th>

                    <th>Imagen</th>

                    <th>Precio</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach($propiedades as $propiedad):?>

                    <tr>

                        <td><p><?php echo $propiedad->id;?></p></td>

                        <td><p><?php echo $propiedad->titulo;?></p></td>

                        <td><img src="/public/imagenes/<?php echo $propiedad->imagen;?>" class="imagen-tabla"></td>

                        <td><p>$<?php echo $propiedad->precio;?></p></td>

                        <td>

                        <form method="POST" action="/propiedades/eliminar">

                        <input type="submit" value="Eliminar" class="boton-rojo-block w-100">

                        <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">

                        <input type="hidden" name="tipo" value="propiedad">

                        </form>

                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">Actualizar</a></td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <h2>Vendedores</h2>

        <a href="/vendedores/crear" class="boton boton-verde">Nuevo Vendedor</a>

        <table class="propiedades">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Nombre</th>

                    <th>Telefono</th>

                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach($vendedores as $vendedor):?>

                    <tr>

                        <td><p><?php echo $vendedor->id;?></p></td>

                        <td><p><?php echo $vendedor->nombre . " " . $vendedor->apellido;?></p></td>

                        <td><p><?php echo $vendedor->telefono;?></p></td>

                        <td>

                        <form method="POST" action="/vendedores/eliminar">

                        <input type="submit" value="Eliminar" class="boton-rojo-block w-100">

                        <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">

                        <input type="hidden" name="tipo" value="vendedor">

                        </form>

                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id?>" class="boton-amarillo-block">Actualizar</a></td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </main>