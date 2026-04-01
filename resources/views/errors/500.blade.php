<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 — Server Error | EDUcore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: #050505; 
            color: #fff; 
            overflow: hidden; 
            margin: 0; 
        }
        
        .bg-grid {
            background-image: 
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), 
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.4; pointer-events: none; }
        .orb-1 { width: 50vw; height: 50vw; background: #e11d48; top: -20%; left: -10%; } /* Rose/Red */
        .orb-2 { width: 40vw; height: 40vw; background: #be185d; bottom: -20%; right: -10%; } /* Pink */

        .scene {
            width: 100vw; height: 100vh;
            perspective: 1200px; 
            display: flex; justify-content: center; align-items: center;
        }

        .parallax-wrapper {
            transform-style: preserve-3d; 
            transition: transform 0.1s ease-out; 
            display: flex; flex-direction: column; align-items: center;
        }

        .giant-500 {
            font-size: clamp(150px, 35vw, 450px);
            font-weight: 900; line-height: 0.8; letter-spacing: -0.05em;
            background: linear-gradient(180deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.01) 100%);
            -webkit-background-clip: text; background-clip: text; color: transparent;
            -webkit-text-stroke: 2px rgba(255,255,255,0.08);
            transform: translateZ(80px); 
            user-select: none;
        }

        .text-content {
            transform: translateZ(40px);
            text-align: center; margin-top: -2rem; z-index: 10;
        }

        .btn-glow { transition: all 0.3s ease; }
        .btn-glow:hover { 
            box-shadow: 0 10px 30px -10px rgba(225, 29, 72, 0.6); 
            transform: translateY(-3px) translateZ(50px); 
        }
    </style>
</head>
<body class="bg-grid">
    
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="scene" id="scene">
        <div class="parallax-wrapper" id="parallax-content">
            
            <div class="giant-500">500</div>
            
            <div class="text-content">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 text-gray-300 font-medium text-sm tracking-widest uppercase mb-6 backdrop-blur-md">
                    <span class="iconify text-rose-500 animate-spin-slow" data-icon="lucide:server-crash" data-width="16"></span>
                    System Meltdown
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 tracking-tight text-white">
                    Server Error
                </h1>
                
                <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-12 leading-relaxed font-light">
                    An unexpected error occurred while processing your request. Our engineering team has been notified and is working to fix it.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="javascript:location.reload()" class="btn-glow bg-rose-600 hover:bg-rose-500 text-white px-8 py-4 rounded-xl font-semibold flex items-center justify-center gap-3">
                        <span class="iconify" data-icon="lucide:rotate-cw" data-width="20"></span> 
                        Refresh Page
                    </a>
                    
                    <a href="{{ url('/dashboard') }}" class="btn-glow bg-white/5 border border-white/10 text-white px-8 py-4 rounded-xl font-semibold flex items-center justify-center gap-3 backdrop-blur-md hover:bg-white/10">
                        <span class="iconify" data-icon="lucide:layout-dashboard" data-width="20"></span> 
                        Go to Dashboard
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        const scene = document.getElementById('scene');
        const content = document.getElementById('parallax-content');

        scene.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            content.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });

        scene.addEventListener('mouseleave', () => {
            content.style.transition = 'transform 0.5s ease';
            content.style.transform = `rotateY(0deg) rotateX(0deg)`;
        });
        
        scene.addEventListener('mouseenter', () => {
            content.style.transition = 'transform 0.1s ease-out';
        });
    </script>
</body>
</html>