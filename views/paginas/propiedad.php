

    <main class="contenedor seccion contenido-centrado">

        <h1><?php echo $propiedad->titulo;?></h1>

            <picture>

                <!--<source srcset="build/img/destacada.webp" type="image/webp">-->

                <source src="/public/imagenes/<?php echo $propiedad->imagen;?>" type="image/jpeg">

                <img loading="lazy" src="/public/imagenes/<?php echo $propiedad->imagen;?>" alt="imagen propiedad">

            </picture>

            <div class="resumen-propiedad">

                <p class="precio"><?php $propiedad->precio;?> </p>

                <ul class="iconos-caracteristicas">

                    <li>

                        <img class="icono" loading="lazy" src="/public/build/img/icono_wc.svg" alt="icono wc">

                        <p><?php echo $propiedad->wc;?></p>

                    </li>

                    <li>

                        <img class="icono" loading="lazy" src="/public/build/img/icono_estacionamiento.svg" alt="icono estacionamiento">

                        <p><?php echo $propiedad->estacionamiento;?></p>

                    </li>

                    <li>

                        <img class="icono" loading="lazy" src="/public/build/img/icono_dormitorio.svg" alt="icono dormitorio">

                        <p><?php echo $propiedad->habitaciones;?></p>

                    </li>

                </ul>

                <p>

                     <?php echo $propiedad->descripcion;?>

                </p>

                <p>

                    In vestibulum feugiat orci, eget hendrerit sem euismod nec. Donec ut risus vitae elit sollicitudin facilisis. Maecenas tristique enim quis turpis pretium sagittis. 

                </p>

            </div>

    </main>

