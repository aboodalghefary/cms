<div wire:poll.750ms>
    @if ($breackingNews != null)
        <div class="breaking-news bg-danger position-fixed bottom-0 left-0 right-0 w-100 ">
            <div class="title text-end p-5 mx-5">
                <a href="{{ $breackingNews->href }}" class="text-bg-danger fs-1">{{ $breackingNews->title }}</a>
            </div>
    @endif
</div>
