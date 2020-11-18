<?php

require_once('phpxmlrpc-4.4.1/lib/xmlrpc.inc');

function authenticate(){
	$account = 'fujifilm';
	$username = 'mmunevar';
	$password = 'Q08CJ4aFmf63';

	$xmlrpc = new xmlrpc_client("http://$account.$username:$password@app.adestra.com/api/xmlrpc");
	$xmlrpc->setDebug(0);
	$xmlrpc->request_charset_encoding="UTF-8";
	
	return $xmlrpc;

}

/*
function createContact($xmlrpc, $firstname, $lastname, $email, $email_2, $educational_institution, $university_id){

	// contact.create(table_id, contact_data, dedupe_field)
	$msg = new xmlrpcmsg(
	    "contact.create",
	    array(
	        // table_id
			new xmlrpcval(2, "int"),
			// contact_data
			new xmlrpcval(
				array(
					"first_name" => new xmlrpcval($firstname,"string"),
					"last_name" => new xmlrpcval($lastname,"string"),
					"email" => new xmlrpcval($email,"string"),
					"email_2" => new xmlrpcval($email_2,"string"),
					"educational_institution" => new xmlrpcval($educational_institution,"string"),
					"university_id" => new xmlrpcval($university_id,"string"),
					"user_accepts_marketing_1" => new xmlrpcval("Y","string"),
				),
				"struct"
			),
			// dedupe_field
			new xmlrpcval("email","string"),
	    )
	);

	$response = $xmlrpc->send($msg);


	echo "<pre>";
	print_r($response);
	echo "</pre>";	


	return $response->val->me['int'];

}

function addContactToList($xmlrpc, $contactID, $listID){
	// contact.addList(contact_id, list_id)
	$msg = new xmlrpcmsg(
	    "contact.addList",
	    array(
	        // contact_id
			new xmlrpcval( intval ( $contactID ),"int"),

			  // list id
			new xmlrpcval( $listID,"int"), 

	    )
	);

	$response = $xmlrpc->send($msg);

	
	echo "<pre>";
	print_r($response);
	echo "</pre>";
	
}



function subscribeContact($xmlrpc, $contactID, $listID){
	// contact.subscribe(contact_id, list_ids, unsub_list_ids)
	$msg = new xmlrpcmsg(
	    "contact.subscribe",
	    array(
	        // contact_id
			new xmlrpcval( intval ( $contactID ),"int"),

			new xmlrpcval(
				array(
					new xmlrpcval( $listID,"int"), 
				),
				"array"
			),
	    )
	);

	$response = $xmlrpc->send($msg);

	
	echo "<pre>";
	print_r($response);
	echo "</pre>";
	
}
*/
function getForm($xmlrpc, $formID, $contactID, $launchID ){
	// form.generate_url(form_id, contact_id, launch_id)
	$msg = new xmlrpcmsg(
	    "form.generate_url",
	    array(
			new xmlrpcval( intval ( $formID ),"int"),
			new xmlrpcval( intval ( $contactID ),"int"),
			new xmlrpcval( intval ( $launchID ),"int"),
	    )
	);

	$response = $xmlrpc->send($msg);
	
	/*echo "<pre>";
	print_r($response);
	echo "</pre>";*/

	return $response->val->me["string"]; //returns the form html code
}


function getContactID($xmlrpc, $email ){
	// contact.search(form_id, contact_id, launch_id)
	$msg = new xmlrpcmsg(
	    "contact.search",
	    array(
	        // core table_id
			new xmlrpcval(2, "int"),
			// contact_data
			new xmlrpcval(
				array(
					"email" => new xmlrpcval($email,"string"),
				),
				"struct"
			),
	    )
	);

	$response = $xmlrpc->send($msg);
	
	/*echo "<pre>";
	print_r($response);
	echo "</pre>";*/

	if( count ( $response->val->me["array"] ) <= 0 ){
		return false;
	} else {
		return $response->val->me["array"][0]->me['struct']['id']->me["int"];
	}
} 


