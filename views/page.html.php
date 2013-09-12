<?php if(is_array($content)) : ?>
	<h3>Search results</h3>
	<?php foreach($content as $item) : ?>
		<?php if($item['path'] != 'documentation') : ?>
		<ul class="menulist">
			<li><a href="<?php echo $item['path'].'?string='.params('string'); ?>"><?php echo $item['name']; ?></a></li>
		</ul>
		<?php endif;?>
	<?php endforeach; ?>

<?php else : ?>
	<p>go to: <a target="_blank" href="http://laravel.com/docs/<?php echo($path); ?>">Laravel.com/docs/<?php echo $path; ?></a></p>
	<hr />
	<?php echo $content; ?>
<?php endif; ?>