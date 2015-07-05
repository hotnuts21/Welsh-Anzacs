<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("restclient.php");


function decode_result_as_json($response) {
  return json_decode($response, true);
}
function get_aaa() {
  $options =
  ['decoders' => array(
    'json' => 'decode_result_as_json',
    'php' => 'unserialize'
    )
  ];

   $api = new RestClient($options);

    $result = $api->post("https://api.naa.gov.au/naa/api/v1/person/search-series-b2455?app_id={appi}&app_key={key}",
       "{\"page\": 1,\"rows\": 50,\"query_fields\": {\"place_of_birth\": \"wales\"}}",
           array('Content-Type' => 'application/json'));
      $params = json_encode([
          'query_fields' => [
            "place_of_birth" => 'some string',
          ]
        ]);
      $code = $result->info->http_code;

      if(!$code == 200) {
          echo "POST failed, error code: ".$code;
      }

      $response_json = $result->decode_response();

      return $response_json;
    }

//$mysql_pass 'nE74B9yxVnSXBK3X';

?>
