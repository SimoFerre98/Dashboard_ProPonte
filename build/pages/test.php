<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verbessertes Modal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<!-- Beispielbutton mit einer ID -->
<button 
  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded openModalBtn"
  data-id="123">Ausleihen</button>

<!-- Modal -->
<div id="modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-40 flex items-center justify-center z-500">
  <div class="relative bg-white w-full max-w-lg rounded-lg shadow-lg p-6 space-y-6 transform transition-all duration-300 scale-95">
    <!-- Modal Header -->
    <div class="flex justify-between items-center border-b pb-4">
      <h2 class="text-2xl font-bold text-gray-800">Ausleihen</h2>
      <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition duration-200 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Modal Body -->
    <form id="loanForm" action="process_loan.php" method="POST">
      <input type="hidden" id="bookId" name="book_id" value="">
      
      <p>Möchten Sie dieses Buch ausleihen?</p>

      <!-- Modal Footer -->
      <div class="flex justify-end space-x-4 pt-4 border-t">
        <button type="button" id="cancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
          Abbrechen
        </button>
        <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
          Bestätigen
        </button>
      </div>
    </form>
  </div>
</div>

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


</body>

</html>
