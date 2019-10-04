<template>
    <div class="logo-loader">
        <logo-svg class="ring"></logo-svg>
        <logo-line-draw class="logo"></logo-line-draw>
        <div class="bottom-loader">
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>

<style lang="scss" scoped>

@keyframes loader-increase {
    100% {
        width : 100%;
    }
}

@keyframes fade {
    0% {
        opacity    : 0;
    }

    100% {
        opacity    : 1;
    }
}
@keyframes rotate { 
    100% { 
        transform: rotate(36deg);
    } 
}

@keyframes opacity-out {
    0% {
        opacity : 1;
    }

    90% {
        opacity : 1;
    }

    100% {
        opacity : 0;
    }
}

.logo-loader {
    width                     : 100vw;
    height                    : 100vh;
    position                  : fixed;
    z-index                   : 10000000;
    left                      : 0px;
    top                       : 0px;
    background                : #323334;
    pointer-events            : none;
    animation                 : opacity-out 4s;
    animation-fill-mode       : forwards;
    animation-iteration-count : 1;  
    
    .logo {
        width     : 300px;
        transform : translate(-50%, -50%);
        left      : 50%;
        top       : 50%;
        position  : absolute;
        display   : block;
        animation : fade 3s;
        filter    : drop-shadow(0px 2px 16px rgba(0, 0, 0, 0.2));
    }
    .ring {
        width     : 400px;
        transform : translate(-50%, -50%);
        left      : 50%;
        top       : 50%;
        position  : absolute;
        display   : block;
        animation : fade 3s;
    }


    .bottom-loader {
        width                     : 0%;
        position                  : absolute;
        bottom                    : 0px;
        height                    : 7px;
        animation-delay           : 1s;
        background                : get-color(primary);
        animation                 : loader-increase 4s ease-in-out;
        animation-fill-mode       : forwards;
        animation-iteration-count : 1;
    }

}
</style>
