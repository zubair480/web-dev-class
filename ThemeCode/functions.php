<?php

function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'firstWebsitestyles', get_stylesheet_uri() );
	// wp_enqueue_scripts("index", get_template_directory_uri() . "/js/index.js");
	
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


function custom_theme_navigation_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ),
        )
    );
}

add_action( 'init', 'custom_theme_navigation_menus' );


function enqueue_custom_scripts() {
    // Enqueue your custom JS file
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/index.js', array('jquery'), '1.0', true);
}


function add_header_theme_support(){
    $args = array(
		'width'              => 1000,
		'height'             => 250,
		'flex-width'         => true,
		'flex-height'        => true,
	);
    add_theme_support('custom-header', $args);
}

add_action( 'after_setup_theme', 'add_header_theme_support');

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

add_action('widgets_init', 'secondwebsite_widgets_init');

function secondwebsite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-2',
	) );
    
}


function test_weather_api() {
    $api_key = '5e3f6dabb8cf4af28afed754bea69421';
	$api_key2 = '1011dda4ef8bfa5a4007d4632f3b804d';
	$cityId = 'London,uk';


    
    $api_endpoint = "http://api.openweathermap.org/data/2.5/weather?q={$cityId}&appid={$api_key2}";

	$url = 'https://api.openweathermap.org/data/2.5/weather?q=Lahore,pk&appid=5e3f6dabb8cf4af28afed754bea69421';

   

    
    $response = wp_remote_get( $url  ); // [1,2,3]
	$header = $response['headers']; // array of http header lines
    $body = $response['body']; // use the content
    $decoded_response = json_decode($body);

    if ($decoded_response) {
		// print_r($decoded_response);
        ?>
        <div class="weather-info-container">
            <h2>Weather Information for <?php echo $decoded_response->name; ?></h2>

            <div class="weather-section">
                <strong>Coord:</strong> <?php echo $decoded_response->coord->lon . ', ' . $decoded_response->coord->lat; ?>
            </div>

            <div class="weather-section">
                <strong>Weather:</strong> <?php echo $decoded_response->weather[0]->main . ' - ' . $decoded_response->weather[0]->description; ?>
            </div>

            <div class="weather-section">
                <strong>Base:</strong> <?php echo $decoded_response->base; ?>
            </div>

            <div class="weather-section">
                <strong>Main:</strong> Temp: <?php echo $decoded_response->main->temp - 273; ?>, Pressure: <?php echo $decoded_response->main->pressure; ?>, Humidity: <?php echo $decoded_response->main->humidity; ?>
            </div>

            <div class="weather-section">
                <strong>Visibility:</strong> <?php echo $decoded_response->visibility; ?>
            </div>

            <div class="weather-section">
                <strong>Wind:</strong> Speed: <?php echo $decoded_response->wind->speed; ?>, Degree: <?php echo $decoded_response->wind->deg; ?>
            </div>

            <div class="weather-section">
                <strong>Clouds:</strong> <?php echo $decoded_response->clouds->all; ?>
            </div>

            <div class="weather-section">
                <strong>Timestamp:</strong> <?php echo $decoded_response->dt; ?>
            </div>

            <div class="weather-section">
                <strong>Sys:</strong> Country: <?php echo $decoded_response->sys->country; ?>, Sunrise: <?php echo $decoded_response->sys->sunrise; ?>, Sunset: <?php echo $decoded_response->sys->sunset; ?>
            </div>

            <div class="weather-section">
                <strong>City ID:</strong> <?php echo $decoded_response->id; ?>
            </div>

            <div class="weather-section">
                <strong>City Name:</strong> <?php echo $decoded_response->name; ?>
            </div>

            <div class="weather-section">
                <strong>Cod:</strong> <?php echo $decoded_response->cod; ?>
            </div>
        </div>

        <style>
            .weather-info-container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                background-color: #f9f9f9;
            }

            .weather-section {
                margin-bottom: 10px;
            }
        </style>
        <?php
    } else {
        echo 'Error decoding JSON response.';
    }
}

add_shortcode( 'weather', 'test_weather_api' );



?>