@extends('atmaster')
@section('title', 'Gobierno')
@section('header')
    <header id="gobierno-header" class="header">
        @include('shared.atnavbar')
        @include('shared.atsidenav')
        <div class="hero-text-box">
            <h1>Gobierno</h1>
        </div>  
   </header> 
@endsection


@section('content')
   <section class="section-quote-4">
           <div class="row">
           
               <div class="long-copy">
                   <blockquote>
                   AliveTech: Desarrollo y vitalización de los sistemas sociotécnicos que conforman las empresas, organizaciones y clústers.
                   <cite><img src="res/img/AliveTech-Logo-Big.png" alt="Logo">-Equipo AliveTech.</cite>
                   </blockquote>
               </div>
    </section>
       
    <section class="section-indicators">
        <div class="row">
            <h2>Indicadores 2013-2016</h2>
             <ul class="js--wp-5 centered-ul-medium">
               <li>Estudio de evaluación de proveedores automotrices Tier 2 y Tier 3 del Estado de Guanajuato</li><br>
               <li>Participación en el Panel de Innovación Automotriz del Foro Automotriz de Guanajuato</li><br>
               <li>Consultores externos de CRECE Guanajuato</li><br>
               <li>Participación activa en el CLAUGTO</li><br>
               <li>Formar parte de la Red OTT</li><br>
             </ul>
           </div>
           <div class="row">
                <div class="marca-gto-div js--wp-1">
                    <img class="marca-gto-img" src="res/img/Marca-Gto.png" alt="Marca Guanajuato">
                </div>
            </div>
    </section>
       
    <section class="gov-work-lines">
       <h2 class="img-background-title">Servicios</h2>
        <div class="row">
           <div class="col span-1-of-3 big-box-sp js--wp-1">
               <i class="ion-briefcase icon-big"></i>
               <h3 class="img-background-title">Profesionalización de MiPymes</h3><br>
               <ul>
                   <li>Desarrollo de proveedores para sector automotriz, aeroespacial y manufactura avanzada.</li><br>
                   <li>Servicios de identidad corporativa empresarial.</li><br>
                   <li>Plan de desarrollo de las MiPYMES para su inserción en cadenas globales de valor.</li><br>
                   <li>Fomento a iniciativas de innovación y generación de conocimiento.</li>
               </ul>               
            </div>
            <div class="col span-1-of-3 big-box-sp js--wp-1">
                <i class="ion-laptop icon-big"></i>
                <h3 class="img-background-title">Agencia de desarrollo económico y promoción de la ciencia, tecnología e innovación.</h3>
                <p class="img-background-text"><b>Fórmula C3:</b><i>Creación de conocimiento conjunto.</i></p>
                <p class="img-background-text">Para innovar de forma productiva y rentable es preciso generar redes que nos permitan integrar el conocimiento desde:</p><br>
                <ul>
                    <li>El que lo genera (Centros de Investigación y Universidades).</li>
                    <li>Lo materializa y lo produce (La industria). </li>
                    <li>Lo apoya, potencializa y protege (Gobierno).</li>
                    <li>Y comercializa de manera inteligente (La industria).</li>
                </ul><br>
                <p class="img-background-text">A través de nuestro equipo de profesionales formamos una red articuladora de esos, eslabones para lograr la innovación constante, productiva y rentable de las empresas.</p>
            </div>
            <div class="col span-1-of-3 big-box-sp js--wp-1">
                <i class="ion-compose icon-big"></i>
                <h3 class="img-background-title">Estudios Estratégicos de desarrollo.</h3>
                <br>
                <ul>
                    <li>Mapas de ruta tecnológicos</li><br>
                    <li>Diagnóstico industrial</li><br>
                    <li>Estudios sectoriales estratégicos</li><br>
                    <li>Formulación de demandas para programas</li><br>
                </ul>
            </div>
                
        </div>
            
        <div class="row">                
            <div class="col span-1-of-3 box js--wp-1">
                <i class="ion-loop icon-big"></i>
                <h3 class="img-background-title">Retroalimentación periódica sobre las empresas, universidades y centros de investigación</h3>
                <p class="img-background-text">Brindamos seguimiento e información constante y veraz de los elementos clave para la vitalización de la industria del sector.</p>
            </div>
            
            <div class="col span-1-of-3 box js--wp-1">
                <i class="ion-battery-charging icon-big"></i>
                <h3 class="img-background-title">Nuestras Fortalezas</h3>
                <p class="img-background-text">Amplio conocimientos de la industria automotriz y manufacturera.</p>
                <p class="img-background-text">Contamos con asesores de perfil técnico, financiero y de negocios.</p>
                <p class="img-background-text">Métodos y estándares efectivos para levantamiento de necesidades tecnológicas y empresariales.</p>
            </div>
            
            <div class="col span-1-of-3 box js--wp-1">
                 <i class="ion-arrow-graph-up-right icon-big"></i>
                 <h3 class="img-background-title">Política de máximo beneficio</h3>
                    <p class="img-background-text">"La directiva y todo el personal de AliveTech estamos comprometidos con el entendimiento profundo de las necesidades y oportunidades de nuestras Empresas Cliente para diseñar y desarrollar soluciones a su medida, en vinculación con las IES y CIs más aptos, que maximicen el beneficio de su inversión".</p>
            </div>
        </div>
    </section>
   
@endsection