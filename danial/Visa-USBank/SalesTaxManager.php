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



    $yy=$_GET['year1'];
    $qq=$_GET['quarter1'];

    switch ($qq) {
       case '0':
         $qStr="First Quarter";
         $date1=$yy.'-01-01';
         $date2=$yy.'-03-31';
         break;
       case '1':
         $qStr="Second Quarter";
         $date1=$yy.'-04-01';
         $date2=$yy.'-06-30';
         break;
       case '2':
         $qStr="Third Quarter";
         $date1=$yy.'-07-01';
         $date2=$yy.'-09-30';
         break;
       case '3':
         $qStr="Fourth Quarter";
         $date1=$yy.'-10-01';
         $date2=$yy.'-12-31';
         break;       
     } 
          

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

    header("Content-type:text/text; charset=utf-8");
    $fName="Sales-tax_".$yy."-Quarter".($qq+1).".txt";
    header("Content-Disposition: attachment; filename=$fName");


    #header("Content-Length: " . filesize ('/Library/WebServer/Documents/Visa-USBank/sales-tax.pdf' ) ); 
    #header("Content-type: application/pdf"); 
    #header("Content-disposition:inline; filename=".basename('/Library/WebServer/Documents/Visa-USBank/sales-tax.pdf'));
    #header('Expires: 0');
    #header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    #$filepath = readfile('Visa-USBank/sales-tax.pdf');
    

    
    #print_r($jtest);
  ?>


  </body>
</html>