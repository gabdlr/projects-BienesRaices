<main class="contenedor">

<?php include 'iconos.php'; ?>

</main>



    <section class="seccion contenedor">

        <h2>Casas y depas en venta</h2>

            <?php 

            include 'listado.php';

            ?>

            <div class="ver-todas alinear-derecha">

                <a href="/propiedades" class="boton-verde">Ver todas</a>

            </div>

    </section>

    <section class="imagen-contacto">

        <h2>Encuentra la casa de tus sueños</h2>

        <p>llene el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>

        <a href="/contacto" class="boton-amarillo">Contactános</a>

    </section>

    <div class="contenedor seccion seccion-inferior">

        <section class="blog">

            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">

                <div class="imagen">

                    <picture>

                        <source srcset="/public/build/img/blog1.webp" type="image/webp">

                        <source srcset="/public/build/img/blog1.jpg" type="image/jpeg">

                        <img class="icono" loading="lazy" src="/public/build/img/blog1.jpg" alt="Texto entrada blog">

                    </picture>

                </div>

                <div class="texto-entrada">

                    <a href="/entrada">

                        <h4>Terraza en el techo de tu casa</h4>

                        <p class="informacion-meta">Escrito el: <span>20/10/21</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales 

                            y ahorrando dinero</p>

                    </a>

                </div>

            </article>

            <article class="entrada-blog">

                <div class="imagen">

                    <picture>

                        <source srcset="/public/build/img/blog2.webp" type="image/webp">

                        <source srcset="/public/build/img/blog2.jpg" type="image/jpeg">

                        <img class="icono" loading="lazy" src="/public/build/img/blog2.jpg" alt="Texto entrada blog">

                    </picture>

                </div>

                <div class="texto-entrada">

                    <a href="/entrada">

                        <h4>Guía para la decoracion de tu hogar</h4>

                        <p class="informacion-meta">Escrito el: <span>20/10/21</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle mas vida a tu espacio</p>

                    </a>

                </div>

            </article>

        </section>

        <sectio class="testimoniales">

            <h3>Testimoniales</h3>

            <div class="testimonial">

                <blockquote>

                    El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.

                </blockquote>

                <p>- Gabriel De Los Rios</p>

            </div>

        </section>

    </div>



