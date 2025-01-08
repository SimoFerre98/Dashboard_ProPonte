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
if (!isset($_GET['book_id'])) {
    header("Location: ../pages/dashboard.php");
}

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $sql = "SELECT * FROM buecher INNER JOIN kategorie ON kategorie.kat_id = buecher.kategorie WHERE buecher.id = '$book_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
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
    <!--     Fonts and icons     -->
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
<?php
include "alerts_bibliothek.php";
?>


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
                                <p class="mb-0 dark:text-white/80">Buch Details</p>
                            </div>
                        </div>
                        <div class="flex-auto p-6">
                            <?php if ($row): ?>
                                <h2 class="text-2xl font-bold mb-4"><?php echo htmlspecialchars($row['titel']); ?></h2>
                                <p><strong>Autor:</strong> <?php echo htmlspecialchars($row['author']); ?></p>
                                <p><strong>Verlag:</strong> <?php echo htmlspecialchars($row['verlag']); ?></p>
                                <p><strong>ISBN:</strong> <?php echo htmlspecialchars($row['isbn']); ?></p>
                                <p><strong>Beschreibung:</strong> <?php echo nl2br(htmlspecialchars($row['beschreibung'])); ?></p>
                                <p><strong>Kategorie:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
                                <p><strong>Anschaffungspreis:</strong> <?php echo htmlspecialchars($row['anschaffungspreis']); ?> €</p>

                            <?php else: ?>
                                <p>Buchdetails konnten nicht geladen werden.</p>
                            <?php endif; ?>
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
    // Alle "Ausleihen"-Buttons
    const openModalBtns = document.querySelectorAll('.openModalBtn');
    const modal = document.getElementById('modal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const bookIdInput = document.getElementById('bookId'); // Hidden input im Modal

    // Modal öffnen und ID setzen
    openModalBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const bookId = btn.getAttribute('data-id'); // ID aus data-id holen
            bookIdInput.value = bookId; // Hidden input mit der ID füllen
            modal.classList.remove('hidden'); // Modal anzeigen
        });
    });

    // Modal schließen
    const closeModal = () => {
        modal.classList.add('hidden');
    };

    closeModalBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Modal schließen, wenn außerhalb geklickt wird
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
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
<!-- plugin for charts  -->
<script src="../assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>