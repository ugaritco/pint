<div class="mx-2 flex space-x-1">
    <span>
        <span class="{{ $issue->fixable() ? 'text-green' : 'text-red' }} font-bold">{{ $issue->symbol() }}</span>
        <span class="ml-1 text-white">{{ $issue->file() }}</span>
    </span>
    @if ($issue->description($testing))
        <span class="text-gray ml-2">({{ $issue->description($testing) }})</span>
    @endif
</div>
