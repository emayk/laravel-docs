<?php if(is_array($content)) : ?>

	<?php foreach($content as $item) : ?>
	<ul>
		<li><a href="<?php echo $item['path'].'?string='.params('string'); ?>"><?php echo $item['name']; ?></a></li>
	</ul>
	<?php endforeach; ?>

<?php else : ?>
	<?php echo $content; ?>
<?php endif; ?>