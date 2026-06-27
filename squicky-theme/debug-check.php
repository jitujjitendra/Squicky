<?php
/**
 * Squicky Theme Debug Check
 * 
 * Upload this file to: wp-content/themes/squicky-theme/debug-check.php
 * Then visit: https://squicky.in/wp-content/themes/squicky-theme/debug-check.php
 * 
 * DELETE THIS FILE AFTER DEBUGGING!
 */

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

echo "<h2>Squicky Theme Debug Check</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>WordPress Path Check...</p>";

// Check if we can find WordPress
$wp_load = dirname(__FILE__) . '/../../../wp-load.php';
if ( file_exists( $wp_load ) ) {
    echo "<p style='color:green;'>wp-load.php found at: $wp_load</p>";
    
    echo "<p>Attempting to load WordPress...</p>";
    try {
        require_once $wp_load;
        echo "<p style='color:green;'>WordPress loaded successfully!</p>";
        
        echo "<p>Attempting to load theme functions...</p>";
        $funcs = get_template_directory() . '/functions.php';
        echo "<p>functions.php path: $funcs</p>";
        echo "<p>File exists: " . (file_exists($funcs) ? 'YES' : 'NO') . "</p>";
        
        // Check inc files
        $cust = get_template_directory() . '/inc/customizer.php';
        $tags = get_template_directory() . '/inc/template-tags.php';
        echo "<p>customizer.php exists: " . (file_exists($cust) ? 'YES' : 'NO') . "</p>";
        echo "<p>template-tags.php exists: " . (file_exists($tags) ? 'YES' : 'NO') . "</p>";
        
        // Check assets
        $css = get_template_directory() . '/assets/css/main.css';
        $js  = get_template_directory() . '/assets/js/main.js';
        $logo = get_template_directory() . '/assets/images/logo.png';
        echo "<p>main.css exists: " . (file_exists($css) ? 'YES (' . filesize($css) . ' bytes)' : 'NO') . "</p>";
        echo "<p>main.js exists: " . (file_exists($js) ? 'YES (' . filesize($js) . ' bytes)' : 'NO') . "</p>";
        echo "<p>logo.png exists: " . (file_exists($logo) ? 'YES (' . filesize($logo) . ' bytes)' : 'NO') . "</p>";
        
        // List all files in theme directory
        echo "<h3>Theme Directory Contents:</h3><pre>";
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(get_template_directory(), RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $file) {
            echo $file->getPathname() . " (" . $file->getSize() . " bytes)\n";
        }
        echo "</pre>";
        
    } catch (Exception $e) {
        echo "<p style='color:red;'>ERROR: " . $e->getMessage() . "</p>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    }
} else {
    echo "<p style='color:red;'>wp-load.php NOT found at: $wp_load</p>";
    echo "<p>Trying alternative paths...</p>";
    
    // Try other paths
    $paths = array(
        dirname(__FILE__) . '/../../..' ,
        $_SERVER['DOCUMENT_ROOT'],
    );
    foreach ($paths as $p) {
        $test = $p . '/wp-load.php';
        echo "<p>Checking: $test -> " . (file_exists($test) ? 'EXISTS' : 'NOT FOUND') . "</p>";
    }
}

echo "<hr><p><strong>If you see this page without errors above, the theme files are fine. The critical error is likely from a PLUGIN conflict.</strong></p>";
echo "<p>Try: Plugins → Deactivate All → then activate theme → then reactivate plugins one by one.</p>";
