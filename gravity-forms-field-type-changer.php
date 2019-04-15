

// For each form we need to disable autocomplete.
add_filter( 'gform_form_tag', 'form_tag', 10, 2 );

function form_tag( $form_tag, $form ) {

	$form_tag = preg_replace( "|>|", " autocomplete='off'>", $form_tag );

	return $form_tag;
}


// custom field type applied to phone field 
if( !is_admin() ){  // only run on the front end of the WordPress website
    
	add_filter( 'gform_field_input_1_25', 'tel_field_function', 10, 5 );
	
	function tel_field_function( $input, $field, $value, $lead_id, $form_id ) {
		
		 if ( $form_id == 1 && $field->id == 25 ) {
	        $input = '<input id="input_1_25" tabindex="4" name="input_25" step="any" type="tel" value="" aria-required="true" aria-invalid="false" />';
	    }
	    return $input;
	}
	
	// apply email suggestions
	add_filter( 'gform_field_input_1_23', 'tel_field9_function', 10, 5 );
	
	function tel_field9_function( $input, $field, $value, $lead_id, $form_id ) {
		
		 if ( $form_id == 1 && $field->id == 23 ) {
	        $input = '<input id="input_1_23" tabindex="6" name="input_23" step="any" type="email" value="" aria-required="true" aria-invalid="false" />';
	    }
	    return $input;
	}
}
 
