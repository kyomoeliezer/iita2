<?php

/*
 * Example PHP implementation used for the REST example.
 * This file defines a DTEditor class instance which can then be used, as
 * required, by the CRUD actions.
 */

// DataTables PHP library
include( dirname(__FILE__)."/../../../php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
$out = Editor::inst( $db, 'gr_status' )
	->fields(
	    Field::inst( 'id' ),
	    Field::inst( 'districtname' ),
		Field::inst( 'type' ),
		Field::inst( 'idadi' ),
		Field::inst( 'Closed' ),
		Field::inst( 'OnProgress' ),
	    Field::inst( 'Open' ),
	    Field::inst( 'EscalatedtoTMU' )   
	
	)
		->process( $_POST )
	    ->data();
 
// On 'read' remove the DT_RowId property so we can see fully how the `idSrc`
// option works on the client-side.
if ( Editor::action( $_POST ) === Editor::ACTION_READ ) {
    for ( $i=0, $ien=count($out['data']) ; $i<$ien ; $i++ ) {
        unset( $out['data'][$i]['DT_RowId'] );
    }
}
 
// Send it back to the client
echo json_encode( $out );
 
// On 'read' remove the DT_RowId property so we can see fully how the `idSrc`
// option works on the client-side.
