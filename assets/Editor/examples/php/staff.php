<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../../php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'payment','PID')
	->fields(
		Field::inst( 'WARD' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'VILLAGE' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'ATTENDED_HH' ),
		Field::inst( 'ABSENT_HH' ),
		Field::inst( 'REASON' ),
		Field::inst( 'ACTION' ),
		Field::inst( 'UNPAID_AMT' ),
		Field::inst( 'ACTUAL_START_DATE' )
			->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Please enter a date in the format yyyy-mm-dd"
			) )
			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 )
	)
	->process( $_POST )
	->json();
