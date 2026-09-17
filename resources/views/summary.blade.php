<div class="mx-2 mb-1">
    <div class="flex space-x-1">
        <span class="text-gray">── {{ $preset }} </span>
        <span class="content-repeat-[─] text-gray flex-1"></span>
    </div>

    <div>
        <div class="flex space-x-2">
            @php
                $fixableErrors = $issues->filter->fixable();
                $nonFixableErrors = $issues->reject->fixable();
            @endphp

            @if ($issues->count() == 0)
                <span class="bg-green text-black px-2 font-bold uppercase"> PASS </span>
            @elseif ($nonFixableErrors->count() == 0 && ! $testing)
                <span class="bg-green text-black px-2 font-bold uppercase"> FIXED </span>
            @else
                <span class="bg-red text-white px-2 font-bold uppercase"> FAIL </span>
            @endif

            <span class="text-gray">
                @php
                    $parts = [$totalFiles . ' ' . str('file')->plural($totalFiles)];
                    if ($nonFixableErrors->isNotEmpty()) {
                        $parts[] = '<span class="text-red font-bold">' . $nonFixableErrors->count() . ' ' . str('error')->plural($nonFixableErrors) . '</span>';
                    }
                    if ($fixableErrors->isNotEmpty()) {
                        $parts[] = '<span class="text-green font-bold">' . $fixableErrors->count() . ' style ' . str('issue')->plural($fixableErrors) . ' ' . ($testing ? '' : 'fixed') . '</span>';
                    }
                @endphp
                {!! implode(', ', $parts) !!}
            </span>
        </div>
    </div>
</div>
