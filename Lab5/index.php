<?php

include 'database.php';

function displayDeviceList(){
    
    $sql = "SELECT * from device where 1";
    
    if (isset($_GET['submit']))
       {
           if (($_GET['deviceName'])) {
               $name = $_GET['deviceName'];
               $sql .=" AND deviceName like '%$name%'"; 
            }
            
           if (($_GET['deviceType'])) {
                
                $type = $_GET['deviceType'];
               $sql .= " AND deviceType = '$type'"; 
               
           }
            if (isset($_GET['available'])) 
            {
                $sql .= " AND status like '%vailable%'";
            }
            
            
            if (isset($_GET['name'])) 
            {
                 $sql .= " ORDER BY deviceName"; 
              
            }
            if (isset($_GET['price'])) 
            {
                 $sql .= " ORDER BY price";
            }
       }

    
    $dbConn = getDatabaseConnection();
    
    $statement = $dbConn->prepare($sql);
    
    
    
    $statement->execute();
    
    $records=$statement->fetchAll();
    
    foreach($records as $record){
        echo $record["deviceName"]." " .$record["deviceType"]." ".$record["price"]." ".$record["status"]."<br>";
        
    }
}
?>

<html>
    <div class="main">
           <h1> Devices Library </h1>
           <br>
           <br>
           <br>
           <form>
               Device: <input type="text" name="deviceName" placeholder="Device Name"/>
               Type: 
               <select name="deviceType">
                   <option value="laptop"> laptop</option>
                   <option value="computer"> computer</option>
                   <option value="tablet"> tablet</option>
                   <option value="drink"> drink</option>
                   <option value="fitness tracker"> fitness tracker</option>
                   <option value="paper weight"> paper weight</option>
               </select>
               
               <input type="checkbox" name="available" value="available">
               <label for="available"> Available </label>
               
               <br>
               Order by:
               <input type="radio" name="name" id="orderByName" value="name" <?= $checkmark ?>/> 
                <label for="oderByName"> Name </label>
               <input type="radio" name="price" id="orderByPrice" value="price" <?= $checkmark1 ?>/> 
                <label for="oderByPrice"> Price </label>
               
               
               
               <input type="submit" value="Submit" name="submit" >
               
           </form>
           <?=displayDeviceList()?>
           </div>
</html>