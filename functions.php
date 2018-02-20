<?php
/*
Creado por carlos
*/
function fergu_styles(){

  wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
  wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
  //wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css');
  wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css' );


  wp_enqueue_script('jquery');
  wp_enqueue_script('captcha', "https://www.google.com/recaptcha/api.js", array('jquery'), true);

  wp_enqueue_script('jqueryslider', "https://code.jquery.com/ui/1.11.4/jquery-ui.js", array('jquery'),true);
  wp_enqueue_script('bootstrapjs', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", array('jquery'), true);
  wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '', true );
  //wp_enqueue_style('slider', get_stylesheet_directory_uri() . '/css/slider.css');
  wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css');
  wp_enqueue_style('style', get_stylesheet_uri()); //usa el style.css, debe ser la ultima hoja de estilos
  
}

add_action('wp_enqueue_scripts', 'fergu_styles');


//* Enqueue script to activate WOW.js
add_action('wp_enqueue_scripts', 'sk_wow_init_in_footer');
function sk_wow_init_in_footer() {
  add_action( 'print_footer_scripts', 'wow_init' );
}
//* Add JavaScript before </body>
function wow_init() { ?>
  <script type="text/javascript">
    new WOW().init();
  </script>
<?php }



//Insertar javascripts
add_action("wp_enqueue_scripts", "incrustar_js");
function incrustar_js(){
  if ( !is_admin() ) { // para que solo haga la carga si no es el área de admin
     // registra la ubicación, dependencias y versión de su script.
     wp_register_script('slidergaleria',
         get_template_directory_uri() . '/js/slidergaleria.js',
         array('jquery'),
         '1.0' );
     // pone en cola es script
     wp_enqueue_script('slidergaleria');
  }
}

/**
 * Crear nuestros menús gestionables desde el
 * administrador de Wordpress.
 */

/*Menus*/
require_once('wp-bootstrap-navwalker.php');

function mis_menus() {
  register_nav_menus(
    array(
      'navigation' => __( 'Menú de navegación principal de fergu' ),
      
    )
  );
}
add_action( 'after_setup_theme', 'mis_menus' );


/*funcion para que tome la imagen destacada en el header*/
add_theme_support('post-thumbnails');

/*
 C O R T I N A S

*/
// La función no será utilizada antes del 'init'.
add_action( 'init', 'my_custom_init' );
/* Here's how to create your customized labels */
function my_custom_init() {
  $labels = array(
  'name' => _x( 'Cortinas', 'post type general name' ),
        'singular_name' => _x( 'Cortina', 'post type singular name' ),
        'add_new' => _x( 'Añadir nuevo', 'book' ),
        'add_new_item' => __( 'Añadir nuevo Cortina' ),
        'edit_item' => __( 'Editar Cortina' ),
        'new_item' => __( 'Nuevo Cortina' ),
        'view_item' => __( 'Ver Cortina' ),
        'search_items' => __( 'Buscar Cortinas' ),
        'not_found' =>  __( 'No se han encontrado Cortinas' ),
        'not_found_in_trash' => __( 'No se han encontrado Cortinas en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
 
    register_post_type( 'cortina', $args ); /* Registramos y a funcionar */
}

// Lo enganchamos en la acción init y llamamos a la función create_book_taxonomies() cuando arranque
add_action( 'init', 'create_book_taxonomies', 0 );
 
// Creamos dos taxonomías, Categoria y autor para el custom post type "libro"
function create_book_taxonomies() {

  // Añadimos nueva taxonomía y la hacemos jerárquica (como las categorías por defecto)
  $labels = array(
  'name' => _x( 'Categorias', 'taxonomy general name' ),
  'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
  'search_items' =>  __( 'Buscar por Categoria' ),
  'all_items' => __( 'Todos los Categorias' ),
  'parent_item' => __( 'Categoria padre' ),
  'parent_item_colon' => __( 'Categoria padre:' ),
  'edit_item' => __( 'Editar Categoria' ),
  'update_item' => __( 'Actualizar Categoria' ),
  'add_new_item' => __( 'Añadir nuevo Categoria' ),
  'new_item_name' => __( 'Nombre del nuevo Categoria' ),
);
register_taxonomy( 'categoria', array( 'cortina' ), array(
  'hierarchical' => true,
  'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'categoria' ),
));

// Añado otra taxonomía, esta vez no es jerárquica, como las etiquetas.
$labels = array(
  'name' => _x( 'Etiquetas', 'taxonomy general name' ),
  'singular_name' => _x( 'Escritor', 'taxonomy singular name' ),
  'search_items' =>  __( 'Buscar Etiquetas' ),
  'popular_items' => __( 'Etiquetas populares' ),
  'all_items' => __( 'Todos los Etiquetas' ),
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Editar Escritor' ),
  'update_item' => __( 'Actualizar Escritor' ),
  'add_new_item' => __( 'Añadir nuevo Escritor' ),
  'new_item_name' => __( 'Nombre del nuevo Escritor' ),
  'separate_items_with_commas' => __( 'Separar Etiquetas por comas' ),
  'add_or_remove_items' => __( 'Añadir o eliminar Etiquetas' ),
  'choose_from_most_used' => __( 'Escoger entre los Etiquetas más utilizados' )
);
 
register_taxonomy( 'estiqueta', 'cortina', array(
  'hierarchical' => false,
  'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'etiqueta' ),
));
} // Fin de la función create_book_taxonomies().

/*

S E R V C I O S

*/

// La función no será utilizada antes del 'init'.
add_action( 'init', 'my_custom_servicio' );
/* Here's how to create your customized labels */
function my_custom_servicio() {
  $labels = array(
  'name' => _x( 'Servicios', 'post type general name' ),
        'singular_name' => _x( 'Servicio', 'post type singular name' ),
        'add_new' => _x( 'Añadir nuevo', 'servicio' ),
        'add_new_item' => __( 'Añadir nuevo Servicio' ),
        'edit_item' => __( 'Editar Servicio' ),
        'new_item' => __( 'Nuevo Servicio' ),
        'view_item' => __( 'Ver Servicio' ),
        'search_items' => __( 'Buscar Servicios' ),
        'not_found' =>  __( 'No se han encontrado Servicios' ),
        'not_found_in_trash' => __( 'No se han encontrado Servicios en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
 
    register_post_type( 'servicio', $args ); /* Registramos y a funcionar */
}

// Lo enganchamos en la acción init y llamamos a la función create_service_taxonomies() cuando arranque
add_action( 'init', 'create_service_taxonomies', 0 );
 
// Creamos dos taxonomías, Categoria y autor para el custom post type "libro"
function create_service_taxonomies() {

  // Añadimos nueva taxonomía y la hacemos jerárquica (como las categorías por defecto)
  $labels = array(
  'name' => _x( 'Categorias', 'taxonomy general name' ),
  'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
  'search_items' =>  __( 'Buscar por Categoria' ),
  'all_items' => __( 'Todos los Categorias' ),
  'parent_item' => __( 'Categoria padre' ),
  'parent_item_colon' => __( 'Categoria padre:' ),
  'edit_item' => __( 'Editar Categoria' ),
  'update_item' => __( 'Actualizar Categoria' ),
  'add_new_item' => __( 'Añadir nuevo Categoria' ),
  'new_item_name' => __( 'Nombre del nuevo Categoria' ),
);
register_taxonomy( 'categoria_servicio', array( 'servicio' ), array(
  'hierarchical' => true,
  'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'categoria' ),
));

// Añado otra taxonomía, esta vez no es jerárquica, como las etiquetas.
$labels = array(
  'name' => _x( 'Etiquetas', 'taxonomy general name' ),
  'singular_name' => _x( 'Escritor', 'taxonomy singular name' ),
  'search_items' =>  __( 'Buscar Etiquetas' ),
  'popular_items' => __( 'Etiquetas populares' ),
  'all_items' => __( 'Todos los Etiquetas' ),
  'parent_item' => null,
  'parent_item_colon' => null,
  'edit_item' => __( 'Editar Escritor' ),
  'update_item' => __( 'Actualizar Escritor' ),
  'add_new_item' => __( 'Añadir nuevo Escritor' ),
  'new_item_name' => __( 'Nombre del nuevo Escritor' ),
  'separate_items_with_commas' => __( 'Separar Etiquetas por comas' ),
  'add_or_remove_items' => __( 'Añadir o eliminar Etiquetas' ),
  'choose_from_most_used' => __( 'Escoger entre los Etiquetas más utilizados' )
);
 
register_taxonomy( 'estiqueta_servicios', 'servicio', array(
  'hierarchical' => false,
  'labels' => $labels, /* ADVERTENCIA: Aquí es donde se utiliza la variable $labels */
  'show_ui' => true,
  'query_var' => true,
  'rewrite' => array( 'slug' => 'etiqueta' ),
));
} // Fin de la función create_book_taxonomies().



?>