<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'votre_nom_de_bdd');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'votre_utilisateur_de_bdd');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'votre_mdp_de_bdd');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

// Puisque nous modifions l'architecture par défaut de WordPress,
// nous avons besoin de lui indiquer où retrouver ces dossiers
// https://wordpress.org/support/article/editing-wp-config-php/#moving-wp-content-folder

// J'indique à WordPress que le dossier qui fait office de "wp-content"
// se trouve dans le dossier "/content"
define('WP_CONTENT_DIR', dirname( ABSPATH ) . '/content');

// J'indique à WordPress l'url du dossier faisant office de "wp-content"
define('WP_CONTENT_URL', 'http://__MON_URL_A_REMPLACER__/content');

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
// define('WP_DEBUG', true);
// define('WP_DEBUG_DISPLAY', true);
// define('WP_DEBUG_LOG', true);

// define('ENVIRONEMENT', 'dev'); // Je suis en environement de DEVELOPEMENT
// define('ENVIRONEMENT', 'testing'); // Je suis en environement de TEST
define('ENVIRONEMENT', 'prod'); // Je suis en environement de PRODUCTION

if (ENVIRONEMENT == 'dev') {

  define('WP_DEBUG', true);
  define('WP_DEBUG_DISPLAY', true);
  define('WP_DEBUG_LOG', true);
  define('SCRIPT_DEBUG', true);

  // Je ne désactive PAS l'installation & la mise à jour des plugins/thèmes
  define('DISALLOW_FILE_MODS', false);

  // Je bloque les révisions en local (pas besoin)
  // Par défaut c'est illimité.
  // https://wordpress.org/support/article/editing-wp-config-php/#disable-post-revisions
  define('WP_POST_REVISIONS', false);

  // Je désactive l'utilisation de la corbeille
  // https://wordpress.org/support/article/editing-wp-config-php/#empty-trash
  define('EMPTY_TRASH_DAYS', 0);

} else if (ENVIRONEMENT == 'testing') {

  define('WP_DEBUG', true);
  define('WP_DEBUG_DISPLAY', false);
  define('WP_DEBUG_LOG', true);
  define('SCRIPT_DEBUG', true);

  // Je ne désactive PAS l'installation & la mise à jour des plugins/thèmes
  define( 'DISALLOW_FILE_MODS', false );

  // Je bloque le nombre de révision par contenu à 15
  // Par défaut c'est illimité.
  // https://wordpress.org/support/article/editing-wp-config-php/#specify-the-number-of-post-revisions
  define('WP_POST_REVISIONS', 15);

  // Je laisse les élèments dans la corbeille pendant 60 jours
  // Au dela, ils seront automatiquement supprimés
  // https://wordpress.org/support/article/editing-wp-config-php/#empty-trash
  define('EMPTY_TRASH_DAYS', 60);

} else {

  define('WP_DEBUG', false);
  define('WP_DEBUG_DISPLAY', false);
  define('WP_DEBUG_LOG', false);
  define('SCRIPT_DEBUG', false);

  // Désactive l'installation & la mise à jour des plugins/thèmes
  define( 'DISALLOW_FILE_MODS', true );

  // Je bloque le nombre de révision par contenu à 15
  // Par défaut c'est illimité.
  // https://wordpress.org/support/article/editing-wp-config-php/#specify-the-number-of-post-revisions
  define('WP_POST_REVISIONS', 15);

  // Je laisse les élèments dans la corbeille pendant 60 jours
  // Au dela, ils seront automatiquement supprimés
  // https://wordpress.org/support/article/editing-wp-config-php/#empty-trash
  define('EMPTY_TRASH_DAYS', 60);
}

// J'indique à WordPress qu'il va pouvoir modifier lui même ses propres fichiers.
// Je peux le faire car j'ai bien configuré les droits de mon serveur Apache.
// https://wordpress.org/support/article/editing-wp-config-php/#wordpress-upgrade-constants
define('FS_METHOD', 'direct');

// Bloquer l'éditeur embarqué
// https://wordpress.org/support/article/editing-wp-config-php/#disable-the-plugin-and-theme-editor
define( 'DISALLOW_FILE_EDIT', true );

// Désactivation des mises à jour automatique de WordPress
// https://wordpress.org/support/article/editing-wp-config-php/#disable-wordpress-auto-updates
define('AUTOMATIC_UPDATER_DISABLED', true);

// Désactivation de la mise à jour du coeur de WordPress
// https://wordpress.org/support/article/editing-wp-config-php/#disable-wordpress-core-updates
define('WP_AUTO_UPDATE_CORE', false);


/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
