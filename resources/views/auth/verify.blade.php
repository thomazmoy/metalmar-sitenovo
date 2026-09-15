@extends('auth.template.app')
<title>MS System | Verificar E-mail</title>

@section('content')
<div class="card w-full max-w-md shadow-xl border border-ld dark:border-darkborder bg-white dark:bg-darkcard rounded-2xl overflow-hidden">
    <div class="card-body p-6 sm:p-8">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-dark dark:text-white">Verificar E-mail</h3>
            <p class="text-sm text-bodytext dark:text-darklink mt-1">Verifique seu endereço de e-mail</p>
        </div>

        @if (session('resent'))
            <div class="mb-4 p-4 rounded-xl bg-success/10 border border-success/20 text-success text-sm flex items-center gap-2" role="alert">
                <i class="ti ti-circle-check text-lg"></i>
                <span>Um novo link de verificação foi enviado para seu e-mail.</span>
            </div>
        @endif

        <p class="text-sm text-bodytext dark:text-darklink mb-4">
            Antes de continuar, por favor verifique o link de ativação enviado para o seu e-mail. Caso não tenha recebido:
        </p>

        <form class="space-y-4" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary w-full py-2.5 flex items-center justify-center gap-2 text-base font-medium shadow-md hover:shadow-lg transition-all">
                <i class="ti ti-mail-forward text-lg"></i> Reenviar E-mail de Verificação
            </button>
        </form>
    </div>
</div>
@endsection
