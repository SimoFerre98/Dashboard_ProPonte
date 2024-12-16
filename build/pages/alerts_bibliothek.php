<?php if (isset($_GET['returned']) && $_GET['returned'] == 'success'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Erfolg!</p>
    <p>Das Buch wurde Erfolgreich zurückgegeben.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('returned') === 'success') {
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
<?php if (isset($_GET['lent']) && $_GET['lent'] == 'success'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Erfolg!</p>
    <p>Das Buch wurde Erfolgreich ausgeliehen.</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('lent') === 'success') {
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
<?php if (isset($_GET['lent']) && $_GET['lent'] == 'error'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Error!</p>
    <p>Das Buch konnte nicht ausgeliehen werden <br> versuchen Sie es erneut!</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('lent') === 'error') {
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
<?php if (isset($_GET['returned']) && $_GET['returned'] == 'error'): ?>
  <div id="success-alert" class="fixed top-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50 transform scale-95 opacity-0 transition-all duration-300">
    <p class="font-bold">Error!</p>
    <p>Das Buch konnte nicht zurückgegeben werden <br> versuchen Sie es erneut!</p>
  </div>

  <script>
    // Funktion, die das Pop-up einblendet, wenn eine bestimmte Bedingung erfüllt ist (z.B. URL-Parameter message=success)
    window.addEventListener('DOMContentLoaded', (event) => {
      const successAlert = document.getElementById('success-alert');

      // Check if the URL contains the message=success parameter
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('returned') === 'error') {
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