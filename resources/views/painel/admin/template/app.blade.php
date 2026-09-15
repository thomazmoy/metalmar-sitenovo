<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-color-theme="Blue_Theme" class="light selected" data-layout="vertical" data-boxed-layout="boxed" data-card="shadow">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MS System | Admin Panel</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('painel/assets/img/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    
    <!-- Core Css from Tailwind Admin -->
    <link rel="stylesheet" href="{{ asset('painel/tailwindadmin/assets/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('painel/tailwindadmin/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <!-- Quill Rich Text Editor CSS -->
    <link rel="stylesheet" href="{{ asset('painel/assets/libs/quill/quill.snow.css') }}">

    <style>
        /* ── Custom overrides: brings raw Tailwind classes into Tailwind Admin system ── */
        .hidden { display: none !important; }
        .min-h-screen { min-height: 100vh; }
        .text-darklink { color: #111c2d; }
        .border-darkborder { border-color: #e5e7eb; }

        /* ─── Modals ─── */
        .ms-modal { position: fixed; inset: 0; z-index: 99999 !important; display: flex; align-items: center; justify-content: center; padding: 1rem; }
        .ms-modal-backdrop { position: fixed; inset: 0; background: rgba(15, 23, 42, 0.65); backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px); z-index: 99990 !important; }
        .ms-modal-content { position: relative; z-index: 99999 !important; background: #ffffff; border-radius: 1rem; width: 100%; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); border: 1px solid #e2e8f0; overflow: hidden; animation: msModalIn 0.2s cubic-bezier(0.16, 1, 0.3, 1); }
        .dark .ms-modal-content { background: #1e293b; border-color: #334155; color: #f1f5f9; }
        @keyframes msModalIn { from { opacity: 0; transform: scale(0.96) translateY(8px); } to { opacity: 1; transform: scale(1) translateY(0); } }

        /* ─── Status Badges ─── */
        .badge-status { display: inline-flex; align-items: center; padding: 0.25rem 0.65rem; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; line-height: 1; gap: 0.35rem; }
        .badge-recebido { background-color: #eff6ff !important; color: #1d4ed8 !important; border: 1px solid #bfdbfe !important; }
        .dark .badge-recebido { background-color: rgba(30, 58, 138, 0.35) !important; color: #93c5fd !important; border-color: rgba(30, 58, 138, 0.6) !important; }
        .badge-atendimento { background-color: #fffbeb !important; color: #b45309 !important; border: 1px solid #fde68a !important; }
        .dark .badge-atendimento { background-color: rgba(120, 53, 15, 0.35) !important; color: #fcd34d !important; border-color: rgba(120, 53, 15, 0.6) !important; }
        .badge-finalizado { background-color: #ecfdf5 !important; color: #047857 !important; border: 1px solid #a7f3d0 !important; }
        .dark .badge-finalizado { background-color: rgba(6, 78, 59, 0.35) !important; color: #6ee7b7 !important; border-color: rgba(6, 78, 59, 0.6) !important; }
        .badge-cancelado { background-color: #fff1f2 !important; color: #be123c !important; border: 1px solid #fecdd3 !important; }
        .dark .badge-cancelado { background-color: rgba(136, 19, 55, 0.35) !important; color: #fda4af !important; border-color: rgba(136, 19, 55, 0.6) !important; }
        .badge-default { background-color: #f1f5f9 !important; color: #475569 !important; border: 1px solid #cbd5e1 !important; }
        .dark .badge-default { background-color: #334155 !important; color: #cbd5e1 !important; border-color: #475569 !important; }

        /* ─── Global Smooth Theme Transitions ─── */
        html, body, main, .page-wrapper, .ms-content, .ms-sidebar, .dash-header, footer,
        .card, .card-header, .card-body, .card-title,
        .form-control, .form-select, input, select, textarea,
        .btn, .btn-primary, .btn-outline-secondary, .btn-danger, .btn-success,
        .form-label, label, small, .form-text, .text-muted, .obrigatorio, .text-error,
        .bg-slate-50, .border-slate-200, .border, .border-ld, hr,
        #langTabs, #langTabs button, button[data-bs-toggle="tab"], .tab-pane, .tab-content,
        .ql-toolbar, .ql-container, .ql-editor,
        #profile-dropdown-menu, .profile-dropdown-header, .hs-dropdown-menu {
            transition: background-color 0.25s ease, border-color 0.25s ease, color 0.25s ease, box-shadow 0.25s ease !important;
        }

        /* ─── Modern Spacious Table System ─── */
        table thead {
            background-color: #f8fafc !important;
            border-top: 1px solid #e2e8f0 !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }
        .dark table thead {
            background-color: #1e293b !important;
            border-color: #334155 !important;
        }
        table thead th {
            padding: 1rem 1.5rem !important; /* 16px vertical, 24px horizontal */
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            color: #64748b !important;
            vertical-align: middle !important;
        }
        .dark table thead th {
            color: #94a3b8 !important;
        }
        table tbody tr {
            transition: background-color 0.15s ease-in-out;
        }
        table tbody tr:hover {
            background-color: #f8fafc !important;
        }
        .dark table tbody tr:hover {
            background-color: rgba(30, 41, 59, 0.5) !important;
        }
        table tbody td {
            padding: 1.15rem 1.5rem !important; /* ~18px vertical, 24px horizontal */
            vertical-align: middle !important;
            border-bottom: 1px solid #f1f5f9;
        }
        .dark table tbody td {
            border-bottom-color: #1e293b;
        }

        /* ─── Premium Action Buttons (Light & Dark Theme Aligned) ─── */
        .btn-action-view,
        .btn-action-edit,
        .btn-action-delete {
            width: 2.25rem !important;
            height: 2.25rem !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            border-radius: 0.625rem !important; /* rounded-xl */
            font-size: 1.1rem !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
            cursor: pointer !important;
            text-decoration: none !important;
            flex-shrink: 0 !important;
        }

        /* View Button */
        .btn-action-view {
            background-color: #eff6ff !important;
            color: #2563eb !important;
            border: 1px solid #dbeafe !important;
        }
        .btn-action-view:hover {
            background-color: #2563eb !important;
            color: #ffffff !important;
            border-color: #2563eb !important;
            box-shadow: 0 4px 8px -1px rgba(37, 99, 235, 0.3) !important;
            transform: translateY(-2px) !important;
        }
        .dark .btn-action-view {
            background-color: rgba(30, 58, 138, 0.35) !important;
            color: #60a5fa !important;
            border-color: rgba(59, 130, 246, 0.3) !important;
        }
        .dark .btn-action-view:hover {
            background-color: #2563eb !important;
            color: #ffffff !important;
            border-color: #2563eb !important;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.45) !important;
            transform: translateY(-2px) !important;
        }

        /* Edit Button */
        .btn-action-edit {
            background-color: #fffbeb !important;
            color: #d97706 !important;
            border: 1px solid #fef3c7 !important;
        }
        .btn-action-edit:hover {
            background-color: #d97706 !important;
            color: #ffffff !important;
            border-color: #d97706 !important;
            box-shadow: 0 4px 8px -1px rgba(217, 119, 6, 0.3) !important;
            transform: translateY(-2px) !important;
        }
        .dark .btn-action-edit {
            background-color: rgba(120, 53, 15, 0.35) !important;
            color: #fbbf24 !important;
            border-color: rgba(245, 158, 11, 0.3) !important;
        }
        .dark .btn-action-edit:hover {
            background-color: #d97706 !important;
            color: #ffffff !important;
            border-color: #d97706 !important;
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.45) !important;
            transform: translateY(-2px) !important;
        }

        /* Delete Button */
        .btn-action-delete {
            background-color: #fff1f2 !important;
            color: #e11d48 !important;
            border: 1px solid #ffe4e6 !important;
        }
        .btn-action-delete:hover {
            background-color: #e11d48 !important;
            color: #ffffff !important;
            border-color: #e11d48 !important;
            box-shadow: 0 4px 8px -1px rgba(225, 29, 72, 0.3) !important;
            transform: translateY(-2px) !important;
        }
        .dark .btn-action-delete {
            background-color: rgba(136, 19, 55, 0.35) !important;
            color: #fb7185 !important;
            border-color: rgba(244, 63, 94, 0.3) !important;
        }
        .dark .btn-action-delete:hover {
            background-color: #e11d48 !important;
            color: #ffffff !important;
            border-color: #e11d48 !important;
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.45) !important;
            transform: translateY(-2px) !important;
        }
        
        /* ── Toggle Switch Fixes ── */
        .toggle-situacao-index + div {
            background-color: #e5e7eb !important; /* Gray when off */
            position: relative;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        .toggle-situacao-index + div::after {
            content: '' !important;
            position: absolute !important;
            top: 2px !important;
            left: 2px !important;
            background-color: white !important;
            border-radius: 50% !important;
            height: 16px !important;
            width: 16px !important;
            transition: transform 0.3s ease !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.3) !important;
        }
        .toggle-situacao-index:checked + div {
            background-color: #e6461e !important; /* Brand Orange */
        }
        .toggle-situacao-index:checked + div::after {
            transform: translateX(20px) !important;
        }

        /* ─── Cards ─── */
        .card { background: white; border-radius: 16px; border: 1px solid transparent; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05); overflow: hidden; margin-bottom: 1.5rem; }
        .card:hover { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05); }
        .dark .card { background: var(--color-dark, #1e293b); border-color: rgba(255,255,255,0.05); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2); }
        .card-header { display: flex; align-items: center; justify-content: space-between; padding: 1.5rem; border-bottom: 1px solid var(--color-border, #f3f4f6); }
        .dark .card-header { border-color: var(--color-darkborder, #334155); }
        .card-body { padding: 1.5rem; }
        .card-title { font-size: 1rem; font-weight: 600; color: #111827; letter-spacing: -0.01em; }
        .dark .card-title { color: #f1f5f9; }

        /* ─── Buttons ─── */
        .btn { display: inline-flex; align-items: center; gap: .4rem; padding: .5rem 1.2rem; border-radius: 10px; font-size: .875rem; font-weight: 500; cursor: pointer; border: 1px solid transparent; text-decoration: none; }
        .btn:hover { transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }
        .btn-primary { background: linear-gradient(135deg, #e6461e 0%, #ea580c 100%); color: #fff; box-shadow: 0 4px 12px rgba(230, 70, 30, 0.25); }
        .btn-primary:hover { box-shadow: 0 6px 16px rgba(230, 70, 30, 0.35); }
        .btn-outline-secondary { border-color: #d1d5db; color: #4b5563; background: #fff; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .btn-outline-secondary:hover { background: #f9fafb; color: #111827; border-color: #9ca3af; }
        .dark .btn-outline-secondary { background: #1e293b !important; border-color: #334155 !important; color: #cbd5e1 !important; }
        .dark .btn-outline-secondary:hover { background: #334155 !important; color: #ffffff !important; border-color: #475569 !important; }
        .btn-danger { background: #ef4444; color: #fff; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25); }
        .btn-danger:hover { background: #dc2626; }
        .btn-success { background: #22c55e; color: #fff; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25); }

        /* ─── Universal Form Controls ─── */
        .form-label, label { display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.35rem; }
        .dark .form-label, .dark label { color: #cbd5e1 !important; }
        
        .form-control, .form-select, input[type="text"], input[type="email"], input[type="password"], input[type="number"], input[type="date"], input[type="url"], select, textarea {
            display: block;
            width: 100%;
            padding: .5rem .75rem;
            font-size: .875rem;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            background-color: #ffffff;
            color: #111827;
        }
        .form-control:focus, .form-select:focus, input:focus, select:focus, textarea:focus {
            outline: none !important;
            background-color: #ffffff !important;
            border-color: #e6461e !important;
            box-shadow: 0 0 0 4px rgba(230, 70, 30, 0.15) !important;
        }
        .dark .form-control, .dark .form-select, .dark input[type="text"], .dark input[type="email"], .dark input[type="password"], .dark input[type="number"], .dark input[type="date"], .dark input[type="url"], .dark select, .dark textarea {
            background-color: #1e293b !important;
            border-color: #334155 !important;
            color: #f1f5f9 !important;
        }
        .dark .form-control::placeholder, .dark input::placeholder, .dark textarea::placeholder {
            color: #64748b !important;
        }
        .dark .form-control:focus, .dark .form-select:focus, .dark input:focus, .dark select:focus, .dark textarea:focus {
            background-color: #0f172a !important;
            border-color: #fb923c !important;
            box-shadow: 0 0 0 4px rgba(251, 146, 60, 0.25) !important;
        }

        /* Select dropdown styling */
        .form-select { appearance: none; background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); background-position: right .75rem center; background-repeat: no-repeat; background-size: 1.25em; padding-right: 2.5rem; }
        .dark .form-select { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); }

        /* File Inputs */
        input[type="file"].form-control, input[type="file"] { padding: 0.35rem 0.5rem; }
        input[type="file"]::file-selector-button {
            background: #f1f5f9;
            color: #334155;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 0.35rem 0.75rem;
            font-size: 0.8rem;
            font-weight: 500;
            margin-right: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        input[type="file"]::file-selector-button:hover { background: #e2e8f0; }
        .dark input[type="file"]::file-selector-button {
            background: #334155 !important;
            color: #f1f5f9 !important;
            border-color: #475569 !important;
        }
        .dark input[type="file"]::file-selector-button:hover { background: #475569 !important; }

        /* Checkboxes and Radios */
        input[type="checkbox"]:not(.toggle-situacao-index), input[type="radio"] { accent-color: #e6461e; cursor: pointer; }
        .dark input[type="checkbox"]:not(.toggle-situacao-index), .dark input[type="radio"] { accent-color: #fb923c; }

        /* Form Helper Texts, Required Badges and Errors */
        .form-text, .text-muted, small { font-size: 0.75rem; color: #64748b; }
        .dark .form-text, .dark .text-muted, .dark small { color: #94a3b8 !important; }
        .obrigatorio, span.obrigatorio { color: #ef4444 !important; font-weight: bold; }
        .text-error, .dark .text-error { color: #ef4444 !important; font-size: 0.75rem; }

        /* Forms Section Dividers and Groups */
        hr, .border-t, .border-b, .border-l, .border-r, .border-ld { border-color: #e2e8f0; }
        .dark hr, .dark .border-t, .dark .border-b, .dark .border-l, .dark .border-r, .dark .border-ld, .dark .border { border-color: #334155 !important; }
        .border-radius-lg { border-radius: 0.75rem; }

        .bg-slate-50 { background-color: #f8fafc; border-color: #e2e8f0; }
        .dark .bg-slate-50 { background-color: #0f172a !important; border-color: #334155 !important; }
        .rounded-xl { border-radius: 0.75rem; }
        .p-5 { padding: 1.25rem; }
        .mb-5 { margin-bottom: 1.25rem; }

        /* Form Titles and Typography */
        h5.font-weight-bolder { font-size: 1.125rem; font-weight: 600; color: #1f2937; margin-bottom: 0.25rem; }
        .dark h5.font-weight-bolder, .dark h5 { color: #f1f5f9 !important; }
        h6.text-uppercase { font-size: 0.75rem; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.25rem; }
        .dark h6.text-uppercase { color: #94a3b8 !important; }
        .dark h6:not(.text-uppercase) { color: #f1f5f9 !important; }

        /* ─── Sizes (safeguard for precompiled CSS missing them) ─── */
        .w-12 { width: 3rem; }
        .h-12 { height: 3rem; }
        .w-10 { width: 2.5rem; }
        .h-10 { height: 2.5rem; }
        .object-cover { object-fit: cover; }
        .rounded-lg { border-radius: 0.5rem; }
        .rounded-full { border-radius: 9999px; }

        /* ─── Tables ─── */
        .bg-lightgray { background-color: #f9fafb; }
        .dark .bg-lightgray { background-color: #1e293b; }
        .divide-ld > * + * { border-color: #f3f4f6; }
        .dark .divide-ld > * + * { border-color: #1e293b; }

        /* ─── Toggle switch ─── */
        input[type=checkbox].toggle-situacao-index { position: absolute; opacity: 0; width: 0; height: 0; }
        input[type=checkbox].toggle-situacao-index + .toggle-bg { display: inline-block; width: 2.5rem; height: 1.25rem; background: #d1d5db; border-radius: 999px; cursor: pointer; transition: background .2s; position: relative; }
        input[type=checkbox].toggle-situacao-index:checked + .toggle-bg { background: #e6461e; }
        input[type=checkbox].toggle-situacao-index + .toggle-bg::after { content: ''; position: absolute; top: 2px; left: 2px; width: 1rem; height: 1rem; background: white; border-radius: 50%; transition: transform .2s; }
        input[type=checkbox].toggle-situacao-index:checked + .toggle-bg::after { transform: translateX(1.25rem); }

        /* ─── Sidebar text ─── */
        .text-bodytext { color: #6b7280; }
        .dark .text-bodytext { color: #94a3b8; }
        .ps-9 { padding-left: 2.25rem; }

        /* ─── Missing Tailwind Utilities & Brand Overrides ─── */
        .bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
        .from-blue-600, .from-primary { --tw-gradient-from: #e6461e; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(230, 70, 30, 0)); }
        .to-indigo-600, .to-primary { --tw-gradient-to: #ea580c; }
        .backdrop-blur-md { backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        .bg-white\/70 { background-color: rgba(255, 255, 255, 0.7); }
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .shadow-md { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        .translate-x-1 { transform: translateX(0.25rem); }
        .scale-110 { transform: scale(1.1); }
        .transition-transform { transition-property: transform; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .transition-all { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .duration-200 { transition-duration: 200ms; }
        .hover\:translate-x-1:hover { transform: translateX(0.25rem); }
        .group:hover .group-hover\:scale-110 { transform: scale(1.1); }
        .text-indigo-600, .text-primary { color: #e6461e !important; }
        .hover\:text-indigo-600:hover, .hover\:text-primary:hover { color: #e6461e !important; }
        .border-primary { border-color: #e6461e !important; }
        .bg-primary { background-color: #e6461e !important; }
        .bg-lightprimary { background-color: rgba(230, 70, 30, 0.1) !important; }
        .dark .bg-lightprimary { background-color: rgba(230, 70, 30, 0.2) !important; }
        .dark .text-primary, .dark .text-indigo-600 { color: #fb923c !important; }
        .dark .hover\:text-indigo-600:hover, .dark .hover\:text-primary:hover { color: #fb923c !important; }

        /* ─── Quill Rich Text Editor (Theme & Styling) ─── */
        .quill-editor-wrapper { margin-bottom: 0.5rem; }
        .ql-toolbar.ql-snow {
            border: 1px solid #d1d5db !important;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background-color: #f8fafc;
            padding: 0.4rem 0.6rem !important;
            font-family: 'Inter', sans-serif !important;
        }
        .ql-container.ql-snow {
            border: 1px solid #d1d5db !important;
            border-top: none !important;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            background-color: #ffffff;
            font-family: 'Inter', sans-serif !important;
            font-size: 0.925rem;
            height: auto !important;
            min-height: 160px !important;
        }
        .ql-editor {
            height: auto !important;
            min-height: 160px !important;
            overflow-y: visible !important;
            color: #111827;
            line-height: 1.6;
            padding: 12px 14px !important;
        }
        .ql-editor.ql-blank::before {
            color: #9ca3af !important;
            font-style: normal;
            left: 14px;
        }
        .ql-snow.ql-toolbar button:hover,
        .ql-snow .ql-toolbar button:hover,
        .ql-snow.ql-toolbar button:focus,
        .ql-snow .ql-toolbar button:focus,
        .ql-snow.ql-toolbar button.ql-active,
        .ql-snow .ql-toolbar button.ql-active,
        .ql-snow.ql-toolbar .ql-picker-label:hover,
        .ql-snow .ql-toolbar .ql-picker-label:hover,
        .ql-snow.ql-toolbar .ql-picker-label.ql-active,
        .ql-snow .ql-toolbar .ql-picker-label.ql-active,
        .ql-snow.ql-toolbar .ql-picker-item:hover,
        .ql-snow .ql-toolbar .ql-picker-item:hover,
        .ql-snow.ql-toolbar .ql-picker-item.ql-selected,
        .ql-snow .ql-toolbar .ql-picker-item.ql-selected {
            color: #e6461e !important;
        }
        .ql-snow.ql-toolbar button:hover .ql-stroke,
        .ql-snow .ql-toolbar button:hover .ql-stroke,
        .ql-snow.ql-toolbar button:focus .ql-stroke,
        .ql-snow .ql-toolbar button:focus .ql-stroke,
        .ql-snow.ql-toolbar button.ql-active .ql-stroke,
        .ql-snow .ql-toolbar button.ql-active .ql-stroke,
        .ql-snow.ql-toolbar .ql-picker-label:hover .ql-stroke,
        .ql-snow .ql-toolbar .ql-picker-label:hover .ql-stroke,
        .ql-snow.ql-toolbar .ql-picker-label.ql-active .ql-stroke,
        .ql-snow .ql-toolbar .ql-picker-label.ql-active .ql-stroke {
            stroke: #e6461e !important;
        }
        .ql-snow.ql-toolbar button:hover .ql-fill,
        .ql-snow .ql-toolbar button:hover .ql-fill,
        .ql-snow.ql-toolbar button:focus .ql-fill,
        .ql-snow .ql-toolbar button:focus .ql-fill,
        .ql-snow.ql-toolbar button.ql-active .ql-fill,
        .ql-snow .ql-toolbar button.ql-active .ql-fill {
            fill: #e6461e !important;
        }

        /* Quill Dark Mode */
        .dark .ql-toolbar.ql-snow {
            border-color: #334155 !important;
            background-color: #0f172a !important;
        }
        .dark .ql-container.ql-snow {
            border-color: #334155 !important;
            background-color: #1e293b !important;
        }
        .dark .ql-editor {
            color: #f1f5f9 !important;
        }
        .dark .ql-editor.ql-blank::before {
            color: #64748b !important;
        }
        .dark .ql-snow .ql-stroke {
            stroke: #cbd5e1 !important;
        }
        .dark .ql-snow .ql-fill {
            fill: #cbd5e1 !important;
        }
        .dark .ql-snow .ql-picker {
            color: #cbd5e1 !important;
        }
        .dark .ql-snow .ql-picker-options {
            background-color: #1e293b !important;
            border-color: #334155 !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5) !important;
        }
        .dark .ql-snow .ql-picker-item {
            color: #cbd5e1 !important;
        }
        .dark .ql-snow.ql-toolbar button:hover,
        .dark .ql-snow .ql-toolbar button:hover,
        .dark .ql-snow.ql-toolbar button.ql-active,
        .dark .ql-snow .ql-toolbar button.ql-active,
        .dark .ql-snow.ql-toolbar .ql-picker-label:hover,
        .dark .ql-snow .ql-toolbar .ql-picker-label:hover,
        .dark .ql-snow.ql-toolbar .ql-picker-label.ql-active,
        .dark .ql-snow .ql-toolbar .ql-picker-label.ql-active {
            color: #fb923c !important;
        }
        .dark .ql-snow.ql-toolbar button:hover .ql-stroke,
        .dark .ql-snow .ql-toolbar button:hover .ql-stroke,
        .dark .ql-snow.ql-toolbar button.ql-active .ql-stroke,
        .dark .ql-snow .ql-toolbar button.ql-active .ql-stroke,
        .dark .ql-snow.ql-toolbar .ql-picker-label:hover .ql-stroke,
        .dark .ql-snow .ql-toolbar .ql-picker-label:hover .ql-stroke,
        .dark .ql-snow.ql-toolbar .ql-picker-label.ql-active .ql-stroke,
        .dark .ql-snow .ql-toolbar .ql-picker-label.ql-active .ql-stroke {
            stroke: #fb923c !important;
        }
        .dark .ql-snow.ql-toolbar button:hover .ql-fill,
        .dark .ql-snow .ql-toolbar button:hover .ql-fill,
        .dark .ql-snow.ql-toolbar button.ql-active .ql-fill,
        .dark .ql-snow .ql-toolbar button.ql-active .ql-fill {
            fill: #fb923c !important;
        }
        .dark .ql-snow.ql-toolbar .ql-picker-item:hover,
        .dark .ql-snow .ql-toolbar .ql-picker-item:hover,
        .dark .ql-snow.ql-toolbar .ql-picker-item.ql-selected,
        .dark .ql-snow.ql-toolbar .ql-picker-item.ql-selected {
            color: #fb923c !important;
        }

        /* ─── Multilingual Tabs ─── */
        #langTabs, .flex:has(> button[data-bs-toggle="tab"]) { border-bottom: none !important; background: #f1f5f9; padding: 0.35rem; border-radius: 12px; display: inline-flex; gap: 0.25rem; margin-bottom: 1.5rem !important; }
        .dark #langTabs, .dark .flex:has(> button[data-bs-toggle="tab"]) { background: #1e293b !important; }
        #langTabs button, button[data-bs-toggle="tab"] { border: none !important; border-bottom: none !important; border-radius: 8px !important; padding: 0.5rem 1.25rem; font-weight: 600; font-size: 0.875rem; color: #64748b !important; background: transparent !important; }
        .dark #langTabs button, .dark button[data-bs-toggle="tab"] { color: #94a3b8 !important; }
        #langTabs button.text-primary, button[data-bs-toggle="tab"].text-primary { background: #ffffff !important; color: #e6461e !important; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transform: translateY(-1px); }
        .dark #langTabs button.text-primary, .dark button[data-bs-toggle="tab"].text-primary { background: #0f172a !important; color: #fb923c !important; box-shadow: 0 1px 3px rgba(0,0,0,0.5); }
        #langTabs button:hover:not(.text-primary), button[data-bs-toggle="tab"]:hover:not(.text-primary) { color: #0f172a !important; }
        .dark #langTabs button:hover:not(.text-primary), .dark button[data-bs-toggle="tab"]:hover:not(.text-primary) { color: #f8fafc !important; }

        /* ─── Premium Action Buttons (Tables) ─── */
        td .flex.items-center.gap-2 a, td .flex.items-center.gap-2 button { height: 36px !important; width: 36px !important; border-radius: 50% !important; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 1.15rem !important; }
        
        /* View */
        td .flex.items-center.gap-2 a.text-primary { color: #e6461e !important; background: rgba(230, 70, 30, 0.1) !important; }
        td .flex.items-center.gap-2 a.text-primary:hover { background: #e6461e !important; color: #ffffff !important; box-shadow: 0 4px 6px -1px rgba(230, 70, 30, 0.3); transform: translateY(-2px); }
        .dark td .flex.items-center.gap-2 a.text-primary { background: rgba(230, 70, 30, 0.2) !important; color: #fb923c !important; }
        
        /* Edit */
        td .flex.items-center.gap-2 a.text-secondary { color: #10b981 !important; background: rgba(16, 185, 129, 0.1) !important; }
        td .flex.items-center.gap-2 a.text-secondary:hover { background: #10b981 !important; color: #ffffff !important; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3); transform: translateY(-2px); }
        .dark td .flex.items-center.gap-2 a.text-secondary { background: rgba(52, 211, 153, 0.15) !important; color: #34d399 !important; }
        
        /* Delete */
        td .flex.items-center.gap-2 button.text-error { color: #ef4444 !important; background: rgba(239, 68, 68, 0.1) !important; }
        td .flex.items-center.gap-2 button.text-error:hover { background: #ef4444 !important; color: #ffffff !important; box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.3); transform: translateY(-2px); }
        .dark td .flex.items-center.gap-2 button.text-error { background: rgba(248, 113, 113, 0.15) !important; color: #f87171 !important; }

        /* ─── Layout wrapper (Robust approach) ─── */
        .sidebar-wrapper { width: 270px; transform: translateX(0); z-index: 50; }
        .page-wrapper { width: 100%; padding-left: 270px; }
        
        /* ─── Layout wrapper (MS Layout approach) ─── */
        .ms-sidebar { width: 270px; transform: translateX(0); z-index: 99999 !important; }
        .ms-content { width: 100%; }
        @media (min-width: 1280px) {
            .ms-content { padding-left: 270px; }
            .ms-sidebar { z-index: 50 !important; }
        }
        @media (max-width: 1279px) {
            .ms-sidebar { transform: translateX(-100%); z-index: 99999 !important; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4); }
            .ms-sidebar.sidebar-open { transform: translateX(0) !important; }
        }
        
        /* ─── Hardcoded Dark Mode Overrides ─── */
        body.dark, html.dark { background-color: #0f172a !important; color: #f1f5f9 !important; }
        .dark body, .dark main, .dark .ms-content, .dark .page-wrapper { background-color: #0f172a !important; }
        .dark .bg-gray-50, .dark .bg-white { background-color: #0f172a !important; }
        
        .dark .ms-sidebar { background-color: #1e293b !important; border-color: #334155 !important; }
        .dark .dash-header { background-color: rgba(30, 41, 59, 0.85) !important; border-bottom-color: #334155 !important; box-shadow: 0 4px 20px -10px rgba(0,0,0,0.5) !important; }
        .dark .dash-header button { background-color: #1e293b !important; border-color: #334155 !important; color: #cbd5e1 !important; }
        .dark .dash-header button:hover { background-color: #0f172a !important; }
        .dark .dash-header .divider-vertical { background-color: #334155 !important; }
        .dark .dash-header span, .dark .dash-header .text-gray-800 { color: #f1f5f9 !important; }
        .dark .dash-header .text-gray-500 { color: #94a3b8 !important; }
        .dark footer { background-color: #1e293b !important; border-color: #334155 !important; color: #94a3b8 !important; }
        .dark .hs-dropdown-menu { background-color: #1e293b !important; border-color: #334155 !important; }
        .dark .ms-sidebar a:not(.text-white):hover { background-color: #0f172a !important; color: #fb923c !important; }
        .dark .ms-sidebar .text-gray-600 { color: #cbd5e1 !important; }
        .dark .card { background-color: #1e293b !important; border-color: #334155 !important; }
        .dark .card-header { border-bottom-color: #334155 !important; }

        /* ─── Sidebar Logo (Tailwind Admin standard layout) ─── */
        .brand-logo { display: flex; align-items: center; justify-content: space-between; width: 100%; min-height: 73px; }
        .brand-logo .logo-img { display: inline-flex; align-items: center; text-decoration: none; overflow: hidden; }
        .brand-logo .sidebar-logo-light, .brand-logo .sidebar-logo-dark {
            display: block !important;
            height: auto !important;
            max-height: 36px !important;
            width: auto !important;
            max-width: 170px !important;
            object-fit: contain !important;
        }
        .brand-logo .sidebar-logo-dark { display: none !important; }
        .dark .brand-logo .sidebar-logo-dark { display: block !important; }
        .dark .brand-logo .sidebar-logo-light { display: none !important; }

        /* ─── Profile Dropdown ─── */
        #profile-dropdown-menu { background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important; }
        .dark #profile-dropdown-menu { background-color: #1e293b !important; border: 1px solid #334155 !important; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7) !important; }
        .dark #profile-dropdown-menu .profile-dropdown-header { background-color: #0f172a !important; border-bottom: 1px solid #334155 !important; }
        .dark #profile-dropdown-menu .profile-dropdown-header h3 { color: #f8fafc !important; }
        .dark #profile-dropdown-menu .profile-dropdown-header p { color: #94a3b8 !important; }
        .dark #profile-dropdown-menu .logout-btn { color: #f87171 !important; }
        .dark #profile-dropdown-menu .logout-btn:hover { background-color: rgba(239, 68, 68, 0.15) !important; color: #fca5a5 !important; }

    </style>
    <script>
        // Aplicar o tema imediatamente para evitar FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="DEFAULT_THEME bg-gray-50 dark:bg-[#0f172a] font-sans antialiased text-gray-800">
    @include('sweetalert::alert')

    <div class="flex min-h-screen w-full bg-gray-50 dark:bg-dark">
        <!-- Sidebar -->
        <aside id="ms-sidebar" class="ms-sidebar fixed top-0 left-0 h-screen z-50 bg-white dark:bg-[#1e293b] border-r border-ld dark:border-darkborder transition-transform duration-300">
                
                <!-- Logo -->
                <div class="h-[73px] px-6 flex items-center justify-between border-b border-ld dark:border-darkborder">
                    <div class="brand-logo flex items-center justify-between w-full">
                        <a href="{{ url('admin') }}" class="text-nowrap logo-img flex items-center">
                            <img src="{{ asset('painel/assets/img/mssystem.webp') }}" class="sidebar-logo-light" alt="MS System" />
                            <img src="{{ asset('painel/assets/img/mssystem.png') }}" class="sidebar-logo-dark" alt="MS System" />
                        </a>
                        <button type="button" onclick="toggleSidebar()" class="xl:hidden w-8 h-8 flex items-center justify-center rounded-lg text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white cursor-pointer transition-colors">
                            <iconify-icon icon="solar:close-circle-linear" class="text-2xl"></iconify-icon>
                        </button>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="overflow-y-auto h-[calc(100vh-80px)]" data-simplebar="">
                    <div class="px-6 mt-8">
                        <nav class="w-full flex flex-col gap-1">
                            <ul id="sidebarnav" class="flex flex-col gap-1">
                                
                                <div class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mt-4 mb-2 px-3">Painel</div>
                                
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::url() == url('admin') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin') }}">
                                        <iconify-icon icon="solar:widget-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <div class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mt-6 mb-2 px-3">Conteúdo</div>
                                
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'banner' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/banner') }}">
                                        <iconify-icon icon="solar:gallery-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Banner</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'quemsomos' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/quemsomos/1/edit') }}">
                                        <iconify-icon icon="solar:info-circle-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Quem Somos</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'solucao' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/solucao') }}">
                                        <iconify-icon icon="solar:bolt-circle-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Soluções</span>
                                    </a>
                                </li>

                                <div class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mt-6 mb-2 px-3">Mídia & Interação</div>
                                
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'categoria' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/categoria') }}">
                                        <iconify-icon icon="solar:tag-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Categorias Blog</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'blog' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/blog') }}">
                                        <iconify-icon icon="solar:document-text-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Blog</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'galeria' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/galeria') }}">
                                        <iconify-icon icon="solar:camera-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Galeria</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'depoimento' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/depoimento') }}">
                                        <iconify-icon icon="solar:chat-round-dots-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Depoimentos</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'contato' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/contato') }}">
                                        <iconify-icon icon="solar:letter-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Contatos</span>
                                    </a>
                                </li>

                                <div class="text-xs font-semibold uppercase tracking-wider text-bodytext dark:text-darklink mt-6 mb-2 px-3">Sistema</div>
                                
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'privacidade' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/privacidade/1/edit') }}">
                                        <iconify-icon icon="solar:shield-check-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Privacidade</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'traducoes' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/traducoes') }}">
                                        <iconify-icon icon="solar:global-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Traduções (Site)</span>
                                    </a>
                                </li>
                                <li class="sidebar-item group">
                                    <a class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm font-medium transition-all duration-200 hover:translate-x-1 {{ Request::segment(2) === 'siteconfig' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 'text-gray-600 hover:bg-white hover:text-indigo-600 hover:shadow-sm dark:text-gray-400 dark:hover:bg-darkgray' }}" href="{{ url('admin/siteconfig/1/edit') }}">
                                        <iconify-icon icon="solar:settings-linear" class="text-xl transition-transform group-hover:scale-110"></iconify-icon>
                                        <span>Configurações</span>
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
        </aside>

        <!-- Main Content -->
        <div class="ms-content w-full flex flex-col min-h-screen">
            
            <!-- Header -->
            <header class="dash-header sticky top-0 z-40 bg-white/80 backdrop-blur-lg border-b border-gray-100 px-6 py-4 flex items-center justify-between shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] transition-colors duration-300" style="overflow: visible !important;">
                
                <div class="flex items-center gap-4">
                    <button type="button" onclick="toggleSidebar()" class="xl:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-gray-50 hover:bg-gray-100 text-gray-600 cursor-pointer transition-colors border border-gray-100">
                        <iconify-icon icon="solar:hamburger-menu-linear" class="text-2xl"></iconify-icon>
                    </button>
                    <!-- Brand / Breadcrumb -->
                    <div class="hidden sm:flex flex-col">
                        <span style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 700; color: #6b7280; margin-bottom: -2px;">MS System</span>
                        <span class="text-sm font-bold text-gray-800" style="color: #111827;">Painel Administrativo</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Theme Toggle -->
                    <button type="button" id="theme-toggle" class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-50 hover:bg-gray-100 text-gray-600 cursor-pointer transition-all border border-gray-100 shadow-sm hover:shadow" title="Alternar tema">
                        <iconify-icon id="theme-toggle-dark-icon" icon="solar:moon-linear" class="text-xl hidden"></iconify-icon>
                        <iconify-icon id="theme-toggle-light-icon" icon="solar:sun-2-linear" class="text-xl hidden"></iconify-icon>
                    </button>

                    <div style="width: 1px; height: 24px; background: #e5e7eb; margin: 0 0.5rem;" class="divider-vertical"></div>

                    <!-- User Profile Dropdown Button -->
                    <div class="relative inline-flex" id="user-dropdown-container">
                        <button type="button" id="profile-menu-button" onclick="toggleProfileDropdown(event)" class="profile-btn flex items-center justify-center gap-3 cursor-pointer p-1 pr-4 rounded-full border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#1e293b] shadow-sm hover:shadow transition-all group">
                            <img src="{{ asset('painel/assets/img/user-default.png') }}" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=e6461e&color=fff'" alt="user" class="rounded-full w-9 h-9 object-cover border-2 border-white dark:border-gray-700 shadow-sm">
                            <div class="flex-col items-start hidden sm:flex text-left">
                                <span class="text-xs font-bold text-gray-800 dark:text-gray-100 group-hover:text-[#e6461e] transition-colors" style="margin-bottom: -2px;">{{ Auth::user()->name }}</span>
                                <span class="text-[10px] text-gray-500 dark:text-gray-400 uppercase font-semibold">Administrador</span>
                            </div>
                            <iconify-icon icon="solar:alt-arrow-down-linear" class="text-gray-400 group-hover:text-[#e6461e] transition-colors ml-1 hidden sm:block"></iconify-icon>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-50 dark:bg-[#0f172a] min-h-screen">
                @yield('content')
            </main>
            
            <footer class="w-full py-4 text-center border-t border-ld dark:border-darkborder text-sm text-gray-500 bg-white dark:bg-dark">
                <p>MS System &copy;{{ date('Y') }} Todos os direitos reservados.</p>
            </footer>
        </div>
    </div>

    <!-- Mobile sidebar overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-[99990] xl:hidden hidden transition-opacity duration-300" onclick="toggleSidebar()"></div>

    <!-- Tailwind Admin scripts -->
    <script src="{{ asset('painel/tailwindadmin/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('painel/tailwindadmin/assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('painel/tailwindadmin/assets/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('painel/tailwindadmin/assets/js/theme.js') }}"></script>
    <script src="{{ asset('painel/tailwindadmin/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('painel/tailwindadmin/assets/libs/preline/dist/preline.js') }}"></script>

    <!-- Solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    
    <!-- Custom MS System AJAX Logic -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // ── Mobile Sidebar Toggle ──────────────────────────────
        function toggleSidebar() {
            const sidebar = document.getElementById('ms-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (!sidebar) return;
            
            const isOpen = sidebar.classList.contains('sidebar-open');
            if (isOpen) {
                sidebar.classList.remove('sidebar-open');
                if (overlay) overlay.classList.add('hidden');
                document.body.style.overflow = '';
            } else {
                sidebar.classList.add('sidebar-open');
                if (overlay) overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }
        
        // ── Tabs Toggle Logic ──────────────────────────────
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('[data-bs-toggle="tab"]');
            tabButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Encontrar o contêiner de tabs pai
                    const tabContainer = this.closest('#langTabs') || this.closest('.flex') || this.parentElement;
                    
                    // Remover estado ativo de todos os botões do grupo
                    const siblings = tabContainer.querySelectorAll('[data-bs-toggle="tab"]');
                    siblings.forEach(btn => {
                        btn.classList.remove('text-primary', 'border-b-2', 'border-primary', 'bg-transparent');
                        btn.classList.add('text-bodytext');
                    });
                    
                    // Adicionar estado ativo ao botão clicado
                    this.classList.remove('text-bodytext');
                    this.classList.add('text-primary', 'border-b-2', 'border-primary', 'bg-transparent');
                    
                    // Ocultar todos os painéis
                    const targetSelector = this.getAttribute('data-bs-target') || this.getAttribute('href');
                    const targetId = targetSelector ? targetSelector.replace('#', '') : '';
                    const tabContent = document.getElementById('langTabsContent') || document.querySelector('.tab-content');
                    if (tabContent) {
                        const panes = tabContent.querySelectorAll('.tab-pane');
                        panes.forEach(pane => {
                            pane.style.display = 'none';
                            pane.classList.remove('show', 'active');
                            pane.classList.add('hidden');
                        });
                        
                        // Mostrar o painel alvo
                        const targetPane = document.getElementById(targetId);
                        if (targetPane) {
                            targetPane.style.display = 'block';
                            targetPane.classList.remove('hidden');
                            targetPane.classList.add('show', 'active');
                            if (typeof initQuillEditors === 'function') {
                                initQuillEditors();
                            }
                        }
                    }
                });
            });
            
            // Inicializar visualmente: ocultar painéis inativos
            const panes = document.querySelectorAll('.tab-pane');
            panes.forEach(pane => {
                if (!pane.classList.contains('active')) {
                    pane.style.display = 'none';
                    pane.classList.add('hidden');
                } else {
                    pane.style.display = 'block';
                    pane.classList.remove('hidden');
                }
            });
        });

        // ── AJAX toggle visibilidade ───────────────────────────
        document.addEventListener('DOMContentLoaded', function () {
            const switches = document.querySelectorAll('.toggle-situacao-index');
            switches.forEach(function (toggle) {
                toggle.addEventListener('change', function () {
                    const modelName = this.dataset.model;
                    const modelId = this.dataset.id;
                    const isChecked = this.checked ? 1 : 0;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch('{{ route("admin.toggle-situacao") }}', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                        body: JSON.stringify({ model: modelName, id: modelId, situacao: isChecked })
                    })
                    .then(response => response.json())
                    .then(data => {
                        const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true });
                        Toast.fire({ icon: data.success ? 'success' : 'error', title: data.success ? 'Status atualizado com sucesso!' : 'Erro ao atualizar.' });
                        if (!data.success) this.checked = !this.checked;
                    })
                    .catch(() => {
                        Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: 'Erro de comunicação.', showConfirmButton: false, timer: 3000 });
                        this.checked = !this.checked;
                    });
                });
            });
        });
    </script>
    <script>
        // Initializer for the Theme Toggle Icons
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            const themeToggleBtn = document.getElementById('theme-toggle');

            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            themeToggleBtn.addEventListener('click', function() {
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            });
            // Profile dropdown click outside handler
            document.addEventListener('click', function(event) {
                const dropdownBtn = document.getElementById('profile-menu-button');
                const dropdownMenu = document.getElementById('profile-dropdown-menu');
                if (dropdownBtn && dropdownMenu && !dropdownMenu.classList.contains('hidden')) {
                    if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                }
            });
        });

        // ── Profile Dropdown Floating Positioning Logic ────────
        function toggleProfileDropdown(e) {
            if (e) e.stopPropagation();
            const btn = document.getElementById('profile-menu-button');
            const menu = document.getElementById('profile-dropdown-menu');
            if (!menu || !btn) return;
            
            if (menu.classList.contains('hidden')) {
                const rect = btn.getBoundingClientRect();
                menu.style.top = (rect.bottom + 8) + 'px';
                menu.style.right = (Math.max(16, window.innerWidth - rect.right)) + 'px';
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        }

        window.addEventListener('resize', function() {
            const dropdownMenu = document.getElementById('profile-dropdown-menu');
            if (dropdownMenu && !dropdownMenu.classList.contains('hidden')) {
                const btn = document.getElementById('profile-menu-button');
                if (btn) {
                    const rect = btn.getBoundingClientRect();
                    dropdownMenu.style.top = (rect.bottom + 8) + 'px';
                    dropdownMenu.style.right = (Math.max(16, window.innerWidth - rect.right)) + 'px';
                }
            }
        });
    </script>

    <!-- Profile Dropdown Menu (Mounted outside header to guarantee no CSS backdrop-filter or overflow clipping) -->
    <div id="profile-dropdown-menu" class="hidden fixed w-64 rounded-2xl transition-all" style="z-index: 9999999;">
        <div class="profile-dropdown-header py-3 px-4 bg-gray-50 border-b border-gray-100" style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
            <h3 class="font-bold text-gray-900 text-sm">Meu Perfil</h3>
            <p class="text-xs text-gray-500 truncate mt-0.5">{{ Auth::user()->email ?? 'admin@admin.com' }}</p>
        </div>
        <div class="p-2">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn flex items-center gap-3 py-2.5 px-3 rounded-xl hover:bg-red-50 text-red-600 font-semibold text-sm w-full transition-colors cursor-pointer group">
                <iconify-icon icon="solar:logout-2-outline" class="text-xl transition-transform group-hover:translate-x-0.5"></iconify-icon>
                <span>Sair do Sistema</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
    <!-- Quill Rich Text Editor JS -->
    <script src="{{ asset('painel/assets/libs/quill/quill.js') }}"></script>
    <script>
        // ── Automatic Quill Editor Initializer ────────────────
        function initQuillEditors() {
            if (typeof Quill === 'undefined') return;

            const toolbarOptions = [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image'],
                ['clean']
            ];

            const textareas = document.querySelectorAll('textarea.richtext-editor, textarea[data-quill="true"]');
            textareas.forEach(textarea => {
                if (textarea.dataset.quillInitialized === 'true') return;
                
                textarea.dataset.quillInitialized = 'true';
                textarea.style.display = 'none';

                const container = document.createElement('div');
                container.className = 'quill-editor-wrapper';
                textarea.parentNode.insertBefore(container, textarea.nextSibling);

                const quill = new Quill(container, {
                    theme: 'snow',
                    placeholder: textarea.getAttribute('placeholder') || 'Digite o conteúdo aqui...',
                    modules: {
                        toolbar: toolbarOptions
                    }
                });

                // Load initial HTML from textarea
                if (textarea.value && textarea.value.trim() !== '') {
                    quill.clipboard.dangerouslyPasteHTML(textarea.value);
                }

                // Sync back on changes
                quill.on('text-change', () => {
                    const html = quill.root.innerHTML;
                    textarea.value = (html === '<p><br></p>') ? '' : html;
                });

                // Extra safety: Sync on parent form submit
                const form = textarea.closest('form');
                if (form) {
                    form.addEventListener('submit', () => {
                        const html = quill.root.innerHTML;
                        textarea.value = (html === '<p><br></p>') ? '' : html;
                    });
                }
            });
        }

        document.addEventListener('DOMContentLoaded', initQuillEditors);
    </script>
</body>
</html>