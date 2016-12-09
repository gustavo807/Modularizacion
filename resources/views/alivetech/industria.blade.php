@extends('atmaster')
@section('title', 'Industria')
@section('header')

   <header id="industry-header" class="header">

       @include('atshared.atnavbar')
       @include('atshared.atsidenav')

        <div class="hero-text-box">
            <h1>Industria</h1>
        </div>
   </header>

@endsection

@section('content')
        <section class="section-quote-2">
        <div class="row span-1-of-2">
           <blockquote>
           La innovación es el fruto natural de la interacción armónica y sinérgica entre el hombre, la tecnología y el conocimiento.
           <cite><img src="alivetech/res/img/AliveTech-Logo-Big.png" alt="Logo">-Equipo AliveTech.</cite>
           </blockquote>
        </div>
    </section>

    <section class="section-indicadores">
           <h2>Indicadores 2013-2016</h2>
           <div class="row">
                <ul class="js--wp-5 centered-ul-long">
                    <li>Formulación conjunta de 110 proyectos de desarrollo tecnológico e innovación.</li><br>
                    <!--<li>Gestión y obtención de fondos gubernamentales por 86,152,569.55 pesos.</li><br>-->
                    <li>Desarrollo de 4 proveedores Tier 2 automotrices.</li><br>
                    <li>Asesoría en calidad e ISO a 6 empresas automotrices.</li><br>
                </ul>
            </div>
            <div class="row">
                <div class="marca-gto-div js--wp-1">
                    <img class="marca-gto-img" src="alivetech/res/img/Marca-Gto.png" alt="Marca Guanajuato">
                </div>
            </div>
    </section>

    <section class="section-projects">
       <h2>Formulación de Proyectos Tecnológicos</h2>
        <div class="row  photo-grid">
          <div class="col span-1-of-3">
               <figure><img class="img-sector" src="alivetech/res/img/sectors/Automotriz.jpg" alt="Sector Automotriz">
                <figcaption>
                   <ul>
                       <li>Diseño y desarrollo de nuevos productos e innovación en procesos automotrices.</li><br>
                       <li>Ampliación de infraestructura para generar una nueva línea de proveeduría de equipo original.</li><br>
                       <li>Innovación en proceso de soldadura automotriz.</li><br>
                       <li>Manufactura inteligente y trazabilidad automotriz.</li><br>
                       <li>Migración de empresa de plásticos del sector belleza a automotriz.</li><br>
                   </ul>
                </figcaption>
                </figure>
               <p class="center">Automotriz</p>
            </div>
            <div class="col span-1-of-3">
               <figure><img class="img-sector" src="alivetech/res/img/sectors/Metalmecanica.jpg" alt="Industria Metalmecanica">
                   <figcaption>
                   <ul>
                       <li>Prototipado rápido de nuevo producto para el sector electrodomésticos.</li><br>
                       <li>Diseño y optimización de moldes de inyección de aluminio.</li><br>
                       <li>Innovación en pruebas funcionales de autopartes.</li><br>
                       <li>Ampliación de capacidad instalada para la fabricación de líneas de ensamble.</li><br>
                       <li>Desarrollo de prototipo de construcción acelerada para vivienda.</li><br>
                   </ul>
                   </figcaption>
                 </figure>
                <p class="center">Metalmecánica</p>
            </div>
            <div class="col span-1-of-3">
                <figure><img class="img-sector" src="alivetech/res/img/sectors/Aeronautica.jpg" alt="Industria Aeronautica">
                   <figcaption>
                   <ul>
                       <li>Celda de Manufactura de alta precisión para la industria aeroespacial.</li><br>
                       <li>Ampliación de capacidad productiva y formalización de sistema de gestión de la calidad.</li><br>
                       <li>Manfactura inteligente para la trazabilidad aeroespacial.</li><br>
                       <li>Inserción en la cadena global de valor aeroespacial.</li><br>
                       <li>Sustitución de importaciones del sector aeroespacial.</li><br>
                   </ul>
                   </figcaption>
                </figure>
                <p class="center">Aeroespacial</p>
            </div>
        </div>
        <div class="row photo-grid">
            <div class="col span-1-of-3">
                <figure><img class="img-sector" src="alivetech/res/img/sectors/Agroindustria.jpg" alt="Agroindustria">
                   <figcaption>
                   <ul class="proyectos-tecnologicos">
                       <li>Desarrollo de nueva línea de alimento y su inserción a nivel nacional.</li><br>
                       <li>Desarrollo de nueva línea de nutraceúticos y alimentos funcionales.</li><br>
                       <li>Prototipo de innovador sistema de riego.</li><br>
                       <li>Experimentos para la formulación de innovador producto lácteo.</li><br>
                       <li>Diseño y fabricación de maquinaria para el procesamiento de hortalizas.</li><br>
                   </ul>
                   </figcaption>
                  </figure>
                <p class="center">Agroindustria</p>
            </div>

            <div class="col span-1-of-3">
                <figure><img class="img-sector" src="alivetech/res/img/sectors/Electronica.jpg" alt="Industria Eléctrica-Electronica">
                <figcaption>
                   <ul>
                       <li>Soluciones flexibles para la industria de electrodomésticos.</li><br>
                       <li>Sistema de control inteligente para manufactura de autopartes.</li><br>
                       <li>Bioingeniería para prototipo de rehabilitación facial.</li><br>
                       <li>Fabricación de electrodomésticos de alta eficiencia energética.</li><br>
                       <li>Sistema de control automático para la agroindustria.</li><br>
                   </ul>
                   </figcaption>
                </figure>
                <p class="center">Electrónica</p>
            </div>
            <div class="col span-1-of-3">
                <figure><img class="img-sector" src="alivetech/res/img/sectors/Otros.jpg" alt="Otras Industrias">
                      <figcaption>
                   <ul>
                       <li>Innovación en ciclo de vida del producto plástico.</li><br>
                       <li>Generación de nueva línea de embalaje industrial.</li><br>
                       <li>Diseño de dispositivos médicos y su validación en COFEPRIS.</li><br>
                       <li>Ampliación e innovación en diseño de la industria textil.</li><br>
                       <li>Desarrollo de maquinaría para temple por inducción.</li><br>
                   </ul>
                   </figcaption>
                </figure>
                <p class="center">Otros</p>
            </div>

        </div>
    </section>

    <section class="section-funds">
      <div class="row">
          <h2>Gestión De Fondos</h2>
        <ul class="gestion-fondos js--wp-5 centered-ul">
            <li>Trámite de RENIECYT para fondos CONACYT</li><br>
            <li>Programa Estímulos a la Innovación (PEI)</li><br>
            <li>Fondo de Innovación Tecnológica (FIT)</li><br>
            <li>Fondo Sectorial de Innovación (FINNOVA)</li><br>
            <li>Fondos del Instituto Nacional del Emprendedor (INADEM)</li><br>
            <li>Programa para la Productividad y Competitividad Industrial (PPCI)</li><br>
            <li>Fondos SAGARPA</li><br>
            <li>Fondos PROSOFT</li><br>
            <li>Entre muchos más...</li><br>
        </ul>
      </div>
    </section>

    <section class="section-our-clients">
    <div class="row">
        <h2>Algunos De Nuestros Clientes</h2>

            <div id="carousel_container">
               <div id="left_scroll"><a href='javascript:slide("left");'><i class="ion-chevron-left icon-small"></a></i></div>

               <div id="carousel_inner">

                <ul id="carousel_ul">
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/mikels_logo.jpg" alt="Mikel's"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/cuadritos_logo.PNG" alt="Grupo Cuadritos"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/abs_logo.png" alt="Maquinados ABS"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/Quebec_logo.PNG" alt="Quebec"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/albre_logo.PNG" alt="Albre"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/cie_automotive_logo.jpg" alt="CIE Automotive"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/euroquip_logo.png" alt="Euroquip"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/calvek_logo.png" alt="Calvek"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/ia_mexico_logo.png" alt="IA México"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/bf_Mexico_logo.png" alt="BF México"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/gkn_logo.png" alt="GKN"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/koqttish_logo.png" alt="Koqttish"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/denver_logo.png" alt="Denver Boots"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/acomet_logo.png" alt="Acomet"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/inaumex_logo.jpg" alt="Inaumex"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/eimex_logo.png" alt="Eimex"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/rodwood_logo.png" alt="Rodwood"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/excoeng_logo.png" alt="Excoeng"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/hebri_logo.png" alt="Hebri Plasticos"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/maymaes_logo.png" alt="Maymaes"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/s&t_logo.png" alt="Steel & Trucks"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/udg_logo.png" alt="Universidad Politecnica de Guanajuato"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/snecma_logo.png" alt="Grupo Safran"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/vilber_logo.png" alt="Moldes Vilber"></figure></li>
                  <li><figure class="client-logo"><img src="alivetech/res/img/client-logos/naturaldelcampo_logo.png" alt="Natural Del Campo">
               </ul>
               </div>
                <div id="right_scroll"><a href='javascript:slide("right");'><i class="ion-chevron-right icon-small"></i></a></div>
                <input type="hidden" id="hidden_auto_slide_seconds" value=0>
            </div>

    </div>
    </section>

    <section class="section-confidentiality-policy">
        <h2>Política de Confidencialidad</h2>
        <p class="long-copy">
“La Directiva y todo el personal de AliveTech estamos comprometidos a guardar confidencialidad y reserva sobre la información sensible que nos comparten nuestros Clientes,Empresas, IES y CIs y a no compartirla sino con permiso explícito de ellos.”
</p>
    </section>
@endsection
