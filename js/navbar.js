function toggleProfile() {
  const profile_icon = document.querySelector(".profile i");
  const profile_nav = document.querySelector(".profile .profile-nav");
  profile_icon.addEventListener("click", () => {
    if (profile_nav.style.display === "none") {
      profile_nav.style.display = "block";
    } else {
      profile_nav.style.display = "none";
    }
  });
}

function main() {
  toggleProfile();
}
main();
