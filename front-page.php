<?php get_header(); ?>
	
<div id="myCarousel" class="carousel slide fade-carousel" data-interval="5000" data-ride="carousel">
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item slides active">
    <div class="slide-1"></div>
      <div class="hero cuadro-titulo">
        <hgroup>
          	<h1>Fábrica de</h1>
      		<h1>Cortinas</h1>
        </hgroup>
      </div>
    </div>   
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero cuadro-titulo">
        <hgroup>
          	<h1>Fábrica de</h1>
      		<h1>Cortinas Fergu</h1>
        </hgroup>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="hero cuadro-titulo">
        <hgroup>
          	<h1>Reparamos sus</h1>
      		<h1>Cortinas</h1>
        </hgroup>
      </div>
    </div>
     <!-- Controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only"></span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only"></span>
	  </a>   
  </div>
</div> 

 



<!-- carrusel pequeño -->
<section class="carrusel-chico">
	<div id="lil-carrusel" class="carousel slide" data-interval="2500" data-ride="carousel">
	  <!-- Indicators -->
	  <!-- Wrapper for slides -->
	  <div class="carrusel-fotos-chicas carousel-inner" role="listbox">
	    <div class="item active">
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/tipo1.png" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/tipo1.png" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/tipo1.png" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/tipo1.png" alt="...">	
		    </div>
	    </div>
	    <div class="item">
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/1.png" alt="...">	
		    </div>
	    </div>
	    <div class="item">
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/FB_IMG_1519313042368.jpg" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/FB_IMG_1519313042368.jpg" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/FB_IMG_1519313042368.jpg" alt="...">	
		    </div>
		    <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
		    	<img src="<?php echo get_template_directory_uri(); ?>/assets/FB_IMG_1519313042368.jpg" alt="...">	
		    </div>
	    </div>
	  </div>
	  <!-- Controls -->
		  <a class="left carousel-control" href="#lil-carrusel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#lil-carrusel" role="button" data-slide="next">
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
		<div class="cuadro-blanco wow fadeInUp">
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