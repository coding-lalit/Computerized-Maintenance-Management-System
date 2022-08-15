<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Login</title>
</head>
<body>

<?php
  include('include/header.php');
?>

<!--login page -->
    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl">Welcome to CMMS</h3>
            <p class="text-gray-600 pt-2">Fill the requied field to reset your password.</p>
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="/html/database/forget_pass_db.php">
                <div class="mb-6 pt-3 rounded bg-white-200">
                    <label class=" text-white-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="email" id="email" name="email" required class="bg-white-200 rounded w-full text-black-700 focus:outline-none border-b-4 border-blue-500 focus:border-blue-800 transition duration-500 px-3 pb-3">
                </div>
                <div class="mb-6 pt-3 rounded bg-white-200">
                    <label class="text-white-700 text-sm font-bold mb-2 ml-3" for="password">New Password</label>
                    <input type="password" id="new_password" name="new_password" required class="bg-white-200 rounded w-full text-black-700 focus:outline-none border-b-4 border-blue-500 focus:border-blue-800 transition duration-500 px-3 pb-3">
                </div>
                <div class="mb-6 pt-3 rounded bg-white-200">
                    <label class="text-white-700 text-sm font-bold mb-2 ml-3" for="password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password"  required class="bg-white-200 rounded w-full text-black-700 focus:outline-none border-b-4 border-blue-500 focus:border-blue-800 transition duration-500 px-3 pb-3">
                </div>
                <div class="flex justify-end">
                    <a href="/html/login/login_pg.php" class="text-sm text-purple-600 hover:text-purple-700 hover:underline mb-6">remember your password?</a>
                </div>
                <button class= "bg-blue-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" name="submit" type="submit" id="submit">Submit
              </button>
            </form>
            <div class="max-w-lg mx-auto text-center mt-12 mb-6">
                <p class="text-blue-500">Don't have an account? 
                    <a href="/html/login/register.php" class="font-bold hover:underline">Register</a>
                </p>
            </div>
        </section>
    </main>

<?php
    include('include/footer.php');
?>
</body>
</html>