<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div style="background-color: aliceblue;">

        <h1 style="text-align: center; font-family:'Times New Roman', Times, serif; font: size 190px !important; ">Accès refusé </h1>
        <p style="text-align: center;font-family:'Times New Roman', Times, serif; font: size 30px;">Votre IP: {{ request()->ip() }} n'est pas autorisée.</p>

    </div>
</body>

</html>