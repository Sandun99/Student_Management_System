
<div id="preloader" class="preloader-active">
    <div class="preloader-wrapper">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<style>
    /* Full-screen preloader overlay */
    #preloader {
        position: fixed;
        inset: 0;
        background: #ffffff; /* Change to your brand color if needed */
        z-index: 9999999;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.9s ease-out;
        opacity: 1;
    }

    .preloader-wrapper {
        width: 100px;
        height: 100px;
    }

    /* Ripple Animation – exactly as in your CSS */
    .lds-ripple,
    .lds-ripple div {
        box-sizing: border-box;
    }

    .lds-ripple {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        color: #10b981;
    }

    .lds-ripple div {
        position: absolute;
        border: 4px solid currentColor;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }

    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }

    @keyframes lds-ripple {
        0% {
            top: 36px;
            left: 36px;
            width: 8px;
            height: 8px;
            opacity: 0;
        }
        4.9% {
            top: 36px;
            left: 36px;
            width: 8px;
            height: 8px;
            opacity: 0;
        }
        5% {
            top: 36px;
            left: 36px;
            width: 8px;
            height: 8px;
            opacity: 1;
        }
        100% {
            top: 0;
            left: 0;
            width: 80px;
            height: 80px;
            opacity: 0;
        }
    }

    /* Optional: smaller on mobile */
    @media (max-width: 480px) {
        .preloader-wrapper {
            width: 80px;
            height: 80px;
        }
        .lds-ripple {
            width: 64px;
            height: 64px;
        }
        .lds-ripple div {
            border-width: 3px;
        }
        @keyframes lds-ripple {
            0%, 4.9%, 5% {
                top: 28px;
                left: 28px;
                width: 8px;
                height: 8px;
            }
            100% {
                top: 0;
                left: 0;
                width: 64px;
                height: 64px;
            }
        }
    }
</style>

<script>
    // Hide preloader when page is fully loaded
    window.addEventListener('load', function () {
        const preloader = document.getElementById('preloader');
        // Show at least 1.2 seconds so it doesn't flash
        setTimeout(() => {
            preloader.style.opacity = '0';
            setTimeout(() => preloader.remove(), 400);
        }, 500);
    });
</script>
