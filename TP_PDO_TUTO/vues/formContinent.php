<div class="container mt-5">
    <h2 class="pt-4 text-center"><?= $mode ?> un continent</h2>
    <form action="index.php?uc=continent&action=validForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle" value="<?php if($mode == "Modifier"){echo $continent->getLibelle();}?>">
        </div>        
        <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier"){echo $continent->getNum();}?>">
        <div class="row">
            <div class="col"><a href="index.php?uc=continent&action=list" class="btn btn-info btn-block"><i class="fas fa-undo"></i> Revenir à la liste</a></div>
            <div class="col"><button type="submit" class="btn btn-success btn-block"><i class="fas fa-pen-alt"></i> <?= $mode ?></button></div>
        </div>
    </form>
</div>