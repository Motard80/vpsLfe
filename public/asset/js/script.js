document.addEventListener('DOMContentLoaded', () => {
    // Récupération des éléments HTML nécessaires
    const dropContainer = document.getElementById('dropContainer');
    const fileInput = document.getElementById($id);
    const fileList = document.getElementById('fileList');

    // Gestion de l'événement "dragover" pour indiquer que l'utilisateur est en train de survoler la zone de glisser-déposer
    dropContainer.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropContainer.classList.add('dragover');
    });

    // Gestion de l'événement "dragleave" pour réinitialiser l'apparence lorsque l'utilisateur quitte la zone de glisser-déposer
    dropContainer.addEventListener('dragleave', () => {
        dropContainer.classList.remove('dragover');
    });

    // Gestion de l'événement "drop" pour gérer les fichiers déposés
    dropContainer.addEventListener('drop', (e) => {
        e.preventDefault();
        dropContainer.classList.remove('dragover');

        // Récupération des fichiers depuis l'événement de dépose
        const files = e.dataTransfer.files;
        handleFiles(files);
    });

    // Gestion de l'événement de changement du champ d'entrée de fichier
    fileInput.addEventListener('change', () => {
        // Récupération des fichiers depuis le champ d'entrée de fichier
        const files = fileInput.files;
        handleFiles(files);
    });

    // Fonction pour traiter les fichiers et les afficher dans la liste
    function handleFiles(files) {
        for (const file of files) {
            const listItem = document.createElement('li');
            listItem.textContent = `${file.name} (${formatSize(file.size)})`;
            fileList.appendChild(listItem);
        }

        // Vous pouvez envoyer les fichiers au serveur en utilisant AJAX ou une soumission de formulaire.
        // Exemple : sendFilesToServer(files);
    }

    // Fonction pour formater la taille du fichier de manière lisible
    function formatSize(bytes) {
        const kilobyte = 1024;
        const megabyte = kilobyte * 1024;

        if (bytes < kilobyte) {
            return `${bytes} octets`;
        } else if (bytes < megabyte) {
            return `${(bytes / kilobyte).toFixed(2)} Ko`;
        } else {
            return `${(bytes / megabyte).toFixed(2)} Mo`;
        }
    }

    // Exemple : fonction pour envoyer les fichiers au serveur (AJAX)
    // function sendFilesToServer(files) { ... }
});
$(document).ready(function () {
    // Attachez un gestionnaire d'événements au changement de l'input PBO
    $('input[name="pbo"]').on('change', function () {
        // Récupérez la liste des fichiers sélectionnés
        var fileList = $(this)[0].files;

        // Créez une chaîne pour stocker les noms des fichiers
        var filenames = '';

        // Parcourez la liste des fichiers et ajoutez les noms à la chaîne
        for (var i = 0; i < fileList.length; i++) {
            filenames += fileList[i].name + ', ';
        }

        // Supprimez la virgule et l'espace finales
        filenames = filenames.slice(0, -2);

        // Mettez à jour la valeur de l'input newTemplate avec les noms des fichiers
        $('input[name="newTemplate"]').val(filenames);
    });
});