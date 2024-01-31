document.addEventListener("DOMContentLoaded", function () {
    // Get references to the sidebar links and contents
    const sidebarLinks = document.querySelectorAll(".sidebar a");
    const contents = document.querySelectorAll(".contents h1");

    // Add click event listener to each sidebar link
    sidebarLinks.forEach((link, index) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            // Hide all contents
            contents.forEach((content) => {
                content.style.display = "none";
            });

            // Display the corresponding content based on the clicked link
            contents[index].style.display = "block";
        });
    });
});
