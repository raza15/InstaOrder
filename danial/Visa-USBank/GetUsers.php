<html>
  <head>
     <script type="text/javascript">
        function onVisaCheckoutReady(){
        V.init( {
        apikey: "7O07VN664O10JW6A9ESS113p8sf9JeGzr6_2haC9F9m_ANtLM",
         paymentRequest:{
          currencyCode: "USD",
          total: "10.00"
        }
        });
        V.on("payment.success", function(payment)
        {alert(JSON.stringify(payment)); });
        V.on("payment.cancel", function(payment)
        {alert(JSON.stringify(payment)); });
        V.on("payment.error", function(payment, error)
        {alert(JSON.stringify(error)); });
        }
     </script>
  </head>
  <body>    
    <?php echo '<p>Hello World</p>'; 

      $opts = array(
        'http'=>array(
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n"
        )
      );
    $context = stream_context_create($opts);
    $userList=file_get_contents("https://api119525live.gateway.akana.com:443/users", false, $context);
    
    #$accountTypes=file_get_contents("https://api119525live.gateway.akana.com:443/account/types");
    $jtest=json_decode($userList, true);

    foreach ($jtest['LegalParticipantIdentifierList'] as $key => $value) {
      echo "$value <br/>";#$jtest['LegalParticipantIdentifierList'][0];
    }
    


    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    #print_r($accountTypes);

  ?>


  </body>
</html>