// Function to encode HTML content
function encodeHTML(html) {
    return document.createElement('a').appendChild(document.createTextNode(html)).parentNode.innerHTML;
}

// Event listener for modal trigger button
document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function (button) {
    button.addEventListener('click', function () {
        // Get the modal element
        var modal = document.querySelector(button.getAttribute('data-bs-target'));

        // Get data attributes
        var title = button.getAttribute('data-bs-titulo');
        var thumbnailUrl = button.getAttribute('data-bs-thumbnail-url');
        var cv = button.getAttribute('data-bs-cv');

        // Set modal content
        modal.querySelector('.modal-title').innerText = title;
        modal.querySelector('.modal-cv').innerHTML = encodeHTML(cv); // Encode HTML content

        // Other modal content population logic goes here
    });
});