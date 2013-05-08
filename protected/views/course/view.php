<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Course', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),

);
?>

<h1><?php echo $model->title; ?></h1>
<div id="info"></div>
<ul id="sort-list">  
<? $lessons=Lesson::model()->findAll("seriesno=".$model->id ." ORDER BY lessonno");



foreach ($lessons as $lesson) {
?>
	<li id='listItem_<? echo $lesson->id; ?>' style="border: 1px solid; padding: 5px; margin: 5px">
		<?php echo CHtml::link('Edit', array('lesson/update', 'id'=>$lesson->id) , array('style'=>'float: right; margin-top:5px')); ?>
		<h4><?=$lesson->title;?></h4>
		<div style="clear:both"></div>
	</li>
	<?
}

?>
</ul>

	<script type="text/javascript">
  // When the document is ready set up our sortable with it's inherant function(s)
  $(document).ready(function() {
    $("#sort-list").sortable({
      
      update : function () {
		  var order = $('#sort-list').sortable('serialize');
		  $("#info").load("<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/process/?"+order);
      }
    });
});
</script>