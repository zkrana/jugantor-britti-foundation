<?php
session_start();
// Define a base URL
include_once('../assets/files/config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/src/css/style.css">
    <title>Login</title>
    <style>
        .toggle-password {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
        }
        .icon {
            fill: gray;
            transition: fill 0.3s ease;
        }
        .icon:hover {
            fill: blue;
        }
    </style>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">Login</h1>
        <div class="w-fit mx-auto block">
            <?php
            // Check for any success or error messages
            if (isset($_SESSION['success'])) {
                echo "<div class='success'>" . $_SESSION['success'] . "</div>";
                unset($_SESSION['success']); // Remove the message after displaying it
            } elseif (isset($_SESSION['error'])) {
                echo "<div class='error'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']); // Remove the message after displaying it
            }
            ?>
        </div>
        <form action="<?= BASE_URL ?>assets/files/students/process_login.php" method="POST" class="mt-8 max-w-lg mx-auto bg-white shadow-lg p-8 rounded-lg">
            <!-- Email or Phone Input -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium">Email or Phone:</label>
                <input 
                    type="text" 
                    name="email" 
                    id="email" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your email or phone"
                >
            </div>
            <!-- Password Input -->
            <div class="mb-6 relative">
                <label for="password" class="block text-gray-700 font-medium">Password:</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your password"
                >
                <!-- Toggle Icon -->
                <svg 
                    class="toggle-password icon" 
                    id="togglePassword" 
                    xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 24 24">
                    <path d="M12 5C7.58 5 3.69 7.63 2 12c1.69 4.37 5.58 7 10 7s8.31-2.63 10-7c-1.69-4.37-5.58-7-10-7zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                </svg>
            </div>
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold"
            >
                Login
            </button>
        </form>
        <div class="mt-4 text-center">
            <p>Don't have an account? <a href="<?= BASE_URL ?>students/signup.php" class="text-blue-600">Sign up here</a></p>
        </div>
    </main>
    <script>
        // Password show/hide toggle
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', () => {
            const isPasswordHidden = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPasswordHidden ? 'text' : 'password');
        });
    </script>
</body>
</html>