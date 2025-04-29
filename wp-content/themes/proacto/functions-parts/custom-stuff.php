<?php 
function my_acf_init() {
	
	//acf_update_setting('google_api_key', 'AIzaSyAhcchKwLDpqGoWZYE7VCPNeFsmqWJC6eA');
	acf_update_setting('google_api_key', 'AIzaSyBvy3iyOo7jMS-RwdFyCZQAalM9xrA7KzI');

}

add_action('acf/init', 'my_acf_init');









?>