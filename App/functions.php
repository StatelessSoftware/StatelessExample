<?php

// functions.php is a place you can put generic global-scope functions.

/**
 * @brief Autoload App files
 * 
 * @param string $load Class name to load
 */
spl_autoload_register(function($load) {
    if (strpos($load, "App\\") !== false) {
        $load = str_replace("\\", "/", $load);
        $load = str_replace("App", "", $load);
        include_once(__DIR__ . "/" . $load . ".php");
    }
});

/**
 * Start the session along all subdomains
 */
function startSession() {
    // Uncomment the following line to serve session accross subdomains
    //session_set_cookie_params(0, '/', '.' . SESSION_DOMAIN); 

    session_start(); 
}

/**
 * Check if an array is an associative array
 * 
 * @param array $array Array to check
 * @return boolean Returns if the array is associative
 */
function isAssociative($array) {
    if (array() === $array) return false;
    return array_keys($array) !== range(0, count($array) - 1);
}

/**
 * Filter a slug
 * 
 * @param string $slug Slug to filter
 * @return string Returns the filtered slug
 */
function filterSlug($slug) {
    $slug = strtolower($slug);
    $slug = str_replace("-", "_", $slug);
    $slug = str_replace(" ", "-", $slug);
    
    return $slug;
}

/**
 * Unfilter a slug
 * 
 * @param string $slug Slug to unfilter
 * @param string Returns the unfiltered slug * 
 */
function unfilterSlug($slug) {
    $slug = ucwords($slug);
    $slug = str_replace("_", "-", $slug);
    $slug = str_replace("-", " ", $slug);

    return $slug;
}

/**
 * Create an excerpt
 *
 * @param string $str String to excerpt
 * @param integer $len (Optional) Excerpt length
 * @return string Returns the excerpt
 */
function excerpt($str, $len = 100) {

    $ellipse = strlen($str) > $len;
    $str = substr($str, 0, $len);
    $str .= $ellipse ? "... " : "";
    
    return $str;

}

/**
 * Get a setting from the database, out of the Settings Model context
 * 
 * @param string $slug Setting slug to find
 * @return mixed Returns the value if found, otherwise returns false
 */
function getSetting($slug) {
    global $db;
    $value = false;

    // Pull matching settings from database
    $results = $db->selectBy("Settings", [
        "settingKey" => $slug
    ]);

    // Check results
    if (count($results)) {
        $result = $results[0];
        $value = $result["settingValue"];
    }

    // Return result
    return $value;
}
