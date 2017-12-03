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


    $postdata = json_encode( array(
      'OperatingCompanyIdentifier' => '52',
      'ProductCode' => 'CCD',
      'PrimaryIdentifier' => '00000004037670240271147'
      )
    );    

      $opts = array(
        'http'=>array(
        'method'=>"POST",
        'header'  => 'Content-Type:application/json',
        'content'=>$postdata
        )
      );
    $context = stream_context_create($opts);

    $aTransactions=file_get_contents('https://api119622live.gateway.akana.com:443/account/transactions', false, $context);
    
    
    $jtest=json_decode($aTransactions, true);
    foreach ($jtest['MonetaryTransactionResponseList'] as $key => $value) {      
        $tAmount=$value['PostedAmount'];      
        $tDate=$value['PostedDate'];      
        echo "$tAmount     $tDate";      
        echo "<br/><br/>";      
    }


    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    print_r($jtest);
  ?>


  </body>
</html>