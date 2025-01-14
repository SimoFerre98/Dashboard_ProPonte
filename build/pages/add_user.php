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
    <script src="https://cdn.tailwindcss.com"></script>

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

<?php if (isset($_GET['create']) && $_GET['create'] == 'error'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-100 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Error!</p>
    <p>Es gab ein Fehler in der ersteellung des Benutzers</p>
    <p>Versuchen Sie es erneut.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('create') === 'error') {
        // Zeige den Alert an, indem die Übergangsklassen entfernt werden
        successAlert.classList.remove('opacity-0', 'scale-95'); // Entferne unsichtbar und kleiner
        successAlert.classList.add('opacity-100', 'scale-100'); // Mach sichtbar und setze normale Größe

        // Nachdem 5 Sekunden vergangen sind, verschwindet der Alert
        setTimeout(() => {
          successAlert.classList.remove('opacity-100', 'scale-100'); // Entferne sichtbar und normale Größe
          successAlert.classList.add('opacity-0', 'scale-95'); // Mache wieder unsichtbar und kleiner
        }, 5000); // 5 Sekunden
      }
    });
  </script>

<?php endif; ?>
<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    <?php
    include "sidebar.php";
    ?>

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl"> 

        <!-- cards -->
        <div class="w-full px-6 py-6 mx-auto">
            <!-- row 1 -->
            <div class="flex flex-wrap -mx-3">
                <div class="w-full p-6 mx-auto">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                                    <div class="flex items-center">
                                        <p class="mb-0 dark:text-white/80">Benutzer erstellen</p>
                                    </div>
                                </div>
                                <div class="flex-auto p-6">
                                    <form action="create_user.php" method="POST"> 
                                        <div class="flex flex-wrap -mx-3">
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                <div class="mb-4">
                                                    <label for="name" class="inline-block mb-2 ml-1 font-bold text-s text-slate-700 dark:text-white/80">Name</label>
                                                    <input type="text" id="name" name="vuname" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-xl py-3 px-4" required />
                                                </div>
                                            </div>
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                <div class="mb-4">
                                                    <label for="titel" class="inline-block mb-2 ml-1 font-bold text-s text-slate-700 dark:text-white/80">E-Mail</label>
                                                    <input type="email" id="email" name="email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-xl py-3 px-4" required />
                                                </div>
                                            </div>
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                <div class="mb-4">
                                                    <label for="passwort" class="inline-block mb-2 ml-1 font-bold text-s text-slate-700 dark:text-white/80">Passwort</label>
                                                    <input type="password" id="passwort" name="passwort" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-xl py-3 px-4" required />
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Erstellen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end row 1 -->
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
                                        <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white" target="_blank">Creative Tim</a>
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
    </main>
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
                localStorage.setItem('darkmode', 'disabled');
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