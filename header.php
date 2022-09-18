<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body>
   <header class="site-header">
    <div class="container">
        <div class="header-wrapper">
                <div class="header-left">
                    <div class="brand">
                        <img src="<?php echo get_template_directory_uri().'/assets/images/Logo.png' ; ?>" alt="SELISE Woo Theme">
                    </div>
                    <nav class="main-navigation">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <ul>
                        <li><i class="fa fa-search" aria-hidden="true"></i></li>
                        <li><i class="fa fa-heart-o" aria-hidden="true"></i></li>
                    </ul>
                    <button>Account</button>
                </div>
        </div>  
    </div>
   </header>