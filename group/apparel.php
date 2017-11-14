<?php
    session_start();
    
    if($_GET['Filter'] == 'All') {
        header("Location: index.php");
    }
    
    //goes to anime.php for anime only info
    if ($_GET["Filter"] == 'anime') {
        header ("Location: anime.php");
    }
    
    //goes to apparel.php for apparel only info
    if ($_GET["Filter"] == 'apparel') {
        header ("Location: apparel.php");
    }
    
    //goes to electronics.php for electronic only info
    if ($_GET["Filter"] == 'electronics') {
        header ("Location: electronics.php");
    }
    
    //displays all info
    if( $_GET["Filter"] == ' ' && $_GET["Sort"]== ' ') {
        header ("Location: index.php");
    }
    
    if(isset($_GET['Sort'])) {
        $sort = $_GET['Sort'];
    } else {
        $sort = "0";
    }
    
?>

<html>
    <head>
        <title>Online Store: </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <link href="functions.php"/>
    </head>
    <body>
        <div id = "wrapper">
            <header>
                <h1>Welcome!</h1>
                <br>
                <h3>Choose an item you would like to purchase:</h3>
            </header>
            
            <form method>
                Item Type:
                <select name = "Filter">
                    <option value = " ">Filter By</option>
                    <option value = "All">All</option>
                    <option value= "anime">Anime</option>
                    <option value= "apparel">Apparel</option>
                    <option value= "electronics">Electronics</option>
                </select>
                <br>
                Item Type:
                <select name = "Sort">
                    <option value = " ">Sort By</option>
                    <option value = "price">Price</option>
                    <option value = "name">Name</option>
                    <option value = "ascending">Ascending</option>
                    <option value = "descending">Descending</option>
                </select>
                <br>
                <input type="submit" value="Search" name="submit">
            </form>
            
            <?php
                include "functions.php";
                
                //displays the apparel from the database
                $apparels = displayApparel($sort);
                
                echo "<table id='table'>";
                foreach($apparels as $apparel) {
                    echo "<tr>";
                    echo "<td>". $apparel['apparelName'] ."</td>";
                    echo "<td><a href='details.php?deets=".$apparel['apparelName']."'>". $apparel['apparelName'] ."</a></td>";
                    echo "<td><a href='addCart.php?id=".$apparel['apparelName']."'>Add to Cart</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                 $_SESSION['type'] = "apparel";

           ?>
            
        </div>
        
    </body>
</html>