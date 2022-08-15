<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work order</title>
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
            <a href="dashboard.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="user.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-solid fa-users mr-3"></i>
                Users
            </a>
            <a href="order.php" class="flex items-center text-white active-nav-link py-4 pl-6 nav-item">
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
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Tables</h1>

                <div class="w-full mt-6">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i>Work Order Table
                    </p>
                    <p class="text-x pb-2 flex items-center">
                    <svg class="h-6 w-6 text-black"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"/>
                    </svg>

                        <a class=" mr-3  hover:text-blue-500 underline" href="/html/admin/work order.php">add Order</a>
                    </p>

                    <form>
                    <div class="flex justify-center mt-6 pb-5">
                    <div class="flex md:w-1/3 justify-center md:justify-start text-white px-2">
                    <span class="relative w-full">
                    <input autocomplete="off" aria-label="search" type="search" id="valueToSearch" name="valueToSearch" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                    <button>
                    <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                        <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                        
                    </div>
                    </button>
                    </span>
                    </div>
                    <a href="/html/admin/order.php">
                            <button class="px-6 py-3 text-white font-light tracking-wider bg-gray-900 rounded">Search</button>
                    </a>
                    
                    </div>
                    
                    </form>

                    <?php
                    
                    // Include database connection file
                    $con = mysqli_connect('localhost', 'root', '','cmms');

                    // Set variables from form.
                    
                    if(empty($_GET['valueToSearch'])){
                        ?>


                    <div class="bg-white overflow-auto">
                        <table class="table-auto border-separate bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Id</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Mobile</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Building</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Floor</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Flat</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Priority</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Due Date</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Assign Worker</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Done Date</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Update</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Done</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <?php
                                $con = mysqli_connect('localhost', 'root', '','cmms');
                                $sql = "SELECT * FROM `work_info`;";
                                $result = mysqli_query($con,$sql);

                                while($row=mysqli_fetch_array($result)):
                                ?>
                                <tr class="bg-grey-200">
                                    <td class="text-left py-3 px-4"><?php echo $row['id']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['name']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:<?php echo $row['mobile']; ?>"><?php echo $row['mobile']; ?></a></td>
                                    <td class="text-left py-3 px-4"><?php echo $row['building']; ?></td>
                                    <td class="text-left py-3 px-4"><?php echo $row['floor']; ?></td>
                                    <td class="text-left py-3 px-4"><?php echo $row['flat']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['title']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['description']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['priority']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['category']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['date']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['worker']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['done_date']; ?></td>
                                    <td class="text-left py-3 px-4"><?php echo $row['status']; ?></td>

                                    <td><a class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " href="/html/admin/update.php?id=<?php echo $row["id"]; ?>">Update</a></td>
                                    <td><a class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " href="/html/database/done_db.php?id=<?php echo $row["id"]; ?>">Done</a></td>
                                    <td><a class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " href="/html/database/order_delete_db.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                    
                                </tr>
                                
                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <?php
                    }else{
                        $searchterm=$_GET['valueToSearch'];

                    // Check if search term was entered.
                    
                    $sql ="select * from work_info where  `id` like '%".$searchterm."%' or `name` like '%".$searchterm."%' or `email` like '%".$searchterm."%' or `mobile` like '%".$searchterm."%' or `building` like '%".$searchterm."%' or `floor` like '%".$searchterm."%' or `flat` like '%".$searchterm."%' or `title` like '%".$searchterm."%' or `description` like '%".$searchterm."%' or `priority` like '%".$searchterm."%' or `category` like '%".$searchterm."%' or `date` like '%".$searchterm."%' or `worker` like '%".$searchterm."%' or `done_date` like '%".$searchterm."%' or `status` like '%".$searchterm."%'";
                    
                    $rs = mysqli_query($con,$sql);
                    ?>

                    <div class="bg-white overflow-auto">
                        <table class="table-auto border-separate bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Id</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Mobile</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Building</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Floor</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Flat</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Description</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Priority</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Due Date</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Assign Worker</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Done Date</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Update</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Done</th>
                                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">

                            <?php
                            while($row=mysqli_fetch_assoc($rs)):
                                ?>
                                <tr class="bg-grey-200">
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['id']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['name']; ?></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:<?php echo $row['mobile']; ?>"></a></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['building']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['floor']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['flat']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['title']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['description']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['priority']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['category']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['date']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['worker']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['done_date']; ?></td>
                                    <td class="w-1/3 text-left py-3 px-4"><?php echo $row['status']; ?></td>

                                    <td><a class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " href="/html/admin/update.php?id=<?php echo $row["id"]; ?>">Update</a></td>
                                    <td><a class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " href="/html/database/done_db.php?id=<?php echo $row["id"]; ?>">Done</a></td>
                                    <td><a class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 " href="/html/database/order_delete_db.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                    
                                </tr>
                            </tbody>
                            <?php
                                endwhile;}
                                ?>
                        </table>



                </div>

                </div>
            </main>
    
<?php
    include('include/footer.php');
?>

</body>
</html>
