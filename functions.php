<?php
class SeliseIntiClass {
    function __construct(){

        //Load necessary scripts
        add_action('wp_enqueue_scripts', [$this, 'selise_load_assets']);
        //Give necessary theme support
        add_action('after_setup_theme', [$this, 'selise_load_theme_util']);

        //Din't get enough time to complete the Endpoint
        //add_action('rest_api_init',[$this, 'order_summery']);
    }

    // function order_summery(){

    //     register_rest_route( 'selise/v1', '/recent-orders/)', array(
    //         'methods' => 'GET',
    //         'callback' => 'selise_custom_endpoint',
    //       ) );
    
    // }

    function selise_custom_endpoint(){
        return 'Hello';
    }


    function selise_load_assets()
    {
        wp_enqueue_script(
            'main-script',
            get_template_directory_uri() . '/assets/js/index.js',
            array('jquery'),
            '1.0',
            true
        );
        wp_enqueue_style(
            'google-font',
            '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i'
        );
        wp_enqueue_style(
            'font-awesome',
            '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
        );
        wp_enqueue_style(
            'theme-main-style',
            get_template_directory_uri() . '/assets/css/style.css',
            false,
            '1.0'
        );
    
        
    }
    
    
    function selise_load_theme_util()
    {
        //register_nav_menu('headerMenuLocaion', 'Header Menu Locaion');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        //add_image_size( 'professorLands', 400, 260, true );
        //add_image_size( 'professorPotrait', 480, 650, true );
        //add_image_size( 'pageBanner', 1500, 380, true );
    }

    //Get the Associated Categoris seperated with comma
    function selise_get_terms($id){
        $itemTerms = get_the_terms( $id, 'product_cat' );
        $termArr = [];
        foreach($itemTerms as $term){

            $termArr[]=($term->name);
        }
        return join(',',$termArr);
    }

    //Get a list of all Categories of the store
    function selise_get_categories_list(){
    	
        $orderby = 'name';
        $order = 'asc';
        $hide_empty = false ;
        $cat_args = array(
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
        );
        
        $product_categories = get_terms( 'product_cat', $cat_args );
        
        if( !empty($product_categories) ){
            echo '
        
        <ul>';
            foreach ($product_categories as $key => $category) {
                echo '
        
        <li>';
                echo '<a href="'.get_term_link($category).'" >';
                echo $category->name;
                echo '</a>';
                echo '</li>';
            }
            echo '</ul>
        
        
        ';
        }
    }
}




//Initialize the class
$seliseIntiClass = new SeliseIntiClass();




