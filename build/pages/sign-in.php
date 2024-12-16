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
<!DOCTYPE html>
<html lang="en">

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
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Popper -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>

  <!-- Main Styling -->
  <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
</head>
<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Fehler!</p>
    <p>E-Mail oder Passwort ist falsch.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('error') === '1') {
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
<body
  class="m-0 font-sans text-base antialiased font-normal gray:bg-slate-900 leading-default bg-gray-50 text-slate-500">
  <main class="mt-0 transition-all duration-200 ease-in-out">
    <section>
      <div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-100">
        <div class="container">
          <div class="flex justify-center">
            <div class="flex flex-col w-full max-w-full px-3 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl gray:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 text-center">
                  <h4 class="font-bold">Sign In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="flex-auto p-6">
                  <form action="login.php" method="POST">
                    <div class="relative w-full max-w-sm mx-auto mt-4">
                      <input type="email" placeholder="Email" name="mail" id="mail"
                        class="focus:shadow-primary-outline dark:bg-gray-100 dark:placeholder:text-white/500 dark:text-white/500 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                    </div>
                    <div class="relative w-full max-w-sm mx-auto mt-8">
                      <input 
                        type="password" 
                        placeholder="Password" 
                        name="password" 
                        id="password" 
                        class="focus:shadow-primary-outline dark:bg-gray-100 dark:placeholder:text-white/500 dark:text-white/500 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" 
                      />
                      <button 
                        id="togglePassword"
                        type="button" 
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-blue-500">
                        <i class="fa fa-eye" id="eye-icon"></i>
                      </button>
                    </div>                    
                    
                    <div class="text-center">
                      <button type="submit"
                        class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign
                        in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

</body>
<script>
document.getElementById('togglePassword').addEventListener('click', function () {
  const passwordInput = document.getElementById('password');
  const eyeIcon = document.getElementById('eye-icon');

  // Typ des Passwortfelds wechseln
  const isPassword = passwordInput.type === 'password';
  passwordInput.type = isPassword ? 'text' : 'password';

  // Icon ändern (Font Awesome Klassen)
  eyeIcon.classList.toggle('fa-eye');
  eyeIcon.classList.toggle('fa-eye-slash');
});


</script>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>