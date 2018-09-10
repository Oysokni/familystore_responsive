<div class="row mgb-10">
    <div class="col-xs-6">
        【{{ $collection->total() }}】件({{ $collection->lastPage() }}ページ）中 
        @if (!$collection->isEmpty())
            {{ $collection->currentPage() }}ページ目（{{ $collection->firstItem() }}～{{ $collection->lastItem() }}件）を表示しています。
        @endif
    </div>
    
    <div class="col-xs-6 text-right">
        @if ($collection->hasPages())
            <?php
            $showPage = 5;
            $halfPage = intval($showPage / 2);

            $pageStart = 1;
            $pageEnd = $collection->lastPage();
            $dotStart = false;
            $dotEnd = false;
            if ($showPage < $pageEnd) {
                $pageStart = $collection->currentPage() - $halfPage;
                if ($collection->lastPage() - $collection->currentPage() < $halfPage) {
                    $pageStart = $pageStart - $halfPage;
                }
                if ($pageStart < 1) {
                    $pageStart = 1;
                }
                if ($pageStart > 1) {
                    $dotStart = true;
                }

                $pageEnd = $pageStart + $showPage - 1;
                if ($pageEnd > $collection->lastPage()) {
                    $pageEnd = $collection->lastPage();
                }
                if ($pageEnd < $collection->lastPage()) {
                    $dotEnd = true;
                }
            }
            ?>
            <ul class="lx-paginate list-inline">
                {{-- Previous Page Link --}}
                @if ($collection->currentPage() > 1)
                    <li><a href="{{ $collection->url(1) }}" rel="prev">＜＜最初</a></li>
                    <li><a href="{{ $collection->previousPageUrl() }}" rel="prev">＜前</a></li>
                @endif

                {{-- "Three Dots" Separator --}}
                @if ($dotStart) 
                <li class="disable"><span>...</span></li>
                @endif

                {{-- Pagination Elements --}}
                @for ($page = $pageStart; $page <= $pageEnd; $page++)

                    @if ($page == $collection->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $collection->url($page) }}">{{ $page }}</a></li>
                    @endif

                @endfor

                {{-- "Three Dots" Separator --}}
                @if ($dotEnd) 
                <li class="disable"><span>...</span></li>
                @endif

                {{-- Next Page Link --}}
                @if ($collection->hasMorePages() && $collection->currentPage() < $collection->lastPage())
                    <li><a href="{{ $collection->nextPageUrl() }}" rel="next">次＞</a></li>
                    <li><a href="{{ $collection->url($collection->lastPage()) }}" rel="next">最後＞＞</a></li>
                @endif
            </ul>
        @endif
    </div>
</div>


