<?php defined('SYSPATH') OR die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Moscow');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
//I18n::lang('en-us');
/**
 * Set the default language
 */
I18n::lang('ru-ru');
/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
      

}
       Cookie::$salt = 'Narwhals can triforce';
       Cookie::$expiration = Date::WEEK;
        Session::$default = 'cookie';
/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
	'base_url'   => '/vita/',
        'index_file' => FALSE,
  //  'errors'        => TRUE,
    //'profile'       => (Kohana::$environment == Kohana::DEVELOPMENT),
    //'caching'       => (Kohana::$environment == Kohana::PRODUCTION)
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	 'auth'       => MODPATH.'auth',       // Basic authentication
	 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	'database'   => MODPATH.'database',   // Database access
	'image'      => MODPATH.'image',      // Image manipulation
	'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	'pagination'  => MODPATH.'pagination',  // Pagination Листалка  https://github.com/kohana/pagination
        'purifier'  => MODPATH.'purifier',  //http://htmlpurifier.org/ HTML Purifier 
        //is a standards-compliant HTML filter library written in PHP. 
        //HTML Purifier will not only remove all 
        //malicious code (better known as XSS) with a thoroughly audited,
         'email'        => MODPATH.'email',        // Swiftmailer
    
         'sitemap'       => MODPATH.'sitemap', //https://github.com/ThePixelDeveloper/kohana-sitemap
         'captcha'       => MODPATH.'captcha', //https://github.com/kolanos/kohana-captcha
    
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

//if ( ! Route::cache()) {


	
/**
 * Error router
 */
Route::set('error', 'error/<action>/<origuri>/<message>', array('action' => '[0-9]++', 'origuri' => '.+', 'message' => '.+'))
->defaults(array(
    'controller' => 'error',
    'action'     => 'index'
));



Route::set('widgets', 'widgets(/<controller>(/<param>))', array('param' => '.+'))
	->defaults(array(
            'directory'  => 'widgets',
            'action'     => 'index',
	));

Route::set('auth', '<action>', array('action' => 'login|logout|register|remembermepass|hrefpass'))
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'auth',
	));

//Route::set('calendar', 'calendar')
//	->defaults(array(
//                'directory'  => 'index',
//		'controller' => 'calendar',
//	));



//Route::set('place', '(<controller>(/<action>(/<id>)))', array('id' => '\d+'))
//	->defaults(array(
//                'directory'  => 'index',
//		'controller' => 'places',
//                
//		
//	));


//Route::set('places', 'places')
//	->defaults(array(
//                'directory'  => 'index',
//		'controller' => 'places',
//	));


Route::set('order', 'order(/<id>)', array('id' => '\d+'))
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'order',
                'action' => 'index'
	));

Route::set('categories', 'categories(/<id>)', array('id' => '\d+'))
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'categories',
                'action' => 'index'
	));

Route::set('event', 'event(/<id>)', array('id' => '\d+'))
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'event',
                'action' => 'one'
	));

Route::set('search', 'search')
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'search',
	));

Route::set('admin', 'admin(/<controller>(/<action>(/<id>)))')
	->defaults(array(
            'directory'  => 'admin',
            'controller' => 'main',
            'action'     => 'index',
	));

Route::set('artists', 'artists(/<id>)', array('id' => '\d+'))
        ->defaults(array(
            'directory'  => 'index',
            'controller' => 'artists',
            'action'     => 'index',		
    ));


Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
                'directory'  => 'index',
		'controller' => 'main',
		'action'     => 'index',
	));
//Route::cache(TRUE);
