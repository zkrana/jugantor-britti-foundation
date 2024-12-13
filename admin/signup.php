<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/jugantor-britti-foundation/assets/src/css/style.css">
    <title>Sign Up</title>
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
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">Sign Up</h1>
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
        <form action="../assets/files/admin-teachers/signup_process.php" method="POST" enctype="multipart/form-data" class="mt-8 max-w-2xl mx-auto bg-white shadow-lg p-8 rounded-lg">
            <!-- Role Selection -->
            <div class="mb-6">
                <label for="role" class="block text-gray-700 font-medium">Select Role:</label>
                <select 
                    name="role" 
                    id="role" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    onchange="showRoleFields()"
                >
                    <option value="" disabled selected>Select your role</option>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>

            <!-- Full Name -->
            <div id="full-name" class="mb-6" style="display: none;">
                <label for="fullname" class="block text-gray-700 font-medium">Full Name:</label>
                <input 
                    type="text" 
                    name="fullname" 
                    id="fullname" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your full name"
                >
            </div>

            <!-- Username -->
            <div id="username" class="mb-6" style="display: none;">
                <label for="username" class="block text-gray-700 font-medium">Username:</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Choose a username"
                >
            </div>

            <!-- Password -->
            <div id="password" class="mb-6 relative" style="display: none;">
                <label for="password" class="block text-gray-700 font-medium">Password:</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Choose a password"
                >
                <!-- Toggle Password -->
                <svg 
                    class="toggle-password icon cursor-pointer w-6 h-6 text-gray-500"
                    id="togglePassword"
                    xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 24 24">
                    <path id="eyeIcon" d="M12 4.5C7.25 4.5 3.06 7.61 1 12c2.06 4.39 6.25 7.5 11 7.5s8.94-3.11 11-7.5c-2.06-4.39-6.25-7.5-11-7.5zm0 12c-2.48 0-4.5-2.02-4.5-4.5s2.02-4.5 4.5-4.5 4.5 2.02 4.5 4.5-2.02 4.5-4.5 4.5zm0-7c-1.38 0-2.5 1.12-2.5 2.5S10.62 12 12 12s2.5-1.12 2.5-2.5S13.38 9.5 12 9.5z"/>
                </svg>
            </div>

            <!-- Photo Upload -->
            <div id="photo" class="mb-6" style="display: none;">
                <label for="photo" class="block text-gray-700 font-medium">Photo:</label>
                <input 
                    type="file" 
                    name="photo" 
                    id="photo" 
                    accept="image/*" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                >
            </div>

            <!-- Email -->
            <div id="email" class="mb-6" style="display: none;">
                <label for="email" class="block text-gray-700 font-medium">Email:</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your email"
                >
            </div>

            <!-- Teacher's Designation -->
            <div id="designation" class="mb-6" style="display: none;">
                <label for="designation" class="block text-gray-700 font-medium">Teacher's Designation:</label>
                <input 
                    type="text" 
                    name="designation" 
                    id="designation" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your designation"
                >
            </div>

            <!-- School Name -->
            <div id="school-name" class="mb-6" style="display: none;">
                <label for="school_name" class="block text-gray-700 font-medium">School Name:</label>
                <input 
                    type="text" 
                    name="school_name" 
                    id="school_name" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your school name"
                >
            </div>

            <!-- Joining Date -->
            <div id="joining-date" class="mb-6" style="display: none;">
                <label for="joining_date" class="block text-gray-700 font-medium">Joining Date:</label>
                <input 
                    type="date" 
                    name="joining_date" 
                    id="joining_date" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                >
            </div>

            <!-- Experience -->
            <div id="experience" class="mb-6" style="display: none;">
                <label for="experience" class="block text-gray-700 font-medium">Experience Level:</label>
                <select 
                    name="experience" 
                    id="experience" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                >
                    <option value="" disabled selected>Select experience level</option>
                    <option value="junior">Junior Teacher</option>
                    <option value="senior">Senior Teacher</option>
                    <option value="assistant_headmaster">Assistant Headmaster</option>
                    <option value="headmaster">Headmaster</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold"
            >
                Sign Up
            </button>
        </form>
    </main>

    <script>
        // Function to dynamically show fields based on selected role
        function showRoleFields() {
            const role = document.getElementById('role').value;
            const fieldsToShow = ['full-name', 'username', 'password', 'photo', 'email'];
            const designationField = document.getElementById('designation');
            const schoolNameField = document.getElementById('school-name');
            const joiningDateField = document.getElementById('joining-date');
            const experienceField = document.getElementById('experience');
            
            // Show common fields (Full name, username, password, photo, email)
            fieldsToShow.forEach(field => {
                document.getElementById(field).style.display = 'block';
            });
            
            // If Teacher is selected, show teacher-specific fields
            if (role === 'teacher') {
                designationField.style.display = 'block';
                schoolNameField.style.display = 'block';
                joiningDateField.style.display = 'block';
                experienceField.style.display = 'block';
            } else {
                designationField.style.display = 'none';
                schoolNameField.style.display = 'none';
                joiningDateField.style.display = 'none';
                experienceField.style.display = 'none';
            }
        }

        // Password toggle functionality
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            const isPasswordHidden = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPasswordHidden ? 'text' : 'password');
            togglePassword.classList.toggle('text-blue-500');
        });
    </script>
</body>
</html>
