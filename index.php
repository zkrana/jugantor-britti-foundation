<?php include './assets/files/includes/header.php'; ?>

<main class="container mx-auto px-4 py-10">
    <section class="text-center">
        <h1 class="text-4xl font-bold text-blue-600">Welcome to the Jugantor Britti Foundation</h1>
        <p class="text-gray-600 mt-4">Manage exams, results, and user accounts seamlessly.</p>
        <div class="mt-8">
            <a href="students/index.php" class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700">Login as Student</a>
            <a href="admin/index.php" class="bg-gray-700 text-white px-6 py-3 rounded shadow hover:bg-gray-800 ml-4">Login as Admin/Teacher</a>
        </div>
    </section>
    <section class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-2xl font-bold text-gray-800">Easy Exam Management</h2>
            <p class="text-gray-600 mt-4">Organize exams with a few clicks and provide a seamless experience for students and teachers.</p>
        </div>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-2xl font-bold text-gray-800">Detailed Results Tracking</h2>
            <p class="text-gray-600 mt-4">Keep track of performance and ensure transparent results for all users.</p>
        </div>
    </section>
</main>


<?php include './assets/files/includes/footer.php'; ?>