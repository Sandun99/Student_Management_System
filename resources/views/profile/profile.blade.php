<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Rivera - Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <style>
        :root {
            --bg: #0a0a0a;
            --card: rgba(25,25,35,0.9);
            --text: #ffffff;
            --text2: #b0b0b0;
            --accent: #b388ff;
            --accent2: #ff80ab;
            --glow: rgba(179,136,255,0.5);
        }
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Space Grotesk',sans-serif; }
        body {
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-y: auto;
            position: relative;
            perspective: 1000px;
        }

        /* PARALLAX LAYERS */
        .parallax-bg {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, #1a0033, #000), url('https://images.unsplash.com/photo-1550745162-2a4d8ab0d3a9?w=1920') center/cover;
            filter: brightness(0.35) contrast(1.4);
            z-index: -3;
        }
        .parallax-layer1 {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at 50% 50%, rgba(179,136,255,0.08), transparent 70%);
            z-index: -2;
        }

        /* Floating Particles */
        .particles {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
            z-index: 0;
        }
        .particle {
            position: absolute;
            background: radial-gradient(circle, rgba(179,136,255,0.4) 0%, transparent 70%);
            border-radius: 50%;
            opacity: 0;
        }

        /* Mouse Glow Cursor */
        .cursor-glow {
            position: fixed;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(179,136,255,0.12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s;
        }

        /* Back to Dashboard */
        .back-button {
            position: fixed;
            top: 20px; left: 20px;
            width: 50px; height: 50px;
            background: rgba(30,30,40,0.8);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; box-shadow: 0 8px 25px rgba(0,0,0,0.4), 0 0 30px var(--glow);
            border: 2px solid rgba(179,136,255,0.4);
            z-index: 999; transition: all 0.3s;
        }
        .back-button:hover { transform: scale(1.1); }
        .back-icon { width: 28px; height: 28px; fill: var(--accent); }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 120px 20px 80px;
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 40px;
            position: relative;
            z-index: 2;
        }

        /* LEFT — PROFILE + COMMENTS */
        .profile-card {
            background: var(--card);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            overflow: hidden;
            border: 1px solid rgba(179,136,255,0.3);
            box-shadow: 0 30px 80px rgba(0,0,0,0.6), 0 0 60px var(--glow);
            position: relative;
            opacity: 0;
            transform: translateY(100px) rotateX(-15deg);
        }
        .card-glow {
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle at var(--x,50%) var(--y,50%), rgba(179,136,255,0.2) 0%, transparent 60%);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s;
            z-index: 0;
        }
        .profile-card:hover .card-glow { opacity: 1; }

        .banner {
            height: 220px;
            background: linear-gradient(45deg, #6e3bff, #ff6bcb), url('https://images.unsplash.com/photo-1557682250-33bd709cbe85?w=1600') center/cover;
            position: relative;
        }
        .banner-edit {
            position: absolute; bottom: 16px; right: 20px;
            background: rgba(0,0,0,0.7); padding: 10px 18px;
            border-radius: 12px; font-size: 14px; cursor: pointer;
            backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);
            opacity: 0; transition: 0.3s;
        }
        .banner:hover .banner-edit { opacity: 1; }

        .avatar-container {
            position: relative;
            margin: -80px auto 20px;
            width: 160px; height: 160px;
        }
        .avatar {
            width: 100%; height: 100%;
            border-radius: 50%;
            border: 8px solid var(--card);
            object-fit: cover;
            box-shadow: 0 0 50px var(--glow);
        }
        .avatar-edit {
            position: absolute; bottom: 10px; right: 10px;
            background: var(--accent); width: 40px; height: 40px;
            border-radius: 50%; display: flex; align-items:center; justify-content:center;
            cursor: pointer; opacity: 0; transition: 0.3s;
        }
        .avatar-container:hover .avatar-edit { opacity: 1; }

        .info { text-align: center; padding: 0 40px 40px; position: relative; z-index: 2; }
        .name {
            font-size: 42px; font-weight: 700; margin-bottom: 8px;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            opacity: 0;
        }
        .title { font-size: 19px; color: var(--text2); margin-bottom: 16px; opacity: 0; }
        .bio { font-size: 16px; line-height: 1.8; color: var(--text2); margin-bottom: 32px; opacity: 0; }

        /* PULSING EDIT PROFILE BUTTON */
        .edit-profile-btn {
            display: block;
            margin: 30px auto 40px;
            padding: 20px 56px;
            background: linear-gradient(135deg, #b388ff, #ff80ab);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 19px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            box-shadow: 0 10px 30px rgba(179,136,255,0.5);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: scale(0.8);
        }
        .edit-profile-btn::before {
            content: ''; position: absolute; top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: 0.7s;
        }
        .edit-profile-btn:hover::before { left: 100%; }
        .edit-profile-btn:hover {
            transform: translateY(-6px) scale(1.05);
        }

        .actions {
            display: flex; gap: 14px; justify-content: center; margin-bottom: 32px;
            opacity: 0;
        }
        .btn {
            padding: 14px 32px; border-radius: 14px; font-weight: 600;
            cursor: pointer; transition: all 0.3s; font-size: 15px;
            display: flex; align-items: center; gap: 8px;
        }
        .btn-follow { background: var(--accent); color: white; }
        .btn-follow:hover { background: #c19bff; transform: translateY(-4px); }
        .btn-like { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); }
        .btn-like:hover { background: rgba(255,255,255,0.2); }
        .btn-message { background: transparent; border: 1px solid var(--accent); color: var(--accent); }
        .btn-message:hover { background: rgba(179,136,255,0.2); }

        .socials {
            display: flex; gap: 18px; justify-content: center;
            opacity: 0;
        }
        .socials a {
            width: 56px; height: 56px; background: rgba(255,255,255,0.08);
            border-radius: 50%; display: flex; align-items:center; justify-content:center;
            transition: all 0.4s;
        }
        .socials a:hover { background: var(--accent); transform: translateY(-8px) scale(1.15); }

        /* COMMENTS */
        .comments {
            margin-top: 40px;
            background: rgba(30,30,40,0.6);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            padding: 32px;
            border: 1px solid rgba(179,136,255,0.2);
            opacity: 0;
            transform: translateY(60px);
        }
        .comment {
            display: flex; gap: 16px; padding: 16px 0; border-bottom: 1px solid rgba(255,255,255,0.05);
            opacity: 0;
            transform: translateX(-50px);
        }
        .comment:last-child { border-bottom: none; }
        .comment-avatar { width: 44px; height: 44px; border-radius: 50%; object-fit: cover; }
        .comment-name { font-weight: 600; font-size: 15px; }
        .comment-time { font-size: 12px; color: var(--text2); margin-bottom: 6px; }
        .comment-text { font-size: 14px; color: var(--text2); line-height: 1.6; }

        /* RIGHT PANELS */
        .right { display: flex; flex-direction: column; gap: 28px; }
        .panel {
            background: rgba(30,30,40,0.7);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            padding: 28px;
            border: 1px solid rgba(179,136,255,0.2);
            opacity: 0;
            transform: translateY(80px) rotateY(20deg);
        }
        .panel h3 { font-size: 16px; color: var(--accent); margin-bottom: 20px;
            text-transform: uppercase; letter-spacing: 2px; }

        .stats-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .stat-num { font-size: 38px; font-weight: 700;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .stat-label { font-size: 13px; color: var(--text2); text-transform: uppercase; letter-spacing: 1px; }

        .skills { display: flex; flex-wrap: wrap; gap: 12px; }
        .skill { background: rgba(179,136,255,0.15); color: var(--accent);
            padding: 10px 18px; border-radius: 30px; font-size: 14px; font-weight: 500; }

        .connect-links a {
            display: flex; align-items: center; gap: 14px;
            padding: 14px 16px;
            background: rgba(255,255,255,0.05);
            border-radius: 12px;
            color: var(--text2);
            text-decoration: none;
            margin-bottom: 12px;
            transition: all 0.3s;
            opacity: 0;
            transform: translateX(-30px);
        }
        .connect-links a:hover {
            background: rgba(179,136,255,0.15);
            color: white;
            transform: translateX(8px);
        }
        .connect-links svg { width: 22px; height: 22px; fill: currentColor; }

        @media (max-width: 1100px) {
            .container { grid-template-columns: 1fr; padding-top: 80px; }
            .right { order: -1; }
        }
    </style>
</head>
<body>

<!-- PARALLAX LAYERS -->
<div class="parallax-bg"></div>
<div class="parallax-layer1"></div>

<!-- Floating Particles -->
<div class="particles" id="particles"></div>

<div class="cursor-glow"></div>

<!-- Back to Dashboard -->
<a href="/dashboard">
    <div class="back-button" title="Back to Dashboard">
        <svg viewBox="0 0 24 24" class="back-icon">
            <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" fill="currentColor"/>
        </svg>
    </div>
</a>

<div class="container">
    <!-- LEFT: PROFILE + COMMENTS -->
    <div>
        <div class="profile-card">
            <div class="card-glow"></div>
            <div class="banner">
                <div class="banner-edit">Change Banner</div>
            </div>
            <div class="avatar-container">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600" alt="Alex" class="avatar">
                <div class="avatar-edit">Edit</div>
            </div>
            <div class="info">
                <h1 class="name">Alex Rivera</h1>
                <p class="title">@alexdev • Full Stack Developer & Designer</p>
                <p class="bio">
                    Building pixel-perfect, blazing-fast web apps with Laravel, Vue, and modern tools.
                    Obsessed with dark themes, smooth animations, and clean code.
                    Open for freelance & remote roles.
                </p>

                <button class="edit-profile-btn">Edit Profile</button>

                <div class="actions">
                    <div class="btn btn-follow">Follow <small>(12.4k)</small></div>
                    <div class="btn btn-like">Like <small>(3.2k)</small></div>
                    <div class="btn btn-message">Message</div>
                </div>

                <div class="socials">
                    <a href="#"><svg viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932L18.901 1.153Z" fill="#fff"/></svg></a>
                    <a href="#"><svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.332.33-.678.33l.36-3.1 5.64-5.09c.252-.231-.054-.358-.384-.134l-6.97 4.393-3.002-.936c-.652-.204-.667-.652.136-.973l11.733-4.522c.548-.198 1.025.128.845.97z" fill="#fff"/></svg></a>
                    <a href="#"><svg viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0c-.164-.386-.398-.875-.608-1.25a19.736 19.736 0 0 0-5.668 1.517c-3.11 4.677-3.963 9.21-3.544 13.677a19.839 19.839 0 0 0 6.002 3.03c.487-.688.92-1.415 1.225-1.993a13.107 13.107 0 0 1-1.872-.892c.156-.114.31-.234.46-.354c3.928 1.793 8.18 1.793 12.062 0c.15.12.304.24.46.354a13.107 13.107 0 0 1-1.872.892c.305.578.738 1.305 1.225 1.993a19.839 19.839 0 0 0 6.002-3.03c.419-4.467-.434-8.999-3.544-13.677z" fill="#fff"/></svg></a>
                </div>
            </div>
        </div>

        <!-- COMMENTS -->
        <div class="comments">
            <h3>Comments (7)</h3>
            <div class="comment">
                <img src="https://i.pravatar.cc/150?img=1" class="comment-avatar">
                <div class="comment-body">
                    <div class="comment-name">Sarah Chen</div>
                    <div class="comment-time">2 hours ago</div>
                    <div class="comment-text">This profile is pure art. The glow is insane!</div>
                </div>
            </div>
            <div class="comment">
                <img src="https://i.pravatar.cc/150?img=2" class="comment-avatar">
                <div class="comment-body">
                    <div class="comment-name">Mike Torres</div>
                    <div class="comment-time">5 hours ago</div>
                    <div class="comment-text">Available for freelance? Got a big project</div>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT: PANELS -->
    <div class="right">
        <div class="panel">
            <h3>Stats</h3>
            <div class="stats-grid">
                <div><div class="stat-num">127</div><div class="stat-label">Projects</div></div>
                <div><div class="stat-num">8.7</div><div class="stat-label">Years</div></div>
                <div><div class="stat-num">42.1k</div><div class="stat-label">Followers</div></div>
                <div><div class="stat-num">99.9%</div><div class="stat-label">Satisfaction</div></div>
            </div>
        </div>

        <div class="panel">
            <h3>Tech Stack</h3>
            <div class="skills">
                <div class="skill">Laravel</div><div class="skill">Vue 3</div><div class="skill">Livewire</div>
                <div class="skill">Tailwind</div><div class="skill">Alpine.js</div><div class="skill">Figma</div>
            </div>
        </div>

        <div class="panel">
            <h3>Connect With Me</h3>
            <div class="connect-links">
                <a href="#" target="_blank"><svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm3.167 7.555h-1.333c-.417 0-.667.25-.667.75v1.445h2l-.25 2.25h-1.75v6h-2.5v-6h-1.5v-2.25h1.5V9.75c0-1.417 1-2.25 2.5-2.25h1.5v1.305z" fill="currentColor"/></svg> Facebook</a>
                <a href="#" target="_blank"><svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.5 13.5h-1.25v-1.25h-1.25v1.25h-1.25v1.25h1.25v1.25h1.25v-1.25h1.25v-1.25zm-5-4.5c-1.417 0-2.5 1.083-2.5 2.5s1.083 2.5 2.5 2.5c1.417 0 2.5-1.083 2.5-2.5s-1.083-2.5-2.5-2.5zm0 4c-.833 0-1.5-.667-1.5-1.5s.667-1.5 1.5-1.5 1.5.667 1.5 1.5-.667 1.5-1.5 1.5z" fill="currentColor"/></svg> Google+</a>
                <a href="#" target="_blank"><svg viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932L18.901 1.153Z" fill="currentColor"/></svg> X (Twitter)</a>
                <a href="#" target="_blank"><svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.332.33-.678.33l.36-3.1 5.64-5.09c.252-.231-.054-.358-.384-.134l-6.97 4.393-3.002-.936c-.652-.204-.667-.652.136-.973l11.733-4.522c.548-.198 1.025.128.845.97z" fill="currentColor"/></svg> Telegram</a>
                <a href="#" target="_blank"><svg viewBox="0 0 24 24"><path d="M12.04 2C6.47 2 2 6.47 2 12.04c0 2.18.71 4.2 1.92 5.84l-1.25 4.58 4.7-1.23c1.58 1.03 3.47 1.61 5.5 1.61 5.57 0 10.04-4.47 10.04-10.04S17.61 2 12.04 2zm6.2 13.78c-.28.79-1.65 1.46-2.3 1.54-.94.12-2.18.08-3.6-.76-2.08-1.23-3.43-4.08-3.53-4.27-.1-.19-1.04-1.82-.92-2.6.11-.73.66-.97 1.15-1.14.16-.06.35-.07.53-.02.18.05.29.18.35.31.07.14.19.48.15.61-.04.13-.08.28-.05.41.03.13.17.53.37.96.2.43.43.8.71 1.15.28.35.59.66.95.91.36.25.76.44 1.2.55.44.11.88.06 1.19-.1.31-.16.68-.48 1.01-.87.33-.39.66-.37 1.1-.25.44.12 1.87.79 2.2.93.33.14.55.21.63.33.08.12.08.7-.2 1.39z" fill="currentColor"/></svg> WhatsApp</a>
            </div>
        </div>
    </div>
</div>

<script>
    // GSAP + ScrollTrigger Animations
    gsap.registerPlugin(ScrollTrigger);

    // Parallax Backgrounds
    gsap.to(".parallax-bg", {
        yPercent: -50,
        ease: "none",
        scrollTrigger: {
            trigger: ".parallax-bg",
            start: "top top",
            end: "bottom top",
            scrub: true
        }
    });

    gsap.to(".parallax-layer1", {
        yPercent: -30,
        ease: "none",
        scrollTrigger: {
            trigger: ".parallax-layer1",
            start: "top top",
            end: "bottom top",
            scrub: true
        }
    });

    // Profile Card Entrance
    gsap.to(".profile-card", {
        opacity: 1,
        y: 0,
        rotationX: 0,
        duration: 1.4,
        ease: "back.out(1.4)",
        scrollTrigger: {
            trigger: ".profile-card",
            start: "top 80%",
        }
    });

    // Text Animations
    gsap.timeline({
        scrollTrigger: {
            trigger: ".info",
            start: "top 80%",
        }
    })
        .to(".name", { opacity: 1, y: 0, duration: 1, ease: "power3.out" }, 0.3)
        .to(".title", { opacity: 1, y: 0, duration: 1, ease: "power3.out" }, 0.5)
        .to(".bio", { opacity: 1, y: 0, duration: 1, ease: "power3.out" }, 0.7)
        .to(".edit-profile-btn", { opacity: 1, scale: 1, duration: 1, ease: "elastic.out(1, 0.5)" }, 1.2)
        .to(".actions", { opacity: 1, y: 0, duration: 1, stagger: 0.1 }, 1.5)
        .to(".socials", { opacity: 1, y: 0, duration: 1, stagger: 0.1 }, 1.7);

    // Comments
    gsap.to(".comments", {
        opacity: 1,
        y: 0,
        duration: 1.2,
        ease: "power3.out",
        scrollTrigger: {
            trigger: ".comments",
            start: "top 85%",
        }
    });

    gsap.to(".comment", {
        opacity: 1,
        x: 0,
        duration: 0.8,
        stagger: 0.2,
        ease: "power2.out",
        scrollTrigger: {
            trigger: ".comments",
            start: "top 80%",
        }
    });

    // Right Panels
    gsap.to(".panel", {
        opacity: 1,
        y: 0,
        rotationY: 0,
        duration: 1.2,
        stagger: 0.2,
        ease: "back.out(1.4)",
        scrollTrigger: {
            trigger: ".right",
            start: "top 80%",
        }
    });

    gsap.to(".connect-links a", {
        opacity: 1,
        x: 0,
        duration: 0.8,
        stagger: 0.15,
        ease: "power2.out",
        scrollTrigger: {
            trigger: ".connect-links",
            start: "top 90%",
        }
    });

    // Floating Particles
    const particlesContainer = document.getElementById('particles');
    for (let i = 0; i < 40; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        const size = Math.random() * 80 + 20;
        const duration = Math.random() * 20 + 15;
        const delay = Math.random() * 15;
        const left = Math.random() * 100;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${left}vw`;
        particlesContainer.appendChild(particle);

        gsap.to(particle, {
            y: -window.innerHeight - 100,
            opacity: 0.6,
            duration: duration,
            delay: delay,
            ease: "none",
            repeat: -1,
            yoyo: false
        });
    }

    // Cursor glow
    document.addEventListener('mousemove', (e) => {
        gsap.to('.cursor-glow', {
            x: e.clientX,
            y: e.clientY,
            opacity: 1,
            duration: 0.6,
            ease: "power2.out"
        });
    });

    // Card glow
    document.querySelector('.profile-card').addEventListener('mousemove', (e) => {
        const rect = e.currentTarget.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        e.currentTarget.querySelector('.card-glow').style.cssText = `--x:${x}%;--y:${y}%`;
    });
</script>
</body>
</html>
