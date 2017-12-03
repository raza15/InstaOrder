<html>
  <head>

  </head>
  <body>

    <center>
    <center><a href="http://localhost/accountmanager.php"> <img src="../logo.png" /></a><br/> </center>
        <h2>Account Manager System</h2>
    </center>    
    <hr/>
    <hr/>
    <p>Merchant ID: <input name="pID" value="908997180284469041" type="text"/></p>

    <?php
        $postdata = json_encode( array('LegalParticipantIdentifier' => '908997180284469041') );    

      $opts = array(
        'http'=>array(
        'method'=>"POST",
        'header'  => 'Content-Type:application/json',
        'content'=>$postdata
        )
      );
    $context = stream_context_create($opts);
    $uAccounts=file_get_contents("https://api119525live.gateway.akana.com:443/user/accounts", false, $context);
    
    
    $jtest=json_decode($uAccounts, true);
    echo "<hr/><hr/><br/><br/>";
    echo("<center><h2>List of available accounts</h2></center>");
    echo "<table align='center' border='1'>";
    echo"<th>Acount ID</th><th>Acount Type</th><th>Acount Description</th> <th>Accessible Balance</th> <th>Available Credit</th> <th>Available Balance</th> <th>Account Usage</th>";
    foreach ($jtest['AccessibleAccountDetailList'] as $key => $value) {
      $aType=$value['ProductCode'];
      switch ($aType) {
        case 'BCD':
          $aDesc='Business Credit Card';
          break;
        case 'CCD':
          $aDesc='Retail Credit Card';
          break;
        case 'DDA':
          $aDesc='Demand Deposit Account';
          break;
        case 'EXL':
          $aDesc='Express Line (of Credit)';
          break;
        case 'INV':
          $aDesc='Investment';
          break;
        case 'LEA':
          $aDesc='Lease';
          break;
        case 'LOC':
          $aDesc='Checking Account Line of Credit';
          break;
        case 'SEL':
          $aDesc='Equity Line (of credit)';
          break;
        case 'UNL':
          $aDesc='Revolving Line (of credit)';
          break;        
        default:
          $aDesc='Unknown';          
      }    

      $aID=$value['PrimaryIdentifier'];
      $aDetail=$value['BasicAccountDetail'];
      $aAvailable=$aDetail['Balances']['AccessibleBalanceAmount'];
      $cAvailable=$aDetail['Balances']['CreditAvailableBalanceAmount'];
      $bAvailable=$aDetail['Balances']['AvailableBalanceAmount'];   
      #$cCode=$aDetail['CategoryCode'];      
      if($aAvailable>0)echo "<tr bgcolor='green' align='center'>";
      else echo "<tr bgcolor='red' align='center'>";
      
      echo "<td>$aID </td>";
      echo "<td>$aType </td>";
      echo "<td>$aDesc </td>";
      echo "<td>$aAvailable</td>";
      echo "<td>$cAvailable</td>";
      echo "<td>$bAvailable</td>";
      echo "<td><select name='Assign'>
              <option value='0'>Payroll Account</option>
              <option value='1'>Operating Account</option>
              <option value='2'>Other</option>
            </select></td>";
      echo "<p>";
      #print_r($aDetail);
      echo "</p>";
      echo "</tr>";
    }
    echo "</table>";
    ?>


  </body>
</html>