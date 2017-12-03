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
    $totalAmount=0;
    $totalExempt=0;
    foreach ($jtest['MonetaryTransactionResponseList'] as $key => $value) {      
        $tAmount=$value['PostedAmount'];      
        $tDate=$value['PostedDate'];      
        if($tDate>=$date1 && $tDate<=$date2)$totalAmount=$totalAmount+$tAmount;
        #echo "$tAmount ------------ $tDate <br/>";
    }
    $totalTaxable=$totalAmount-$totalExempt;
    $taxAmount=$totalTaxable*0.07;
    echo "<center>";
    echo '<br/><br/>';    
    echo "<p><b>Sales tax report:</b> $qStr </p> <p><b>Date Range:</b> $date1 to $date2</p>";
    echo "<p><b>Company Name:</b> InstaOrder </p>";
    echo "<p><b>Address:</b> 1212 Happy rd, Atlanta, GA 30329</p>";
    echo '<br/><br/>';

    echo "<table border='1' >";    
    echo "<tr align='center'><td><p><b>Total Sales Amount:</b> </td><td>$totalAmount</td></tr>";      
    echo "<tr align='center'><td><b>Total Sales Exemption Amount:</b></td><td> $totalExempt</td></tr>";      
    echo "<tr align='center'><td><b>Total Taxable Amount:</b> </td><td>$totalTaxable</td></tr>";      
    echo "<tr align='center'><td><b>Sales Tax Amount (7%):</b> </td><td>$taxAmount</td></tr>";      
    echo "</table>";

    echo "</center>";
    echo "<br/><br/>";      

    echo '<br/>';
    echo '<br/>';
    echo '<br/>';

    

    
    #print_r($jtest);
  ?>


  </body>
</html>