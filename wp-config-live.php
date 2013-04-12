<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'midiarj_blogPulso');


/** Usuário do banco de dados MySQL */
define('DB_USER', 'midiarj');


/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '44398@branco');


/** nome do host do MySQL */
define('DB_HOST', 'localhost');


/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p[rb[/5vX!`xvFG[1zObQ7 RXSAt`P8wGDhRtA7BZe+tl9+u(on-sMl*vAJe|I&W');
define('SECURE_AUTH_KEY',  '48qodH_&;u<Gov#7u;{d}phA4LIF-,1j=U9J(@r_e7GDkw[pVZZ6VE( CE?I :x1');
define('LOGGED_IN_KEY',    'C41OmJx%c9OXIF3?SV[FH&5w4hcI{H8ploar>PjT+(ByIm?+e7r-BtviG_UQGD{B');
define('NONCE_KEY',        ' HH3k{bG+ ?^;,CwAWaulSJHJ1kif(~2d:W;;|:<$HNM !.1Udb]#uY?}O>@HM[F');
define('AUTH_SALT',        'wmH`}Q)d.tyq9}PS&,,hD+-*;:M=2?e^es|mDnCw?iz_&!ybB;S@[:H:ESZ^l~DO');
define('SECURE_AUTH_SALT', 'rfJcowIUZsgH.*8.UN/<2|7l!](9su%yC!gPUdzvWX8pkWeld{Ya]Dc6XDlKY9V.');
define('LOGGED_IN_SALT',   'no3F{<Quu~p7EBw<,7w#w<=9Lh.hxUg:yyW-3XC~ekY I) PS4$n^%i@fmLJKh&F');
define('NONCE_SALT',       '>vbz@XjPbDhpxBcmSp@1G`s-T8t$$+V>f6w*D+2I_%vjf^A?-xnDn&bc{=P?G}ZN');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
