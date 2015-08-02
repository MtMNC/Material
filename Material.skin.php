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
        //Add JS via ResourceLoader
        public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModules( 'skins.material.js' );
	}
        //Add CSS via ResourceLoader
        function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
			'mediawiki.skinning.interface', 'skins.material'
		) );
	}
 }
 
// BaseTemplate class
class MaterialTemplate extends BaseTemplate {
        public function execute() {
		$this->html( 'headelement' );
		?>
		<header id="mw-header"> <!-- header -->
			<form class="mw-search" id="searchform" action="<?php $this->text( 'wgScript' ); ?>"> <!-- search -->
				<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
				<?php
				echo $this->makeSearchInput( array( 'class' => 'mw-search-input' ) ); 
				echo $this->makeSearchButton( 'image', array( 'src' => $this->getSkin()->getSkinStylePath( 'images/magnifying-glass.svg'), 'alt' => 'search button' ) );
				?>
			</form>
		</header>
		<div class="mw-body-content">
		        <?php $this->html( 'bodytext' ) ?> <!-- content -->
		        <?php $this->html( 'catlinks' ); ?> <!-- categories -->
		        <?php $this->html( 'dataAfterContent' ); ?> <!-- dataAfterContent -->
		</div>
		<footer id="mw-footer"> <!-- footer -->
			<?php
				foreach ( $this->getFooterLinks() as $category => $links ) { ?>
				<ul>
				<?php
					foreach ( $links as $key ) { ?>
					<li><?php $this->html( $key ) ?></li>
				<?php
				} ?>
				</ul>
			<?php
			} ?>
		</footer>
		<?php
		$this->printTrail();
		echo Html::closeElement( 'body' );
		echo Html::closeElement( 'html' );
	}
}
