<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Register</title>
</head>
<body>

<?php
    include('include/header.php');
?>


    <form class="bg-white max-w-lg mx-auto p-8 md:p-12 my-5 rounded-lg shadow-2xl" method="POST" action="/html/database/register_db.php">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-first-name">
              First Name
            </label>
            <input class="appearance-none block w-full bg-white-200 text-black-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" autocomplete="off" required id="first_name" type="text" name="first_name">
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-last-name">
              Last Name
            </label>
            <input class="appearance-none block w-full bg-white-200 text-black-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" autocomplete="off" required id="last_name" type="text" name="last_name">
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-first-name">
              Email Id
            </label>
            <input class="appearance-none block w-full bg-white-200 text-black-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" autocomplete="off" required id="email" type="text" name="email">
            <p class="text-red-500 text-xs italic">Email will be used as username.</p>
        </div>
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-last-name">
              Mobile No
            </label>
            <input class="appearance-none block w-full bg-white-200 text-black-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" autocomplete="off" required id="mobile" type="int" name="mobile">
        </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-password">
              Password
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-black-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" autocomplete="off" required id="password" type="password" name="password" placeholder="******************">
            
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-state">
                Building
              </label>
            <select class="block appearance-none w-full bg-gray-200 border border-blue-500 text-black-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" autocomplete="off" required id="building" name="building">
                <option selected disabled>Select</option>
                <option>A wing</option>
                <option>B wing</option>
                <option>C wing</option>
                <option>D wing</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"></svg>
              </div>
            
          </div>
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            
            <div class="relative">
                <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-city">
                    Floor No
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-black-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" autocomplete="off" required id="floor" type="text" name="floor">
            </div>
          </div>
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-purple-700 text-xs font-bold mb-2" for="grid-zip">
              Flat No
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-black-700 border border-blue-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" autocomplete="off" required id="flat" type="text" name="flat">
          </div>
        </div>
        <div >
        <a href="/html/messages/login_success.php">
          <button class="flex mx-auto text-white mt-10 mb-6 bg-indigo-500 border-0 py-2 px-7 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            Register
        </button>
        </a>
        </div>
        <div class="max-w-lg mx-auto text-center mt-6 mb-6">
            <p class="text-blue-500">Already have an account? 
                <a href="/html/login/login_pg.php" class="font-bold hover:underline">Login</a>
            </p>
        </div>
      </form>
      


<?php
    include('include/footer.php');
?>
</body>
</html>