<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="card">
                <div class="card-header">{{ __('Profile Information') }}</div>

                <div class="card-body">

                    <form wire:submit.prevent='updateProfile'>


                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <label for="name" class=" text-md-end">{{ __('Name') }}</label>

                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            wire:model.defer='name' required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">

                                        <label for="email" class="text-md-end">{{ __('Email Address') }}</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            wire:model.defer='email' required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="password" class="text-md-end">{{ __('Password') }}</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" wire:model.defer='password' autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password-confirm"
                                            class="text-md-end">{{ __('Confirm Password') }}</label>

                                        <input id="password-confirm" type="password" class="form-control"
                                            wire:model.defer='password_confirmation' autocomplete="new-password">
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 text-center">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
