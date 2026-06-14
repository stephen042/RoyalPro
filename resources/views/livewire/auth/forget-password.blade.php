<div class="card-body" style="padding: 50px 40px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <form class="shadow-none" wire:submit.throttle.1000.prevent="resetPassword" method="post">
        <div>
            <div class="text-center">
                <span class="login100-form-title">
                    Forgot Password
                </span>
                <p class="text-muted">Enter the email address registered on your account</p>
            </div>
            <div class="pt-3" id="forgot">
                @error('email')
                    <em class="text-danger">{{ $message }}</em>
                @enderror
                <div class="form-group">
                    <label class="form-label">E-Mail</label>
                    <input class="form-control" wire:model.blur="email" placeholder="Enter Your Email" type="email">
                </div>
                <div class="submit">
                    <button class="login100-form-btn btn-primary" type="submit">
                        Submit
                        <x-spinner />
                    </button>
                </div>
                <div class="text-center mt-4">
                    <p class="text-dark mb-0">Remembered It?<a class="text-primary ms-1" href="login">Send me Back</a></p>
                </div>
            </div>

        </div>
    </form>
</div>
