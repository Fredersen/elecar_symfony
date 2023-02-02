# Installer le projet 
- composer install
- yarn install
- Modifier le  fichier env avec les identifiants mysql 
- symfony console d:d:d
- symfony console d:m:m

# Lancer le serveur
- yarn encore dev --watch
- symfony server:start

# Test de fonctionnement
- aller sur la route /healthcheck pour vérifier le fonctionnement du projet

# Git Workflow
Lorsque vous travaillez sur une branche il faut :

#####  Se mettre sur develop et récupérer les changements :
    git checkout develop
    git pull

##### Créer sa branche de travail :
    git checkout -b nom_de_la_branche_de_travail

##### On commit les changements  :
    git add fichier_modifié
    git commit -m "message de commit"

##### On récupère les changements sur develop et gère les conflits en local
    git checkout develop
    git pull
    git checkout nom_de_la_branche_de_travail
    git pull origin develop
    git push -u origin nom_de_la_branche_de_travail





