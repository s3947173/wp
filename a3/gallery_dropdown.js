function filterPets() {
    const petType = document.getElementById('petType').value;
    console.log("Selected pet type: " + petType); // Log the selected pet type

    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_pets.php?type=' + encodeURIComponent(petType), true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("AJAX response received"); // Log when response is received
            document.getElementById('petsGallery').innerHTML = xhr.responseText;
        } else {
            console.error("Failed to load pets:", xhr.statusText);
            alert("Failed to load pets: " + xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error("Request error");
        alert("Request error");
    };

    xhr.send();
}