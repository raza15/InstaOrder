<html>
  <head>

  </head>
  <body>   

  <center><a href="http://localhost/accountmanager.php"> <img src="../logo.png" /></a><br/> </center>

  <form action="./PlaceOrder.php">       

    <?php 
        
    
    echo "<center>";
    echo "<h2>Order Recommendation and Automatic Ordering System</h2>";
    echo '<br/><br/>';        


    echo "<table border='1' >";    
    echo "<tr align='center'><th>Ingredient</th><th>Unit Price</th><th>Available</th><th>Recommended Order</th><th>Order Amount</th><th>Provider</th></tr>";    
    echo "<tr align='center'><td bgcolor='red'>Chicken Breast Patty</td><td>3</td><td>5</td><td>20</td><td> <input align='center' value='20' name='recAmount' type='text'/></td>
      <td>
        <select name='provider1'>
              <option value='0' selected='selected'>Provider1</option>
              <option value='1'>Provider2</option>
              <option value='2'>Provider3</option>
        </select>
      </td>
    </tr>";
    echo "<tr align='center'><td bgcolor='Yellow'>Chicken Tenders</td><td>4</td><td>10</td><td>50</td><td> <input align='center' value='50' name='recAmount' type='text'/></td>
      <td>
        <select name='provider1'>
              <option value='0' selected='selected'>Provider1</option>
              <option value='1'>Provider2</option>
              <option value='2'>Provider3</option>
        </select>
      </td>
    </tr>";
    echo "<tr align='center'><td bgcolor='green'>Frozen French Fries</td><td>.86</td><td>50</td><td>0</td><td> <input align='center' value='0' name='recAmount' type='text'/></td>
      <td>
        <select name='provider1'>
              <option value='0' >Provider1</option>
              <option value='1' selected='selected'>Provider2</option>
              <option value='2'>Provider3</option>
        </select>
      </td>
    </tr>";

    echo "<tr align='center'><td bgcolor='red'> Buns</td><td>0.20</td><td>3</td><td>40</td><td> <input align='center' value='40' name='recAmount' type='text'/></td>
      <td>
        <select name='provider1'>
              <option value='0' >Provider1</option>
              <option value='1'>Provider2</option>
              <option value='2' selected='selected'>Provider3</option>
        </select>
      </td>
    </tr>";          
    echo "</table>";

    echo "</center>";
    echo "<br/><br/>";      

    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    
    #print_r($jtest);
  ?>



      <table align="center">
        <tr>
          <td><input type="radio" name="account" value="account1" /></td>
          <td>US Bank Checking 1 </td>
        </tr>
        <tr>
          <td><input type="radio" name="account" value="account1"/></td>
          <td bgcolor='red'><span bgcolor='red'>US Bank Saving 1 (Not available balance)</td>
        </tr>
        <tr>
          <td><input type="radio" name="account" value="account1" checked="checked" /></td>
          <td>Visa Credit Card 1</td>
        </tr>
        <tr>
          <td><input type="radio" name="account" value="account1"/></td>
          <td>Visa Credit Card 2 </td>
        </tr>
      </table>

      <center><input type="submit" name="PlaceOrder" value="Place Order"/></center>
  
</form>

  </body>
</html>