<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found | EDUcore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: #050505; 
            color: #fff; 
            overflow: hidden; /* Scrollbars hide karne ke liye */
            margin: 0; 
        }
        
        /* Subtle Grid Background */
        .bg-grid {
            background-image: 
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), 
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* Ambient Glowing Orbs */
        .orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.4; pointer-events: none; }
        .orb-1 { width: 50vw; height: 50vw; background: #4f46e5; top: -20%; left: -10%; }
        .orb-2 { width: 40vw; height: 40vw; background: #9333ea; bottom: -20%; right: -10%; }

        /* --- 3D PARALLAX MAGIC CLASSES --- */
        .scene {
            width: 100vw; 
            height: 100vh;
            /* Perspective batata hai ke hum 3D space mein kitna door hain */
            perspective: 1200px; 
            display: flex; 
            justify-content: center; 
            align-items: center;
        }

        .parallax-wrapper {
            transform-style: preserve-3d; /* Children ko 3D space mein rehne ki ijazat deta hai */
            /* JS isko mouse ke hisaab se rotate karegi */
            transition: transform 0.1s ease-out; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .giant-404 {
            /* MASSIVE TEXT SIZE */
            font-size: clamp(150px, 35vw, 450px);
            font-weight: 900; 
            line-height: 0.8;
            letter-spacing: -0.05em;
            
            /* Transparent text with stroke */
            background: linear-gradient(180deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.01) 100%);
            -webkit-background-clip: text; 
            background-clip: text; 
            color: transparent;
            -webkit-text-stroke: 2px rgba(255,255,255,0.08);
            
            /* Yeh Z-axis par aage aata hai (Popping out effect) */
            transform: translateZ(80px); 
            user-select: none;
        }

        .text-content {
            /* Yeh thora peeche rehta hai */
            transform: translateZ(40px);
            text-align: center;
            margin-top: -2rem;
            z-index: 10;
        }

        /* Buttons Styling */
        .btn-glow { transition: all 0.3s ease; }
        .btn-glow:hover { 
            box-shadow: 0 10px 30px -10px rgba(99, 102, 241, 0.6); 
            transform: translateY(-3px) translateZ(50px); /* Hover par thora aur 3D feel */
        }
    </style>
</head>
<body class="bg-grid">
    
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="scene" id="scene">
        
        <div class="parallax-wrapper" id="parallax-content">
            
            <div class="giant-404">404</div>
            
            <div class="text-content">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 text-gray-300 font-medium text-sm tracking-widest uppercase mb-6 backdrop-blur-md">
                    <span class="iconify text-indigo-400" data-icon="lucide:radar" data-width="16"></span>
                    Signal Lost
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 tracking-tight text-white">
                    Page Not Found
                </h1>
                
                <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-12 leading-relaxed font-light">
                    The page you are looking for has been moved, renamed, or might have never existed. Let's get you back to familiar territory.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/dashboard') }}" class="btn-glow bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-4 rounded-xl font-semibold flex items-center justify-center gap-3">
                        <span class="iconify" data-icon="lucide:layout-dashboard" data-width="20"></span> 
                        Go to Dashboard
                    </a>
                    
                    <a href="javascript:history.back()" class="btn-glow bg-white/5 border border-white/10 text-white px-8 py-4 rounded-xl font-semibold flex items-center justify-center gap-3 backdrop-blur-md hover:bg-white/10">
                        <span class="iconify" data-icon="lucide:arrow-left" data-width="20"></span> 
                        Go Back
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        const scene = document.getElementById('scene');
        const content = document.getElementById('parallax-content');

        // Jab mouse screen par move ho
        scene.addEventListener('mousemove', (e) => {
            // Screen ke center se mouse ka fasla calculate karein
            // '25' ka number effect ki speed hai. Number chota karenge toh zyada tezi se hilega.
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;

            // Element ko X aur Y axis par rotate kar dein
            content.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        // Jab mouse screen se bahar chala jaye toh sab original jagah par wapis le aao
        scene.addEventListener('mouseleave', () => {
            content.style.transition = 'transform 0.5s ease';
            content.style.transform = `rotateY(0deg) rotateX(0deg)`;
        });
        
        // Jab mouse wapis screen par aaye toh smooth movement shuru ho
        scene.addEventListener('mouseenter', () => {
            content.style.transition = 'transform 0.1s ease-out';
        });
    </script>
</body>
</html>