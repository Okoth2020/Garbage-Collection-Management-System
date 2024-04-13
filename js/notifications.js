function toggleNotification() {
  const bell = document.getElementById("bell");
  const container = document.querySelector(".notification-container");
  bell.addEventListener("click", () => {
    if (container.style.display === "none") {
      container.style.display = "block";
    } else {
      container.style.display = "none";
    }
  });
}

function main() {
  toggleNotification();
}
main();
