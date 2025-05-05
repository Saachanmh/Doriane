<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    let draggedItem = null;

    // Ajouter les événements de drag and drop aux éléments de la liste des modules
    document.querySelectorAll('#modules-list li').forEach(item => {
    item.setAttribute('draggable', true);
    item.addEventListener('dragstart', handleDragStart);
});

    // Ajouter les événements de drop aux jours du calendrier
    document.querySelectorAll('.day').forEach(day => {
    day.addEventListener('dragover', handleDragOver);
    day.addEventListener('drop', handleDrop);
});

    function handleDragStart(event) {
    draggedItem = event.target;
    event.dataTransfer.setData('text/plain', event.target.dataset.id);
}

    function handleDragOver(event) {
    event.preventDefault(); // Nécessaire pour permettre le drop
}

    function handleDrop(event) {
    event.preventDefault();
    if (event.target.classList.contains('day')) {
    const moduleId = event.dataTransfer.getData('text/plain');
    const dayElement = event.target;
    const day = dayElement.querySelector('.day-number').innerText;
    const date = dayElement.id.split('-').slice(1).join('-');

    fetch('save_event.php', {
    method: 'POST',
    headers: {
    'Content-Type': 'application/x-www-form-urlencoded',
},
    body: `module_id=${moduleId}&date=${date}`
})
    .then(response => response.json())
    .then(data => {
    if (data.success) {
    addEventToDay(moduleId, dayElement);
} else {
    alert('Erreur lors de l\'enregistrement de l\'événement.');
}
})
    .catch(error => console.error('Erreur:', error));
}
}

    function addEventToDay(moduleId, dayElement) {
    const eventDiv = document.createElement('div');
    eventDiv.classList.add('event');
    eventDiv.innerText = document.querySelector(`#module-${moduleId}`).innerText;
    dayElement.appendChild(eventDiv);
}
});
</script>
