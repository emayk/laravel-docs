<?php

/**
 * Error handling
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

/**
 * Composer
 */
require __DIR__.'/../vendor/autoload.php';

/**
 * Config
 */
config([
    'doc.content'     => __DIR__.'/../docs/',
    'dispatch.views'  => __DIR__.'/../views/',
    'dispatch.layout' => '/../views/layout'
]);

$markdownExtraParser = new dflydev\markdown\MarkdownExtraParser;

/**
 * Doc
 * @param  string $file filename
 * @return string parsed Markdown HTML
 */
function doc($file)
{
    global $markdownExtraParser;

    if(!config('doc.content'))
        error('500', 'Content directory not set');

    $file = config('doc.content').$file.'.md';

    if(!is_file($file))
        error(404, 'File not found '.$file);

    $content = $markdownExtraParser->transformMarkdown(file_get_contents($file));

    if(params('string'))
    {
        $content = str_replace(params('string'), '<span style="background:red;color:white;padding:1px 3px">'.params('string').'</span>', $content);
    }

    return $content;
}

function menu()
{
    global $markdownExtraParser;

    return str_replace(
        ['/docs', '<ul>'],
        [null, '<ul class="nav nav-pills nav-stacked">'],
        $markdownExtraParser->transformMarkdown(file_get_contents(config('doc.content').'documentation.md')));
}

function search($str)
{
    $data = array();

    $finder = new Symfony\Component\Finder\Finder;

    $iterator = $finder
      ->files()
      ->name('*.md')
      ->contains($str)
      ->in(config('doc.content'));

    foreach ($iterator as $file) {
        $item = substr($file->getFilename(), 0, -3);
        $data[] = [
            'path' => $item,
            'name' => ucfirst($item)
        ];
    }

    return $data;
}

/**
 * Routes
 */
on('GET', '/', function() {
    render('page', [
        'path'    => 'introduction',
        'content' => doc('introduction'),
        'menu'    => menu()
    ]);
});

on('GET', '/search', function() {
    render('page', [
        'path'    => 'introduction',
        'content' => search(urldecode(params('string'))),
        'menu'    => menu()
    ]);
});

on('GET', '/:page', function($page) {
    render('page', [
        'path'    => $page,
        'content' => doc($page),
        'menu'    => menu()
    ]);
});

/**
 * Fire Dispatch
 */
dispatch();