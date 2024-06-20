<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="../js/navbar.js"></script>
    <title><?php echo $title ?></title>
</head>
<body class="">
    <div class="">
        <header class="">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index">Quiz</a>
    <button id="btn_navbar" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/index">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/quiz/quiz_form_add.php">Créer un quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/question/question_form_add.php">Ajouter des questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/question/question_list.php">Liste des questions</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        </header>
        <main>
            <?php echo $content ?>
        </main>
    </div>

</body>
</html>

