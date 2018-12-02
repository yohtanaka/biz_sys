<p class="right">
    @if ($list->total() !== 0)
    合計: {{ $list->total() }}件 (
    @if ($list->firstItem() !== $list->lastItem())
    {{ $list->firstItem() }}件目 〜
    @endif
    {{ $list->lastItem() }}件目を表示 )
    @endif
</p>
