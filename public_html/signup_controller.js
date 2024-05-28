function checkForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Check username and email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Check password format
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/;
    if (!passwordRegex.test(password)) {
        alert("Password must be between 8 and 15 characters, contain at least one lowercase letter, one uppercase letter, one number, and one special character.");
        return false;
    }

    // Check if password is the same as username
    if (password === username) {
        alert("Password cannot be the same as username.");
        return false;
    }

    // AJAX request to check if username and email exist
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check_username_email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response === "exists") {
                alert("This username or email is already in use.");
                return false; // Form submission is prevented if username or email exists
            } else {
                // Form submission is allowed if username and email are unique
                document.querySelector("form").submit();
            }
        }
    };
    xhr.send("username=" + username + "&email=" + email);

    return false; // Form submission is prevented until AJAX request completes
}
