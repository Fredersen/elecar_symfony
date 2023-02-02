# Installer le projet 
- composer install
- yarn install
- Modifier le  fichier env avec les identifiants mysql 
Toute les commandes comportant symfony peuvent être remplacés par php bin/console
- symfony console d:d:c
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

Pour déployer l'application :
   Prérequis machine :
   PHP & Composer - https://www.digitalocean.com/community/tutorials/how-to-install-php-8-1-and-set-up-a-local-development-environment-on-ubuntu-22-04
   NodeJS - https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-22-04#option-2-installing-node-js-with-apt-using-a-nodesource-ppa (bien suivre l'option 2, l'option 1 n'est plus valable pour Ubuntu)
   Yarn - https://linuxhint.com/install_yarn_ubuntu/
   (Parallèle)MySQL - https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-22-04



