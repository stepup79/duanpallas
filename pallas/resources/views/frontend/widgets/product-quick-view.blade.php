<div class="wrap-modal1 js-modal-{{ $sp->sp_id }} p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal" data-sp-id="{{ $sp->sp_id }}"></div>

    <!-- Product info -->
    @include('frontend.widgets.product-info', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
</div>