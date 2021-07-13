<?php
/**
 * Grundeinstellungen für WordPress
 *
 * Zu diesen Einstellungen gehören:
 *
 * * MySQL-Zugangsdaten,
 * * Tabellenpräfix,
 * * Sicherheitsschlüssel
 * * und ABSPATH.
 *
 * Mehr Informationen zur wp-config.php gibt es auf der
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Zugangsdaten für die MySQL-Datenbank
 * bekommst du von deinem Webhoster.
 *
 * Diese Datei wird zur Erstellung der wp-config.php verwendet.
 * Du musst aber dafür nicht das Installationsskript verwenden.
 * Stattdessen kannst du auch diese Datei als wp-config.php mit
 * deinen Zugangsdaten für die Datenbank abspeichern.
 *
 * @package WordPress
 */

// ** MySQL-Einstellungen ** //
/**   Diese Zugangsdaten bekommst du von deinem Webhoster. **/

/**
 * Ersetze datenbankname_hier_einfuegen
 * mit dem Namen der Datenbank, die du verwenden möchtest.
 */
define( 'DB_NAME', "spanisch22" );


/**
 * Ersetze benutzername_hier_einfuegen
 * mit deinem MySQL-Datenbank-Benutzernamen.
 */
define( 'DB_USER', "root" );


/**
 * Ersetze passwort_hier_einfuegen mit deinem MySQL-Passwort.
 */
define( 'DB_PASSWORD', "root" );


/**
 * Ersetze localhost mit der MySQL-Serveradresse.
 */
define( 'DB_HOST', "localhost:8888" );


/**
 * Der Datenbankzeichensatz, der beim Erstellen der
 * Datenbanktabellen verwendet werden soll
 */
define( 'DB_CHARSET', 'utf8mb4' );


/**
 * Der Collate-Type sollte nicht geändert werden.
 */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden untenstehenden Platzhaltertext in eine beliebige,
 * möglichst einmalig genutzte Zeichenkette.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle Schlüssel generieren lassen.
 * Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten
 * Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|eW6%pK0MxeO.ec.@2y0L3{Rs3=o7g;R`-gVhfIj#a_IGXQ/u+*L2&/2yy$}W{!8' );

define( 'SECURE_AUTH_KEY',  'P8#JMyN,DkoRJw8*>=<P<3>3zYaSk--8x2XQ3IMuc+C6J#ey^Zd9ol]**@YIE;hJ' );

define( 'LOGGED_IN_KEY',    ',=mo]kI{6a.=)e5S0-kivrb~m^.{AbCa)gOFY]ma[=<2!K:#6<gr30fqX%Z3)abn' );

define( 'NONCE_KEY',        'a,T67s[Yr~ne}@4YH%laO#ols*uvjtgP<xLu;3Hy#qq`P~Yp-sLBT]D,mm55v3vk' );

define( 'AUTH_SALT',        'hon&4O{FJT9u!]1OhO|3>m(-9yUAh>RR&(=x*1vfJx:EI&YoY,k[;]3UnRtvOO|^' );

define( 'SECURE_AUTH_SALT', 'tOW(_[*NdJz5t:| jL;Au|jI]^ruiR?A877g%/J=Oe*#(QmV9~22ID[Y4w*oZ?K.' );

define( 'LOGGED_IN_SALT',   'au3X.}r 4&S6~#O#WY4l>Y$$J^sT}6u-<k(~#&u1a| (;dH~ fnn_UdNT#]Q`Mxp' );

define( 'NONCE_SALT',       'Q2t&@j!-S|;~jbZId(GC*Y*f_Sp#~(NSkPJW4b`6,n)M02B beQzvR=Q@=vUc7y<' );


/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben.
 * Bitte verwende nur Zahlen, Buchstaben und Unterstriche!
 */
$table_prefix = 'ch_';


/**
 * Für Entwickler: Der WordPress-Debug-Modus.
 *
 * Setze den Wert auf „true“, um bei der Entwicklung Warnungen und Fehler-Meldungen angezeigt zu bekommen.
 * Plugin- und Theme-Entwicklern wird nachdrücklich empfohlen, WP_DEBUG
 * in ihrer Entwicklungsumgebung zu verwenden.
 *
 * Besuche den Codex, um mehr Informationen über andere Konstanten zu finden,
 * die zum Debuggen genutzt werden können.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Das war’s, Schluss mit dem Bearbeiten! Viel Spaß. */
/* That's all, stop editing! Happy publishing. */

/** Der absolute Pfad zum WordPress-Verzeichnis. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Definiert WordPress-Variablen und fügt Dateien ein.  */
require_once( ABSPATH . 'wp-settings.php' );
