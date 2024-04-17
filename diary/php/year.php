<title><?php
$year = $_GET['year'];
//this gets the text for the year tag (for example) ?year=2023 would output 2023
echo $year;

?></title>
<h1  style="text-align:left;user-select:none;">

<a class="back" href="."><span class="material-symbols-outlined">arrow_back</span></a>



<a class="back" id="copyLink" href="#"><span class="material-symbols-outlined">share</span></a>



</h1>




<hr class="tophr">

<h2>
<?php
$year = $_GET['year'];
$nuhuh = str_replace('..', 'null', $year);
$nuhuh = str_replace('.', 'null', $nuhuh);

// this gets the related info to lead to a 404

// this checks if the year exists
if (file_exists('entries/'.$nuhuh)) {

// this checks if the ?year tag is empty
if (empty($_GET['year'])) {header("HTTP/1.0 404 Not Found");}

// if all checks are passed it sets the dir tag properly
$dir    = 'entries/'.$year;


 } else {

// if the year doesnt exist it tells the server to give a 404 error
header("HTTP/1.0 404 Not Found");

}


// Loop through each month
for ($month = 1; $month <= 12; $month++) {
    // Get the month name
    $monthName = date('F', mktime(0, 0, 0, $month, 1, $year));

    // Print the month heading
    echo "<h2>$monthName</h2><hr class='tophr'>";

    // Get the number of days in the month
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // Start a paragraph for the dates
    echo "<div class='squeezebooton'><h2>";

    // Loop through each day and print it with your formatting
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $formattedDate = date('n.j', mktime(0, 0, 0, $month, $day, $year));
        $WeekDay = date('w', mktime(0, 0, 0, $month, $day, $year));
        $DateTitle = date('n.j', mktime(0, 0, 0, $month, $day, $year));
        $DateFile = "entries/".date('Y/n.j', mktime(0, 0, 0, $month, $day, $year));
        $easter = date("n.j", easter_date());


        // Check for file existence and format accordingly
        if (file_exists("entries/$year/$formattedDate")) {

            if ($formattedDate === '2.14') {
                $bootonclass = "daybooton daybooton-val";
            } 
            elseif ($formattedDate === '12.24') {
                $bootonclass = "daybooton daybooton-chrima";
            }
            elseif ($formattedDate === '12.25') {
                $bootonclass = "daybooton daybooton-chrima";
            }
            elseif ($formattedDate === '10.21') {
                $bootonclass = "daybooton daybooton-ray";
            }
            elseif ($formattedDate === '10.31') {
                $bootonclass = "daybooton daybooton-hal";
            }    
           elseif ($formattedDate === '6.9') {
                $bootonclass = "daybooton daybooton-bday";
            }  
           elseif ($formattedDate === '11.11') {
                $bootonclass = "daybooton daybooton-ret";
            }
           elseif ($formattedDate === '3.15') {
                $bootonclass = "daybooton daybooton-ani";
            }
            elseif ($formattedDate === $easter) {
                $DateTitle = "🥚$easter";
            }
            elseif ($WeekDay === '6') {
                $bootonclass = "daybooton daybooton-end";
            }
            elseif ($WeekDay === '0') {
                $bootonclass = "daybooton daybooton-end";
            }




            else {
                $bootonclass = "daybooton";
            }


            echo "<div class='paddingdiv'><a class='$bootonclass' href='?entry=$formattedDate.$year'>$DateTitle</a></div>";
        } else {
            echo "<div class='paddingdiv'><a class='daybooton-inval'>$DateTitle</a></div>";
        }
    }

    echo "</h2></div><br><br>";
}






?>
</h2>
