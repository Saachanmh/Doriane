<div class="days-of-week">
    <div>Dim</div>
    <div>Lun</div>
    <div>Mar</div>
    <div>Mer</div>
    <div>Jeu</div>
    <div>Ven</div>
    <div>Sam</div>
</div>
<div class="days">
    <?php
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $firstWeekday = date('w', $firstDayOfMonth);
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // Affichez les cellules vides au début
    for ($i = 0; $i < $firstWeekday; $i++) {
        echo "<div class='day empty'></div>";
    }

    // Parcourez chaque jour du mois
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $timestamp = mktime(0, 0, 0, $month, $day, $year);
        $currentDate = date('Y-m-d', $timestamp);
        echo "<div class='day'>";
        echo $day;
        foreach ($events as $event) {
            if (date('Y-m-d', strtotime($event['start_date'])) == $currentDate) {
                echo "<div class='event'>{$event['title']}</div>";
            }
        }
        echo "</div>";
    }
    ?>
</div>
