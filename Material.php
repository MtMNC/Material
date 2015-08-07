<?php
/**
 * Material skin
 *
 * @file
 * @ingroup Skins
 * @author Codyn329
 * @version 1.0
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 3.0
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This skin requires installing MediaWiki. See https://www.mediawiki.org/wiki/Manual:Installation_guide for more information.' );
}

// Skin credits for Special:Version
$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'namemsg' => 'skinname-material',
	'version' => '1.0',
	'author' => '[https://meta.brickimedia.org/wiki/User:Codyn329 Codyn329]',
	'descriptionmsg' => 'material-desc',
	'license' => 'GPL-3.0',
	'url' => 'https://www.mediawiki.org/wiki/Skin:Material'
);

$wgValidSkinNames['material'] = 'Material';
$wgAutoloadClasses['SkinMaterial'] = __DIR__ . '/Material.skin.php';
$wgMessageDirs['SkinMaterial'] = __DIR__ . '/i18n';

$wgResourceModules['skins.material'] = array(
	'styles' => array(
		'skins/Material/material/main.css' => array( 'media' => 'screen' ),
		'skins/Material/material/print.css' => array( 'media' => 'print' ),
	),
	'position' => 'top'
);

$wgResourceModules['skins.material.js'] = array(
	'scripts' => 'skins/Material/material/main.js',
	'position' => 'bottom'
);