@extends('layouts.main')
@section('content')
    <style>
        #arm1 {
            animation: arm 5s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;


        }

        #shoulder1 {
            animation: arm 5s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes arm {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(8deg);
            }
        }

        #shoulder2 {
            animation: arm2 3s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        #arm2 {
            animation: arm2 3s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes arm2 {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(6deg);
            }
        }

        #hair {
            animation: hair 2s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes hair {
            from {
                transform: rotateZ(-4deg);
            }

            to {
                transform: rotateZ(-6deg);
            }
        }

        #head {
            animation: head 2s ease-in-out infinite alternate;
            transform-origin: bottom;
            transform-box: fill-box;
        }

        #neck {
            animation: head 2s ease-in-out infinite alternate;
            transform-origin: bottom;
            transform-box: fill-box;
        }

        @keyframes head {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(-2deg);
            }
        }

        #skirt {
            animation: skirt 3s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes skirt {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(-2deg);
            }
        }

        #back {
            transition: all 1s ease-in-out;
        }

        #back:hover {
            transform: scale(105%) rotateZ(1deg);
        }

        #phone {
            animation: phone 3s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes phone {
            from {
                transform: scale(95%);
            }

            to {
                transform: scale(100%);
            }
        }

        #kecap {
            animation: kecap 6s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        #egg {
            animation: kecap 6s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        @keyframes kecap {
            from {
                transform: rotateZ(-10deg);
            }

            to {
                transform: rotateZ(20deg);
            }
        }

        #Bookmarkbar {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        #Bookmarkbar_2 {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;

        }

        #Printerbar {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        #Printerbar_2 {
            animation: bar 1s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes bar {
            from {
                transform: scale(100%);
            }

            to {
                transform: scale(110%);
            }
        }
    </style>
    <div class="mx-6 my-14 bg-white p-10  shadow-lg rounded-lg">
        @if (session()->has('loginError'))
            <div class="alert alert-error shadow-none rounded-lg transition-all">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ session('loginError') }}</span>
                </div>
            </div>
        @endif
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-5">
                <svg class="w-full h-full" id="back" viewBox="0 0 676 728" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="recipelogs">
                        <path id="arm2"
                            d="M672.962 342.882C673.962 344.057 674.704 345.429 675.14 346.909C675.576 348.389 675.697 349.944 675.494 351.474C675.291 353.004 674.769 354.474 673.961 355.789C673.154 357.104 672.079 358.235 670.807 359.108L617.037 396.025L593.36 411.81C592.015 412.706 590.385 413.07 588.786 412.831C587.188 412.592 585.735 411.766 584.712 410.515V410.515C584.115 409.786 583.684 408.936 583.448 408.023C583.212 407.111 583.176 406.159 583.345 405.231C583.513 404.304 583.88 403.424 584.422 402.653C584.963 401.882 585.666 401.237 586.481 400.764L609.414 387.448L649.437 349.331L623.708 321.696L642.766 307.402L672.962 342.882Z"
                            fill="#A0616A" />
                        <path id="Vector" d="M546.52 690.482H533.367L525.555 581.847L558.908 580.894L546.52 690.482Z"
                            fill="#A0616A" />
                        <path id="Vector_2"
                            d="M547.473 725.74C543.966 727.341 541.028 714.373 538.07 717.28C529.795 725.412 517.124 727.183 506.079 723.632L509.945 723.589C509.278 723.375 508.662 723.028 508.134 722.568C507.605 722.109 507.176 721.547 506.871 720.917C506.566 720.287 506.392 719.601 506.36 718.902C506.328 718.203 506.438 717.504 506.684 716.848V716.848C506.978 716.064 507.459 715.363 508.084 714.805C508.709 714.247 509.46 713.85 510.273 713.647L519.073 711.447L532.891 687.147L546.996 686.194C550.141 690.203 552.336 694.873 553.415 699.852C554.495 704.832 554.431 709.991 553.229 714.943C551.949 720.167 549.973 724.599 547.473 725.74Z"
                            fill="#2F2E41" />
                        <path id="Vector_3" d="M634.096 690.482H620.943L613.131 581.847L647.437 575.177L634.096 690.482Z"
                            fill="#A0616A" />
                        <path id="Vector_4"
                            d="M635.049 725.74C631.542 727.341 628.604 714.373 625.646 717.28C617.371 725.412 604.7 727.183 593.655 723.632L597.52 723.589C596.854 723.375 596.238 723.028 595.71 722.568C595.181 722.109 594.752 721.547 594.447 720.917C594.142 720.287 593.968 719.601 593.936 718.902C593.904 718.203 594.014 717.504 594.26 716.848C594.554 716.064 595.035 715.363 595.66 714.805C596.285 714.247 597.036 713.85 597.849 713.647L606.649 711.447L620.467 687.147L635.525 685.241L635.906 685.863C638.817 690.555 640.694 695.813 641.411 701.288C642.129 706.763 641.67 712.328 640.066 717.612C638.814 721.624 637.109 724.8 635.049 725.74Z"
                            fill="#2F2E41" />
                        <path id="shoulder2"
                            d="M649.009 309.859C636.914 311.542 628.54 318.166 625.129 331.38L602.896 290.33C601.578 287.721 601.244 284.725 601.955 281.89C602.667 279.055 604.376 276.571 606.77 274.894C609.31 273.113 612.435 272.372 615.505 272.821C618.575 273.27 621.356 274.877 623.28 277.31L649.009 309.859Z"
                            fill="#24F577" />
                        <path id="skirt"
                            d="M672.307 570.412C618.249 594.33 562.927 597.273 506.497 581.847C527.103 501.926 551.434 429.659 551.285 370.296L606.555 365.531L615.065 379.022C635.255 411.031 649.192 446.579 656.136 483.782L672.307 570.412Z"
                            fill="#2F2E41" />
                        <path id="head"
                            d="M581.779 247.367C597.567 247.367 610.367 234.568 610.367 218.779C610.367 202.99 597.567 190.191 581.779 190.191C565.99 190.191 553.19 202.99 553.19 218.779C553.19 234.568 565.99 247.367 581.779 247.367Z"
                            fill="#A0616A" />
                        <path id="neck"
                            d="M613.225 269.284L577.967 271.19L572.249 239.743L600.837 234.979L613.225 269.284Z"
                            fill="#A0616A" />
                        <path id="Vector_5"
                            d="M609.414 370.296L570.786 371.384L551.285 374.107C541.712 342.486 533.653 310.937 553.19 284.531L576.061 261.661L610.367 260.708L610.821 260.968C616.269 264.089 620.491 268.973 622.792 274.815C625.093 280.658 625.335 287.109 623.478 293.107C614.965 320.772 609.496 346.896 609.414 370.296Z"
                            fill="#24F577" />
                        <path id="arm1"
                            d="M550.332 458.919L547.936 491.665C547.807 493.419 547.05 495.068 545.802 496.307C544.554 497.547 542.901 498.294 541.146 498.411V498.411C540.135 498.478 539.121 498.334 538.169 497.988C537.216 497.642 536.346 497.101 535.615 496.4C534.883 495.698 534.305 494.853 533.919 493.916C533.532 492.979 533.345 491.972 533.369 490.959L534.132 458.919L557.955 368.39L558.908 313.119L585.59 312.167L583.684 376.013L550.332 458.919Z"
                            fill="#A0616A" />
                        <path id="shoulder1"
                            d="M588.449 316.931C577.137 312.331 566.571 313.872 557.002 323.602L558.313 276.936C558.478 274.018 559.69 271.257 561.725 269.159C563.76 267.061 566.484 265.767 569.396 265.514V265.514C572.486 265.245 575.563 266.168 577.995 268.094C580.427 270.02 582.03 272.803 582.477 275.873L588.449 316.931Z"
                            fill="#24F577" />
                        <path id="hair"
                            d="M642.29 345.996H554.62C575.072 291.839 581.667 241.457 554.62 198.291C555.084 185.326 571.713 174.086 584.627 175.328C599.879 176.794 620.374 188.002 623.231 203.055L642.29 345.996Z"
                            fill="#2F2E41" />
                        <g id="phone">
                            <path id="Vector_6"
                                d="M362.889 172.947H358.891V63.4019C358.891 55.0759 357.251 46.8313 354.064 39.139C350.878 31.4468 346.208 24.4574 340.321 18.57C334.433 12.6825 327.444 8.01239 319.751 4.82616C312.059 1.63992 303.815 5.56664e-06 295.488 3.05179e-05H63.4021C55.076 1.21328e-05 46.8314 1.63994 39.1392 4.82618C31.4469 8.01242 24.4575 12.6826 18.5701 18.57C12.6826 24.4574 8.01248 31.4468 4.82623 39.1391C1.63999 46.8314 5.18426e-05 55.0759 6.10352e-05 63.402V664.376C5.44691e-05 672.702 1.63999 680.947 4.82623 688.639C8.01248 696.331 12.6826 703.321 18.5701 709.208C24.4575 715.095 31.4469 719.766 39.1392 722.952C46.8314 726.138 55.076 727.778 63.4021 727.778H295.488C303.815 727.778 312.059 726.138 319.751 722.952C327.444 719.766 334.433 715.096 340.321 709.208C346.208 703.321 350.878 696.331 354.064 688.639C357.251 680.947 358.891 672.702 358.891 664.376V250.923H362.889V172.947Z"
                                fill="#3F3D56" />
                            <path id="Vector_7"
                                d="M298.047 16.495H267.752C269.145 19.9107 269.677 23.6165 269.3 27.2861C268.924 30.9557 267.651 34.4764 265.593 37.5381C263.536 40.5998 260.757 43.1085 257.501 44.8432C254.246 46.5778 250.613 47.4853 246.925 47.4856H113.965C110.276 47.4853 106.644 46.5778 103.389 44.8432C100.133 43.1085 97.3542 40.5998 95.2966 37.5381C93.239 34.4764 91.9659 30.9557 91.5895 27.2861C91.2131 23.6165 91.7449 19.9107 93.1381 16.495H64.8425C58.6247 16.495 52.4678 17.7197 46.7233 20.0991C40.9788 22.4786 35.7592 25.9662 31.3625 30.3628C26.9659 34.7595 23.4782 39.979 21.0988 45.7235C18.7193 51.468 17.4946 57.625 17.4946 63.8428V663.935C17.4946 670.153 18.7193 676.31 21.0988 682.054C23.4782 687.799 26.9658 693.019 31.3625 697.415C35.7592 701.812 40.9788 705.299 46.7233 707.679C52.4678 710.058 58.6247 711.283 64.8425 711.283H298.047C304.265 711.283 310.421 710.058 316.166 707.679C321.91 705.299 327.13 701.812 331.527 697.415C335.923 693.019 339.411 687.799 341.79 682.054C344.17 676.31 345.395 670.153 345.395 663.935V63.8427C345.395 51.2853 340.406 39.2422 331.527 30.3628C322.647 21.4834 310.604 16.495 298.047 16.495Z"
                                fill="white" />
                            <path id="Vector_8" d="M304.445 110.234H58.4446V321.234H304.445V110.234Z" fill="#E6E6E6" />
                            <g id="kecap">
                                <path id="Vector_9"
                                    d="M190.619 136.549H171.179C170.496 136.549 169.84 136.82 169.357 137.303C168.873 137.787 168.602 138.442 168.602 139.126V147.659C168.602 148.342 168.873 148.998 169.357 149.481C169.84 149.965 170.496 150.236 171.179 150.236H174.401V163.021H187.398V150.236H190.619C191.303 150.236 191.959 149.965 192.442 149.481C192.925 148.998 193.197 148.342 193.197 147.659V139.126C193.197 138.442 192.925 137.787 192.442 137.303C191.959 136.82 191.303 136.549 190.619 136.549Z"
                                    fill="#24F577" />
                                <path id="Vector_10"
                                    d="M210.091 214.641C198.185 197.22 192.099 176.477 192.703 155.385C192.714 154.898 192.556 154.423 192.256 154.04C191.957 153.656 191.533 153.388 191.058 153.282V149.595H170.527V153.23H170.244C169.967 153.231 169.693 153.286 169.438 153.392C169.182 153.498 168.95 153.654 168.755 153.849C168.56 154.045 168.405 154.278 168.299 154.533C168.194 154.789 168.139 155.063 168.14 155.34C168.14 155.391 168.142 155.442 168.146 155.493C169.763 178.041 164.301 198.261 151.76 216.154C151.038 217.182 150.67 218.417 150.709 219.672L152.954 289.117C153.008 290.666 153.658 292.134 154.769 293.215C155.879 294.296 157.365 294.907 158.914 294.919H205.353C206.921 294.906 208.421 294.282 209.535 293.179C210.649 292.076 211.289 290.582 211.317 289.014L212.182 221.589C212.208 219.115 211.478 216.691 210.091 214.641V214.641Z"
                                    fill="#3F3D56" />
                                <path id="Vector_11" opacity="0.2"
                                    d="M186.567 139.329C186.567 140.804 185.981 142.218 184.938 143.261C183.895 144.304 182.481 144.889 181.006 144.889C179.532 144.889 178.117 144.304 177.074 143.261C176.032 142.218 175.446 140.804 175.446 139.329"
                                    fill="black" />
                                <path id="Vector_12"
                                    d="M202.74 237.709H197.116C196.579 234.225 194.813 231.048 192.138 228.754C189.462 226.459 186.054 225.197 182.529 225.197C179.004 225.197 175.596 226.459 172.92 228.754C170.245 231.048 168.479 234.225 167.942 237.709H162.318C161.72 237.709 161.128 237.838 160.585 238.088C160.041 238.338 159.558 238.702 159.168 239.157C158.779 239.611 158.492 240.144 158.328 240.719C158.163 241.294 158.125 241.898 158.216 242.49L164.324 282.194H199.399L206.818 242.624C206.931 242.024 206.91 241.407 206.757 240.817C206.604 240.227 206.322 239.678 205.933 239.208C205.544 238.739 205.055 238.362 204.504 238.102C203.952 237.843 203.349 237.709 202.74 237.709V237.709Z"
                                    fill="#24F577" />
                            </g>
                            <path id="Vector_13" d="M304.445 407.234H58.4446V618.234H304.445V407.234Z" fill="#E6E6E6" />
                            <g id="egg">
                                <path id="Vector_14"
                                    d="M229.873 557.131L230.008 557.132C234.64 557.17 239.176 555.812 243.024 553.235C246.873 550.657 249.855 546.979 251.581 542.681C257.023 528.922 258.297 513.867 255.245 499.389C252.193 484.911 244.95 471.651 234.417 461.259C223.884 450.868 210.527 443.804 196.01 440.948C181.492 438.091 166.455 439.568 152.77 445.195C139.086 450.822 127.359 460.35 119.05 472.592C110.741 484.835 106.216 499.251 106.04 514.046C105.864 528.841 110.043 543.361 118.058 555.798C126.073 568.235 137.569 578.04 151.116 583.991C155.326 585.856 160.001 586.404 164.529 585.564C169.056 584.725 173.224 582.537 176.486 579.287C183.482 572.254 191.802 566.675 200.964 562.873C210.127 559.07 219.952 557.119 229.873 557.131V557.131Z"
                                    fill="white" />
                                <path id="Vector_15"
                                    d="M191.13 534.301C204.885 534.301 216.036 523.15 216.036 509.395C216.036 495.64 204.885 484.489 191.13 484.489C177.375 484.489 166.224 495.64 166.224 509.395C166.224 523.15 177.375 534.301 191.13 534.301Z"
                                    fill="#F9A825" />
                            </g>
                            <g id="Bookmarkbar">
                                <path id="Vector_16"
                                    d="M131.945 365.234C142.162 365.234 150.445 357.175 150.445 347.234C150.445 337.293 142.162 329.234 131.945 329.234C121.727 329.234 113.445 337.293 113.445 347.234C113.445 357.175 121.727 365.234 131.945 365.234Z"
                                    fill="#24F577" />
                                <path id="Bookmark"
                                    d="M139 356L132 351L125 356V340C125 339.47 125.211 338.961 125.586 338.586C125.961 338.211 126.47 338 127 338H137C137.53 338 138.039 338.211 138.414 338.586C138.789 338.961 139 339.47 139 340V356Z"
                                    fill="white" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </g>
                            <g id="Bookmarkbar_2">
                                <path id="Vector_17"
                                    d="M131.5 662C141.717 662 150 653.941 150 644C150 634.059 141.717 626 131.5 626C121.283 626 113 634.059 113 644C113 653.941 121.283 662 131.5 662Z"
                                    fill="#24F577" />
                                <path id="Bookmark_2"
                                    d="M138.555 652.766L131.555 647.766L124.555 652.766V636.766C124.555 636.236 124.766 635.727 125.141 635.352C125.516 634.977 126.025 634.766 126.555 634.766H136.555C137.086 634.766 137.594 634.977 137.97 635.352C138.345 635.727 138.555 636.236 138.555 636.766V652.766Z"
                                    fill="white" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </g>
                            <g id="Printerbar">
                                <path id="Vector_18"
                                    d="M225.5 365C235.717 365 244 356.941 244 347C244 337.059 235.717 329 225.5 329C215.283 329 207 337.059 207 347C207 356.941 215.283 365 225.5 365Z"
                                    fill="#24F577" />
                                <g id="printer">
                                    <g id="Vector_19">
                                        <path d="M220 344V337H232V344" fill="white" />
                                        <path d="M220 344V337H232V344" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <g id="Vector_20">
                                        <path
                                            d="M220 353H218C217.47 353 216.961 352.789 216.586 352.414C216.211 352.039 216 351.53 216 351V346C216 345.47 216.211 344.961 216.586 344.586C216.961 344.211 217.47 344 218 344H234C234.53 344 235.039 344.211 235.414 344.586C235.789 344.961 236 345.47 236 346V351C236 351.53 235.789 352.039 235.414 352.414C235.039 352.789 234.53 353 234 353H232"
                                            fill="#B9B9B9" />
                                        <path
                                            d="M220 353H218C217.47 353 216.961 352.789 216.586 352.414C216.211 352.039 216 351.53 216 351V346C216 345.47 216.211 344.961 216.586 344.586C216.961 344.211 217.47 344 218 344H234C234.53 344 235.039 344.211 235.414 344.586C235.789 344.961 236 345.47 236 346V351C236 351.53 235.789 352.039 235.414 352.414C235.039 352.789 234.53 353 234 353H232"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <path id="Vector_21" d="M232 349H220V357H232V349Z" fill="#AFAFAF" stroke="white"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                            </g>
                            <g id="Printerbar_2">
                                <path id="Vector_22"
                                    d="M225.5 662C235.717 662 244 653.941 244 644C244 634.059 235.717 626 225.5 626C215.283 626 207 634.059 207 644C207 653.941 215.283 662 225.5 662Z"
                                    fill="#24F577" />
                                <g id="printer_2">
                                    <g id="Vector_23">
                                        <path d="M220 641V634H232V641" fill="white" />
                                        <path d="M220 641V634H232V641" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <g id="Vector_24">
                                        <path
                                            d="M220 650H218C217.47 650 216.961 649.789 216.586 649.414C216.211 649.039 216 648.53 216 648V643C216 642.47 216.211 641.961 216.586 641.586C216.961 641.211 217.47 641 218 641H234C234.53 641 235.039 641.211 235.414 641.586C235.789 641.961 236 642.47 236 643V648C236 648.53 235.789 649.039 235.414 649.414C235.039 649.789 234.53 650 234 650H232"
                                            fill="#B9B9B9" />
                                        <path
                                            d="M220 650H218C217.47 650 216.961 649.789 216.586 649.414C216.211 649.039 216 648.53 216 648V643C216 642.47 216.211 641.961 216.586 641.586C216.961 641.211 217.47 641 218 641H234C234.53 641 235.039 641.211 235.414 641.586C235.789 641.961 236 642.47 236 643V648C236 648.53 235.789 649.039 235.414 649.414C235.039 649.789 234.53 650 234 650H232"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <path id="Vector_25" d="M232 646H220V654H232V646Z" fill="#AFAFAF" stroke="white"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>

            </div>
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20">

                <form action="/register" method="POST" autocomplete="off">
                    @csrf

                    <div class="mb-6">
                        <input type="text" name="name"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none"
                            placeholder="Name" required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="text" name="username"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none"
                            placeholder="Username" required value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input type="email" name="email"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none "
                            placeholder="name@example.com" autofocus required value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input type="password" name="password"
                            class="form-control block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none"
                            placeholder="Password" required value="{{ old('password') }}" />
                        @error('password')
                            <div class="text-gray-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit"
                        class="inline-block px-7 py-3 bg-green1 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-green2 hover:shadow-lg focus:bg-green2 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green2 active:shadow-lg transition duration-150 ease-in-out w-full"
                        data-mdb-ripple="true" data-mdb-ripple-color="light">
                        Sign up
                    </button>
                    <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                        Already registered?
                        <a href="/login"
                            class="text-green-600 hover:text-green-700 focus:text-green-700 transition duration-200 ease-in-out">Login
                            Now!</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name"
                            class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                            placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required value="{{ old('password') }}">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-2">Already registered? <a href="/login">Login Now!</a></small>
            </main>
        </div>
    </div> --}}
@endsection
