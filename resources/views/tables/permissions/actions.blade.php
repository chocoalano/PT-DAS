@canany(['permission-read','permission-update'])
<a href="{{ route('panel-config-permissions.show', $row->id) }}" class="btn btn-primary btn-sm" wire:navigate.hover>view</a>
@endcanany