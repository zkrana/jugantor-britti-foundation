module.exports = {
    content: [
      // Watch all .php files in the root directory, admin folder, and students folder
      "./index.php",             // Root index file
      "./admin/**/*.php",        // Admin folder and its subfolders
      "./students/**/*.php",     // Students folder and its subfolders
      "./**/*.php",              // This includes all PHP files across your project
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
  