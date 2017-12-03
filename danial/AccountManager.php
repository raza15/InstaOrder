<html>
  <head>

  </head>
  <body>

    <center>
        <a href="AccountManager.php"> <img src="logo.png" /></a><br/>
        <h2>Account Manager System</h2>
    </center>    
    <hr/>
    <hr/>
    <p>Merchant ID: <input name="pID" value="908997180284469041" type="text"/></p>
    <p>Merchant Address: 1212 Happy rd, Atlanta, GA 30329</p>
    <center>

        <form action="./Visa-USBank/OrderRecommendation.php">       
            <input type="submit" value="Order Management" style='width:400px;height:100px;font-size:20'/>
        </form>


        <form action="./Visa-USBank/ShowAccounts.php">       
            <input type="submit" value="Accounts Management" style='width:400px;height:100px;font-size:20'/>
        </form>

        <form action="">       
            <input type="submit" value="Payroll Tax Management" style='width:400px;height:100px;font-size:20'/>
        </form>
        <form action="./Visa-USBank/SalesTaxManager.php">       
            <input type="submit" value="Sales Tax Management" style='width:400px;height:100px;font-size:20'/>
          <br/>
         <select name='year1' style='width:170px;height:50px;font-size:20' >
              <option value='2013'>2013</option>
              <option value='2014'>2014</option>
              <option value='2015'>2015</option>
              <option value='2016' selected="selected">2016</option>
              <option value='2017'>2017</option>
              <option value='2018'>2018</option>
              <option value='2019'>2019</option>
              <option value='2020'>2020</option>
        </select>

         <select name='quarter1' style='width:170px;height:50px;font-size:20'>
              <option value='0'>First Quarter</option>
              <option value='1'>Second Quarter</option>
              <option value='2' selected="selected">Third Quarter</option>
              <option value='3'>Fourth Quarter</option>
        </select>


        </form>        

    </center>




  </body>
</html>