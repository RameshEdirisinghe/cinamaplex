document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Replace with your own validation logic
    if (username === "user" && password === "password") {
        // Successful login, redirect or perform actions here
        alert("Login successful!");
    } else {
        // Display an error message
        const errorMessage = document.getElementById("error-message");
        errorMessage.innerText = "Invalid username or password";
        errorMessage.style.display = "block";
    }
});
