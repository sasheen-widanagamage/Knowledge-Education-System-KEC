// myscript1.js

// Wait for the DOM to load before executing the script
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('form');
    
    // Add event listener for form submission
    loginForm.addEventListener('submit', function(event) {
        // Get username and password values
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        
        // Validate form fields
        if (username === '' || password === '') {
            event.preventDefault(); // Prevent form submission
            alert('Please fill in both fields.'); // Alert user
            return;
        }

        // Additional client-side validation can go here

        // Optional: Confirm submission
        // const confirmLogin = confirm('Are you sure you want to log in?');
        // if (!confirmLogin) {
        //     event.preventDefault(); // Prevent form submission if user cancels
        // }
    });
});
