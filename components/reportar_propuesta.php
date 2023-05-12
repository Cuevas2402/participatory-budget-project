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
    <button id="desplegar">Reportar Propuesta</button>
</div>

<div class="modal fade" id="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reportar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <label for="" class="pb-2">Motivo por el cual reportar la propuesta</label>
                <form action="">
                    <textarea id="comentario-reporte" rows="10" style="width: 100%;"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="enviar btn btn-primary" type="submit">Enviar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#desplegar').click(function () { 
            $('#modal').modal('show');
        });
    });
    
    $(document).ready(function(){
        $('.enviar').click(function(){
            let id = $('.uid').data("value");
            let reporte = $('#comentario-reporte').data("value");
            $.ajax({
                url: "fetch/report_user.php",
                type: "POST",
                data:{
                    id=id,
                    reporte = reporte
                },
                success:function(){
                    window.location.replace("index.php");
                }
            });
        });
    });
    
</script>