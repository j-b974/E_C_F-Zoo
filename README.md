# Zoo de José #

## Description ##
Ce projet est une application web développée en PHP dans le cadre d'une évaluation en cours de formation pour l'établissement Studi. Elle présente les habitats, les services, et les animaux que le zoo dispose. De plus, elle propose une gestion de compte rendu pour le suivi de santé de chaque animal, offrant ainsi un outil complet pour la gestion et le suivi des animaux du zoo. Cette application permet aux utilisateurs de visualiser les différents habitats, services, et animaux du zoo, tout en permettant aux gestionnaires de maintenir un suivi précis de la santé de chaque animal, ce qui est crucial pour assurer leur bien-être et leur santé. En combinant la présentation des habitats, des services, et des animaux avec un outil de suivi de santé, cette application offre une solution pour la gestion efficace d'un zoo, mettant en avant les compétences acquises  en développement web .

## Pré-requite ##
- [ ] [Git](https://git-scm.com/downloads)
- [ ] [Docker](https://www.docker.com/products/docker-desktop/)
- [ ] [Docker-compose](https://docs.docker.com/compose/install/)

## Installation ##
1. Clonez ce dépôt sur votre machine locale.
   ```bash
   git clone https://gitlab.com/jb974/ZooJose.git ./

2. lancer les service docker (Attention Docker Desktop doit être lancé sur votre systeme d'exploitation).
   ```bash
   docker-compose up  -d
3. _Attendre que Docker finisse tout le travail._ 

## Utilisation soft ###
le site sera disponible sur le  [localhot:8888](http://localhost:8888)
* **attention** Assurez-vous que le port 8888 est disponible.
* connexion au compte administrateur : 
  * username : admin@admin.fr
  * password : admin
* connection au compte utilisateur :
  * username : ( aléatoire, consultez la gestion des comptes de l'administrateur)
  * password : 1234

## Commande d'urgence ## 
* initialisation des tables SQL
   ```bash
   php migrations/initialisationTable.php
* Remplissage des tables avec des données factices
   ```bash
   php migrations/FillDBZoo.php
* Suppression de toutes les tables SQL
   ```bash
   php migrations/dropTable.php
* lancez les testes 
    ```bash
    php vendor/bin/phpunit tests
