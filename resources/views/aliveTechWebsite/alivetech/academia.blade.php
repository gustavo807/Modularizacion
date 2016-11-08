@extends('atmaster')
@section('title', 'Academia')
@section('header')
    <header id="academia-header" class="header">
        @include('shared.atnavbar')
        @include('shared.atsidenav')
    <div class="hero-text-box">
        <h1>Academia y Centros De Investigación</h1>
    </div>  
   </header> 
@endsection


@section('content')
<section class="section-quote-3">
    <blockquote class="long-copy">
           Lo central de la tecnología no son las máquinas, ni los instrumentos, ni las técnicas, ni las patentes, ni los procedimientos, sino el ser humano que las genera, desarrolla, asimila y usa.
           <cite><img src="AliveTech/res/img/AliveTech-Logo-Big.png" alt="">-Equipo AliveTech.</cite>
    </blockquote>
    </section>
      
    <section class="section-indicadores-2">
       <div class="row">
        <h2>Indicadores 2013-2016</h2>
        <ul class="js--wp-5 centered-ul-long">
            <li>Alianzas con 38 Centros y Universidades del País.</li><br>
            <li>Formulación conjunta de 110 proyectos de desarrollo tecnológico e innovación.</li><br>
            <li>Ingresos para las Universidades y Centros de Investigación por $39,044,452.40.40 pesos mediante la vinculación de 34 proyectos en fondos de innovación.</li><br>
        </ul>
       </div>
       <div class="row">
                <div class="marca-gto-div js--wp-1">
                    <img class="marca-gto-img" src="res/img/Marca-Gto.png" alt="Marca Guanajuato">
                </div>
            </div>
    </section>
           
   <section class="section-work-2 js--work-lines-2">
       <h2 class="img-background-title">Lineas de trabajo</h2>
           <div class="row">
               <div class="col span-1-of-3 box js--wp-1">
                   <i class="ion-paper-airplane icon-big"></i>
                   <h3 class="img-background-title">Levantamiento De Capacidades</h3>
                   <p class="img-background-text">Como paso inicial del conocimiento de nuestras Alianzas de Transferencia de Tecnología, brindamos el servicio de levantamiento de capacidades. </p><br>
                   <ul>
                       <li>Áreas de especialización</li>
                       <li>Investigadores</li>
                       <li>Infraestructura</li>
                       <li>Equipamiento</li>
                       <li>Organigrama de vinculación</li>
                       <li>Actores clave</li>
                   </ul>
                </div>
                <div class="col span-1-of-3 box js--wp-1">
                    <i class="ion-ios-people icon-big"></i>
                    <h3 class="img-background-title">Promoción de Residentes</h3>
                    <p class="img-background-text">Las residencias son un paso muy importante en la carrera de un alumno, es importante que utilice sus conocimientos en un ambiente de trabajo que valoren su participación y lo vayan integrando al ambiente productivo. <br>
                    A través de AliveTalent, spin-off de AliveTech, le ofrecemos la posibilidad de evaluar, promocionar y brindar seguimiento a sus residentes.</p>
                </div>
                <div class="col span-1-of-3 box js--wp-1">
                    <i class="ion-person-add icon-big"></i>
                    <h3 class="img-background-title">Promoción De Egresados</h3>
                    <p class="img-background-text">Encontrar el puesto adecuado donde desarrolle todo su potencial es una necesidad para el egresado.
                    Encontrar la persona adecuada que cubra los requisitos de la vacante es una necesidad de la empresa.
                    <br>
                    A través del conocimiento de las necesidades tanto del egresado como de la industria en AliveTalent le ofrecemos la posibilidad de encontrar <b>la persona adecuada para el puesto adecuado.</b>
                    </p>   
                </div>
            </div>
            <div class="row">
                <div class="col span-1-of-2 box js--wp-1">
                    <i class="ion-card icon-big"></i>
                    <h3 class="img-background-title">Vinculación Con Fondos</h3>
                    <p class="img-background-text">A través de nuestra Oficina de Transferencia de Tecnología en comunicación con su institución nos compartimos los proyectos que tengan el potencial de ser inscritos a fondos y vinculados.
                    <br>
                    Contamos con un equipo de asesores para la formulación, integración y gestión de fondos. 
                    </p>
                </div>
                <div class="col span-1-of-2 box js--wp-1">
                    <i class="ion-cash icon-big"></i>
                    <h3 class="img-background-title">Gestión De Fondos</h3>
                    <p class="img-background-text">Contamos con apoyo para gestionar fondos CONACYT y de SE a beneficio de su institución:</p>
                    <ul>
                        <li>Infraestructura Científica y Tecnológica</li>
                        <li>Laboratorios Nacionales</li>
                        <li>FORDECYT</li>
                        <li>Convocatorias PNPC</li>
                        <li>Redes temáticas de investigación</li>
                        <li>Fondos INADEM</li>
                        <li>PPCI</li>
                        <li>Trámite de RENIECYT</li>
                        <li>Entre otros</li>
                    </ul>
                </div>
            </div>
        </section>   
           
        <section class="vinc-policy">
           <h2>Política de Vinculación</h2>
            <p class="long-copy">
                “La Directiva y todo el personal de AliveTech conocemos las capacidades de la IES y CIs de las regiones que atendemos y seleccionamos a los contactos más aptos y comprometidos, que pueden dar mejor resultado, para la atención de nuestras Empresas Cliente”
            </p>
        </section> 
@endsection