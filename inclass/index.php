<!DOCTYPE html>
<html>
    <head>
        <title>
            Chinese Zodiacs!
        </title>
    </head>
    
    <body>
        <?php
        function showZodiacs($startYear, $endYear){
            $sum = 0;
            $count = 0;
        echo '<ul>';
            for($i = $startYear; $i <= $endYear; $i+=4){
                
                
                echo'<li>';
                echo $i . " ";
                if($i == 1776){
                    echo "Independence!";
                }
                if($i % 100 == 0){
                    echo "Happy new century!!";
                }
                
                
                echo '</li>';
                $sum += $i;
                
                if($i >= 1900){
                    $x = $i;
                    $x = $x - 1900;
                    
                    switch($x){
                        case $x%12==0 || $x ==0:
                            echo '<img src="zodiac/rat.png">';
                            break;
                        case $x%12==1 || $x ==1:
                            echo '<img src="zodiac/ox.png">';
                            break;
                        case $x%12==2 || $x ==2:
                            echo '<img src="zodiac/tiger.png">';
                            break;
                        case $x%12==3 || $x ==3:
                            echo '<img src="zodiac/rabbit.png">';
                            break;
                        case $x%12==4 || $x ==4:
                            echo '<img src="zodiac/dragon.png">';
                            break;
                        case $x%12==5 || $x ==5:
                            echo '<img src="zodiac/snake.png">';
                            break;
                        case $x%12==6 || $x ==6:
                            echo '<img src="zodiac/horse.png">';
                            break;
                        case $x%12==7 || $x ==7:
                            echo '<img src="zodiac/goat.png">';
                            break;
                        case $x%12==8 || $x ==8:
                            echo '<img src="zodiac/monkey.png">';
                            break;
                        case $x%12==9 || $x ==9:
                            echo '<img src="zodiac/rooster.png">';
                            break;
                        case $x%12==10 || $x ==10:
                            echo '<img src="zodiac/dog.png">';
                            break;
                        case $x%12==11 || $x ==11:
                            echo '<img src="zodiac/pig.png">';
                            break;
                    
                            
                    }
                }
            }
        echo '</ul>';
        
        return $sum;
        }
        ?>
        <h2>Chinese Zodiacs!</h2>
        
        <?php
        $sum =showZodiacs(100,2017);

        echo "Sum = " . $sum;
        ?>
        
        
    </body>
</html>