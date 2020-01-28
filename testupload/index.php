<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <?php

    // $str = "Je m'appelle toto et mon numéro est le 06 35 28 94 78 et le 06.25.25.25.25.";
    // $str2 = "Je m'appelle tutu et mon numéro est le 0635464689.";

    // echo $str;
    // echo "<br>";
    // echo $str2;

    // $result = preg_match_all('/((\.| )?\d{2}){5}/', $str, $matches);

    // print_r($matches);




    if (isset($_FILES['file']) && isset($_POST['filesend'])) {
        $typeaccept = ['pdf' => 'application/pdf', 'jpg' => 'image/jpeg'];
        $uploaddir = './upload/';
        $uploadfile = $uploaddir . $_FILES['file']['name'];
        $sizemax = 30000;
        $typefile = mime_content_type($_FILES['file']['tmp_name']);
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if ($_FILES['file']['error'] == 0) {
            if (array_key_exists($extension, $typeaccept)) {
                if ($sizemax > filesize($_FILES['file']['tmp_name'])) {
                    if (in_array($typefile, $typeaccept)) {
                        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                        echo 'REUSSI !!!';
                    } else {
                        echo 'le type mime n\'est pas bon !';
                    }
                } else {
                    echo 'Hey ton fichier est lourd mon gars !';
                }
            } else {
                echo 'Mauvaise extension !!!';
            }
        } else {
            echo "une erreur s'est produite";
        }
    };
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000">
        <input type="submit" value="submit" name="filesend">
    </form>

    <?php

    ?>


</body>

</html>