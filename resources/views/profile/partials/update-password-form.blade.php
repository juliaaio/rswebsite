<section>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Perbarui Kata Sandi') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang kuat agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" />
             <div class="relative">
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full pe-10" autocomplete="current-password"/>
                <button type="button" onclick="togglePassword('update_password_current_password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" />
            <div class="relative">
                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full pr-10" autocomplete="new-password" />
                 <button
                    type="button" onclick="togglePassword('update_password_password', this)"class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi Baru')" />
            <div class="relative">
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                 <button
                    type="button"
                    onclick="togglePassword('update_password_password_confirmation', this)"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                    <i class="bi bi-eye"></i>
                </button>
                 </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'kata sandi-diperbarui')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Simpan.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>

function togglePassword(id, button){

    const input = document.getElementById(id);
    const icon = button.querySelector('i');

    if(input.type === 'password'){

        input.type = 'text';

        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');

    }else{

        input.type = 'password';

        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');

    }

}

</script>
