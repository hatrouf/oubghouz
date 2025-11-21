<?php
// form.php - Formulaire pour remplir le PDF
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Remplir PDF Template</title>
<style>
body { font-family: Arial; margin: 20px; }
label { display:block; margin-top:10px; }
</style>
</head>
<body>

<h2>Remplir le dossier PDF</h2>

<form method="post" action="generate.php" enctype="multipart/form-data">

<label>Adresse :</label>
<input type="text" name="adresse" style="width:400px" required>

<label>Code IMM :</label>
<input type="text" name="code_imm" required>

<label>Coordonnées GPS :</label>
<input type="text" name="gps" placeholder="latitude,longitude" required>

<label>Nombre de logements :</label>
<input type="number" name="nb_logements" required>

<label>Nombre d'étages :</label>
<input type="text" name="nb_etages" required>

<br><br>
<h3>Photos</h3>

<label>Photo Façade :</label>
<input type="file" name="photo_facade" accept="image/*">

<label>Photo PBI :</label>
<input type="file" name="photo_pbi" accept="image/*">

<label>Photo PBO :</label>
<input type="file" name="photo_pbo" accept="image/*">

<br><br>
<button type="submit">Générer le PDF</button>

</form>

</body>
</html>
