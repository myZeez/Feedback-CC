<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050827">
    <title>@yield('title', 'Feedback Cellcom Palangkaraya')</title>
    <style>
        :root {
            --blue-950: #06123d;
            --blue-900: #0a1d5a;
            --blue-700: #0b5fd3;
            --blue-500: #1f8cff;
            --sky-100: #e9f8ff;
            --sky-50: #f7fcff;
            --white: #ffffff;
            --ink: #07112f;
            --muted: #66708a;
            --danger: #c2410c;
            --success: #047857;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--white);
            background:
                radial-gradient(circle at 70% 24%, rgba(37, 99, 235, 0.44), transparent 16rem),
                radial-gradient(circle at 34% 50%, rgba(168, 85, 247, 0.28), transparent 17rem),
                linear-gradient(180deg, #050827 0%, #07104a 34%, #073683 62%, #050827 100%);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        textarea {
            font: inherit;
        }

        .page-shell {
            min-height: 100vh;
            overflow: hidden;
        }

        .container {
            width: min(100% - 32px, 980px);
            margin-inline: auto;
        }

        .hero {
            padding: 56px 0 0;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            color: #c9d7ff;
            font-size: 0.82rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: linear-gradient(135deg, #22c7ff, #0b5fd3);
            box-shadow: 0 0 0 6px rgba(34, 199, 255, 0.16);
        }

        .hero h1 {
            max-width: 760px;
            margin: 0;
            color: var(--white);
            font-size: clamp(2.45rem, 9vw, 5.3rem);
            line-height: 0.98;
            letter-spacing: 0;
        }

        .hero-copy {
            max-width: 690px;
            margin: 22px 0 0;
            color: #c9d7ff;
            font-size: 1.02rem;
            font-weight: 600;
            line-height: 1.65;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 34px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0 22px;
            border: 0;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 800;
            transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease;
        }

        .button:hover {
            transform: translateY(-1px);
        }

        .button-primary {
            color: #050827;
            background: var(--white);
            box-shadow: 0 18px 36px rgba(0, 0, 0, 0.22);
        }

        .button-light {
            color: var(--white);
            background: rgba(255, 255, 255, 0.10);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.20);
            backdrop-filter: blur(12px);
        }

        .review-stage {
            position: relative;
            margin-top: 76px;
            max-height: 520px;
            padding: 14px;
            border: 1px solid rgba(255, 255, 255, 0.20);
            border-radius: 24px 24px 0 0;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0.04)),
                radial-gradient(circle at 52% 12%, rgba(255, 255, 255, 0.22), transparent 15rem);
            box-shadow: 0 26px 90px rgba(0, 0, 0, 0.36);
            backdrop-filter: blur(18px);
            isolation: isolate;
            overflow: hidden;
            transition: max-height 320ms ease, padding-bottom 320ms ease;
        }

        .review-stage.is-open {
            max-height: 1600px;
            overflow: visible;
        }

        .review-stage::after {
            position: absolute;
            inset: auto 0 0;
            z-index: 2;
            height: 46%;
            content: "";
            pointer-events: none;
            background: linear-gradient(180deg, rgba(5, 8, 39, 0), rgba(5, 8, 39, 0.72) 66%, #050827 100%);
        }

        .review-stage.is-open::after {
            display: none;
        }

        .preview-cta {
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 4;
            min-height: 58px;
            padding-inline: 22px;
            border-radius: 999px;
            transform: translate(-50%, -50%);
            color: var(--white);
            background: rgba(8, 10, 21, 0.90);
            box-shadow: 0 16px 38px rgba(0, 0, 0, 0.38);
            white-space: nowrap;
        }

        .review-stage.is-open .preview-cta {
            display: none;
        }

        .preview-cta::before {
            display: grid;
            width: 34px;
            height: 34px;
            margin-right: 10px;
            border-radius: 999px;
            place-items: center;
            content: ">";
            color: #050827;
            background: var(--white);
            font-size: 0.9rem;
        }

        .form-card,
        .admin-card {
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 22px 80px rgba(6, 18, 61, 0.18);
            overflow: hidden;
        }

        .form-card-inner {
            padding: 24px;
        }

        .review-stage .form-card {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin-inline: auto;
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.28);
        }

        .section-title {
            margin: 0;
            color: var(--ink);
            font-size: 1.55rem;
            line-height: 1.15;
        }

        .section-note {
            margin: 10px 0 0;
            color: var(--muted);
            line-height: 1.55;
        }

        .form-grid {
            display: grid;
            gap: 16px;
            margin-top: 24px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            color: #223154;
            font-size: 0.9rem;
            font-weight: 800;
        }

        .field input,
        .field textarea {
            width: 100%;
            border: 1px solid #dce8f8;
            border-radius: 8px;
            background: #fbfdff;
            color: var(--ink);
            outline: none;
            padding: 14px 15px;
            transition: border 180ms ease, box-shadow 180ms ease, background 180ms ease;
        }

        .field textarea {
            min-height: 142px;
            resize: vertical;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: var(--blue-500);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(31, 140, 255, 0.14);
        }

        .rating-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
        }

        .rating-row input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .rating-row span {
            display: grid;
            min-height: 46px;
            place-items: center;
            border: 1px solid #dce8f8;
            border-radius: 8px;
            background: #fbfdff;
            color: #1a2c54;
            cursor: pointer;
            font-weight: 900;
            transition: background 180ms ease, color 180ms ease, border 180ms ease;
        }

        .rating-row input:checked + span {
            border-color: var(--blue-700);
            color: var(--white);
            background: linear-gradient(135deg, #0b5fd3, #22a8ff);
        }

        .privacy-note {
            margin: 2px 0 0;
            color: #4c5875;
            font-size: 0.92rem;
            line-height: 1.5;
        }

        .error-list,
        .status {
            margin: 0 0 18px;
            border-radius: 8px;
            padding: 13px 14px;
            line-height: 1.45;
        }

        .error-list {
            color: var(--danger);
            background: #fff7ed;
        }

        .status {
            color: var(--success);
            background: #ecfdf5;
            font-weight: 700;
        }

        .admin-page {
            padding: 28px 0 48px;
        }

        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
            color: var(--white);
        }

        .admin-header h1 {
            margin: 0;
            font-size: 2rem;
            line-height: 1.05;
        }

        .admin-header p {
            margin: 8px 0 0;
            color: rgba(255, 255, 255, 0.78);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 14px;
        }

        .stat {
            border-radius: 10px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 18px 54px rgba(6, 18, 61, 0.16);
        }

        .stat strong {
            display: block;
            font-size: 1.65rem;
        }

        .stat span {
            color: var(--muted);
            font-size: 0.88rem;
            font-weight: 700;
        }

        .feedback-list {
            display: grid;
            gap: 12px;
            padding: 14px;
        }

        .feedback-item {
            border: 1px solid #e2ecf8;
            border-radius: 10px;
            padding: 16px;
            background: #fbfdff;
        }

        .feedback-meta {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            color: var(--muted);
            font-size: 0.86rem;
        }

        .feedback-item h2 {
            margin: 4px 0 8px;
            font-size: 1rem;
        }

        .feedback-item p {
            margin: 0;
            color: #233253;
            line-height: 1.55;
            white-space: pre-line;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 6px 10px;
            color: var(--white);
            background: linear-gradient(135deg, #0b5fd3, #22a8ff);
            font-size: 0.82rem;
            font-weight: 900;
            white-space: nowrap;
        }

        .empty-state {
            padding: 36px 18px;
            color: var(--muted);
            text-align: center;
        }

        .pagination {
            padding: 0 14px 16px;
        }

        @media (min-width: 760px) {
            .hero {
                padding-top: 78px;
            }

            .form-card-inner {
                padding: 34px;
            }

            .form-grid.two {
                grid-template-columns: repeat(2, 1fr);
            }

            .review-stage {
                max-height: 560px;
                padding: 28px;
            }

            .review-stage.is-open {
                max-height: 1500px;
            }

            .preview-cta {
                min-height: 64px;
                padding-inline: 28px;
                font-size: 1.1rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="page-shell">
        @yield('body')
    </div>
    @stack('scripts')
</body>
</html>
