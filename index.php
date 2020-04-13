<?php
function build_calender($month, $year)
{
    //1st build an array containing all days of the week
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    //Then get the 1st day of th emonth that is in the arguement of this function
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    //Now get the number of days in the month
    $numberOfDays = date('t', $firstDayOfMonth);

    //Getting some info about the first day of this month
    $dateComponents = getdate($firstDayOfMonth);
    var_dump($dateComponents);
    print_r($dateComponents);

    //get the name of this month
    $monthName = $dateComponents['month'];

    //get index value 0 - 6 of the 1st day of the month
    $daysOfWeek = $dateComponents['wday'];

    //get current date

    $dateToday = date('Y-m-d');

    //now create HTML table
    $calender = "<table class='table table-bordered'>";
    $calender = "<centre><h2>$monthName $year</h2></centre>";

    $calender .= "<tr>";

    //Create calender headers
    foreach ($daysOfWeek as $day) {
        $calender .= "<th class='header'>$day</th>";
    }

    $calender = "</tr><tr>";

    //Variable $dayOfWeek will make sure there will only be 7 col in our table
    if ($daysOfWeek > 0) {
        for ($k = 0; $k < $daysOfWeek; $k++) {
            $calender .= "</td><td>";
        }
    }

    //Initiating day counter
    $currentDay = 1;

    //Get month number
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberOfDays) {

        if ($daysOfWeek == 7) {
            $daysOfWeek = 0;
            $calender .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $calender .= "<td><h4>$currentDay</h4>";
        $calender .= "</td>";

        //incrementing counters
        $currentDay++;
        $daysOfWeek++;

    }//End while

    //Completing the row of the last week in month, if needed
    if ($daysOfWeek != 7) {
        $remainingDays = 7 - $daysOfWeek;
        for ($i = 0; $i < $remainingDays; $i++) {
            $calender .= "<td></td>";
        }
    }


    $calender .= "</tr>";
    $calender .= "</table>";


    echo $calender;

}


?>

<html>
<head>
    <meta name="viewporet" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class
        "col-md-12>

        <?php
        $dateComponents = getdate();
        $month = $dateComponents['mon'];
        $year = $dateComponents['year'];
        echo build_calender($month, $year);
        ?>

    </div>

</div><!--Close row-->
</div><!--Close container-->
</body>
</html>
