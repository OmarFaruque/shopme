<?php
/*
* Admin Theme Function
*/
ob_start();
require_once('save_option.php');
require_once('css/dynamic.php');

/*
* data get function 
*/
function ch_get_option($rdata){
	$ch_data = new ch_option;
	return $ch_data->ch_get_opt($rdata);
} 




/*
* Add menu item in admin 
*/
function addThemeMenuItem() {
	//add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
	add_submenu_page('themes.php', "Theme Option", "Theme Option", "manage_options", "theme-panel", "themeSettingsPage", null, 99);
}



/*
* Add Script Logo Uplode
*/
function wpGearManagerAdminScripts() {
	// function for upload script
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
	// wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	if (isset($_GET['page'])) {
		if ($_GET['page'] == 'theme-panel' || $_GET['page'] == 'theme-panel-settings') {
			wp_enqueue_script('codeHouseThemeOptionsjs', get_template_directory_uri() . '/ch_admin_option/js/code_house_adminPanel.js', array('wp-color-picker'), false, true);
			wp_enqueue_media();
		}
	}
}




/*
* Add custom Style for admin 
*/
function wpGearManagerAdminStyles() {
	//  function for upload style
	wp_enqueue_style('thickbox');
	wp_enqueue_style('customThemeStyle', get_template_directory_uri() . '/ch_admin_option/css/admin-function.css');
	wp_enqueue_style('wp-color-picker');
}
add_action('admin_print_scripts', 'wpGearManagerAdminScripts');
add_action('admin_print_styles', 'wpGearManagerAdminStyles');
add_action("admin_menu", "addThemeMenuItem");






/*
* Main Theme Settings Page 
*/
function themeSettingsPage() {
	$ch_data = new ch_option;
	if(isset($_POST['submit'])){
		$ch_data->data_save($_POST);
	}
?>
<div class="wrap">
	<form method="post" action="">
		<?php
		settings_fields("section");
		do_settings_sections("theme-options");
		$itemArray = array(
		'general' => array(
			'branding' => array(
				array(
					'title' => 'logo',
					'note' => 'Add a Custom Logo from your Media Library',
					'type' => 'upload'
				),
				array(
					'title' => 'Favicon',
					'note' => 'Add a 16px x 16px Png/Gif image that will represent your website\'s favicon.',
					'type' => 'upload'
				),
				array(
					'title' => 'Custom Login Logo',
					'note' => 'Add a custom logo for the Wordpress login screen.',
					'type' => 'upload'
				),
				array(
					'title'	=> 	'Top Tabs (item 1)',
					'note'	=>	'Add tabs item for top heading',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image', 'description')
				),
				array(
					'title'	=> 	'Top Tabs (item 2)',
					'note'	=>	'Add tabs item for top heading',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image', 'description')
				),
				array(
					'title'	=> 	'Top Tabs (item 3)',
					'note'	=>	'Add tabs item for top heading',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image', 'description')
				),
				array(
					'title'	=> 'Hot Line',
					'note'	=> 	'Hot line for customer contact',
					'type'	=>	'text'
				),
				array(
					'title'	=> 	'Top Banner',
					'note'	=>	'Free Shipping Banner',
					'type'	=>	"list",
					'item'	=> 	array('url', 'image')
				)
			),
			'header' => array(
				array(
					'title'	=> 	'Home Top Banner',
					'note'	=> 	'Home Top Banner Under Top Menu',
					'type'	=> 	'list',
					'item'	=> 	array('url', 'image')
					)
			),
			'footer' => array(
				array(
					'title' => 'Back to Top',
					'note' => 'Display the back to top button.',
					'type' => 'checkbox',
					'checkbox_value' => array('yes', 'no')
				),
				array(
					'title' => 'Footer (Copyright)',
					'note' => 'Write your Copyright infos.',
					'type' => 'text'
				),
				array(
					'title' => 'Payment gateway logo',
					'note' => 'Uploade site payment gateway logos.',
					'type' => 'upload'	
				),
				array(
					'title' => 'Our Brand (1)',
					'note' => 'Uploade brand logo & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Our Brand (2)',
					'note' => 'Uploade brand logo & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Our Brand (3)',
					'note' => 'Uploade brand logo & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Our Brand (4)',
					'note' => 'Uploade brand logo & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Tracking Code',
					'note' => 'Paste your Google analytics (or other) code here.',
					'type' => 'textarea'
				)
			)
		),
		'styling' => array(
			'layout' => array(
				array(
					'title' => 'Layout Color Style',
					'note' => 'Choose your Layout Style.',
					'type' => 'dropdown',
					'dropdown_value' => array('light', 'dark')
				),
				array(
					'title' => 'Main Color',
					'note' => 'Please make sure that you use a correct color code.',
					'type' => 'color_picker'
				),
				array(
					'title'	=> 	'Menu Background',
					'note'	=>	'Top Menu Background',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Menu Hover Background',
					'note'	=>	'Top Menu Hover Background',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Default Heading Color',
					'note'	=>	'All Heading Default Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Button Color',
					'note'	=>	'All Button Default Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Link Text Color',
					'note'	=>	'Link Text Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Link Hover Background',
					'note'	=>	'Item Hover Background Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Hover Text Color',
					'note'	=>	'Item Hover Text Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title' => 'Text Color for Colored Background',
					'note' 	=> 'Choose your color style for all content/objects that have your main color as background. ',
					'type' 	=> 'color_picker'
				),
				array(
					'title' => 'Footer Background Color',
					'note' 	=> 'Choose your footer background color.',
					'type' 	=> 'color_picker'	
				),
				array(
					'title'	=>	'Footer Background Taxture',
					'note'	=> 	'Choose Footer Background Taxture.',
					'type'	=> 	'upload'
				),
				array(
					'title' => 'Direction for Animation',
					'note' => 'Choose the direction for the animation.',
					'type' => 'radio',
					'nature' => 'animation',
					'radio_value' => array('left', 'right')
				),
				array(
					'title'	=>	'Widget Title Background',
					'note'	=> 	'Choose Widget Title Background Image',
					'type'	=> 	'upload'
				)
			),
			'template layout' => array(
				array(
					'title' => 'Blog Layout ',
					'note' => 'Choose your blog template style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list'
				),
				array(
					'title' => 'Home Layout',
					'note' => 'Choose your Home template style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list'
				),
				array(
					'title' => 'Portfolio Layout ',
					'note' => 'Choose your Portfolio Page style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list'
				),
				array(
					'title' => 'Fixed Footer Position',
					'note' => 'Display the back to top button.',
					'type' => 'checkbox',
					'checkbox_value' => array('yes', 'no')
				)
			)
		),
		'Typography' => array(
			'Body' => array(
					array(
					'title'	=> 'Body Font',
					'note'	=> 	'select body font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array('default', 'Montserrat', 'Raleway', 'Roboto Condensed', 'Yrsa', 'Open Sans Condensed', 'Ubuntu', 'Titillium Web', 'PT Sans Narrow', 'Cabin', 'Poiret One', 'Josefin Sans', 'Catamaran', 'Quicksand', 'Libre Franklin', 'Kavoon', 'Concert One', 'EB Garamond', 'Chewy', 'Comfortaa', 'Copse', 'Cormorant', 'ABeeZee', 'Gudea', 'Mukta Vaani', 'Cantarell', 'Economica', 'Droid Sans Mono', 'Reem Kufi', 'Yanone Kaffeesatz', 'Play'
						)
					),
					array(
					'title'	=> 	'Body Font Size',
					'note'	=> 	'Chooce the body font size',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array('10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px', '30px')
					), 

					array(
					'title'	=> 	'Body Font Line-Height',
					'note'	=> 	'Chooce the body font line height',
					'type'	=>	'dropdown',
					'dropdown_value'=> array('10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px', '30px')
					)
				),
			'Headings' => array(
					array(
					'title'	=> 'Heading Font',
					'note'	=> 	'select heading font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array('default', 'Montserrat', 'Raleway', 'Roboto Condensed', 'Yrsa', 'Open Sans Condensed', 'Ubuntu', 'Titillium Web', 'PT Sans Narrow', 'Cabin', 'Poiret One', 'Josefin Sans', 'Catamaran', 'Quicksand', 'Libre Franklin', 'Kavoon', 'Concert One', 'EB Garamond', 'Chewy', 'Comfortaa', 'Copse', 'Cormorant', 'ABeeZee', 'Gudea', 'Mukta Vaani', 'Cantarell', 'Economica', 'Droid Sans Mono', 'Reem Kufi', 'Yanone Kaffeesatz', 'Play'
						)
					),
					array(
					'title'	=> 	'Heading Font Weight',
					'note'	=> 	'Chooce heading font weight',
					'type'	=>	'dropdown',
					'dropdown_value'=> array('default', 'normal', 'bold')
					)
				),
			'Navigation' => array(
					array(
					'title'	=> 'Navigation Font',
					'note'	=> 	'select navigation font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array('default', 'Montserrat', 'Raleway', 'Roboto Condensed', 'Yrsa', 'Open Sans Condensed', 'Ubuntu', 'Titillium Web', 'PT Sans Narrow', 'Cabin', 'Poiret One', 'Josefin Sans', 'Catamaran', 'Quicksand', 'Libre Franklin', 'Kavoon', 'Concert One', 'EB Garamond', 'Chewy', 'Comfortaa', 'Copse', 'Cormorant', 'ABeeZee', 'Gudea', 'Mukta Vaani', 'Cantarell', 'Economica', 'Droid Sans Mono', 'Reem Kufi', 'Yanone Kaffeesatz', 'Play'
						)
					),
					array(
					'title'	=> 	'Navigation Font Size',
					'note'	=> 	'Chooce the body font size',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array('10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px', '30px')
					), 

					array(
					'title'	=> 	'Navigation Font Weight',
					'note'	=> 	'Chooce navigation font weight',
					'type'	=>	'dropdown',
					'dropdown_value'=> array('default', 'normal', 'bold')
					)
				)
		),
		'Custom' => array(
			'Custom CSS'=> array(
				array(
					'title'	=>	'Custom CSS Code',
					'note'	=> 	'Custom CSS',
					'type'	=> 	'textarea'
				)
			)
		)
		//'styling', 'blog', 'portfolio', 'layout', 'colors', 'fonts', 'social'
		);
		?>
		<?php
		/*
		echo '<pre>';
			print_r($itemArray);
		echo '</pre>';*/
		;?>
		<div class="themeOption">
			<div class="leftManu">
				<div class="topbar logotop">
					<div class="icon">
						<img src="<?= get_template_directory_uri(); ?>/ch_admin_option/img/1462632628_Settings.png" alt="setting icon"/>
					</div>
					<div class="Logotitle">
						<h3><span style="color:red;">Theme</span><span>Options</span></h3>
						<span class="themeoption_powerBy">Powered by Code House</span>
					</div>
				</div>
				<div class="ThOleftMenuItem">
					<ul>
						<?php foreach ($itemArray as $key => $tab): ?>
						<li><a href="#<?=$key;?>"><?=ucfirst($key);?></a></li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
			<div class="themeOptionBody">
				<div class="topbar bodytop">
					<h3><span class="topTitle">General</span></h3>
					<?php submit_button();?>
				</div>
				<?php foreach ($itemArray as $key => $mainBody): ?>
				<div class="ThOMainBody" id="<?=$key;?>">
					<?php foreach ($mainBody as $mainKey => $singBody): ?>
					<div class="section">
						<div class="sectionhead">
							<h3><?=$mainKey;?></h3>
						</div>
						<div class="sectionbody">
							<?php for ($i = 0; $i < count($singBody); $i += 1): ?>
							<div class="sectionPart">
								<div class="part_left">
								<label for="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"><h4><?=$singBody[$i]['title'];?></h4></label>	
								</div>
								
								<?php
								switch ($singBody[$i]['type']):
								case 'upload':
								?>
								<div class="partRight">
									<input type="hidden" value="<?= $ch_data->ch_get_opt($singBody[$i]['title'] . '_id'); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']) . '_id';?>"/>
									<input type="text" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
									<button class="button button-submit add-image">Add Image</button>
								</div>
								<?php
								break;
								case 'checkbox':
								?>
								<div class="partRight">
									<input type="checkbox" style="display: none;" value="" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
									<a href="#"  class="checkbox-status">Checkbox</a>
								</div>
								
								<?php
								break;
								case 'text':
								?>
								<div class="partRight">
									<input type="text" style="width:99%;" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
								</div>
								<?php
								break;
								case 'textarea':
								?>
								<div class="partRight">
									<textarea name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"><?= $ch_data->ch_get_opt($singBody[$i]['title']); ?></textarea>
								</div>
								<?php
								break;
								
								case 'dropdown':
								?>
								<div class="partRight">
										
									<select name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>">
										<option value="">Select <?=$singBody[$i]['title'];?> </option>
										<?php foreach ($singBody[$i]['dropdown_value'] as $singleDropdown): ?>
										<option <?= ($ch_data->ch_get_opt($singBody[$i]['title']) == strtolower($singleDropdown) ?'selected':''); ?> value="<?=strtolower($singleDropdown);?>"><?=ucfirst($singleDropdown);?></option>
										<?php endforeach;?>
									</select>
								</div>
								<?php
								break;
								case 'color_picker':
								?>
								<div class="partRight">
									<input type="text" class="codeHouseColorPicker" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>">
								</div>
								<?php
								break;
								case 'radio':
								?>
								<div class="partRight animationDiv">
									<?php foreach ($singBody[$i]['radio_value'] as $radioVal): ?>
									<input style="display:none;" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" type="radio" class="" value="<?=$radioVal;?>">
									<a href="javascript:void(0)" class="radio-status <?php if ($singBody[$i]['nature'] == 'layout_style') {echo 'sidebar';} elseif ($singBody[$i]['nature'] == 'animation') {echo 'animation';}?> <?=$radioVal;?>" title="<?=$radioVal;?>"><?=$radioVal;?></a>
									<?php endforeach;?>
								</div>
								<?php
								break;
								case 'list':
								?>
									<div class=""></div>
									<div class="partRight listStyle">
										<?php 
											foreach($singBody[$i]['item'] as $s_item):
												//echo 'item: ' .$ch_data->ch_stringReplace($singBody[$i]['title']) . '<br/>';
												switch($s_item):
													case 'image':
														echo '<span><b>'.	$s_item.'</b></span>';
														echo '<input type="hidden" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item .'_id').'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item). '_id' .'"/>';
														echo '<input type="text" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'"/>';
														echo '<button class="button button-submit add-image">Add Image</button>';
														if(!empty($ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item))){
															echo '<div class="imgPreview"><img src="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'"/></div>';
														}
													break;

													case 'description':
														echo '<span><b>'.	$s_item.'</b></span>';
														echo '<textarea name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'" id="id-'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'">'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'</textarea>';
													break;

													default:
														echo '<span><b>'.$s_item.'</b></span>';
														echo '<input type="text" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'"/>';
												endswitch;
											endforeach;
										?>
									</div>
								<?php break; ?>
								<?php endswitch;?>
								<div class="imgPreview">
									<span><i><?=$singBody[$i]['note'];?></i></span>
									<div class="img">
										<?php 	
										if($singBody[$i]['type'] == 'upload' && !empty($ch_data->ch_get_opt($singBody[$i]['title']) ) ) {
											echo '<img src="'.$ch_data->ch_get_opt($singBody[$i]['title']).'" alt="'.$singBody[$i]['title'].'">';
										}
										?>
									</div>
								</div>
							</div>
							<?php endfor;?>
						</div>
					</div>
					<?php endforeach;?>
				</div>
				<?php endforeach;?>
				<div class="ThOMainBody" id="blog">
					<span>Generalddd</span>
				</div>
			</div>
		</div>
		<?php
		submit_button();
		?>
	</form>
</div>
<?php
}
ob_end_clean();
?>