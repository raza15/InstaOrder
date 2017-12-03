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

    #$accountTypes=file_get_contents("https://api119525live.gateway.akana.com:443/account/types");

    $postdata = http_build_query( array('LegalParticipantIdentifier' => '908997180284469041') );    

      $opts = array(
        'http'=>array(
        'method'=>"POST",
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content'=>$postdata
        )
      );
    $context = stream_context_create($opts);

    $uAccounts=file_get_contents("https://api119525live.gateway.akana.com:443/user/accounts", false, $context);
    
    
    $jtest=json_decode($uAccounts, true);
    #foreach ($jtest['AccessibleAccountDetailList'] as $key => $value) {
      #echo "$value <br/>";#$jtest['LegalParticipantIdentifierList'][0];
    #  print_r($key);
    #}


    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    print_r($jtest);
  ?>


  </body>
</html>