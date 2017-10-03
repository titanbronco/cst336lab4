<?php
    $backgroundImage = "./img/sea.jpg"; 
    
    
    function getTenRandomImages($imgURLs) {
        // for now, return the first 10 images 
        $imagesToDisplay = array_slice($imgURLs, 0, 10); 
        return $imagesToDisplay; 
    }
    
    
    if (isset($_GET['keyword'])) {
        // show carousel
        
        // make request to pixabay
        include "./api/pixabayAPI.php"; 
        
        $imgURLs = getImageURLs($_GET['keyword']); 
        $imgsToDisplay = getTenRandomImages($imgURLs); 
        
        
        
        // set random background image 
        $backgroundImage = $imgsToDisplay[array_rand($imgsToDisplay)]; 
    } 
    
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url("./css/styles.css"); 
        </style>
        
        <style>
            body {
                background-image: url("<?=$backgroundImage?>");
            }
        </style>
    </head>
    <body>
        
        <?php 
            if (!isset($imgsToDisplay)) {
                // show prompt to user to enter query
                echo "<h2> Enter query to see imagees from Pixabay</h2>"; 
                    
            } else {
                // show carousel
                    echo '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">'; 
                    echo '<ol class="carousel-indicators"> '; 
                    for ($i = 0; $i < count($imgsToDisplay); $i++) {
                        echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"'; 
                        echo $i == 0 ? 'class="active"' : ''; 
                        echo '></li>'; 
                    } 
                    echo '</ol>'; 
                    
                    echo '<div class="carousel-inner" role="listbox">'; 
                    
                    for ($i = 0; $i < count($imgsToDisplay); $i++) {
                        echo '<div class="item '; 
                        echo $i == 0 ? 'active' : ''; 
                        echo '">'; 
                        echo '<img src="'.$imgsToDisplay[$i].'" alt="...">'; 
                        echo '</div>';     
                    } 
                
                    echo '</div>'; 
                ?>
                
                <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              
        </div>    
        <?php
                
            } // finishes the else 
            
        ?>
        
        
        <form>
            <input type= "text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>" />
            <input type= "radio" id = "lhorizontal" name = "layout" value = "horizontal" >
            <label for = "Horizontal" ></label><label for ="lhorizontal"> Horizontal </label>
            <input type= "radio" id = "lvertical" name = "layout" value = "vertical" >
            <label for = "Vertical"></label> <label for="lvertical"> Vertical </label>
            <select name = "cateory">
                <option value = "">Select One</option>
                <option value = "ocean">Sea</option>
                <option>Forest</option>
                <option>Mountain</option>
                <option>Snow</option>
            </select>
            <input type= "submit" value="Search" />
        </form>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>