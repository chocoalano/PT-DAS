<form wire:submit.prevent="submitForm">
    <div class="card">
        <div class="card-header">
            Form Users
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model.blur="form.name" id="name"
                            class="form-control @error('form.name') is-invalid @enderror" placeholder="Enter name">
                        @error('form.name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" wire:model.blur="form.email" id="email"
                            class="form-control @error('form.email') is-invalid @enderror" placeholder="Enter email">
                        @error('form.email')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <label for="roles" class="form-label">Roles</label>
                        <select class="form-select @error('form.roles') is-invalid @enderror" id="roles"
                            wire:model.blur="form.roles">
                            <option selected>Select Roles</option>
                            @foreach ($rolesData as $k => $v)
                                <option value="{{ $v->id }}">{{ ucfirst($v->name) }}</option>
                            @endforeach
                        </select>
                        @error('form.roles')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" wire:model.blur="form.password" id="password"
                            class="form-control @error('form.name') is-invalid @enderror" placeholder="password">
                        @error('form.password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @canany(['user-create', 'user-update'])
            <button type="submit" class="btn btn-primary">
                Submit
                <div wire:loading wire:target="submit">
                    Proccess...
                </div>
            </button>
        @endcanany
    </div>
</form>
