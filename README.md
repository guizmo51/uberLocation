# UberLocation
## Description
C'est une ébauche de projet un peu utopique.
L'API d'Uber ne fournit pas les coordonnées GPS des véhicules. Elle affiche seulement un temps d'attente. A mon avis les raisons sont légales mais aussi propres à Uber puisque que c'est le coeur de leur métier.

Ce projet se base donc sur le temps d'attente. Bien sûr ces estimations sont très imprécises. En effet pour un temps d'attente à 5 minutes avec un environnement "autouroute" le véhicule peut être à 5 kilomètres, mais à seulement 1 km ou moins en ville. Il faut aussi tenir compte de l'état de la circulation.

Techniquement le principe utilise le système de la triangulation.

## Installation 
Il est nécessaire d'avoir un compte Développeur "Uber" il s'obtient ici : https://developer.uber.com/ 
Ensuite il faut lancer l'index.php sur un serveur (local ou non).
Enfin il faut configurer maps.html et y définir l'URL d'appel vers le script "index.php".