<?php   

session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>



<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="dashboard.php" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <a href="/html/admin/work order.php">
            <button @click="open = !open" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Create New
            </button>
            </a>

            </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="dashboard.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="user.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-solid fa-users mr-3"></i>
                Users
            </a>
            <a href="order.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Work Order
            </a>
            <a href="workers.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Workers
            </a>
            
            <a href="contact.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Contact
            </a>
            <a href="contact_info.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-solid fa-address-book mr-3"></i>
                Contact Info
            </a>
            <a href="profile.php" class="flex items-center text-white active-nav-link py-4 pl-6 nav-item">
                <i class="fas fa-user mr-3"></i>
                Profile
            </a>
        </nav>
        
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        
          <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl ">CMMS</span>
          </a>
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
            <a href = "/html/login/login_pg.php">
              <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-blue-300 rounded text-base mt-4 md:mt-0">Log Out
            </a>
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </button>
          </div>
        </header>


<form action="/html/database/edit_profile_db.php">
    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-y-auto sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">Your Information</h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
  </div>
  <div class="border-t border-gray-200">
    <dl>
    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">First Name</dt>
        <input class="w-full px-5  py-1 text-black-700 outline-black rounded" id="first_name" name="first_name" type="text" required="" value="<?php echo $_SESSION['first_name']?>" aria-label="First Name">
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Last Name</dt>
        <input class="w-full px-5  py-1 text-black-700 outline-black rounded" id="last_name" name="last_name" type="text" required="" placeholder="<?php echo $_SESSION['last_name']?>" value="<?php echo $_SESSION['last_name']?>" aria-label="Last Name">
        
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Email</dt>
        <input class="w-full px-5  py-1 text-black-700 bg-gray-200 rounded" id="email" name="email" type="text" readonly required="" placeholder="<?php echo $_SESSION['email']?>" value="<?php echo $_SESSION['email']?>" aria-label="Last Name">
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Mobile</dt>
        <input class="w-full px-5  py-1 text-black-700 bg-gray-200 outline-black rounded" id="mobile" name="mobile" type="text" readonly required="" placeholder="<?php echo $_SESSION['mobile']?>" value="<?php echo $_SESSION['mobile']?>" aria-label="Last Name">
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Building</dt>
                                    <div class="mt-2">
                                    <select class="block appearance-none w-full bg-gray-200 border border-blue-500 text-black-600 py-3 px-1 pr-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="building" name="building" value = "">
                                    <option value="<?php echo $_SESSION['building']?>" >Select</option>
                                    <option>A wing</option>
                                    <option>B wing</option>
                                    <option>C wing</option>
                                    <option>D wing</option>
                                </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"></svg>
                                </div>
                            </div>
                                
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Floor</dt>
        <input class="w-full px-5  py-1 text-black-700 outline-black rounded" id="floor" name="floor" type="text" required="" placeholder="<?php echo $_SESSION['floor']?>" value="<?php echo $_SESSION['floor']?>" aria-label="Last Name">
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Flat</dt>
        <input class="w-full px-5  py-1 text-black-700 outline-black rounded" id="flat" name="flat" type="text" required="" placeholder="<?php echo $_SESSION['flat']?>" value="<?php echo $_SESSION['flat']?>" aria-label="Last Name">
      </div>
    </dl>
  <div class="flex space-x-4  justify-center mt-2">
    <a>
    <button class="px-6 py-3 text-white font-light tracking-wider bg-gray-900 rounded">EDIT</button>
    </a>
    <a>
    <button type="reset" class="px-6 py-3 text-white font-light tracking-wider bg-gray-900 rounded">RESET</button>
    </a>
    
</form>
</div>

  
  <?php
    include('include/footer.php');
?>
  </div>
  
</div>
</body> 

</body>
</html>