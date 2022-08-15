<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
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
            <a href="dashboard.php" class="flex items-center text-white active-nav-link py-4 pl-6 nav-item">
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
            <a href="profile.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
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

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Hello <?php echo $_SESSION['first_name'];?> Welcome Back!!</h1>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    
        

                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                               
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total users</h2>
                                    <label class="font-bold text-3xl">
                                        <?php
                                            $con = mysqli_connect('localhost', 'root', '','cmms');
                                            $sql = "SELECT * from register_info";

                                            if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            echo "$rowcount";
                                            }
                                            ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Total requests</h2>
                                    <label class="font-bold text-3xl">
                                        <?php
                                            $con = mysqli_connect('localhost', 'root', '','cmms');
                                            $sql = "SELECT * from work_info";

                                            if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            echo "$rowcount";
                                            }
                                            ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>

                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Pending works</h2>
                                    <label class="font-bold text-3xl">
                                        <?php
                                            $con = mysqli_connect('localhost', 'root', '','cmms');
                                            $sql = "SELECT * from work_info WHERE status = 'Processing'";

                                            if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            echo "$rowcount";
                                            }
                                            ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">Completed works</h2>
                                    <label class="font-bold text-3xl">
                                        <?php
                                            $con = mysqli_connect('localhost', 'root', '','cmms');
                                            $sql = "SELECT * from work_info WHERE status = 'Done'";

                                            if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            echo "$rowcount";
                                            }
                                            ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">issues</h2>
                                    <label class="font-bold text-3xl">
                                        <?php
                                            $con = mysqli_connect('localhost', 'root', '','cmms');
                                            $sql = "SELECT * from work_info WHERE status = 'Error'";

                                            if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            echo "$rowcount";
                                            }
                                            ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <!--Metric Card-->
                        <div class="bg-gradient-to-b from-orange-200 to-orange-100 border-b-4 border-orange-500 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                
                                <div class="flex-1 text-right md:text-center">
                                    <h2 class="font-bold uppercase text-gray-600">workers</h2>
                                    <label class="font-bold text-3xl">
                                        <?php
                                            $con = mysqli_connect('localhost', 'root', '','cmms');
                                            $sql = "SELECT * from workers_info";

                                            if ($result = mysqli_query($con, $sql)) {

    // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                            echo "$rowcount";
                                            }
                                            ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                </div>
            </main>
            
<?php
include ("include/footer.php");
?>
        </div>
    
    
    


</div>
</body>
</html>
