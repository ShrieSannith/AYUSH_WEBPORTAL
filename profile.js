// profile-dropdown.js
document.addEventListener("DOMContentLoaded", function () {
    // Get the profile link and the profile card
    const profileLink = document.getElementById("profile-link");
    const profileCard = document.querySelector(".profile-card");

    // Function to toggle the profile card
    function toggleProfileCard() {
        profileCard.classList.toggle("show");
    }

    // Toggle the profile card when the profile link is clicked
    profileLink.addEventListener("click", toggleProfileCard);

    // Close the profile card if the user clicks outside of it
    window.addEventListener("click", function (event) {
        if (!event.target.matches("#profile-link")) {
            if (profileCard.classList.contains("show")) {
                profileCard.classList.remove("show");
            }
        }
    });
});
