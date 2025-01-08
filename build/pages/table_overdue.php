<div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
              <table id="example" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>ISBN</th>
                    <th>Titel</th>
                    <th>Beschreibung</th>
                    <th>Verlag</th>
                    <th>Kategorie</th>
                    <th>Author</th>
                    <th>Ausleiher</th>
                    <?php
                    if (isset($_SESSION['name'])) {
                      echo '<th>Option</th>';
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = $result_tabel->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['isbn'] . '</td>';
                    echo '<td>' . $row['titel'] . '</td>';
                    echo '<td>' . $row['beschreibung'] . '</td>';
                    echo '<td>' . $row['verlag'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['author'] . '</td>';
                    echo '<td>';
                    echo $row['Ausleiher'];
                    echo '</td>';
                    if (isset($_SESSION['name'])) {
                      if ($row['returned'] == "" || $row['returned'] == 1) {
                        echo '<td><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded openModalBtn" data-id="' . $row['id'] . '">Ausleihen</button></td>';
                      } elseif ($row['returned'] == "" || $row['returned'] == 0) {
                        echo '<td><a href="rueckgabe.php?buch_id=' . $row['buch_id'] . '"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rückgabe</button></a></td>';
                      }
                    }

                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>

            </div>
          </div>