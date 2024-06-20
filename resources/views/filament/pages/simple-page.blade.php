<x-filament-panels::page>

    <div class="prose dark:prose-invert">
        @if($record->image_url)
            <img src="{{ Storage::url($record->image_url) }}" class="h-96 object-cover justify-center"/>
        @endif
        {!! $record->content !!}
    </div>

</x-filament-panels::page>
