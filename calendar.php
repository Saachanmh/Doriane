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
        echo "<div class='day' id='day-$year-$month-$day' ondrop='handleDrop(event)' ondragover='handleDragOver(event)'>";
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
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const modulesList = document.getElementById('modules-list');
        const modulesData = {}; // Objet pour stocker les noms des modules

        // Remplir l'objet modulesData avec les noms des modules
        modulesList.querySelectorAll('li').forEach(item => {
            const moduleId = item.dataset.id;
            const moduleName = item.innerText;
            modulesData[moduleId] = moduleName;

            item.addEventListener('dragstart', handleDragStart);
            item.addEventListener('dragend', handleDragEnd);
        });

        let draggedItem = null;

        function handleDragStart(event) {
            draggedItem = event.target;
            setTimeout(() => {
                draggedItem.classList.add('dragging');
            }, 0);
            event.dataTransfer.setData('text/plain', event.target.dataset.id);
        }

        function handleDragEnd(event) {
            draggedItem.classList.remove('dragging');
        }

        function handleDragOver(event) {
            event.preventDefault(); // Nécessaire pour permettre le drop
        }

        function handleDrop(event) {
            event.preventDefault();
            if (event.target.classList.contains('day')) {
                const moduleId = event.dataTransfer.getData('text/plain');
                const dayElement = event.target;
                addEventToDay(moduleId, dayElement);
            }
        }

        function addEventToDay(moduleId, dayElement) {
            // Ajoutez l'événement au jour avec le nom du module
            const eventDiv = document.createElement('div');
            eventDiv.classList.add('event');
            eventDiv.innerText = modulesData[moduleId]; // Utilisez le nom du module
            dayElement.appendChild(eventDiv);
        }

        // Ajouter les événements de drop et dragover aux jours du calendrier
        document.querySelectorAll('.day').forEach(day => {
            day.addEventListener('dragover', handleDragOver);
            day.addEventListener('drop', handleDrop);
        });
    });
</script>

