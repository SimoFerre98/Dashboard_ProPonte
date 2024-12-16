<?php
if (isset($_SESSION['name'])){
?>

<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
      <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto md:pr-4">
            <!-- <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
              <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                <i class="fas fa-search"></i>
              </span>
              <input type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
            </div> -->
          </div>
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->

            <li class="flex items-center pl-4 xl:hidden">
              <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                <div class="w-4.5 overflow-hidden">
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                </div>
              </a>
            </li>
            <li class="flex items-center px-4">
              <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                <!-- fixed-plugin-button-nav  -->
              </a>
            </li>

            <!-- notifications -->

            <li class="relative flex items-center pr-2">
              <p class="hidden transform-dropdown-show"></p>
              <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger aria-expanded="false">
                <i class="cursor-pointer fa fa-bell"></i>
              </a>

              <ul dropdown-menu class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:shadow-dark-xl dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
              <?php
              $sql = "SELECT * FROM lendings WHERE returned = '0' AND CURRENT_DATE() > end";
              $result = $conn->query($sql);
              $books_not_returned = $result->num_rows;
              
              if ($books_not_returned > 0) {
                echo '<li class="relative flex items-center px-4 py-2 border-b border-solid border-gray-200 dark:border-slate-700 last:border-0">
                <a href="overdue.php" class="text-sm text-slate-500 dark:text-white ease-in-out transition-all">
                  <div class="flex items
                  -center">
                    <i class="mr-2 text-sm leading-normal ni ni-bell-55 text-red-500"></i>
                    <span class="text-sm font-semibold">'. $books_not_returned .' Bücher sind überfällig.</span>
                  </div>
                </a>
              </li>';
              }else{
                echo '<li class="relative flex items-center px-4 py-2 border-b border-solid border-gray-200 dark:border-slate-700 last:border-0">
                <a href="javascript:;" class="text-sm text-slate-500 dark:text-white ease-in-out transition-all">
                  <div class="flex items
                  -center">
                    <i class="mr-2 text-sm leading-normal ni ni-bell-55 text-green-500"></i>
                    <span class="text-sm font-semibold">Es gibt keine überfälligen Bücher.</span>
                  </div>
                </a>
              </li>';
              }
              ?>
          </ul>
        </div>
      </div>
    </nav>
    <?php
    }
    ?>

    <!-- end Navbar -->

    <!-- cards -->
    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
      <!-- row 1 -->
      <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <?php
        if (isset($_SESSION['name'])) {
          echo '<div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">';
          echo ' <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">';
          echo ' <div class="flex-auto p-4">';
          echo '<div class="flex flex-row -mx-3">';
          echo '<div class="flex-none w-2/3 max-w-full px-3">';
          echo '<div>';
          echo '<p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Angemeldet als</p>';
          echo '<h5 class="mb-2 font-bold dark:text-white">' . $_SESSION['name'] . '</h5>';
          echo '</div>';
          echo '</div>';
          echo ' <div class="px-3 text-right basis-1/3">';
          echo ' <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">';
          echo '<i class=" fa-regular fa-user leading-none text-lg relative top-3.5 text-white"></i>';
          echo '</div>';
          echo ' </div>';
          echo ' </div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        ?>

        <!-- card2 -->
        <?php
        $sql = "SELECT * FROM buecher";
        $result = $conn->query($sql);
        $total_buecher = $result->num_rows;
        echo '<div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
          <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
              <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                  <div>
                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Gesamt Bücher</p>
                    <h5 class="mb-2 font-bold dark:text-white">' . $total_buecher . '</h5>
                  </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                  <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                    <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        ';
        ?>
        <!-- card3 -->
        <?php
        $sql = "SELECT * FROM lendings RIGHT JOIN buecher ON buecher.id = lendings.buch_id WHERE returned = '1' OR returned IS NULL";
        $result = $conn->query($sql);
        $total_ausleihe = $result->num_rows;
        echo '<div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
          <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
              <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                  <div>
                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Verfügbare Bücher</p>
                    <h5 class="mb-2 font-bold dark:text-white">' . $total_ausleihe . '</h5>
                  </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                  <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                    <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        ';
        ?>

        <!-- card4 -->
        <?php
        $sql = "SELECT * FROM lendings WHERE returned = '0'";
        $result = $conn->query($sql);
        $total_ausleihe_user = $result->num_rows;
        echo '<div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
          <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
              <div class="flex flex-row -mx-3">
                <div class="flex-none w-2/3 max-w-full px-3">
                  <div>
                    <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Ausgeliehene Bücher</p>
                    <h5 class="mb-2 font-bold dark:text-white">' . $total_ausleihe_user . '</h5>
                  </div>
                </div>
                <div class="px-3 text-right basis-1/3">
                  <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                    <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      ';
        ?>