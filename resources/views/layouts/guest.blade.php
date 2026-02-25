<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after { box-sizing: border-box; font-family: 'Sora', sans-serif; }

        body {
            margin: 0;
            min-height: 100vh;
            background-color: whitesmoke;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Ambient glow */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 50% at 50% 50%, rgba(201,152,43,0.09) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* Page wrapper */
        .auth-page {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 1.25rem;
        }

        /* Card */
        .auth-card {
            background: #1a1d27;
            border: 1px solid rgba(201,152,43,0.18);
            border-radius: 1.35rem;
            padding: 2.5rem 2.25rem 2.25rem;
            box-shadow:
                0 0 0 1px rgba(255,255,255,0.025) inset,
                0 30px 70px rgba(0,0,0,0.55),
                0 8px 24px rgba(0,0,0,0.3);
            animation: authFadeUp 0.4s cubic-bezier(.22,.68,0,1.15) both;
        }

        @keyframes authFadeUp {
            from { opacity: 0; transform: translateY(16px) scale(0.985); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ── Logo row ── */
        .auth-logo-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }
        .auth-logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #c9982b, #e0b030);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 18px rgba(201,152,43,0.45);
            flex-shrink: 0;
        }
        .auth-logo-text {
            font-size: 1.2rem;
            font-weight: 800;
            color: #c9982b;
            letter-spacing: 0.01em;
        }

        /* ── Headings ── */
        .auth-heading {
            font-size: 1.45rem;
            font-weight: 700;
            color: #e8e2d0;
            margin: 0 0 0.3rem;
            line-height: 1.2;
        }
        .auth-subheading {
            font-size: 0.82rem;
            color: #4a4f6a;
            margin: 0 0 1.75rem;
        }

        /* ── Divider ── */
        .auth-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(201,152,43,0.2), transparent);
            margin: 1.35rem 0;
        }

        /* ── Remember me checkbox ── */
        .auth-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            border: 1.5px solid rgba(201,152,43,0.4);
            border-radius: 4px;
            background: #111320;
            cursor: pointer;
            position: relative;
            flex-shrink: 0;
            transition: all 0.15s;
            vertical-align: middle;
        }
        .auth-checkbox:checked {
            background: #c9982b;
            border-color: #c9982b;
        }
        .auth-checkbox:checked::after {
            content: '';
            position: absolute;
            top: 1px; left: 4px;
            width: 5px; height: 8px;
            border: 2px solid #0f1117;
            border-top: none;
            border-left: none;
            transform: rotate(45deg);
        }

        /* ── Forgot link ── */
        .auth-forgot {
            font-size: 0.8rem;
            color: #c9982b;
            text-decoration: none;
            transition: opacity 0.15s;
        }
        .auth-forgot:hover { opacity: 0.7; text-decoration: underline; }

        /* ── Remember text ── */
        .auth-remember-text {
            font-size: 0.8rem;
            color: #6a7090;
            margin-left: 0.4rem;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="auth-page">
        <div class="auth-card">

            {{-- ── Logo ── --}}
            <div class="auth-logo-row">
                <div class="auth-logo-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#0f1117">
                        <path d="M12 2C12 2 5.5 8.5 5.5 14a6.5 6.5 0 0013 0C18.5 8.5 12 2 12 2z"/>
                    </svg>
                </div>
                <span class="auth-logo-text">{{ config('app.name', 'Dashboard') }}</span>
            </div>

            {{-- ── Page Slot ── --}}
            {{ $slot }}

        </div>
    </div>
</body>
</html>