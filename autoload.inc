<?php

set_include_path( dirname( dirname( __FILE__ ) ) . PATH_SEPARATOR . get_include_path() );

spl_autoload_register( 'phpEws__autoload' );

function phpEws__autoload( $szClassname ) {
	$szFilename = str_replace( '_', DIRECTORY_SEPARATOR, $szClassname ) . '.php';
	$szFound = stream_resolve_include_path( $szFilename );
	if( $szFound !== false ) {
	  include_once( $szFilename );
	}
}
