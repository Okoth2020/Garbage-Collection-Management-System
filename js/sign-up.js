function toggleForm() {
    const loginContainer = document.querySelector('.login-container');
    const signupContainer = document.querySelector('.signup-container');

    if (loginContainer.style.display === 'none' || loginContainer.style.display === '') {
        loginContainer.style.display = 'flex';
        signupContainer.style.display = 'none';
    } else {
        loginContainer.style.display = 'none';
        signupContainer.style.display = 'flex';
    }
}

// Admin login form display
function toggleAdminForm() {
    const adminContainer = document.querySelector(".admin-container");
    adminContainer.style.display = "block";
    loginContainer.style.display = "none";

}

function loginAsAdmin() {
    // Add logic for admin login here
    alert("Admin login functionality will be implemented here.");
}
