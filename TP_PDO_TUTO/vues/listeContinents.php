<div class="container mt-5">
    <div class="row pt-4">
    <div class="col-9"><h3>Listes des continents</h3></div>
    <div class="col-3"><a href="index.php?uc=continent&action=add" class="btn btn-primary"><i class="fas fa-plus"></i> Créer un continent</a></div>
</div>

<table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr class="d-flex">
      <th scope="col" class="col-md-1">Numéro</th>
      <th scope="col" class="col-md-5">Continent</th>
      <th scope="col" class="col-md-6">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($toutContinents as $continent){
            echo "<tr class='d-flex'>";
            echo "<td class='col-md-1'>".$continent->getNum()."</td>";
            echo "<td class='col-md-5'>".$continent->getLibelle()."</td>";
            echo "<td class='col-md-6'>
                <a href='index.php?uc=continent&action=update&num=".$continent->getNum()."' class='btn btn-info'><i class='fas fa-pen-alt'></i> Modifier un continent</a>
                <a href='#supprModal' class='btn btn-danger' data-info='Confirmez vous la suppression de ce continent ?' data-suppr='index.php?uc=continent&action=delete&num=".$continent->getNum()."' data-toggle='modal'><i class='fas fa-trash-alt'></i> Effacer une nationalité</a>
            </td>";
            echo "</tr>";
        }
    ?>
  </tbody>
</table>