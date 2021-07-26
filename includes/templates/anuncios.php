<?php

//Importamos la conexion
require 'includes/config/database.php';
$db = conectarDB();

//Escribimos la consulta
$query = "SELECT * FROM propiedades LIMIT $limite" ;

//Ejecutamos la consulta
$resultado = mysqli_query($db, $query);

?>
<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
                    <div class="anuncio">
                        <picture>
                            <!--<source srcset="build/img/anuncio3.webp" type="image/webP">-->
                            <source srcset="imagenes/<?php echo $propiedad['imagen'];?>" type="image/jpeg">
                            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'];?>" alt="anuncio">
                        </picture>
                        <div class="contenido-anuncio">
                            <h3><?php echo $propiedad['titulo'];?></h3>
                            <p><?php echo $propiedad['descripcion'];?></p>
                            <p class="precio"><?php $propiedad['precio'];?></p>
                                <ul class="iconos-caracteristicas">
                                    <li>
                                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                                        <p><?php echo $propiedad['wc'];?></p>
                                    </li>
                                    <li>
                                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                                        <p><?php echo $propiedad['estacionamiento'];?></p>
                                    </li>
                                    <li>
                                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                                        <p><?php echo $propiedad['habitaciones'];?></p>
                                    </li>
                                </ul>
                                <a href="anuncio.php?anuncio=<?php echo $propiedad['id'];?>" class="boton boton-amarillo-block">Ver Propiedad</a>
                            </div><!--.contenido-anuncio-->
                        </div><!--.anuncio-->
    <?php endwhile;?>
</div><!--.contenedor-anuncios-->