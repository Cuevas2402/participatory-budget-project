<style>
    #desplegar {
        border: 0;
        background-color: transparent;
        color: #848383;
        padding: 10px 0 0;
        margin: 0;
    }
    #desplegar:hover {
        border: 0;
        background-color: transparent;
        color: rgb(218, 54, 54);
    }
</style>

<div>
    <button id="desplegar">Reportar</button>
</div>

<div class="modal fade" id="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reportar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <label for="" class="pb-2">Motivo por el cual reportar la cuenta</label>
                <form action="">
                    <textarea id="comentario-reporte" rows="10" style="width: 100%;"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="send btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL INICIA -->
<div class="modal fade" id="completado" tabindex="-1" role="dialog" aria-labelledby="iniciaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exitolLabel">Reporte Completado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Su reporte se ha enviado exitosamente, gracias por mantener segura esta comunidad
            </div>
            <div class="modal-footer">
                <button type="button" class="close btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL INICIA-->

<script>
    $(document).ready(function () {
        $('#desplegar').click(function () { 
            $('#modal').modal('show');
        });
    });
    
    $(document).ready(function(){
        $('.send').click(function(){
            let id = $('.uid').data("value");
            let reporte = $('#comentario-reporte').val();
            $.ajax({
                url: "fetch/report_user.php",
                type: "POST",
                data:{
                    id:id,
                    reporte : reporte
                },
                success:function(response){
                    if(response.condicion){
                        $('#modal').modal('hide');
                        $('#completado').modal('show');
                        location.reload();
                    }
                }
            });
        });
    });
    
</script>