<div class="nav2">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <form id="form-busqueda" class=" form-busqueda d-flex my-3">
                <input name="termino-busqueda" id="termino-busqueda" class="buscar-input form-control" type="search"  placeholder="Buscar convocatorias, participantes, etc...">
                <button class="btn buscar" type="submit">
                    <i class='fa-solid fa-magnifying-glass'></i>
                </button>
            </form>
        </li>
    </ul>
</div>

<script>
    $(document).ready(function() {
      $('#form-busqueda').on('submit', function() {
        /*$.post('index.php', { dato: 'valor' }, function(response) {
          window.location.href = 'otrapagina.php';
        });*/
        var valor1 = $('#termino-busqueda').val(); // variable con el valor a pasar
        $.ajax({
          url: 'index.php',
          type: 'POST',
          data: { miDato: valor1 },
          success: function(response) {
            window.location.href = 'busqueda.php?dato1=' + valor1;
          }
        });
      });
    });

  </script>

