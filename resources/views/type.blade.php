<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>';
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($data as $type)
        <type>
            <id>{{ $type->id }}</id>
            <type>{{ $type->type }}</type>
        </type>
    @endforeach
</urlset>
