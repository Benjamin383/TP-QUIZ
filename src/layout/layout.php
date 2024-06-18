<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
</head>
<body class="">
    <div class="">
        <header class="">
            <h1 class="">Quiz</h1>
            <nav>
                <a href="index.php" class="">Accueil</a>
                <a href="/quiz/quiz_form_add.php" class="">Créer un quiz</a>
                <a href="/question/question_form_add.php" class="">Ajouter des questions</a>
            </nav>
        </header>
        <main>
            <?php echo $content ?>
        </main>
    </div>
</body>
</html>

