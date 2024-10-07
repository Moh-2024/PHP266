<?php
function calcPoints($wins, $ot_losses): float|int{
    $totalPoints = $wins * 2 + $ot_losses;
    return $totalPoints;
}