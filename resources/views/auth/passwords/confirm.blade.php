@extends('auth.template.app')
<title>MS System | Confirmar Senha</title>

@section('content')
<div class="card w-full max-w-md shadow-xl border border-ld dark:border-darkborder bg-white dark:bg-darkcard rounded-2xl overflow-hidden">
    <div class="card-body p-6 sm:p-8">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-dark dark:text-white">Confirmar Senha</h3>
            <p class="text-sm text-bodytext dark:text-darklink mt-1">Por favor, confirme sua senha antes de continuar</p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
            @csrf

            <div>
                <label for="password" class="form-label font-medium text-dark dark:text-white flex items-center gap-1.5">
                    <i class="ti ti-lock text-primary"></i> Senha
                </label>
                <input id="password" 
                       type="password" 
                       class="form-control @error('password') border-error @enderror" 
                       name="password" 
                       placeholder="••••••••" 
                       required 
                       autocomplete="current-password">
                @error('password')
                    <span class="text-xs text-error mt-1.5 flex items-center gap-1">
                        <i class="ti ti-alert-circle"></i> {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="pt-4 flex flex-col gap-3">
                <button type="submit" class="btn btn-primary w-full py-2.5 flex items-center justify-center gap-2 text-base font-medium shadow-md hover:shadow-lg transition-all">
                    <i class="ti ti-check text-lg"></i> Confirmar Senha
                </button>
                @if (Route::has('password.request'))
                    <a class="text-center text-xs text-primary hover:underline font-medium" href="{{ route('password.request') }}">
                        Esqueceu sua senha?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
