# Utilisation du pattern

## Liste des étapes:

- Récuperation du repo et mise en place du projet
  - Cloner le repo du pattern `git clone git@github.com:O-clock-XY/WP-Pattern-Composer.git`
  - Première solution
    - Renommer le dossier avec le nom du projet souhaité `mv <ancien_nom> <nouveau_nom>`
    - Se rendre dans le dossier nouvellement créé `cd <nouveau_nom>`
    - Supprimer le dossier `.git` afin de ne pas écraser le repo du pattern d'origine et de ne pas garder l'historique du pattern dans notre projet. `sudo rm -R .git`
    - Initialiser git dans le dossier du projet `git init`
  - Deuxième solution
    - Créer un nouveau dossier pour notre projet
    - Prendre tout ce qui se trouve dans le dossier cloné (excepté le `.git`) et le dupliquer dans le nouveau dossier du projet.
    - Initialiser git dans le dossier du projet git init

- Installation de nos dépendances avec composer `composer install`
- Création de la BDD
- Création du fichier `wp-config.php` à partir du fichier `wp-config-sample.php`
  - Renseigner les informations de connexion à la BDD
  - Renseigner les clés de salage [URL pratique](https://api.wordpress.org/secret-key/1.1/salt/)
  - Renseigner la constante `WP_CONTENT_URL` avec l'url de notre projet (en local)
  - Choisir, en décommentant, la constante d'environement qui nous convient.
- Changer les droits des fichier/dossiers de mon projet
```bash
sudo chown -R <user>:www-data .
sudo find . -type f -exec chmod 664 {} +
sudo find . -type d -exec chmod 775 {} +
sudo chmod 644 .htaccess
```
- Se rendre sur l'url locale de notre projet pour terminer l'installation de WordPress
- Penser à changer l'url de la home de notre projet
  - Admin BO > Réglages > Général > Adresse web du site (URL)
