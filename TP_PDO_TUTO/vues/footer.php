
<!-- Modal -->
<div class="modal fade" id="supprModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <a href="" id="btnSuppr" class="btn btn-danger">Supprimer</a>
        </div>
        </div>
</div>
</div>

<footer class="container">
<p>&copy; Company 2017-2020</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript">
    // si on click sur le lien (a) data-suppr déclencher la fonction qu'on vient de créer
    $("a[data-suppr]").click(function(){
        // prendre l'attribut du lien clické
        var lien = $(this).attr("data-suppr");
        var info = $(this).attr("data-info");
        // mettre l'attribut du lien dans l'id btnSuppr
        $("#btnSuppr").attr("href",lien);
        $(".modal-body").text(info);
    })
</script>
</body>
</html>
<?php ob_end_flush(); ?>