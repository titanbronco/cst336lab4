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
        <title>Online Store</title>
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
                
                
                //displays the electroncis from the database
                $electronics = displayElectronics($sort);
                
                echo "<table id='table'>";
                foreach($electronics as $electronic) {
                    echo "<tr>";
                    echo "<td>". $electronic['electronicsName'] ."</td>";
                    echo "<td><a href='details.php?deets=".$electronic['electronicsName']."'>". $electronic['electronicsName'] ."</a></td>";
                    echo "<td><a href='addCart.php?id=".$electronic['electronicsName']."'>Add to Cart</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                 $_SESSION['type'] = "electronics";
                
                

           ?>
            
        </div>
        
    </body>
</html>