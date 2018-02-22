<?php
/*
Template Name: servicio recambio de mallas 
*/
?>

<?php get_header(); ?>
<div class="container">
	<div class="contenedor-entradas">
	<div class="titulo-interior"><h2>Recambio de mallas</h2></div>
		<div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
            <!-- Wrapper for slides -->
            <?php 
		        $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1 ; //cuenta el numero de post y si no existen vuelve a la primera pagina
		        global $wp_query;
		        $original_query = $wp_query;
		        $args = array(
		            'post_type' => 'servicio',
		            'showposts' => '4', //numero de noticias que treara
		            'paged' => $currentPage ,
		            'orderby' => 'date', 
		            'order' => 'DESC', 
		        	'tax_query' => array(
						                  	array(
							                    'taxonomy' => 'categoria_servicio',//nombre de la taxonomy
							                    'field'    => 'slug',
							                    'terms' => 'recambio'//slug
						                  	)
							            ) 
			    ); 
			    $the_query = new WP_Query( $args );    
			    ?>
            		<div class="carousel-inner">
            			<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		                <div class="item <?php if( $the_query->current_post == 0 ):?>active<?php endif; ?>">
		                    <div class="container-fluid">
		                        <div class="row">
		                            <div class="col-md-6 col-xs-12">
		                            	<div class="imagen ">
					                      <?php  if ( has_post_thumbnail() ) { the_post_thumbnail('large', array('class' => 'img-responsive')); }?>
					                    </div>
		                            </div>
		                            <div class="content col-md-6 col-xs-12">
		                                <h2><?php the_title(); ?></h2>
		                                <p><?php the_content(); ?></p>
		                            </div>
		                        </div>
		                    </div>            
		                </div>
		                <?php endwhile; endif; ?> 
		            <!-- End Item -->
		            </div>
            
            <!-- Controls -->
              <a class="left carousel-control" href="#custom_carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only"></span>
              </a>
              <a class="right carousel-control" href="#custom_carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only"></span>
              </a>
            <!-- End Carousel Inner -->
            <div class="controls">
            	<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3 ">
                	<ul class="nav">
                        <li data-target="#custom_carousel" data-slide-to="<?php echo $the_query->current_post; ?>" class="<?php if( $the_query->current_post == 0 ):?>active<?php endif; ?>">
                        	<div class="imagen">
		                      <?php  if ( has_post_thumbnail() ) { the_post_thumbnail('medium', array('class' => 'img-responsive')); }?>
		                    </div>
		                </li>
                	</ul>
                </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
        <!-- End Carousel -->	   
    </div>	

    <div class="formulario wow fadeIn">
			<h2>Solicitud de Información</h2>
			

    	<form id="contact-form" name="contact-form" action="<?php bloginfo('url'); ?>/#contact-form" method="post">
		              <?php //Comprobamos si el formulario ha sido enviado
		              if (isset( $_POST['btn-submit'] )) {
		                //Creamos una variable para almacenar los errores
		                global $reg_errors;
		                $reg_errors = new WP_Error;
		 
		                //Recogemos en variables los datos enviados en el formulario y los sanitizamos.
		                //Si detectamos algún error, podremos más abajo rellenar los campos del formulario con los datos enviados para no tener que empezar el formulario de cero
		                $f_name = sanitize_text_field($_POST['f_name']);
		                $f_email = sanitize_email($_POST['f_email']);
		                $telefono = sanitize_text_field($_POST['telefono']);
		                $direccion = sanitize_text_field($_POST['direccion']);
		                $ciudad = sanitize_text_field($_POST['ciudad']);
		                $comuna = sanitize_text_field($_POST['comuna']);
		                $f_message = sanitize_text_field($_POST['f_message']);
		 
		                //El campo Nombre es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $f_name ) ) {
		                  $reg_errors->add("empty-name", "El campo nombre es obligatorio");
		                }
		                //El campo Email es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $f_email ) ) {
		                  $reg_errors->add("empty-email", "El campo e-mail es obligatorio");
		                }
		                //Comprobamos que el dato tenga formato de e-mail con la función de WordPress "is_email" y en caso contrario creamos un registro de error
		                if ( !is_email( $f_email ) ) {
		                  $reg_errors->add( "invalid-email", "El e-mail no tiene un formato válido" );
		                }
		                //El campo Teléfono es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $telefono ) ) {
		                  $reg_errors->add("empty-telefono", "El campo teléfono es obligatorio");
		                }
		                //El campo Dirección es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $direccion ) ) {
		                  $reg_errors->add("empty-direccion", "El campo dirección es obligatorio");
		                }
		                //El campo Comuna es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $comuna ) ) {
		                  $reg_errors->add("empty-comuna", "El campo comuna es obligatorio");
		                }
		                //El campo Ciudad es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $ciudad ) ) {
		                  $reg_errors->add("empty-ciudad", "El campo ciudad es obligatorio");
		                }
		                //El campo Mensaje es obligatorio, comprobamos que no esté vacío y en caso contrario creamos un registro de error
		                if ( empty( $f_message ) ) {
		                  $reg_errors->add("empty-message", "El campo mensaje es obligatorio");
		                }
		 
		                if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
                          //your site secret key
                          $secret = '6LdDUkQUAAAAAIqH2gwuP9XE3ov8rtwgbvlgi84-';
                          //get verify response data
                          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                          $responseData = json_decode($verifyResponse);
                          if($responseData->success){
                              //Si no hay errores enviamos el formulario
                              if (count($reg_errors->get_error_messages()) == 0) {
                                //Destinatario
                                $recipient = "carlosmellaneira@gmail.com";
               
                                //Asunto del email
                                $subject = 'Formulario de contacto para recambio de mallas ' . get_bloginfo( 'name' );
               
                                //La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original
                                $headers = "Reply-to: " . $f_name . " <" . $f_email . ">\r\n";
               
                                //Montamos el cuerpo de nuestro e-mail
                                $message = "Nombre: " . $f_name . "<br>";
                                $message .= "E-mail: " . $f_email . "<br>";
                                $message .= "Teléfono: " . $telefono . "<br>";
                                $message .= "Dirección: " . $direccion . "<br>";
                                $message .= "Comuna: " . $comuna . "<br>";
                                $message .= "Ciudad: " . $ciudad . "<br>";
                                $message .= "Mensaje: " . nl2br($f_message) . "<br>";
                                                 
                                //Filtro para indicar que email debe ser enviado en modo HTML
                                add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
                                                  
                                //Por último enviamos el email
                                $envio = wp_mail( $recipient, $subject, $message, $headers, $attachments);
               
                                //Si el e-mail se envía correctamente mostramos un mensaje y vaciamos las variables con los datos. En caso contrario mostramos un mensaje de error
                                if ($envio) {
                                  unset($f_name);
                                  unset($f_email);
                                  unset($telefono);
                                  unset($direccion);
                                  unset($comuna);
                                  unset($ciudad);
                                  unset($f_message);?>
                                  <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Su Mensaje a sido enviado con éxito
                                  </div>
                                <?php }else {?>
                                  <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Debes comnfirmar que eres un humano rellenado el captcha
                                  </div>
                                <?php }
                              }
                          }else{
                                
                              $errMsg = 'Algo raro paso, por favor intentalo mas tarde';
                              echo "$errMsg";
                          }
                        }else{
                          ?>
                            <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              Debes comnfirmar que eres un humano haciendo click en el captcha.
                            </div>
                          <?php
                          }
		              }?>
		 
		              <div class="form-group">
		                <input type="text" id="f_name" name="f_name" class="form-control" value="<?php echo $f_name;?>" placeholder="Nombre" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Nombre
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-name")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-name");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 
		              <div class="form-group">
		                <input type="email" id="f_email" name="f_email" class="form-control" value="<?php echo $f_email;?>" placeholder="E-mail" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo E-mail
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-email")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-email");?></p>
		                  </div>
		                  <?php }
		                }
		 
		                //Comprobamos si hay errores en el formato del campo E-mail
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("invalid-email")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-warning alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("invalid-email");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>

		              <div class="form-group">
		                <input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $telefono;?>" placeholder="Teléfono" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Clinica
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-telefono")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-telefono");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 
		              <div class="form-group">
		                <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $direccion;?>" placeholder="Dirección" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Clinica
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-direccion")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-direccion");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>

		              <div class="form-group">
		                <input type="text" id="comuna" name="comuna" class="form-control" value="<?php echo $comuna;?>" placeholder="Comuna" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Clinica
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-comuna")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-comuna");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>

		              <div class="form-group">
		                <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php echo $ciudad;?>" placeholder="Ciudad" required aria-required="true">
		 
		                <?php //Comprobamos si hay errores en la validación del campo Clinica
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-ciudad")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-ciudad");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 
		              <div class="form-group">
		                <textarea id="f_message" name="f_message" rows="5" class="form-control" placeholder="Escribe aquí tu consulta" required aria-required="true"><?php echo $f_message;?></textarea>
		 
		                <?php //Comprobamos si hay errores en la validación del campo Mensaje
		                if ( is_wp_error( $reg_errors ) ) {
		                  if ($reg_errors->get_error_message("empty-message")) {?>
		                  <br class="clearfix" />
		                  <div class="alert alert-danger alert-dismissable">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <p><?php echo $reg_errors->get_error_message("empty-message");?></p>
		                  </div>
		                  <?php }
		                }?>
		              </div>
		 			  <div class="g-recaptcha" data-sitekey="6LdDUkQUAAAAAIoj9XjYz9tOXiy0eO-8C5KR6KiM" style="transform:scale(0.85);-webkit-transform:scale(0.85);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
		              <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-default">Enviar</button>
		</form>
	</div>

</div>


<?php get_footer(); ?>