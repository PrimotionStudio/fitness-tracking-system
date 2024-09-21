<?php
function approximateTimeDifference($date1, $date2)
{
    // Convert the dates into DateTime objects
    $start = new DateTime($date1);
    $end = new DateTime($date2);

    // Calculate the difference between the two dates
    $diff = $start->diff($end);

    // Check the difference in years, months, and days
    if ($diff->y > 0) {
        // If there is at least one year of difference
        return $diff->y == 1 ? "1 year" :  $diff->y . " years";
    } elseif ($diff->m > 0) {
        // If there is at least one month of difference
        return $diff->m == 1 ? "1 month" :  $diff->m . " months";
    } else {
        // Otherwise, calculate the difference in days
        return $diff->d == 1 ? "1 day" : $diff->d . " days";
    }
}
