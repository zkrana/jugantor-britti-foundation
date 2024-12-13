<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/jugantor-britti-foundation/assets/src/css/style.css">
    <title>Landing Page</title>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="index.php" class="text-xl font-bold text-blue-600">Exam System</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="about.php" class="text-gray-600 hover:text-blue-600">About</a></li>
                    <li><a href="contact.php" class="text-gray-600 hover:text-blue-600">Contact</a></li>
                    <li class="relative group">
                        <button class="text-gray-600 hover:text-blue-600 focus:outline-none">Login</button>
                        <div class="absolute right-0 mt-1 bg-white border rounded shadow-lg hidden group-hover:block">
                            <a href="/admin/index.php" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Admin/Teacher</a>
                            <a href="/students/index.php" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Student</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
