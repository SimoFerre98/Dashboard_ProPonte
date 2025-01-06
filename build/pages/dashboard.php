<!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
include "../../db.php";

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>Argon Dashboard 2 Tailwind by Creative Tim</title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/d644d5e21b.js" crossorigin="anonymous"></script>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Popper -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>

  <!-- Main Styling -->
  <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
  <!-- sidenav  -->
  <?php
  include "sidebar.php";
  ?>

  <!-- end sidenav -->

  <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

    <!-- Navbar -->
    <?php
    include "navbar.php";
    ?>



    <!-- cards row 3 -->
    <div class="w-full max-w-full px-3 mt-6 mb-6 lg:mb-0 lg:w-1/2">
      <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="p-4 pb-0 rounded-t-4">
          <h6 class="mb-0 dark:text-white">Top 5 Kategorien</h6>
        </div>
        <div class="flex-auto p-4">
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
            <?php
            $sql = "SELECT k.name, COUNT(b.id) as total_books FROM kategorie k 
                      INNER JOIN buecher b ON k.kat_id = b.kategorie 
                      GROUP BY k.name ORDER BY total_books DESC LIMIT 5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
                <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-xl text-inherit">
                  <div class="flex items-center">
                    <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                      <i class="text-white ni ni-books relative top-0.75 text-xxs"></i>
                    </div>
                    <div class="flex flex-col">
                      <form action="bibliothek.php" method="POST">
                      <input type="hidden" name="kategorie" value="<?php echo $row['name']; ?>">
                      <button type="submit" class="text-sm font-semibold leading-normal text-slate-700 dark:text-white hover:text-slate-700 dark:hover:text-white"><?php echo $row['name']; ?></button>
                      <br>
                      <span class="text-xs leading-tight dark:text-white/80"><?php echo $row['total_books']; ?> Bücher</span>
                      </form>
                    </div>
                  </div>
                </li>
            <?php
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap mt-6 mr-3">
      <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
          <div class="p-4 pb-0 mb-0 rounded-t-4">
            <div class="flex justify-between">
              <h6 class="mb-2 dark:text-white">Top 5 Bücher</h6>
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
              <thead>
                <tr>
                  <th class="p-2 text-left bg-gray-100 dark:bg-gray-800 dark:text-white">Platz</th>
                  <th class="p-2 text-left bg-gray-100 dark:bg-gray-800 dark:text-white">Titel</th>
                  <th class="p-2 text-left bg-gray-100 dark:bg-gray-800 dark:text-white">Beschreibung</th>
                  <th class="p-2 text-left bg-gray-100 dark:bg-gray-800 dark:text-white">Verlag</th>
                  <th class="p-2 text-left bg-gray-100 dark:bg-gray-800 dark:text-white">Kategorie</th>
                  <th class="p-2 text-left bg-gray-100 dark:bg-gray-800 dark:text-white">Author</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM statisic s 
                      INNER JOIN buecher b ON b.id = s.buch_id 
                      INNER JOIN kategorie k ON k.kat_id = b.kategorie 
                      ORDER BY anzahl DESC LIMIT 5";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $Platz = 0;
                  while ($row = $result->fetch_assoc()) {
                    $Platz++;
                ?>
                    <tr>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                        <div class="flex items-center justify-center px-2 py-1">
                          <h6 class="mb-0 text-sm leading-normal dark:text-white">Platz: <?php echo $Platz; ?></h6>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                        <div class="flex items-center px-2 py-1">
                          <div class="ml-6">
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Titel:</p>
                            <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo $row['titel']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                        <div class="text-center">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Beschreibung:</p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo $row['beschreibung']; ?></h6>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                        <div class="text-center">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Verlag:</p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo $row['verlag']; ?></h6>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                        <div class="text-center">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Kategorie:</p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo $row['name']; ?></h6>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                        <div class="text-center">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Author:</p>
                          <h6 class="mb-0 text-sm leading-normal dark:text-white"><?php echo $row['author']; ?></h6>
                        </div>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "<tr><td colspan='6' class='text-center text-gray-500 dark:text-white'>Keine Bücher gefunden</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <footer class="pt-4">
      <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
          <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
              ©
              <script>
                document.write(new Date().getFullYear() + ",");
              </script>
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white" target="_blank">Semtex_willi</a>
              for a better web.
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
            <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://creative-tim.com/blog" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </div>
    <!-- end cards -->
  </main>
  <div fixed-plugin>
    <a fixed-plugin-button class="fixed px-4 py-2 text-xl bg-white shadow-lg cursor-pointer bottom-8 right-8 z-990 rounded-circle text-slate-700">
      <i class="py-2 pointer-events-none fa fa-cog"> </i>
    </a>
    <!-- -right-90 in loc de 0-->
    <div fixed-plugin-card class="z-sticky backdrop-blur-2xl backdrop-saturate-200 dark:bg-slate-850/80 shadow-3xl w-90 ease -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 duration-200">
      <div class="px-6 pt-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
        <div class="float-left">
          <h5 class="mt-4 mb-0 dark:text-white">Configurator</h5>
        </div>
        <div class="float-right mt-6">
          <button fixed-plugin-close-button class="inline-block p-0 mb-4 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
      <div class="flex-auto p-6 pt-0 overflow-auto sm:pt-4">

        <div class="flex items-center justify-between p-4">
          <h6 class="text-lg font-medium text-gray-800 dark:text-white">Light / Dark</h6>
          <!-- Toggle Switch -->
          <label class="relative inline-flex items-center cursor-pointer">
            <input id="darkToggle" class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
            <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:bg-blue-600">
            </div>
          </label>
        </div>

      </div>
    </div>
  </div>
</body>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const darkToggle = document.getElementById('darkToggle');
    const isDarkMode = localStorage.getItem('darkmode') === 'enabled';

    // Set initial dark mode state
    if (isDarkMode) {
      document.documentElement.classList.add('dark');
      darkToggle.checked = true;
    }

    // Toggle dark mode on change
    darkToggle.addEventListener('change', () => {
      if (darkToggle.checked) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('darkmode', 'enabled');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('darkmode', 'enabled');
      }
    });
  });
</script>
<!-- plugin for charts  -->
<script src="../assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>