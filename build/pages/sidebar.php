<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar</title>
</head>

<body>
  <?php
  // Aktuelle Datei abrufen (z. B. "dashboard.php" oder "bibliothek.php")
  $current_page = basename($_SERVER['PHP_SELF']);

  ?>

  <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
        <img src="../assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Argon Dashboard 2</span>
      </a>
    </div>
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
          <a class="<?php echo ($current_page == 'dashboard.php') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors'; ?>" href="../pages/dashboard.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
          </a>
        </li>
        <li class="mt-0.5 w-full">
          <a class="<?php echo ($current_page == 'bibliothek.php') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors'; ?>" href="../pages/bibliothek.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 fa-solid fa-book fa-xl"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Bibliothek</span>
          </a>
        </li>
        <?php
        if(isset($_SESSION['name'])){
          echo '<li class="mt-0.5 w-full">';
          echo '<a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/bibliothekar.php">';
          echo '<div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">';
          echo '<i class="relative top-0 text-sm leading-normal text-orange-500 fa-solid fa-user-tie fa-xl"></i>';
          echo '</div>';
          echo '<span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Verwaltung</span>';
          echo '</a>';
          echo '</li>';
          echo '<li class="mt-0.5 w-full">';
          echo '<a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/overdue.php">';
          echo '<div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">';
          echo '<i class="relative top-0 text-sm leading-normal text-orange-500 fa-solid fa-circle-exclamation fa-xl"></i>';
          echo '</div>';
          echo '<span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Überfällige Bücher</span>';
          echo '</a>';
          echo '</li>';
        }


          ?>


        <li class="w-full mt-4">
          <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account Seite</h6>
        </li>
        <?php
        if (isset($_SESSION['name'])) {
          echo '<li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/settings.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-settings-gear-65"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Einstellungen</span>
                </a>
                </li>';
          echo '<li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/logout.php">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-button-power"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Abmelden</span>
                </a>
                </li>';
        } else {
          echo '<li class="mt-0.5 w-full">
          <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/sign-in.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Anmelden</span>
          </a>
        </li>';
        }
        ?>

      </ul>
    </div>
  </aside>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>

</body>

</html>