@extends('layouts.app')

@section('content')

{{-- Header --}}
<div class="text-center mb-10">
    <div class="inline-flex items-center gap-3 mb-3">
        <div class="w-9 h-9 bg-brand-500 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="none">
                <path d="M8.5 11.5L11.5 8.5M7 13a3.5 3.5 0 01-4.95-4.95l2-2A3.5 3.5 0 019 5.05M13 7a3.5 3.5 0 014.95 4.95l-2 2A3.5 3.5 0 0111 14.95"
                      stroke="white" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Lite<span class="text-brand-500">Link</span>
        </h1>
    </div>
    <p class="text-gray-500 text-sm">Transforme URLs longas em links curtos e fáceis de compartilhar</p>
</div>

{{-- Card principal --}}
<div class="bg-white border border-gray-200 rounded-2xl p-6 mb-6 shadow-sm">

    {{-- Mensagem de erro de validação --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Link encurtado gerado com sucesso --}}
    @if (session('success'))
        @php
            $code = session('success');
            $generatedLink = ShortUrl::where('code', $code)->first();
        @endphp
        @if ($generatedLink)
        <div class="mb-5 p-4 bg-brand-50 border border-brand-100 rounded-xl">
            <p class="text-xs font-medium text-brand-700 uppercase tracking-widest mb-2">Link encurtado com sucesso</p>
            <div class="flex items-center gap-3">
                <span class="mono text-brand-600 font-medium flex-1 truncate text-sm">
                    {{ url('/') }}/{{ $generatedLink->code }}
                </span>
                <button
                    onclick="copyToClipboard('{{ url('/') }}/{{ $generatedLink->code }}', this)"
                    class="flex items-center gap-1.5 px-3 py-1.5 border border-gray-200 rounded-lg text-xs font-semibold
                           text-gray-700 bg-white hover:bg-gray-50 transition-colors whitespace-nowrap">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 14 14" fill="none">
                        <rect x="4" y="4" width="9" height="9" rx="1.5" stroke="currentColor" stroke-width="1.3"/>
                        <path d="M3 10H2A1.5 1.5 0 01.5 8.5v-7A1.5 1.5 0 012 0h7A1.5 1.5 0 0110.5 1.5V3"
                              stroke="currentColor" stroke-width="1.3"/>
                    </svg>
                    Copiar
                </button>
            </div>
            <p class="mono text-xs text-gray-400 mt-1.5 truncate">{{ $generatedLink->original_url }}</p>
        </div>
        @endif
    @endif

    {{-- Formulário --}}
    <form action="{{ route('shorten') }}" method="POST">
        @csrf
        <div class="flex gap-2">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                     viewBox="0 0 16 16" fill="none">
                    <path d="M6.5 9.5L9.5 6.5M5.5 11a3 3 0 01-4.24-4.24l1.5-1.5A3 3 0 015.5 5M10.5 5a3 3 0 014.24 4.24l-1.5 1.5A3 3 0 0110.5 11"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <input
                    type="text"
                    name="original_url"
                    value="{{ old('original_url') }}"
                    placeholder="https://seusite.com/pagina-muito-longa..."
                    autocomplete="off"
                    class="mono w-full h-11 pl-9 pr-4 border border-gray-200 rounded-xl bg-gray-50 text-sm
                           text-gray-800 outline-none focus:border-brand-500 transition-colors placeholder-gray-400"
                />
            </div>
            <button type="submit"
                    class="btn-primary h-11 px-6 bg-brand-500 hover:bg-brand-600 text-white font-bold
                           text-sm rounded-xl whitespace-nowrap">
                Encurtar
            </button>
        </div>
    </form>
</div>

{{-- Histórico recente --}}
<div>
    <div class="flex items-center gap-2 mb-3">
        <p class="text-xs font-medium text-gray-400 uppercase tracking-widest">Histórico recente</p>
        <span class="text-xs font-semibold px-2 py-0.5 bg-brand-50 text-brand-600 rounded-full">
            {{ $recentLinks->count() }} {{ $recentLinks->count() == 1 ? 'link' : 'links' }}
        </span>
    </div>

    @if ($recentLinks->isEmpty())
        <div class="text-center py-10 text-gray-400">
            <svg class="w-8 h-8 mx-auto mb-3 opacity-40" viewBox="0 0 32 32" fill="none">
                <circle cx="16" cy="16" r="12" stroke="currentColor" stroke-width="2"/>
                <path d="M16 9v7l4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <p class="text-sm">Nenhum link encurtado ainda.</p>
        </div>
    @else
        <div class="space-y-2">
            @foreach ($recentLinks as $link)
            <div class="card-hover bg-white border border-gray-200 rounded-xl px-4 py-3
                        flex items-center gap-3 transition-colors">
                {{-- Código do link --}}
                <a href="{{ route('redirect', $link->code) }}"
                   target="_blank"
                   class="mono text-brand-500 font-medium text-sm hover:underline whitespace-nowrap flex-shrink-0">
                    /{{ $link->code }}
                </a>

                {{-- URL original --}}
                <span class="mono text-gray-400 text-xs flex-1 truncate">
                    {{ $link->original_url }}
                </span>

                {{-- Badge de cliques --}}
                <span class="flex items-center gap-1 text-xs font-semibold px-2.5 py-1
                             bg-brand-50 text-brand-600 rounded-full whitespace-nowrap flex-shrink-0">
                    <svg class="w-3 h-3" viewBox="0 0 12 12" fill="none">
                        <circle cx="6" cy="6" r="4.5" stroke="currentColor" stroke-width="1.3"/>
                        <circle cx="6" cy="6" r="1.5" fill="currentColor"/>
                    </svg>
                    {{ $link->clicks }} {{ $link->clicks == 1 ? 'clique' : 'cliques' }}
                </span>
            </div>
            @endforeach
        </div>
    @endif
</div>

{{-- Script para copiar --}}
<script>
function copyToClipboard(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const original = btn.innerHTML;
        btn.innerHTML = `
            <svg class="w-3.5 h-3.5" viewBox="0 0 14 14" fill="none">
                <path d="M1.5 7L5 10.5L12.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Copiado!`;
        btn.classList.add('text-brand-600', 'border-brand-300');
        setTimeout(() => {
            btn.innerHTML = original;
            btn.classList.remove('text-brand-600', 'border-brand-300');
        }, 2000);
    });
}
</script>

@endsection
