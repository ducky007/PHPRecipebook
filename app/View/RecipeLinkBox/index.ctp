<div id="recipeLinkBox">
    <div id="recipeLinksTitle">Recipe Box</div>
    <div id="recipeLinks">
        By Course
        <ul class="recipeBoxList">
            <?php foreach ($courses as $course) {?>
               <li><a href="Recipes/findByCourse/<?php echo $course['Course']['id'];?>" class="ajaxLink" targetId="content">
               <?php echo $course['Course']['name'];
               if ($course['Course']['count'] > 0) {
                   echo " (" . $course['Course']['count'] . ")";
               }
               echo "</a></li>";
            }?>
        </ul>
        <br/>
        By Base
        <ul class="recipeBoxList">
            <?php foreach ($baseTypes as $base) {?>
               <li><a href="Recipes/findByBase/<?php echo $base['BaseType']['id'];?>" class="ajaxLink" targetId="content">
               <?php echo $base['BaseType']['name'];
               if ($base['BaseType']['count'] > 0) {
                   echo " (" . $base['BaseType']['count'] . ")";
               }
               echo "</a></li>";
            }?>
        </ul>
        <br/>
        <div id="addRecipeLink">
            <?php echo $this->Html->link(__('Add A Recipe'), 
                    array('controller' => 'recipes', 'action' => 'add'),
                    array('class' => 'ajaxLink', 'targetId' => 'content')); 
             ?> 
        </div>
    </div>
</div>

