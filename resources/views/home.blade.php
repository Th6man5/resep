@extends('layouts.main')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@501&display=swap');

        #arm1 {
            animation: arm 5s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        #arm2 {
            animation: arm2 5s ease-in-out infinite alternate;
            transform-origin: top;
            transform-box: fill-box;
        }

        @keyframes arm {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(-20deg);
            }
        }

        @keyframes arm2 {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(2deg);
            }
        }

        #hole {
            animation: hole 5s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        #circle1 {
            animation: holein 5s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        #circle2 {
            animation: holein2 5s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes holein {
            from {
                transform: scale(100%) rotateZ(0deg);
            }

            to {
                transform: scale(110%) rotateZ(360deg);
            }
        }

        @keyframes holein2 {
            from {
                transform: scale(100%) rotateZ(0deg);
            }

            to {
                transform: scale(110%) rotateZ(-360deg);
            }
        }

        @keyframes hole {
            from {
                transform: scale(90%) rotateZ(0deg);
            }

            to {
                transform: scale(100%) rotateZ(360deg);
            }
        }

        #head {
            animation: head 5s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        #below {
            animation: belows 5s ease-in-out infinite alternate;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes head {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(15deg);
            }
        }

        @keyframes belows {
            from {
                transform: rotateZ(0deg);
            }

            to {
                transform: rotateZ(2deg);
            }
        }
    </style>


    @if ($recipe->count())
        <div class="justify-center mb-10">
            <form action="/">

                <div class="input-group mb-3 justify-center">
                    <label class="relative block ">
                        <input type="text" placeholder="Search..." name="search"
                            class="input input-bordered rounded-none rounded-l-2xl w-full max-w-xs"
                            value="{{ request('search') }}" />
                    </label>
                    <button class="btn bg-primary1 text-white border-none hover:bg-secondary1 "
                        type="submit">Search</button>
                </div>


            </form>
        </div>


        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10 mb-5">
            @foreach ($recipe as $resep)
                <div
                    class="bg-whitep shadow-2xl rounded-xl overflow-hidden  relative hover:bg-red1  transition-all hover:text-white">
                    @if ($resep->image)
                        <a href="/{{ $resep->id }}">
                            <img src="{{ asset('storage/' . $resep->image) }}" class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @else
                        <a href="/{{ $resep->id }}">
                            <img src="https://source.unsplash.com/1000x1000/?{{ $resep->recipe_name }}"
                                class="w-full h-32 sm:h-48 object-cover">
                        </a>
                    @endif
                    <div class="m-4">
                        <span class="font-bold block"
                            style=" overflow: hidden;  white-space: nowrap; text-overflow: ellipsis;">
                            {{ $resep->recipe_name }}
                        </span>
                        <a class="text-sm hover:text-gray-300" href="/maker/{{ $resep->maker->id }}">
                            {{ $resep->maker->name }}
                        </a>
                    </div>
                    <div
                        class="bg-skin text-black text-xs  font-bold rounded-full p-2 absolute top-0 ml-2 mt-2 text-center hover:bg-skin2 hover:scale-105 transition-all">
                        <i class="bi bi-eye-fill text-lg"></i>
                        <p>
                            {{ $resep->views->count() }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    @else
        {{-- Not Found View --}}

        <div class="justify-center">
            <form action="/">
                @if (request('search'))
                    <div class="input-group mb-3 justify-center">
                        <label class="relative block ">
                            <input type="text" placeholder="Search..." name="search"
                                class="input input-bordered rounded-none w-full max-w-xs" value="{{ request('search') }}" />
                        </label>
                        <button class="btn bg-primary1 text-white border-none hover:bg-secondary1"
                            type="button">Search</button>
                    </div>
                @endif
            </form>
        </div>

        <p class="text-center text-xl">Not Found...</p>

        <svg viewBox="0 0 798 835" class="m-auto mt-20 md:w-3/12 w-8/12 h-full" fill="none"
            xmlns="http://www.w3.org/2000/svg">

            <path id="below"
                d="M308.5 834.5C478.88 834.5 617 810.1 617 780C617 749.9 478.88 725.5 308.5 725.5C138.12 725.5 0 749.9 0 780C0 810.1 138.12 834.5 308.5 834.5Z"
                fill="#3F3D56" />
            <g id="hole">
                <path id="circle4"
                    d="M496 603C662.514 603 797.5 468.014 797.5 301.5C797.5 134.986 662.514 0 496 0C329.486 0 194.5 134.986 194.5 301.5C194.5 468.014 329.486 603 496 603Z"
                    fill="#3F3D56" />
                <path id="circle3" opacity="0.05"
                    d="M496 550.398C633.462 550.398 744.898 438.963 744.898 301.5C744.898 164.038 633.462 52.6022 496 52.6022C358.537 52.6022 247.102 164.038 247.102 301.5C247.102 438.963 358.537 550.398 496 550.398Z"
                    fill="black" />
                <path id="circle2" opacity="0.05"
                    d="M496 505.494C608.663 505.494 699.994 414.163 699.994 301.5C699.994 188.837 608.663 97.5064 496 97.5064C383.337 97.5064 292.006 188.837 292.006 301.5C292.006 414.163 383.337 505.494 496 505.494Z"
                    fill="black" />
                <path id="circle1" opacity="0.05"
                    d="M496 447.76C576.777 447.76 642.26 382.277 642.26 301.5C642.26 220.723 576.777 155.24 496 155.24C415.223 155.24 349.74 220.723 349.74 301.5C349.74 382.277 415.223 447.76 496 447.76Z"
                    fill="black" />
            </g>
            <g id="arm2">
                <path id="Vector"
                    d="M197.17 328.482C197.17 328.482 173.466 395.204 184.001 418.908C194.537 442.612 211.217 465.438 211.217 465.438C211.217 465.438 205.072 332.872 197.17 328.482Z"
                    fill="#E53935" />
                <path id="Vector_2" opacity="0.1"
                    d="M196.868 329C196.868 329 173.164 395.722 183.699 419.426C194.234 443.13 210.915 465.956 210.915 465.956C210.915 465.956 204.769 333.39 196.868 329Z"
                    fill="black" />
            </g>
            <path id="Vector_3"
                d="M213.851 482.997C213.851 482.997 212.095 499.677 211.217 500.555C210.339 501.433 212.095 503.189 211.217 505.823C210.339 508.457 209.461 511.968 211.217 512.846C212.973 513.724 201.56 590.981 201.56 590.981C201.56 590.981 173.466 627.854 184.879 685.797L188.391 744.618C188.391 744.618 215.607 746.374 215.607 736.717C215.607 736.717 213.851 725.304 213.851 720.036C213.851 714.769 218.24 714.769 215.607 712.135C212.973 709.501 212.973 707.745 212.973 707.745C212.973 707.745 217.363 704.234 216.485 703.356C215.607 702.478 224.386 640.145 224.386 640.145C224.386 640.145 234.043 630.488 234.043 625.22V619.953C234.043 619.953 238.433 608.54 238.433 607.662C238.433 606.784 262.137 553.231 262.137 553.231L271.794 591.859L282.329 647.169C282.329 647.169 287.596 697.21 298.131 716.525C298.131 716.525 316.568 779.735 316.568 777.979C316.568 776.223 347.295 771.834 346.417 763.932C345.539 756.031 327.981 645.413 327.981 645.413L332.371 481.241L213.851 482.997Z"
                fill="#2F2E41" />
            <path id="Vector_4"
                d="M190.147 740.228C190.147 740.228 166.443 786.758 182.246 788.514C198.048 790.27 204.194 790.27 211.217 783.247C215.057 779.407 222.832 774.255 229.093 770.374C232.802 768.111 235.799 764.849 237.739 760.961C239.679 757.073 240.484 752.717 240.062 748.392C239.599 744.097 237.994 740.558 234.043 740.228C223.508 739.351 211.217 729.693 211.217 729.693L190.147 740.228Z"
                fill="#2F2E41" />
            <path id="Vector_5"
                d="M320.958 774.467C320.958 774.467 297.254 820.997 313.056 822.753C328.859 824.509 335.004 824.509 342.028 817.486C345.867 813.646 353.643 808.494 359.903 804.613C363.613 802.35 366.609 799.088 368.549 795.2C370.49 791.312 371.295 786.956 370.872 782.631C370.409 778.336 368.804 774.797 364.854 774.467C354.319 773.59 342.028 763.932 342.028 763.932L320.958 774.467Z"
                fill="#2F2E41" />
            <path id="neck"
                d="M272.18 227.558C272.18 227.558 245.82 276.062 243.711 276.062C241.602 276.062 291.16 291.878 291.16 291.878C291.16 291.878 304.867 245.483 306.976 241.266L272.18 227.558Z"
                fill="#FFB8B8" />
            <path id="Vector_6"
                d="M312.617 280.635C312.617 280.635 259.942 251.664 254.674 252.542C249.407 253.42 193.22 302.583 194.098 322.776C194.975 342.968 201.999 376.329 201.999 376.329C201.999 376.329 204.633 469.389 209.9 470.267C215.168 471.145 209.022 486.947 210.778 486.947C212.534 486.947 333.687 486.947 334.565 484.314C335.443 481.68 312.617 280.635 312.617 280.635Z"
                fill="#E53935" />
            <g id="arm1">
                <path id="Vector_7"
                    d="M342.028 489.142C342.028 489.142 358.708 540.062 344.661 538.306C330.615 536.55 324.469 494.41 324.469 494.41L342.028 489.142Z"
                    fill="#FFB8B8" />
                <path id="Vector_8"
                    d="M297.254 277.563C297.254 277.563 264.77 284.586 270.038 328.482C275.306 372.378 284.963 416.275 284.963 416.275L317.446 487.386L320.958 500.555L344.661 494.41L327.103 392.571C327.103 392.571 320.958 283.708 313.056 280.196C308.074 278.072 302.656 277.169 297.254 277.563Z"
                    fill="#E53935" />
                <path id="shadow" opacity="0.1" d="M277.5 414.958L317.885 486.947L283.86 411.09L277.5 414.958Z"
                    fill="black" />
            </g>

            <g id="head">
                <path id="Vector_9"
                    d="M295.905 252.337C316.287 252.337 332.81 235.814 332.81 215.433C332.81 195.051 316.287 178.528 295.905 178.528C275.523 178.528 259 195.051 259 215.433C259 235.814 275.523 252.337 295.905 252.337Z"
                    fill="#FFB8B8" />
                <path id="Vector_10"
                    d="M332.646 204.566L332.768 201.746L338.378 203.142C338.318 202.237 338.062 201.355 337.628 200.558C337.194 199.762 336.592 199.068 335.864 198.527L341.84 198.193C336.826 191.067 330.419 185.032 323.007 180.451C315.595 175.87 307.332 172.839 298.716 171.541C285.79 169.668 271.397 172.379 262.534 181.972C258.234 186.625 255.533 192.542 253.611 198.579C250.072 209.697 249.351 222.951 256.731 231.988C264.232 241.173 277.333 242.973 289.137 244.109C293.29 244.509 297.643 244.881 301.491 243.27C301.92 238.855 301.355 234.401 299.838 230.233C299.206 228.943 298.904 227.516 298.959 226.081C299.483 222.569 304.168 221.684 307.686 222.159C311.205 222.633 315.436 223.359 317.748 220.664C319.341 218.808 319.247 216.105 319.458 213.669C320.032 207.035 332.586 205.957 332.646 204.566Z"
                    fill="#2F2E41" />
            </g>
        </svg>
    @endif

    {{ $recipe->render() }}





@endsection
