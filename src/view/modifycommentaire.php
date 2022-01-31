<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action='<?="/modifyarticle/$sId"?>' method="POST">

    <div>
        <label for="text_commentaire">Text :</label>
       <input type="text" id="text_commentaire" name="text_commentaire" value="<?=$oArticle->getText_commentaire()?>" />
    </div>

    <div>
        <label for="note">note :</label>
       <input type="number" id="note" name="note" value="<?=$oArticle->getNote()?>" />
    </div>
    
    <div class="button">
       <button type="submit">Envoyer</button>
    </div>       

</fom>


</body>

</html>