@extends('atmaster')
@section('title', 'Alive Tech')
@section('header')
    <header id="main-header" class="header">
    
         @include('atshared.atnavbar')
         @include('atshared.atsidenav')
    
    <div class="hero-text-box">
       
        <h1>Alive Technology</h1>
        <h4>El Aliado Tecnológico de su Empresa</h4> 
        <a href="#" class="btn btn-ghost js--scroll-to-about">Conócenos</a>
        
    </div>  
   </header>
@endsection

@section('content')
       <section class="section-about-us js--section-about-us">
       <div class="row">
          
           <h2>¿Quiénes Somos?</h2>
           <p class="long-copy">Somos un equipo de profesionales dedicados a ayudarlo a dar vida a sus proyectos tecnológicos. A través de nuestros programas brindamos soluciones para que su empresa logre transformar su conocimiento en riqueza.</p>
           
           <div class="row span-1-of-2">
           <blockquote>
           La tecnología no es una opción, sino un paso natural de la evolución.
           <cite><img src="alivetech/res/img/AliveTech-Logo-Big.png" alt="Logo">-Equipo AliveTech.</cite>
           </blockquote>
           </div>
           <div class="row">
                <div class="marca-gto-div js--wp-1">
                    <img class="marca-gto-img" src="alivetech/res/img/Marca-Gto.png" alt="Marca Guanajuato">
                </div>
            </div>
        </div>
   </section>
        
   <section class="section-work">
       <h2 class="img-background-title">Nuestras líneas de trabajo</h2>
           
            <div class="row">
               <div class="col span-1-of-2 box js--wp-1">
                  
                   <i class="ion-clipboard icon-big"></i>
                   <h3 class="img-background-title">Formulación De Proyectos Tecnológicos</h3>
                   <p class="img-background-text">En conjunto con su equipo técnico-financiero, el equipo de asesores de AliveTech realizará un plan de desarrollo tecnológico con su empresa, así como la formulación continua de sus proyectos que pueden contener: </p><br>
                   <ul>
                       <li>Presupuesto.</li>
                       <li>Medición del Riesgo.</li>
                       <li>Análisis de Viabilidad Técnica.</li>
                       <li>Análisis de Viabilidad de Negocios.</li>
                       <li>Análisis de Viabilidad Financiero.</li>
                   </ul>
                   
                </div>
                
                <div class="col span-1-of-2 box js--wp-1">
                   
                    <i class="ion-cash icon-big"></i>
                    <h3 class="img-background-title">Gestión De Fondos.</h3>
                    <p class="img-background-text">Tenemos conocimiento de más de 250 fondos federales para apoyo de proyectos de desarrollo tecnológico en el país. Le asesoraremos en qué fondos puede participar y tener más probabilidad de éxito. Integraremos en conjunto con su equipo:</p><br>
                    <ul>
                        <li>Presupuestos.</li>
                        <li>Vinculaciones especializadas con Centros de Investigación y Universidades.</li>
                        <li>Documentación específica del fondo.</li>
                        <li>Gestión del fondo y seguimiento.</li>
                    </ul>
                    
                </div>
            </div>
            
            <div class="row">
               
                <div class="col span-1-of-2 box js--wp-1">
                   
                    <i class="ion-link icon-big"></i>
                    <h3 class="img-background-title">Redes de Innovación</h3>
                    <p class="img-background-text"><b>CKC</b> <i>- Collaborative Knowledge Creation</i>
                    <p class="img-background-text">Para innovar de forma rentable necesitamos generar redes que nos permitan integrar el conocimiento desde quienes lo generan (Centros de investigación y Universidades), lo materializan y lo producen (La industria), lo financian (Gobierno), lo protegen (IMPI, INDAUTOR) y comercializan de manera inteligente.</p>
                    <p class="img-background-text">Permítanos ser parte articuladora de esos eslabones para lograr la innovación constante y rentable en su empresa.</p> <br>
                </div>
                
                <div class="col span-1-of-2 box js--wp-1">
                   
                    <i class="ion-lock-combination icon-big"></i>
                    <h3 class="img-background-title">Protección De Su Conocimiento</h3>
                    <p class="img-background-text">La generación de conocimiento conjunta de nuestros clientes con los expertos de Centros de Investigación y Universidades ha dado como resultado soluciones innovadoras a los retos tecnológicos de la industria. Las cuales pueden ser registradas y brindar beneficios económicos a su empresa.</p>
                    <p class="img-background-text">A través de nuestra Oficina de Transferencia de Tecnología y red de abogados especialistas apoyamos a su empresa a proteger:
                    Marcas, slogans, software, diseños, productos, procesos, métodos.
                    </p>
                       
                </div>
                
            </div>
        </section>
        
        <section class="our-brands">
           <h2>Soluciones Tecnológicas</h2>
           
            <div class="row">
                              
                    <p>La industria mexicana principalmente las PyMEs se enfrentan a retos tecnológicos, organizacionales y estratégicos continuamente. Su adaptación a los cambios constantes de la industria es la clave para mantenerse en el mercado.</p><br> 
                    <!--<p>A través de nuestras marcas de AliveTech le brindamos soluciones a sus problemas del día a día:</p><br>
                    
                        <img class="brand-logos js--wp-3" src="res/img/software-industria.gif" alt="Soft Tech">
                    
                        <img class="brand-logos js--wp-3" src="res/img/capacitacion-especializada.gif" alt="Alive Talent">  
                    
                        <img class="brand-logos js--wp-3" src="res/img//innovacion-salud.gif" alt="Health Tech"> 
                    -->
            </div>
            
        </section>  
        
        <!--            
        <section class="section-clients js--section-our-clients">
            <div class="row">
                <h2>Opiniones de nuestros clientes</h2>
                <p class="long-copy">Aqui va un carousel o algo asi con las opiniones de los clientes</p>
            </div>
        </section>
        -->
        <section class="section-location">
           
            <h2>Nuestra Ubicación</h2>
            
            <div class="row">
                   
                    <div class="col span-1-of-2">
                       <div id="map"></div>
                    </div>
                <div class="col span-1-of-2 address-box">
                    
                        <label class="dir-label"><b>Correo Electrónico:</b></label><br><br>
                        <address>contacto@alivetech.mx</address><br>
                        <label class="dir-label"><b>Dirección:</b></label><br><br>
                        <address>Boulevard Adolfo López Mateos OTE #1286</address>
                        <address>Interior 6-K, C.P. 38080</address>
                        <address>Colonia Pabellón del Campestre</address>
                        <address>Celaya, Gto. México</address><br>
                        <label class="dir-label"><b>Teléfono:</b></label><br><br>
                        <address>+52 (461) 196 6712</address>
                    <address>+52 (461) 202 5372</address>
                    
                </div>
            </div>
        </section>
        
        <section class="section-contact js--section-contact" id="section-contact">
           
            <div class="row">
                <h2>Contáctenos</h2>
            </div>

            <div class="row">
                <form method="post" class="contact-form" id="contact-form">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="row">
                    
                    @foreach ($errors->all() as $error)
                        <div class="form-messages fail">{{ $error }}</div>
                    @endforeach
                    
                    @if (session('status'))
                        <div class="form-messages success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                       
                </div>   
                             
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="name">Nombre</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="text" name="name" id="name" placeholder="Su Nombre" required>
                    </div>
                </div>
                   
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="email">Email</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="email" name="email" id="email" placeholder="Su Email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" required>
                    </div>
                </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                        <label for="message">Mensaje</label>
                        </div>
                        <div class="col span-2-of-3">
                            <textarea name="message" id="message" placeholder="Su Mensaje"></textarea>
                        </div>
                    </div>
                 
                    
                <div class="row">
                    
                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>

                    <div class="col span-1-of-3">
                        <label>&nbsp;</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input id ="submitBtn" type="submit" value="Enviar" disabled>
                    </div>
                </div>
                    
                </form>
                
                <script>
                  function recaptchaCallback() {
    			$('#submitBtn').removeAttr('disabled');
			};   
       
                </script>
            </div>
            
        </section>
@endsection