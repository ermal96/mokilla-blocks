<?php
/**
 * The core blocks library
 *
 * @link       www.crispybacon.it
 * @since      1.0.0
 *
 * @package    Mokilla_Blocks
 * @subpackage Mokilla_Blocks/library
 */

namespace mokilla\mokilla_blocks\Model;

/**
 * per estrarre la lista dei blocchi:
 * nell'editor, senza altri blocchi installati, in console:
 * var array = [];
 * wp.blocks.getBlockTypes().forEach( function( blockType ) {
 * 		array.push({name: blockType.name, title: blockType.title})
 * 	} );
 * console.log(array);
 *
 * Copiare il risultato su regex101.com ed utilizzare la seguente espressione:
 * {name: "(.+?)", title: "(.*)"(})(\s\d+\s:)?
*/

/**
 * Class Core_Blocks
 */
class Core_Blocks {

	const ALL = array(
		'core/paragraph'          => 'Paragrafo',
		'core/image'              => 'Immagine',
		'core/heading'            => 'Titolo',
		'core/gallery'            => 'Galleria',
		'core/list'               => 'Lista',
		'core/quote'              => 'Citazione',
		'core/shortcode'          => 'Shortcode',
		'core/archives'           => 'Archivio',
		'core/audio'              => 'Audio',
		'core/button'             => 'Pulsante',
		'core/categories'         => 'Categorie',
		'core/code'               => 'Codice',
		'core/columns'            => 'Colonne (beta)',
		'core/column'             => 'Colonna',
		'core/cover-image'        => 'Immagine di copertina',
		'core/embed'              => 'Incorpora',
		'core-embed/twitter'      => 'Twitter',
		'core-embed/youtube'      => 'YouTube',
		'core-embed/facebook'     => 'Facebook',
		'core-embed/instagram'    => 'Instagram',
		'core-embed/wordpress'    => 'WordPress',
		'core-embed/soundcloud'   => 'SoundCloud',
		'core-embed/spotify'      => 'Spotify',
		'core-embed/flickr'       => 'Flickr',
		'core-embed/vimeo'        => 'Vimeo',
		'core-embed/animoto'      => 'Animoto',
		'core-embed/cloudup'      => 'Cloudup',
		'core-embed/collegehumor' => 'CollegeHumor',
		'core-embed/dailymotion'  => 'Dailymotion',
		'core-embed/funnyordie'   => 'Funny or Die',
		'core-embed/hulu'         => 'Hulu',
		'core-embed/imgur'        => 'Imgur',
		'core-embed/issuu'        => 'Issuu',
		'core-embed/kickstarter'  => 'Kickstarter',
		'core-embed/meetup-com'   => 'Meetup.com',
		'core-embed/mixcloud'     => 'Mixcloud',
		'core-embed/photobucket'  => 'Photobucket',
		'core-embed/polldaddy'    => 'Polldaddy',
		'core-embed/reddit'       => 'Reddit',
		'core-embed/reverbnation' => 'ReverbNation',
		'core-embed/screencast'   => 'Screencast',
		'core-embed/scribd'       => 'Scribd',
		'core-embed/slideshare'   => 'Slideshare',
		'core-embed/smugmug'      => 'SmugMug',
		'core-embed/speaker'      => 'Speaker',
		'core-embed/ted'          => 'TED',
		'core-embed/tumblr'       => 'Tumblr',
		'core-embed/videopress'   => 'VideoPress',
		'core-embed/wordpress-tv' => 'WordPress.tv',
		'core/file'               => 'File',
		'core/freeform'           => 'Classico',
		'core/html'               => 'HTML personalizzato',
		'core/latest-comments'    => 'Ultimi commenti',
		'core/latest-posts'       => 'Articoli recenti',
		'core/media-text'         => 'Media & Text',
		'core/more'               => 'Leggi tutto',
		'core/nextpage'           => 'Interruzione di pagina',
		'core/preformatted'       => 'Preformattato',
		'core/pullquote'          => 'Citazione evidenziata',
		'core/separator'          => 'Separatore',
		'core/block'              => 'Blocco riutilizzabile',
		'core/spacer'             => 'Spazio vuoto',
		'core/subhead'            => 'Sottotitolo (deprecato)',
		'core/table'              => 'Tabella',
		'core/text-columns'       => 'Testo in colonne (deprecato)',
		'core/verse'              => 'Verso',
		'core/video'              => 'Video',
	);

	const MANDATORY = array(
		'core/paragraph',
		'core/freeform',
		'core/block',
	);
}
