<?php

function doc($file)
{
    if(!config('doc.content'))
        error('500', 'Content directory not set');

    $file = config('doc.content').$file.'.md';

    if(!is_file($file))
        error(404, 'File not found '.$file);

    $content = file_get_contents($file);

    $markdownExtraParser = new dflydev\markdown\MarkdownExtraParser;

    return $markdownExtraParser->transformMarkdown($content);
}