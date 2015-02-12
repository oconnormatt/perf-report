<?php
 
      // Init cURL
    $curl = curl_init();
      // Set target URL
    curl_setopt($curl, CURLOPT_URL, "https://api.pingdom.com/api/2.0/checks");
      // Set the desired HTTP method (GET is default, see the documentation for each request)
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

      // Pingdom email and password
    curl_setopt($curl, CURLOPT_USERPWD, "jake.mcgraw@refinery29.com:JL!%yR2usbDhK6jMm5O7");
      // Add a http header containing the R29 application key
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("App-Key: db7jf79n86s9v1mwgrghuegkt4zfccqo"));
      // Ask cURL to return the result as a string
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 

    var_dump(curl_exec($curl));

      // Execute the request and decode the json result into an associative array
    $response = json_decode(curl_exec($curl),true);
 
      // Check for errors returned by the API
    if (isset($response['error'])) {
        print "Error: " . $response['error']['errormessage'] . "\n";
        exit;
    }
 
      // Fetch the list of checks from the response
    $checksList = $response['checks'];
      // Print the names and statuses of all checks in the list
    foreach ($checksList as $check) {
        print $check['name'] . " is " . $check['status'] . "\n";
    }
 
?>