<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'PHPRecipeBook');
?>

<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
                echo $this->Html->css("https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css");
                echo $this->Html->css("jquery.qtip");
                echo $this->Html->css('cake.generic');
                echo $this->Html->css('default');
                
                echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js");
                echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js");
                echo $this->Html->script("jquery.qtip.js");
                echo $this->Html->script("default");
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                $baseUrl = Router::url('/');
	?>
    
</head>
<body>
    <script type="text/javascript">
    $(function() {
        initApplication("<?php echo $baseUrl;?>");
    });

    var applicationContext = "recipe"; // Default context
    </script>
    <div id="container">
        <div id="header">

        </div>
        
        <div id="recipeLinkBoxContainer"></div>
            
        <div id="main" class="constrain borderStyle">
            <nav id="navigation-menu">
                <ul>
                    <li><a href="<?php echo $baseUrl;?>Recipes" class="ajaxNavigation"><?php echo __('Recipes'); ?></a></li>
                    <li><a href="<?php echo $baseUrl;?>MealPlans" class="ajaxNavigation"><?php echo __('Meal Planner'); ?></a></li>
                    <li><a href="<?php echo $baseUrl;?>ShoppingListNames" class="ajaxNavigation"><?php echo __('Shopping List');?></a></li>
                    <li><a href="<?php echo $baseUrl;?>Ingredients" class="ajaxNavigation"><?php echo __('Ingredients'); ?></a></li>
                    <li><a href="<?php echo $baseUrl;?>Restaurants" class="ajaxNavigation"><?php echo __('Restaurants');?></a></li>
                    <li><a href="<?php echo $baseUrl;?>Users" class="ajaxNavigation"><?php echo __('Users');?></a></li>
                    <li><div id="searchHolder">
                        <form id="searchEverythingForm">
                          <span>
                              <input type="text" class="searchTextBox" placeholder="Search Recipes" />
                              <img src="<?php echo $baseUrl;?>img/clearBtn.png"  class="cancelBtn"/>
                          </span>
                        </form>
                    </li>
                    <li>
                        <a href="#" id="signInButton">Sign in</a>
                    </li>
                </ul>
            </nav> 

            <div id="content">
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
            </div>
        
            <div id="footer">

            </div>
        </div>
    </div>
    <div id="editIngredientDialog" class="dialog" width="600" height="610" title="<?php echo __('Ingredient');?>"/>    
    <div id="editLocationDialog" class="dialog" width="600" height="240" title="<?php echo __('Location');?>"/>
    <div id="editUnitDialog" class="dialog" width="600" height="400" title="<?php echo __('Unit');?>"/>
    <div id="editCoreIngredientDialog" class="dialog" width="600" height="400" title="<?php echo __('Core Ingredients');?>"/>
    <div id="editRestaurantDialog" class="dialog" width="600" height="800" title="<?php echo __('Restaurant');?>"/>
    <div id="editPriceRangesDialog" class="dialog" width="600" height="200" title="<?php echo __('Price Ranges');?>"/>
    <div id="editEthnicityDialog" class="dialog" width="600" height="200" title="<?php echo __('Ethnicity');?>"/>
    <div id="editBaseTypeDialog" class="dialog" width="600" height="200" title="<?php echo __('Base Type');?>"/>
    <div id="editCourseDialog" class="dialog" width="600" height="200" title="<?php echo __('Course');?>"/>
    <div id="editPrepTimeDialog" class="dialog" width="600" height="200" title="<?php echo __('Preparation Time');?>"/>
    <div id="editPrepMethodDialog" class="dialog" width="600" height="200" title="<?php echo __('Preparation Method');?>"/>
    <div id="editDifficultyDialog" class="dialog" width="600" height="200" title="<?php echo __('Difficulty');?>"/>
    <div id="editSourceDialog" class="dialog" width="600" height="500" title="<?php echo __('Source');?>"/>
    <div id="editMealDialog" class="dialog" width="700" height="500" title="<?php echo __('Meal');?>"/>
</body>
</html>
