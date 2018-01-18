<?php get_header(); ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/slider1.png" alt="...">
      <div class="carousel-caption">
      	<div class="cuadro-titulo">
      		<h1>Fábrica de</h1>
      		<h1>Cortinas</h1>
      	</div>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
</div>


<!-- carrusel pequeño -->
<section class="carrusel-chico">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner  carrusel-fotos-chicas" role="listbox">
	    <div class="item active">
	    <div class="col-md-3">
	    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
	    </div>
	    <div class="col-md-3">
	    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
	    </div>
	    <div class="col-md-3">
	    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
	    </div>
	    <div class="col-md-3">
	    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
	    </div>
		
	    </div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>	
</section>


	<!-- productos  -->
	<section id="productos" class="smooth-scroll">
		<?php include_once( 'productos.php' ); ?>	
	</section>
	<section class="texto-comercial">
		<div class="container">
		<div class="cuadro-blanco">
			<h2><span>"</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia repellat impedit at magni saepe, tempora pariatur optio <span>"</span></h2>
		</div>	
		</div>
	</section>
	<!-- servicios  -->
	<section id="servicios" class="smooth-scroll">
		<?php include_once( 'servicios.php' ); ?>	
	</section>

	<!-- contacto  -->
	<section id="contacto" class="smooth-scroll">
		<?php include_once( 'contacto.php' ); ?>	
	</section>


<?php get_footer(); ?>