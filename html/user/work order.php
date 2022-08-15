<?php   

session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Order</title>
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
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
            <a href="dashboard.php" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">consumer</a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <a href="/html/user/work order.php">
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
            <a href="order.php" class="flex items-center text-white active-nav-link py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Work Request
            </a>
            <a href="profile.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user mr-3"></i>
                Profile
            </a>
            <a href="contact.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Contact
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
            <a href = "/html/login/logout.php">
              <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-blue-300 rounded text-base mt-4 md:mt-0">Log Out
            </a>
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </button>
          </div>
        </header>


    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Create New</h1>


                    <div class="w-full lg:w mt-6 pl-0 lg:pl-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> New Work Order Form
                        </p>
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded shadow-xl" method="POST" action="/html/database/new_work_db.php">
                                <p class="text-lg text-gray-800 font-medium pb-4">Customer information</p>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Customer Name</label>
                                    <input class="w-full px-5 py-1 text-black-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" readonly value="<?php echo $_SESSION['first_name']." ".$_SESSION['last_name']?>" aria-label="Name">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="email">Email</label>
                                    <input class="w-full px-5  py-1 text-black-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" readonly value="<?php echo $_SESSION['email']?>" aria-label="Email">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="mobile">Mobile</label>
                                    <input class="w-full px-5  py-1 text-black-700 bg-gray-200 rounded" id="mobile" name="mobile" type="text" required="" readonly value="<?php echo $_SESSION['mobile']?>" aria-label="Email">
                                </div>
                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="address">Address</label>
                                    <input class="w-full px-5  py-1 text-black-700 bg-gray-200 rounded" id="building" name="building" type="text" required="" readonly value="<?php echo $_SESSION['building']?>" aria-label="Address">
                                    </div>
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class="hidden block text-sm text-gray-600" for="floor">Floor</label>
                                    <input class="w-full px-2 py-2 text-black-700 bg-gray-200 rounded" id="floor" name="floor" type="text" required="" readonly value="<?php echo $_SESSION['floor']?>" aria-label="Email">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="hidden block text-sm text-gray-600" for="flat">Flat</label>
                                    <input class="w-full px-2 py-2 text-black-700 bg-gray-200 rounded" id="flat"  name="flat" type="text" required="" readonly value="<?php echo $_SESSION['flat']?>" aria-label="Email">
                                </div>
                                <p class="text-lg text-gray-800 font-medium py-4">Work information</p>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="title">Title</label>
                                    <input class="w-full px-2 py-2 text-bblack-700 bg-gray-200 rounded" autocomplete="off" id="title" name="title" type="text" required="" placeholder="Title" aria-label="Name">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="description">Description</label>
                                    <input class="w-full px-2 py-5 text-black-700 bg-gray-200 rounded" autocomplete="off" id="description" name="description" type="text" required="" placeholder="Description" aria-label="Name">
                                </div>

                                <div class="mt-2 md:w-1/3">
                                    <label class="block text-sm text-gray-600" for="priority">Priority</label>
                                </div>
                                <div class="md:w-1/3">
                                <select class="block appearance-none w-full bg-gray-200 border border-blue-500 text-black-600 py-3 px-1 pr-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required="" id="priority" name="priority" placeholder="select priority">
                                    <option value="Low">None</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"></svg>
                                </div>
                            </div>

                            <div class="mt-2 md:w-1/3">
                                    <label class="block text-sm text-gray-600" for="category">Category</label>
                                </div>
                                <div class="md:w-1/3">
                                
                                <select class="block appearance-none w-full bg-gray-200 border border-blue-500 text-black-600 py-3 px-1 pr-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="category" name= "category" placeholder="select priority">
                                    <option value="not selected">Select</option>
                                    <option>Damage</option>
                                    <option>Electrical</option>
                                    <option>Water</option>
                                    <option>Security</option>
                                    <option>Cleanliness</option>
                                    <option>Safety</option>
                                </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"></svg>
                                </div>
                            </div>

                            <div class="mt-2 md:w-1/3">
                                    <label class="block text-sm text-gray-600" for="date">Due Date</label>
                                </div>

                                <div class="mt-2 md:w-1/3">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                                </div>
                                <input datepicker datepicker-buttons format="dd/mm/yy" autocomplete="off" type="text" class=" text-black-700 bg-gray-200 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" id="date" name="date" placeholder="Select date" value="<?php 
                                $date = date_create(date("D-M-Y"));
                                date_add($date, date_interval_create_from_date_string("3 days"));
                                echo date_format($date, "D-M-Y");
                                ?>">
                                </div>

                                <div class="mt-6">
                                <input class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="reset">     
                                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </main>
            <?php
                include('include/footer.php');
            ?>
        </div>

    </div>
    


</body>
</html>
