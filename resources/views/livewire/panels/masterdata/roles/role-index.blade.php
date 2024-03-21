<div class="card">
    <div class="card-body">
        <div class="row justify-content-between mb-3">
            <div class="col-auto">
                <h4 class="header-title">List of role data</h4>
            </div>
            <div class="col-auto">
                <a href="{{ route('panel-config-roles.create') }}" class="btn btn-primary btn-sm">Create New</a>
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
        <livewire:panels.components.tables.role-tables />
    </div>
</div>