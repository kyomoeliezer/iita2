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
$out = Editor::inst( $db, 'tbl_complains' )
	->fields(
		Field::inst( 'tbl_complains.id' )->set(false),
	    Field::inst( 'tbl_complains.regionname' ),
	    Field::inst( 'tbl_complains.districtname' ),
		Field::inst( 'tbl_complains.wardname' ),
		Field::inst( 'tbl_complains.villagename' ),			
		Field::inst( 'tbl_complains.comp_title' ),
	    Field::inst( 'tbl_complains.comp_desc' ),		
		Field::inst( 'tbl_complains.eng_comment'),
	    Field::inst( 'tbl_complains.eng_name'),
	    Field::inst( 'tbl_complains.status' )
	    ->options( 'status', 'id', 'name' )
	    ->validator( 'Validate::dbValues' ),
	    Field::inst( 'status.name' )

	)	
	->where('tbl_complains.districtname',$_GET['kampuni'],'=')
	->where('tbl_complains.status','closed','!=')
	->where('tbl_complains.status','escalated to tmu','!=')
		->leftJoin( 'status', 'status.id', '=', 'tbl_complains.status' )
		
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
