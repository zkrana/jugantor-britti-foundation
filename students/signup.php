<?php
session_start(); // Start the session to access the messages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/jugantor-britti-foundation/assets/src/css/style.css">
    <title>Student Signup</title>
    <style>
    .success {
        color: green;
        padding: 10px;
        border: 1px solid green;
        margin-bottom: 20px;
        background-color: #d4edda;
        border-radius: 5px;
    }
    .error {
        color: red;
        padding: 10px;
        border: 1px solid red;
        margin-bottom: 20px;
        background-color: #f8d7da;
        border-radius: 5px;
    }
</style>
</head>
<body class="bg-gray-100">
    <main class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">Student Signup</h1>
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

        <form action="../assets/files/students/signup_process.php" method="POST" enctype="multipart/form-data" class="mt-8 max-w-lg mx-auto bg-white shadow-lg p-8 rounded-lg">
            <!-- Name Input -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium">Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your full name"
                >
            </div>
            <!-- Email Input -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium">Email:</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your email"
                >
            </div>
            <!-- Phone Number Input -->
            <div class="mb-6">
                <label for="phone" class="block text-gray-700 font-medium">Phone Number:</label>
                <input 
                    type="text" 
                    name="phone" 
                    id="phone" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your phone number"
                >
            </div>
            <!-- Father's Name Input -->
            <div class="mb-6">
                <label for="father-name" class="block text-gray-700 font-medium">Father's Name:</label>
                <input 
                    type="text" 
                    name="father-name" 
                    id="father-name" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your father's name"
                >
            </div>
            <!-- Mother's Name Input -->
            <div class="mb-6">
                <label for="mother-name" class="block text-gray-700 font-medium">Mother's Name:</label>
                <input 
                    type="text" 
                    name="mother-name" 
                    id="mother-name" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your mother's name"
                >
            </div>
            <!-- School Name Input -->
            <div class="mb-6">
                <label for="school-name" class="block text-gray-700 font-medium">School Name:</label>
                <input 
                    type="text" 
                    name="school-name" 
                    id="school-name" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your school name"
                >
            </div>
            <!-- Class Select Input -->
            <div class="mb-6">
                <label for="class-name" class="block text-gray-700 font-medium">Class Name:</label>
                <select 
                    name="class-name" 
                    id="class-name" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                >
                    <option value="">Select your class</option>
                    <!-- Class options from 1 to 12 -->
                    <option value="1">Class 1</option>
                    <option value="2">Class 2</option>
                    <option value="3">Class 3</option>
                    <option value="4">Class 4</option>
                    <option value="5">Class 5</option>
                    <option value="6">Class 6</option>
                    <option value="7">Class 7</option>
                    <option value="8">Class 8</option>
                    <option value="9">Class 9</option>
                    <option value="10">Class 10</option>
                    <option value="11">Class 11</option>
                    <option value="12">Class 12</option>
                </select>
            </div>
            <!-- Roll Number Input -->
            <div class="mb-6">
                <label for="roll-no" class="block text-gray-700 font-medium">Roll Number:</label>
                <input 
                    type="text" 
                    name="roll-no" 
                    id="roll-no" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your roll number"
                >
            </div>
            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium">Password:</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter your password"
                >
            </div>
            <!-- Confirm Password Input -->
            <div class="mb-6">
                <label for="confirm-password" class="block text-gray-700 font-medium">Confirm Password:</label>
                <input 
                    type="password" 
                    name="confirm-password" 
                    id="confirm-password" 
                    required 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Confirm your password"
                >
            </div>
            <!-- Photo Upload Input -->
            <div class="mb-6">
                <label for="photo" class="block text-gray-700 font-medium">Upload Photo:</label>
                <input 
                    type="file" 
                    name="photo" 
                    id="photo" 
                    accept="image/*" 
                    class="w-full px-4 py-2 mt-2 border rounded focus:outline-none focus:ring focus:ring-blue-300"
                >
            </div>
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold"
            >
                Signup
            </button>
        </form>
        <div class="mt-4 text-center">
            <p>Already have an account? <a href="index.php" class="text-blue-600">Login here</a></p>
        </div>
    </main>
</body>
</html>