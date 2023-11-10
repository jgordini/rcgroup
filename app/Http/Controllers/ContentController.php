<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;

class ContentController extends Controller
{
    public function show($id)
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ]);

        $converter->getEnvironment()->addExtension(new TableOfContentsExtension());

        // Replace this with your actual logic to fetch Markdown content
        $markdownContent = /* Fetch your Markdown content here */;
        $htmlContent = $converter->convertToHtml($markdownContent);

        // Your logic to extract table of contents from markdown
        $tableOfContents = /* Extract TOC from markdown content */;

        return Inertia::render('YourVueComponent', [
            'content' => $htmlContent,
            'tableOfContents' => $tableOfContents,
        ]);
    }
}
