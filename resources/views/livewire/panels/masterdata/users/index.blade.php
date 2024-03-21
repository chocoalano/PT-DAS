<div>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between mb-3">
                <div class="col-auto">
                    <h4 class="header-title">List of user data</h4>
                </div>
                <div class="col-auto">
                    <a href="{{ route('panel-config-users.create') }}" class="btn btn-primary btn-sm" wire:navigate.hover>Create New</a>
                </div>
            </div>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <livewire:panels.components.tables.user-tables />
        </div>
    </div>
</div>
