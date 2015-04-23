<?php

/*return array(
	"base_url"=>"http://googleauth.com/gauth/auth",
	"providers"=> array(
		"Google"=>array(
			"enabled"=>true,
			"keys"=> array("id"=>"995632965666-ohp957jbiplhia0dg0qqm3q2i5ocjhvq.apps.googleusercontent.com","secret"=>"1vCe5jttUP3LU7NAyo6wOk2K"),
			"scope"=>"https://www.googleapis.com/auth/userinfo.profile". 
			"https://www.googleapis.com/auth/userinfo.email"
			)
		)
	);*/


return array(
    //"base_url" => "http://dev.store.ac.id/gauth/auth",
    "base_url" => "http://localhost:8000/gauth/auth",
    "providers" => array (
        "Google" => array (
            "enabled" => true,
            "keys"    => array ( "id" => "142449927950-6v7nrqjeptlmh1hafc1kfooqtp2vd5vj.apps.googleusercontent.com", "secret" => "t9W0veQ86WMBbi0LGicfyufF" ),
            "scope"           => "https://www.googleapis.com/auth/userinfo.profile ". // optional
                "https://www.googleapis.com/auth/userinfo.email"

        )));