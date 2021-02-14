<div>
    @if($status > 0)
    <button class="dis_like" wire:click="dis_like">Unlike</button>

    @else
    <button class="like" wire:click="make_like">Like</button>
</div>
