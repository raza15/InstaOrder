<html>
  <head>

  </head>
  <body>
    

<center><a href="http://localhost/accountmanager.php"> <img src="../logo.png" /></a><br/> </center>

    <?php 

          

    $postdata = json_encode( array(
       "personalUserID" => "M01260604",
       "channelCode" => "OLB_MM",
       "transactionTypeCode" => "REGPMT",
       "fromOperatingCompanyIdentifier" => "288",
       "fromProductCode" => "DDA",
       "fromPrimaryAccountIdentifier" => "100100511516",
       "fromAccountType" => "SAVINGS",
       "toOperatingCompanyIdentifier" => "52",
       "toProductCode" => "CCD",
       "toPrimaryAccountIdentifier" => "4718240047142264",
       "requestedTransferAmount" => "200",
       "identityIdentifier" => "MOBLBNKG",
       "paymentType" => "OtherAmount",
       "paymentTypeCode" => "FUTUREPMTMADETHRUWEB",
       "effectiveDate" => "2016-01-21",
       "isRecurring" => "true",
       "selectedDayOfMOnth" => "25",
       "enhancedAutoPayTypeCode" => "F"
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

    $aTransactions=file_get_contents('https://api132269live.gateway.akana.com:443//fundstransfer', false, $context);
    
    
    $jtest=json_decode($aTransactions, true);

    echo "<center><h2>Your Orders Have Heen Successfully Placed.</h2></center>";

    echo "<table border='1' align='center'>";    
    echo "<tr align='center'><th>Provider</th><th>Order Balance Transfered</th><th>Confirmation Number</th></tr>";    
    echo "<tr align='center'><td>Provider 1</td><td>230.34$</td><td>18438002383</td></td></tr>";
    echo "<tr align='center'><td>Provider 3</td><td>8.56$</td><td>12467922309</td></td></tr>";
    echo "</table>";    
    

    
    #print_r($jtest);
  ?>


  </body>
</html>