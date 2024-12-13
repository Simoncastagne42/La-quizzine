<?php

$reponses = [
    [
        'id' => 1,
        'intitule' => "premiere reponse",
        'id_question' => 1,
        "is_correct" => true
    ],
    [
        'id' => 2,
        'intitule' => "deuxieme reponse",
        'id_question' => 1,
        "is_correct" => false
    ],
    [
        'id' => 3,
        'intitule' => "troisieme reponse",
        'id_question' => 1,
        "is_correct" => false
    ],
    [
        'id' => 4,
        'intitule' => "quatrieme reponse",
        'id_question' => 1,
        "is_correct" => false
    ]
];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="./script.js"></script>
</head>

<body>


<?php foreach($reponses as $reponse){ ?>
    <div <?php if ($reponse['is_correct'] == true) echo "id='bon'" ?> ></div>
    

<?php } ?>
    

</body>

</html>