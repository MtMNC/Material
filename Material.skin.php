<?php
/**
 * Skin file for Material skin
 *
 * @file
 * @ingroup Skins
 */

// SkinTemplate class
class SkinMaterial extends SkinTemplate {
	public $skinname = 'material',
		$stylename = 'Material',
		$template = 'MaterialTemplate',
		$useHeadElement = true;

	// Add JS via ResourceLoader
	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModules( 'skins.material.js' );
	}

	// Add CSS via ResourceLoader
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
			'mediawiki.skinning.interface',
			'skins.material'
		) );
	}
 }

// BaseTemplate class
class MaterialTemplate extends BaseTemplate {
	public function execute() {
		global $wgVersion;

		$this->html( 'headelement' );
		?>
		<header id="mw-header" role="group"> <!-- header -->
			<nav id="nav-menu" role="navigation">
				<span class="menu" aria-label="menu button"><!-- some icon for a menu --></span>
				<?php foreach ( $this->getSidebar() as $boxName => $box ) { ?>
					<div id="<?php echo Sanitizer::escapeId( $box['id'] ) ?>"<?php echo Linker::tooltip( $box['id'] ) ?>>
					<?php
						if ( is_array( $box['content'] ) ) { 
						echo "<ul>";
							foreach ( $box['content'] as $key => $item ) {
								echo $this->makeListItem( $key, $item );
							}
						echo "</ul>";
						} else {
							echo $box['content'];
						}
					} ?>
			</nav>
			<a href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] ); ?>" <?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'mw-logo-link' ) ) ?>> <!-- logo link -->
				<img id="mw-logo-image" role="banner" src="<?php $this->text( 'logopath' ); ?>" alt="<?php $this->text( 'sitename' ) ?>" /> <!-- logo image -->
			</a>
			<form class="mw-search" role="search" id="searchform" action="<?php $this->text( 'wgScript' ); ?>"> <!-- search -->
				<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
				<?php
					echo $this->makeSearchInput( array( 'class' => 'mw-search-input', 'placeholder' => 'Search the Wiki' ) );
					echo $this->makeSearchButton( 'image', array( 'src' => $this->getSkin()->getSkinStylePath( 'images/magnifying-glass.svg' ), 'alt' => 'search button' ) );
				?>
			</form>
			<?php // language links
				if ( $this->data['language_urls'] ) {
					echo '<ul id="mw-language-links" role="menu">';
					foreach ( $this->data['language_urls'] as $key => $langLink ) {
						echo $this->makeListItem( $key, $langLink );
					}
					echo '</ul>';
				}
			?>
			<nav id="nav-user" role="navigation"> <!-- user navigation with personal tools -->
				<span class="username-wrapper">
					<span class="username">
						<?php //username
							if( $this->data['loggedin'] ) {
								echo htmlspecialchars($this->getSkin()->getUser()->getName(), ENT_QUOTES); 
							} else {
								echo $this->getSkin()->msg( 'material-guest' ).text();
							}
						?>
					</span>
				</span>
				<ul>
					<?php
						foreach ( $this->getPersonalTools() as $key => $item ) {
							echo $this->makeListItem( $key, $item );
						}
					?>
				</ul>
			</nav>
		</header>
		<div class="mw-body-content" role="main">
			<?php if ( $this->data['sitenotice'] ) { ?> <!-- site notice -->
				<div id="site-notice" role="alert" aria-live="polite">
					<?php $this->html( 'sitenotice' ); ?>
				</div>
			<?php } ?>
			<?php if ( $this->data['newtalk'] ) { ?> <!-- new talk -->
				<div class="new-talk" role="dialog" aria-live="polite">
					<?php $this->html( 'newtalk' ); ?>
				</div>
			<?php } ?>
			<?php if ( $this->data['title'] != '' ) { ?> <!-- title section -->
				<section id="title-section">
					<?php // page status indicators
						$oldVersion = version_compare( $wgVersion, '1.25', '<=' );
						if ( $oldVersion ) {
							if ( method_exists( $this, 'getIndicators' ) ) {
								echo $this->getIndicators();
							}
						}
					?>
					<h1 class="first-heading"><?php $this->html( 'title' ); ?></h1> <!-- article heading -->
					<div id="site-sub"><?php $this->msg( 'tagline' ); ?></div> <!-- tagline -->
					<?php if ( $this->data['subtitle'] || $this->data['undelete'] ) { ?> <!-- subtitles -->
						<div id="content-sub">
							<?php $this->html( 'subtitle' ); $this->html( 'undelete' ); ?>
						</div>
					<?php } ?>
				</section>
			<?php } ?>
			<ul>
			<?php
				foreach ( $this->data['content_navigation'] as $category => $tabs ) {
					foreach ( $tabs as $key => $tab ) {
						echo $this->makeListItem( $key, $tab );
					}
				}
			?>
			</ul>
			<?php $this->html( 'bodytext' ) ?> <!-- content -->
			<?php
				$this->html( 'catlinks' );  // categories
				if ( $this->data['dataAfterContent'] ) { // dataAfterContent
					$this->html( 'dataAfterContent' );
				}
			?>
		</div>
		<footer id="mw-footer" role="contentinfo"> <!-- footer -->
			<?php foreach ( $this->getFooterLinks() as $category => $links ) { ?>
				<nav id="nav-footer" role="navigation">
					<ul>
					<?php foreach ( $links as $key ) { ?>
						<li><?php $this->html( $key ) ?></li>
					<?php } ?>
					</ul>
				</nav>
			<?php } ?>
		</footer>
		<?php
		$this->printTrail();
		echo Html::closeElement( 'body' );
		echo Html::closeElement( 'html' );
	}
}
