<h2>Modules</h2>
<ul id="modules-list">
    <?php foreach ($modules as $module): ?>
        <li draggable="true" id="module-<?= $module['id'] ?>" data-id="<?= $module['id'] ?>">
            <?= $module['name'] ?>
        </li>
    <?php endforeach; ?>
</ul>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const modulesList = document.getElementById('modules-list');

        let draggedItem = null;

        // Ajouter les événements de drag and drop aux éléments de la liste
        modulesList.querySelectorAll('li').forEach(item => {
            item.addEventListener('dragstart', handleDragStart);
            item.addEventListener('dragend', handleDragEnd);
            item.addEventListener('dragover', handleDragOver);
            item.addEventListener('dragenter', handleDragEnter);
            item.addEventListener('dragleave', handleDragLeave);
            item.addEventListener('drop', handleDrop);
        });

        function handleDragStart(event) {
            draggedItem = event.target;
            setTimeout(() => { // Permet de voir l'élément en cours de déplacement
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

        function handleDragEnter(event) {
            event.target.classList.add('drag-over');
        }

        function handleDragLeave(event) {
            event.target.classList.remove('drag-over');
        }

        function handleDrop(event) {
            event.preventDefault();
            event.target.classList.remove('drag-over');
            modulesList.insertBefore(draggedItem, event.target.nextSibling);
        }
    });
</script>
