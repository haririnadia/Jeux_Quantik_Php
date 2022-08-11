<!doctype html>
<html lang="fr" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Régles</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album-rtl/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-mUkCBeyHPdg0tqB6JDd+65Gpw5h/l8DKcCTV2D2UpaMMFd7Jo8A+mDAosaWgFBPl" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="quantik.css" />
    <!-- Favicons -->

<meta name="theme-color" content="#7952b3">

    
  </head>
  <body>
    
<header>
  
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Régles</strong>
      </a>
     
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="font-weight-light">JEU DE QUANTIk</h1>
        <p class="lead text-muted">Quantik est un jeu de stratégie abstrait simplissime… et diablement malin !</p>
        
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
          <div class="card shadow-sm">
          <img src="../ClassAffichage/plateau.png" height="225">
              <p class="aligner2" > <strong>CONTENU</strong></p>
          <p class="aligner">
           un plateau divisé en 4 régions (carrés de 4 emplacements), 8 pièces
            foncées (2 sphères, 2 cylindres, 2 cubes et 2 cônes) et 8 pièces claires
            de mêmes formes.
          </p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        <div class="col">
          <div class="card shadow-sm">
          <img src="../ClassAffichage/horizentale.jpg" height="225">
              <p class="aligner2" ><strong >PRINCIPE ET BUT DU JEU</strong></p>
          <p class="aligner" >
            Les joueurs disposent chacun de 8 pièces d’une même couleur. À chaque
            tour ils vont en placer une sur un espace vide du plateau en respectant
            les règles de placement. Le premier joueur qui pose la quatrième forme
            différente dans une ligne, colonne ou région remporte la partie.
          </p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        <div class="col">
          <div class="card shadow-sm">
          <img src="../ClassAffichage/images.jpeg" height="225">
              <p class="aligner2" ><strong >MISE EN PLACE</strong></p>
          <p class="aligner">
          Le plateau est placé entre les deux joueurs et chacun prend possession
d’un set de 8 pièces (claires ou foncées) 
          </p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
          <div class="col">
          <div class="card shadow-sm">
          <img src="../ClassAffichage/interdit.png" height="225">
              <p class="aligner2" > <strong >DÉROULEMENT D’UNE PARTIE</strong></p>
          <p class="aligner">
          Le premier joueur est déterminé au hasard.
À son tour, chacun doit placer l’une de ses pièces sur un emplacement
vide du plateau.
Il est interdit de poser une forme dans une ligne, une colonne ou une
région où cette même forme a déjà été posée par l’adversaire (Fig.3 )
Par contre il est possible de poser une forme dans une ligne, colonne
ou région où cette même forme a déjà été posée par soi-même (Fig.2).
Exemple : joueur1 affronte joueur2. joueur1 pose une sphère sur le
plateau de jeu. joueur2 n’a donc plus le droit, jusqu’à la fin de la partie,
de poser une de ses sphères dans la même ligne, colonne et région
que la sphère de joueur1. joueur1 par contre, pourra s’il le souhaite poser
sa deuxième sphère dans la même ligne, colonne ou région que celle
où se trouve sa première sphère.
Cette unique règle s’applique pour chaque pièce que chaque joueur
posera tout au long de la partie.
Cas particulier : si un coup est autorisé par ses propres pièces mais en
même temps interdit par la/les pièces de son adversaire, alors ce coup
est interdit.
          </p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
          </div>
        <div class="col">
          <div class="card shadow-sm">
          <img src="../ClassAffichage/gagner.png" height="225">
              <p class="aligner2" ><strong >FIN DE PARTIE</strong></p>
          <p class="aligner">
            Le premier joueur qui pose la quatrième forme différente d’une ligne,
            colonne ou région, remporte immédiatement la partie. Peu importe à qui
            appartiennent les autres pièces de cette ligne, colonne ou région (Fig.4).
            Si un joueur ne peut poser aucune de ses pièces alors que c’est à son
            tour de jouer, il perd immédiatement la partie
            est interdit.
          </p>
            </div>
          </div>
      </div>
    </div>
  </div>

</main>
<footer>
<div >
<div id="divacceuil"><a href='PageAcceuil.php'> <button class="quantik-btn-acceuil">Retourner à l'acceuil</button></a></div>
  </div>
</footer>
</body>
</html>

 


