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
if (isset($_SESSION['isbn'])) {
  unset($_SESSION['isbn'], $_SESSION['titel'], $_SESSION['kategorie'], $_SESSION['verlag'], $_SESSION['beschreibung'], $_SESSION['anschaffungspreis'], $_SESSION['autor']);
}
if (!isset($_SESSION['name'])) {
  header("Location: ../pages/dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>Argon Dashboard 2 Tailwind by Creative Tim</title>

  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/d644d5e21b.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>


  <!-- Tailwind CSS -->
  <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- DataTables CSS und JS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css">
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

  <!-- Popper.js -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>

  <!-- Main Styling -->
  <link href="../assets/css/argon-dashboard-tailwind.css" rel="stylesheet" />
</head>
<?php if (isset($_GET['message']) && $_GET['message'] == 'success'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Erfolg!</p>
    <p>Daten wurden erfolgreich geändert.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('message') === 'success') {
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
<?php if (isset($_GET['message']) && $_GET['message'] == 'success'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-500 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Error!</p>
    <p>Fehler beim Löschen des Buches, bitte versuchen Sie es erneut.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('message') === 'success') {
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
<?php if (isset($_GET['create']) && $_GET['create'] == 'success'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Erfolg!</p>
    <p>Buch wurde erfolgreich hinzugefügt.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('create') === 'success') {
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
<?php if (isset($_GET['delete']) && $_GET['delete'] == 'success'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Erfolg!</p>
    <p>Buch wurde erfolgreich gelöchscht.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('delete') === 'success') {
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

    <?php
    include "navbar.php";
    ?>

<div class="flex flex-wrap mt-6 -mx-3">
      <!-- Füge dies in dein HTML für den Paginierungsbereich ein -->
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="flex justify-center py-4">
            <form action="" method="POST" class="w-full max-w-md">
              <div class="flex items-center border-b border-gray-500 py-2">
                <input
                  type="text"
                  name="search"
                  value="<?php if (isset($_POST['search'])) {
                            echo $_POST['search'];
                          } ?>"
                  placeholder="Suchbegriff eingeben..."
                  class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-2 px-2 leading-tight focus:outline-none" />
                <button
                  type="submit"
                  name="suchen"
                  class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-2 px-4 rounded">
                  Suchen
                </button>
              </div>
            </form>

          </div>
          <table id="example" class="display" style="width:100%">
            <thead>
              <tr>
                <th>ISBN</th>
                <th>Titel</th>
                <th>Beschreibung</th>
                <th>Verlag</th>
                <th>Anschaffungspreis in €</th>
                <th>Kategorie</th>
                <th>Aktion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tabel_buch = "SELECT * FROM buecher b LEFT JOIN kategorie k ON k.kat_id = b.kategorie";
              $result_tabel = $conn->query($tabel_buch);
              while ($row = $result_tabel->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['isbn'] . '</td>';
                echo '<td>' . $row['titel'] . '</td>';
                echo '<td>' . $row['beschreibung'] . '</td>';
                echo '<td>' . $row['verlag'] . '</td>';
                echo '<td>' . $row['anschaffungspreis'] . '€</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>';
                echo '<a href="bearbeiten.php?isbn=' . $row['isbn'] . '">Bearbeiten</a> | ';
                echo '<a href="#" class="delete-btn" data-isbn="' . $row['isbn'] . '">Löschen</a>';
                echo '</td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
      <div class="bg-white rounded-lg shadow-lg w-96">
        <div class="px-6 py-4 border-b">
          <h2 class="text-lg font-semibold">Buch löschen</h2>
        </div>
        <div class="p-6">
          <p>Möchten Sie dieses Buch wirklich löschen?</p>
        </div>
        <div class="flex justify-end px-6 py-4 border-t space-x-3">
          <button id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded">Abbrechen</button>
          <a id="confirmDelete" href="#" class="bg-red-500 text-white px-4 py-2 rounded">Löschen</a>
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
              <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white" target="_blank">Semtex_Willi</a>
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

</body>
<div>
  <div class="fixed end-6 bottom-6 group">
    <!-- Speed Dial Menu -->
    <div id="speed-dial-menu-default" class="flex flex-col items-center hidden mb-4 space-y-2">
      <a href="./buch_erstellen.php" 
         class="relative flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
        <i class="fa fa-book-medical fa-1x"></i>
        <!-- Tooltip -->
        <span class="absolute right-full mr-2 px-2 py-1 text-sm text-white bg-gray-800 rounded opacity-0 transition-opacity duration-300 hover:opacity-100">
          Buch hinzufügen
        </span>
      </a>
    </div>

    <!-- Main Button -->
    <button type="button" id="speedDialToggle" aria-controls="speed-dial-menu-default" aria-expanded="false" class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
      <svg class="w-5 h-5 transition-transform group-hover:rotate-45" id="toggleIcon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
      </svg>
      <span class="sr-only">Open actions menu</span>
    </button>
  </div>
</div>

<style>
  a span {
    opacity: 0;
    pointer-events: none;
  }

  a:hover span {
    opacity: 1;
  }
</style>


<script>
  // JavaScript for toggling the speed dial menu
  const button = document.getElementById('speedDialToggle');
  const menu = document.getElementById('speed-dial-menu-default');
  const container = button.closest('.group');
  const icon = document.getElementById('toggleIcon');

  // Show/hide menu on click
  button.addEventListener('click', function() {
    toggleMenu();
  });

  // Show menu on hover (button or menu)
  container.addEventListener('mouseenter', () => {
    menu.classList.remove('hidden');
    menu.classList.add('flex');
    icon.classList.add('rotate-45');
  });

  // Hide menu when leaving button and menu
  container.addEventListener('mouseleave', () => {
    menu.classList.add('hidden');
    menu.classList.remove('flex');
    icon.classList.remove('rotate-45');
  });

  // Function to toggle menu visibility
  function toggleMenu() {
    if (menu.classList.contains('hidden')) {
      menu.classList.remove('hidden');
      menu.classList.add('flex');
      icon.classList.add('rotate-45');
    } else {
      menu.classList.add('hidden');
      menu.classList.remove('flex');
      icon.classList.remove('rotate-45');
    }
  }
</script>

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



<!-- Initialisierung -->
<script>
  // Initialisiere die Tabelle ohne Suchleiste
  $(document).ready(function() {
    $('#example').DataTable({
      searching: false, // Entfernt die Suchleiste
      paging: true, // Falls nötig, Paging aktivieren
      info: false // Entfernt das Anzeige-Info unten

    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".delete-btn");
    const deleteModal = document.getElementById("deleteModal");
    const confirmDelete = document.getElementById("confirmDelete");
    const cancelBtn = document.getElementById("cancelBtn");

    deleteButtons.forEach(button => {
      button.addEventListener("click", function(e) {
        e.preventDefault();
        const isbn = this.getAttribute("data-isbn");
        confirmDelete.setAttribute("href", `loeschen.php?isbn=${isbn}`);
        deleteModal.classList.remove("hidden");
      });
    });

    cancelBtn.addEventListener("click", function() {
      deleteModal.classList.add("hidden");
    });
  });
</script>

</html>