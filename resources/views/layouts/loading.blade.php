
<!-- LOADING CSS-->
<style>
    .process-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10000;
    }
    .hidden {
        display: none;
    }
    .loadingImg {
        background-repeat: no-repeat;
        background-position: center;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
    body.no-scroll {
        overflow: hidden !important;
    }

    .dotLoading {
        --uib-size: 70px;
        --uib-color: #171c4a;
        --uib-speed: 1.5s;
        --uib-dot-size: calc(var(--uib-size) * 0.4);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: var(--uib-dot-size);
        width: var(--uib-size);
    }

    .dotLoading::before,
    .dotLoading::after {
        content: "";
        position: absolute;
        height: var(--uib-dot-size);
        width: var(--uib-dot-size);
        border-radius: 50%;
        background-color: var(--uib-color);
        flex-shrink: 0;
        transition: background-color 0.3s ease;
        border: 2px solid white;
    }

    .dotLoading::before {
        animation: orbit var(--uib-speed) linear infinite;
    }

    .dotLoading::after {
        animation: orbit var(--uib-speed) linear calc(var(--uib-speed) / -2)
            infinite;
    }

    @keyframes orbit {
        0% {
            transform: translateX(calc(var(--uib-size) * 0.25)) scale(0.73684);
            opacity: 0.65;
        }
        5% {
            transform: translateX(calc(var(--uib-size) * 0.235)) scale(0.684208);
            opacity: 0.58;
        }
        10% {
            transform: translateX(calc(var(--uib-size) * 0.182)) scale(0.631576);
            opacity: 0.51;
        }
        15% {
            transform: translateX(calc(var(--uib-size) * 0.129)) scale(0.578944);
            opacity: 0.44;
        }
        20% {
            transform: translateX(calc(var(--uib-size) * 0.076)) scale(0.526312);
            opacity: 0.37;
        }
        25% {
            transform: translateX(0%) scale(0.47368);
            opacity: 0.3;
        }
        30% {
            transform: translateX(calc(var(--uib-size) * -0.076)) scale(0.526312);
            opacity: 0.37;
        }
        35% {
            transform: translateX(calc(var(--uib-size) * -0.129)) scale(0.578944);
            opacity: 0.44;
        }
        40% {
            transform: translateX(calc(var(--uib-size) * -0.182)) scale(0.631576);
            opacity: 0.51;
        }
        45% {
            transform: translateX(calc(var(--uib-size) * -0.235)) scale(0.684208);
            opacity: 0.58;
        }
        50% {
            transform: translateX(calc(var(--uib-size) * -0.25)) scale(0.73684);
            opacity: 0.65;
        }
        55% {
            transform: translateX(calc(var(--uib-size) * -0.235)) scale(0.789472);
            opacity: 0.72;
        }
        60% {
            transform: translateX(calc(var(--uib-size) * -0.182)) scale(0.842104);
            opacity: 0.79;
        }
        65% {
            transform: translateX(calc(var(--uib-size) * -0.129)) scale(0.894736);
            opacity: 0.86;
        }
        70% {
            transform: translateX(calc(var(--uib-size) * -0.076)) scale(0.947368);
            opacity: 0.93;
        }
        75% {
            transform: translateX(0%) scale(1);
            opacity: 1;
        }
        80% {
            transform: translateX(calc(var(--uib-size) * 0.076)) scale(0.947368);
            opacity: 0.93;
        }
        85% {
            transform: translateX(calc(var(--uib-size) * 0.129)) scale(0.894736);
            opacity: 0.86;
        }
        90% {
            transform: translateX(calc(var(--uib-size) * 0.182)) scale(0.842104);
            opacity: 0.79;
        }
        95% {
            transform: translateX(calc(var(--uib-size) * 0.235)) scale(0.789472);
            opacity: 0.72;
        }
        100% {
            transform: translateX(calc(var(--uib-size) * 0.25)) scale(0.73684);
            opacity: 0.65;
        }
    }

    @keyframes ellipsis {
        0% {
            content: "";
        }
        25% {
            content: ".";
        }
        50% {
            content: "..";
        }
        75% {
            content: "...";
        }
        100% {
            content: "....";
        }
    }

    .textLoading::after {
        content: "";
        animation: ellipsis 2s infinite steps(1, end);
    }

</style>
<!-- Loading -->
<div class="process-container hidden" id="processing">
    <div class="row">
        <div class="col-12 text-center d-flex justify-content-center align-items-center"><div class="dotLoading"></div></div>
        <div class="col-12 text-center d-flex justify-content-center align-items-center mt-4"><h4 class="text-white textLoading">Please Wait</h4></div>
    </div>
</div>