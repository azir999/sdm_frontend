<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosong Yee!</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <style>
        @keyframes pulse-heboh {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(5);
                opacity: 0.9;
            }
        }
        .animate-pulse-heboh {
            animation: pulse-heboh 2s infinite ease-in-out;
        }


        @keyframes gradient-heboh {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .text-gradient-heboh {
            background-image: linear-gradient(
                to right, 
                #ff00cc, /* Pink Neon */
                #ff3300, /* Oranye Neon */
                #ffff00, /* Kuning Neon */
                #33ff00, /* Hijau Neon */
                #00ccff, /* Biru Muda Neon */
                #3333ff, /* Biru Neon */
                #cc00ff  /* Ungu Neon */
            );
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            background-size: 300% auto;
            animation: gradient-heboh 6s linear infinite;
        }

        @keyframes wobble-heboh {
            0%, 100% { transform: rotate(0deg) translateX(0px) scale(1); }
            15% { transform: rotate(-5deg) translateX(-8px) scale(1.05); }
            30% { transform: rotate(5deg) translateX(8px) scale(1.05); }
            45% { transform: rotate(-3deg) translateX(-5px) scale(1); }
            60% { transform: rotate(3deg) translateX(5px) scale(1); }
            75% { transform: rotate(-1deg) translateX(-2px) scale(1.02); }
        }
        .animate-wobble-heboh {
            display: inline-block;
            animation: wobble-heboh 2.5s infinite ease-in-out;
        }

        .animate-all-heboh {
            animation: 
                pulse-heboh 2s infinite ease-in-out,
                wobble-heboh 2.5s infinite ease-in-out alternate; 
        }

        html, body {
            height: 100%;
            margin: 0;
        }
    </style>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen w-screen overflow-hidden">
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-[250px] font-extrabold text-center text-gradient-heboh animate-all-heboh select-none">
            kosong yee!
        </a>
    </div>
</body>
</html>