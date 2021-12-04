<!DOCTYPE html>
<html lang="en">
<script src="https://sandbox.sslcommerz.com/embed.min.js?9xlgvv"></script>
<script id="allow-copy_script">
    (function agent() {
        let unlock = false
        document.addEventListener('allow_copy', (event) => {
            unlock = event.detail.unlock
        })

        const copyEvents = [
            'copy',
            'cut',
            'contextmenu',
            'selectstart',
            'mousedown',
            'mouseup',
            'mousemove',
            'keydown',
            'keypress',
            'keyup',
        ]
        const rejectOtherHandlers = (e) => {
            if (unlock) {
                e.stopPropagation()
                if (e.stopImmediatePropagation) e.stopImmediatePropagation()
            }
        }
        copyEvents.forEach((evt) => {
            document.documentElement.addEventListener(evt, rejectOtherHandlers, {
                capture: true,
            })
        })
    })()
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <title>Developers | SSLCOMMERZ</title>

    <meta name="description" content="I">
    <link rel="shortcut icon" href="https://developer.sslcommerz.com/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/style-ssl.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/custom-ssl.css') }}">

    <style>
        .lock-center {
            display: none !important;
        }

        .tingle-modal {
            background: none !important;
        }

        #sslczPayBtn {
            background: #295cab !important;
            width: 100% !important;
            padding: 8px 20px 8px 30px !important;
            height: auto !important;
        }

        #sslczPayBtn:before,
        #sslczPayBtn:after {
            display: none !important;
        }

    </style>

    <style>
        @-webkit-keyframes swal2-show {
            0% {
                -webkit-transform: scale(.7);
                transform: scale(.7)
            }

            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }

            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes swal2-show {
            0% {
                -webkit-transform: scale(.7);
                transform: scale(.7)
            }

            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }

            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @-webkit-keyframes swal2-hide {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }

            100% {
                -webkit-transform: scale(.5);
                transform: scale(.5);
                opacity: 0
            }
        }

        @keyframes swal2-hide {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }

            100% {
                -webkit-transform: scale(.5);
                transform: scale(.5);
                opacity: 0
            }
        }

        @-webkit-keyframes swal2-animate-success-line-tip {
            0% {
                top: 1.1875em;
                left: .0625em;
                width: 0
            }

            54% {
                top: 1.0625em;
                left: .125em;
                width: 0
            }

            70% {
                top: 2.1875em;
                left: -.375em;
                width: 3.125em
            }

            84% {
                top: 3em;
                left: 1.3125em;
                width: 1.0625em
            }

            100% {
                top: 2.8125em;
                left: .875em;
                width: 1.5625em
            }
        }

        @keyframes swal2-animate-success-line-tip {
            0% {
                top: 1.1875em;
                left: .0625em;
                width: 0
            }

            54% {
                top: 1.0625em;
                left: .125em;
                width: 0
            }

            70% {
                top: 2.1875em;
                left: -.375em;
                width: 3.125em
            }

            84% {
                top: 3em;
                left: 1.3125em;
                width: 1.0625em
            }

            100% {
                top: 2.8125em;
                left: .875em;
                width: 1.5625em
            }
        }

        @-webkit-keyframes swal2-animate-success-line-long {
            0% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            65% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            84% {
                top: 2.1875em;
                right: 0;
                width: 3.4375em
            }

            100% {
                top: 2.375em;
                right: .5em;
                width: 2.9375em
            }
        }

        @keyframes swal2-animate-success-line-long {
            0% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            65% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            84% {
                top: 2.1875em;
                right: 0;
                width: 3.4375em
            }

            100% {
                top: 2.375em;
                right: .5em;
                width: 2.9375em
            }
        }

        @-webkit-keyframes swal2-rotate-success-circular-line {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }

            100% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @keyframes swal2-rotate-success-circular-line {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }

            100% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @-webkit-keyframes swal2-animate-error-x-mark {
            0% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }

            50% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }

            80% {
                margin-top: -.375em;
                -webkit-transform: scale(1.15);
                transform: scale(1.15)
            }

            100% {
                margin-top: 0;
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
        }

        @keyframes swal2-animate-error-x-mark {
            0% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }

            50% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }

            80% {
                margin-top: -.375em;
                -webkit-transform: scale(1.15);
                transform: scale(1.15)
            }

            100% {
                margin-top: 0;
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
        }

        @-webkit-keyframes swal2-animate-error-icon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }

            100% {
                -webkit-transform: rotateX(0);
                transform: rotateX(0);
                opacity: 1
            }
        }

        @keyframes swal2-animate-error-icon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }

            100% {
                -webkit-transform: rotateX(0);
                transform: rotateX(0);
                opacity: 1
            }
        }

        body.swal2-toast-shown .swal2-container {
            background-color: transparent
        }

        body.swal2-toast-shown .swal2-container.swal2-shown {
            background-color: transparent
        }

        body.swal2-toast-shown .swal2-container.swal2-top {
            top: 0;
            right: auto;
            bottom: auto;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-top-end,
        body.swal2-toast-shown .swal2-container.swal2-top-right {
            top: 0;
            right: 0;
            bottom: auto;
            left: auto
        }

        body.swal2-toast-shown .swal2-container.swal2-top-left,
        body.swal2-toast-shown .swal2-container.swal2-top-start {
            top: 0;
            right: auto;
            bottom: auto;
            left: 0
        }

        body.swal2-toast-shown .swal2-container.swal2-center-left,
        body.swal2-toast-shown .swal2-container.swal2-center-start {
            top: 50%;
            right: auto;
            bottom: auto;
            left: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-center {
            top: 50%;
            right: auto;
            bottom: auto;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-center-end,
        body.swal2-toast-shown .swal2-container.swal2-center-right {
            top: 50%;
            right: 0;
            bottom: auto;
            left: auto;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom-left,
        body.swal2-toast-shown .swal2-container.swal2-bottom-start {
            top: auto;
            right: auto;
            bottom: 0;
            left: 0
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom {
            top: auto;
            right: auto;
            bottom: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom-end,
        body.swal2-toast-shown .swal2-container.swal2-bottom-right {
            top: auto;
            right: 0;
            bottom: 0;
            left: auto
        }

        body.swal2-toast-column .swal2-toast {
            flex-direction: column;
            align-items: stretch
        }

        body.swal2-toast-column .swal2-toast .swal2-actions {
            flex: 1;
            align-self: stretch;
            height: 2.2em;
            margin-top: .3125em
        }

        body.swal2-toast-column .swal2-toast .swal2-loading {
            justify-content: center
        }

        body.swal2-toast-column .swal2-toast .swal2-input {
            height: 2em;
            margin: .3125em auto;
            font-size: 1em
        }

        body.swal2-toast-column .swal2-toast .swal2-validation-message {
            font-size: 1em
        }

        .swal2-popup.swal2-toast {
            flex-direction: row;
            align-items: center;
            width: auto;
            padding: .625em;
            box-shadow: 0 0 .625em #d9d9d9;
            overflow-y: hidden
        }

        .swal2-popup.swal2-toast .swal2-header {
            flex-direction: row
        }

        .swal2-popup.swal2-toast .swal2-title {
            flex-grow: 1;
            justify-content: flex-start;
            margin: 0 .6em;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-footer {
            margin: .5em 0 0;
            padding: .5em 0 0;
            font-size: .8em
        }

        .swal2-popup.swal2-toast .swal2-close {
            position: initial;
            width: .8em;
            height: .8em;
            line-height: .8
        }

        .swal2-popup.swal2-toast .swal2-content {
            justify-content: flex-start;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-icon {
            width: 2em;
            min-width: 2em;
            height: 2em;
            margin: 0
        }

        .swal2-popup.swal2-toast .swal2-icon-text {
            font-size: 2em;
            font-weight: 700;
            line-height: 1em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring {
            width: 2em;
            height: 2em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
            top: .875em;
            width: 1.375em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
            left: .3125em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
            right: .3125em
        }

        .swal2-popup.swal2-toast .swal2-actions {
            height: auto;
            margin: 0 .3125em
        }

        .swal2-popup.swal2-toast .swal2-styled {
            margin: 0 .3125em;
            padding: .3125em .625em;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-styled:focus {
            box-shadow: 0 0 0 .0625em #fff, 0 0 0 .125em rgba(50, 100, 150, .4)
        }

        .swal2-popup.swal2-toast .swal2-success {
            border-color: #a5dc86
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line] {
            position: absolute;
            width: 2em;
            height: 2.8125em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            border-radius: 50%
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left] {
            top: -.25em;
            left: -.9375em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 2em 2em;
            transform-origin: 2em 2em;
            border-radius: 4em 0 0 4em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right] {
            top: -.25em;
            left: .9375em;
            -webkit-transform-origin: 0 2em;
            transform-origin: 0 2em;
            border-radius: 0 4em 4em 0
        }

        .swal2-popup.swal2-toast .swal2-success .swal2-success-ring {
            width: 2em;
            height: 2em
        }

        .swal2-popup.swal2-toast .swal2-success .swal2-success-fix {
            top: 0;
            left: .4375em;
            width: .4375em;
            height: 2.6875em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line] {
            height: .3125em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip] {
            top: 1.125em;
            left: .1875em;
            width: .75em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long] {
            top: .9375em;
            right: .1875em;
            width: 1.375em
        }

        .swal2-popup.swal2-toast.swal2-show {
            -webkit-animation: showSweetToast .5s;
            animation: showSweetToast .5s
        }

        .swal2-popup.swal2-toast.swal2-hide {
            -webkit-animation: hideSweetToast .2s forwards;
            animation: hideSweetToast .2s forwards
        }

        .swal2-popup.swal2-toast .swal2-animate-success-icon .swal2-success-line-tip {
            -webkit-animation: animate-toast-success-tip .75s;
            animation: animate-toast-success-tip .75s
        }

        .swal2-popup.swal2-toast .swal2-animate-success-icon .swal2-success-line-long {
            -webkit-animation: animate-toast-success-long .75s;
            animation: animate-toast-success-long .75s
        }

        @-webkit-keyframes showSweetToast {
            0% {
                -webkit-transform: translateY(-.625em) rotateZ(2deg);
                transform: translateY(-.625em) rotateZ(2deg);
                opacity: 0
            }

            33% {
                -webkit-transform: translateY(0) rotateZ(-2deg);
                transform: translateY(0) rotateZ(-2deg);
                opacity: .5
            }

            66% {
                -webkit-transform: translateY(.3125em) rotateZ(2deg);
                transform: translateY(.3125em) rotateZ(2deg);
                opacity: .7
            }

            100% {
                -webkit-transform: translateY(0) rotateZ(0);
                transform: translateY(0) rotateZ(0);
                opacity: 1
            }
        }

        @keyframes showSweetToast {
            0% {
                -webkit-transform: translateY(-.625em) rotateZ(2deg);
                transform: translateY(-.625em) rotateZ(2deg);
                opacity: 0
            }

            33% {
                -webkit-transform: translateY(0) rotateZ(-2deg);
                transform: translateY(0) rotateZ(-2deg);
                opacity: .5
            }

            66% {
                -webkit-transform: translateY(.3125em) rotateZ(2deg);
                transform: translateY(.3125em) rotateZ(2deg);
                opacity: .7
            }

            100% {
                -webkit-transform: translateY(0) rotateZ(0);
                transform: translateY(0) rotateZ(0);
                opacity: 1
            }
        }

        @-webkit-keyframes hideSweetToast {
            0% {
                opacity: 1
            }

            33% {
                opacity: .5
            }

            100% {
                -webkit-transform: rotateZ(1deg);
                transform: rotateZ(1deg);
                opacity: 0
            }
        }

        @keyframes hideSweetToast {
            0% {
                opacity: 1
            }

            33% {
                opacity: .5
            }

            100% {
                -webkit-transform: rotateZ(1deg);
                transform: rotateZ(1deg);
                opacity: 0
            }
        }

        @-webkit-keyframes animate-toast-success-tip {
            0% {
                top: .5625em;
                left: .0625em;
                width: 0
            }

            54% {
                top: .125em;
                left: .125em;
                width: 0
            }

            70% {
                top: .625em;
                left: -.25em;
                width: 1.625em
            }

            84% {
                top: 1.0625em;
                left: .75em;
                width: .5em
            }

            100% {
                top: 1.125em;
                left: .1875em;
                width: .75em
            }
        }

        @keyframes animate-toast-success-tip {
            0% {
                top: .5625em;
                left: .0625em;
                width: 0
            }

            54% {
                top: .125em;
                left: .125em;
                width: 0
            }

            70% {
                top: .625em;
                left: -.25em;
                width: 1.625em
            }

            84% {
                top: 1.0625em;
                left: .75em;
                width: .5em
            }

            100% {
                top: 1.125em;
                left: .1875em;
                width: .75em
            }
        }

        @-webkit-keyframes animate-toast-success-long {
            0% {
                top: 1.625em;
                right: 1.375em;
                width: 0
            }

            65% {
                top: 1.25em;
                right: .9375em;
                width: 0
            }

            84% {
                top: .9375em;
                right: 0;
                width: 1.125em
            }

            100% {
                top: .9375em;
                right: .1875em;
                width: 1.375em
            }
        }

        @keyframes animate-toast-success-long {
            0% {
                top: 1.625em;
                right: 1.375em;
                width: 0
            }

            65% {
                top: 1.25em;
                right: .9375em;
                width: 0
            }

            84% {
                top: .9375em;
                right: 0;
                width: 1.125em
            }

            100% {
                top: .9375em;
                right: .1875em;
                width: 1.375em
            }
        }

        body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
            overflow: hidden
        }

        body.swal2-height-auto {
            height: auto !important
        }

        body.swal2-no-backdrop .swal2-shown {
            top: auto;
            right: auto;
            bottom: auto;
            left: auto;
            background-color: transparent
        }

        body.swal2-no-backdrop .swal2-shown>.swal2-modal {
            box-shadow: 0 0 10px rgba(0, 0, 0, .4)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-top {
            top: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-top-left,
        body.swal2-no-backdrop .swal2-shown.swal2-top-start {
            top: 0;
            left: 0
        }

        body.swal2-no-backdrop .swal2-shown.swal2-top-end,
        body.swal2-no-backdrop .swal2-shown.swal2-top-right {
            top: 0;
            right: 0
        }

        body.swal2-no-backdrop .swal2-shown.swal2-center {
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-center-left,
        body.swal2-no-backdrop .swal2-shown.swal2-center-start {
            top: 50%;
            left: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-center-end,
        body.swal2-no-backdrop .swal2-shown.swal2-center-right {
            top: 50%;
            right: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-bottom {
            bottom: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-bottom-left,
        body.swal2-no-backdrop .swal2-shown.swal2-bottom-start {
            bottom: 0;
            left: 0
        }

        body.swal2-no-backdrop .swal2-shown.swal2-bottom-end,
        body.swal2-no-backdrop .swal2-shown.swal2-bottom-right {
            right: 0;
            bottom: 0
        }

        .swal2-container {
            display: flex;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: transparent;
            z-index: 1060;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch
        }

        .swal2-container.swal2-top {
            align-items: flex-start
        }

        .swal2-container.swal2-top-left,
        .swal2-container.swal2-top-start {
            align-items: flex-start;
            justify-content: flex-start
        }

        .swal2-container.swal2-top-end,
        .swal2-container.swal2-top-right {
            align-items: flex-start;
            justify-content: flex-end
        }

        .swal2-container.swal2-center {
            align-items: center
        }

        .swal2-container.swal2-center-left,
        .swal2-container.swal2-center-start {
            align-items: center;
            justify-content: flex-start
        }

        .swal2-container.swal2-center-end,
        .swal2-container.swal2-center-right {
            align-items: center;
            justify-content: flex-end
        }

        .swal2-container.swal2-bottom {
            align-items: flex-end
        }

        .swal2-container.swal2-bottom-left,
        .swal2-container.swal2-bottom-start {
            align-items: flex-end;
            justify-content: flex-start
        }

        .swal2-container.swal2-bottom-end,
        .swal2-container.swal2-bottom-right {
            align-items: flex-end;
            justify-content: flex-end
        }

        .swal2-container.swal2-bottom-end>:first-child,
        .swal2-container.swal2-bottom-left>:first-child,
        .swal2-container.swal2-bottom-right>:first-child,
        .swal2-container.swal2-bottom-start>:first-child,
        .swal2-container.swal2-bottom>:first-child {
            margin-top: auto
        }

        .swal2-container.swal2-grow-fullscreen>.swal2-modal {
            display: flex !important;
            flex: 1;
            align-self: stretch;
            justify-content: center
        }

        .swal2-container.swal2-grow-row>.swal2-modal {
            display: flex !important;
            flex: 1;
            align-content: center;
            justify-content: center
        }

        .swal2-container.swal2-grow-column {
            flex: 1;
            flex-direction: column
        }

        .swal2-container.swal2-grow-column.swal2-bottom,
        .swal2-container.swal2-grow-column.swal2-center,
        .swal2-container.swal2-grow-column.swal2-top {
            align-items: center
        }

        .swal2-container.swal2-grow-column.swal2-bottom-left,
        .swal2-container.swal2-grow-column.swal2-bottom-start,
        .swal2-container.swal2-grow-column.swal2-center-left,
        .swal2-container.swal2-grow-column.swal2-center-start,
        .swal2-container.swal2-grow-column.swal2-top-left,
        .swal2-container.swal2-grow-column.swal2-top-start {
            align-items: flex-start
        }

        .swal2-container.swal2-grow-column.swal2-bottom-end,
        .swal2-container.swal2-grow-column.swal2-bottom-right,
        .swal2-container.swal2-grow-column.swal2-center-end,
        .swal2-container.swal2-grow-column.swal2-center-right,
        .swal2-container.swal2-grow-column.swal2-top-end,
        .swal2-container.swal2-grow-column.swal2-top-right {
            align-items: flex-end
        }

        .swal2-container.swal2-grow-column>.swal2-modal {
            display: flex !important;
            flex: 1;
            align-content: center;
            justify-content: center
        }

        .swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen)>.swal2-modal {
            margin: auto
        }

        @media all and (-ms-high-contrast:none),
        (-ms-high-contrast:active) {
            .swal2-container .swal2-modal {
                margin: 0 !important
            }
        }

        .swal2-container.swal2-fade {
            transition: background-color .1s
        }

        .swal2-container.swal2-shown {
            background-color: rgba(0, 0, 0, .4)
        }

        .swal2-popup {
            display: none;
            position: relative;
            flex-direction: column;
            justify-content: center;
            width: 32em;
            max-width: 100%;
            padding: 1.25em;
            border-radius: .3125em;
            background: #fff;
            font-family: inherit;
            font-size: 1rem;
            box-sizing: border-box
        }

        .swal2-popup:focus {
            outline: 0
        }

        .swal2-popup.swal2-loading {
            overflow-y: hidden
        }

        .swal2-popup .swal2-header {
            display: flex;
            flex-direction: column;
            align-items: center
        }

        .swal2-popup .swal2-title {
            display: block;
            position: relative;
            max-width: 100%;
            margin: 0 0 .4em;
            padding: 0;
            color: #595959;
            font-size: 1.875em;
            font-weight: 600;
            text-align: center;
            text-transform: none;
            word-wrap: break-word
        }

        .swal2-popup .swal2-actions {
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin: 1.25em auto 0;
            z-index: 1
        }

        .swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled[disabled] {
            opacity: .4
        }

        .swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled:hover {
            background-image: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .1))
        }

        .swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled:active {
            background-image: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2))
        }

        .swal2-popup .swal2-actions.swal2-loading .swal2-styled.swal2-confirm {
            width: 2.5em;
            height: 2.5em;
            margin: .46875em;
            padding: 0;
            border: .25em solid transparent;
            border-radius: 100%;
            border-color: transparent;
            background-color: transparent !important;
            color: transparent;
            cursor: default;
            box-sizing: border-box;
            -webkit-animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .swal2-popup .swal2-actions.swal2-loading .swal2-styled.swal2-cancel {
            margin-right: 30px;
            margin-left: 30px
        }

        .swal2-popup .swal2-actions.swal2-loading :not(.swal2-styled).swal2-confirm::after {
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-left: 5px;
            border: 3px solid #999;
            border-radius: 50%;
            border-right-color: transparent;
            box-shadow: 1px 1px 1px #fff;
            content: '';
            -webkit-animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            animation: swal2-rotate-loading 1.5s linear 0s infinite normal
        }

        .swal2-popup .swal2-styled {
            margin: .3125em;
            padding: .625em 2em;
            font-weight: 500;
            box-shadow: none
        }

        .swal2-popup .swal2-styled:not([disabled]) {
            cursor: pointer
        }

        .swal2-popup .swal2-styled.swal2-confirm {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #3085d6;
            color: #fff;
            font-size: 1.0625em
        }

        .swal2-popup .swal2-styled.swal2-cancel {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #aaa;
            color: #fff;
            font-size: 1.0625em
        }

        .swal2-popup .swal2-styled:focus {
            outline: 0;
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px rgba(50, 100, 150, .4)
        }

        .swal2-popup .swal2-styled::-moz-focus-inner {
            border: 0
        }

        .swal2-popup .swal2-footer {
            justify-content: center;
            margin: 1.25em 0 0;
            padding: 1em 0 0;
            border-top: 1px solid #eee;
            color: #545454;
            font-size: 1em
        }

        .swal2-popup .swal2-image {
            max-width: 100%;
            margin: 1.25em auto
        }

        .swal2-popup .swal2-close {
            position: absolute;
            top: 0;
            right: 0;
            justify-content: center;
            width: 1.2em;
            height: 1.2em;
            padding: 0;
            transition: color .1s ease-out;
            border: none;
            border-radius: 0;
            outline: initial;
            background: 0 0;
            color: #ccc;
            font-family: serif;
            font-size: 2.5em;
            line-height: 1.2;
            cursor: pointer;
            overflow: hidden
        }

        .swal2-popup .swal2-close:hover {
            -webkit-transform: none;
            transform: none;
            color: #f27474
        }

        .swal2-popup>.swal2-checkbox,
        .swal2-popup>.swal2-file,
        .swal2-popup>.swal2-input,
        .swal2-popup>.swal2-radio,
        .swal2-popup>.swal2-select,
        .swal2-popup>.swal2-textarea {
            display: none
        }

        .swal2-popup .swal2-content {
            justify-content: center;
            margin: 0;
            padding: 0;
            color: #545454;
            font-size: 1.125em;
            font-weight: 300;
            line-height: normal;
            z-index: 1;
            word-wrap: break-word
        }

        .swal2-popup #swal2-content {
            text-align: center
        }

        .swal2-popup .swal2-checkbox,
        .swal2-popup .swal2-file,
        .swal2-popup .swal2-input,
        .swal2-popup .swal2-radio,
        .swal2-popup .swal2-select,
        .swal2-popup .swal2-textarea {
            margin: 1em auto
        }

        .swal2-popup .swal2-file,
        .swal2-popup .swal2-input,
        .swal2-popup .swal2-textarea {
            width: 100%;
            transition: border-color .3s, box-shadow .3s;
            border: 1px solid #d9d9d9;
            border-radius: .1875em;
            background: inherit;
            font-size: 1.125em;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .06);
            box-sizing: border-box
        }

        .swal2-popup .swal2-file.swal2-inputerror,
        .swal2-popup .swal2-input.swal2-inputerror,
        .swal2-popup .swal2-textarea.swal2-inputerror {
            border-color: #f27474 !important;
            box-shadow: 0 0 2px #f27474 !important
        }

        .swal2-popup .swal2-file:focus,
        .swal2-popup .swal2-input:focus,
        .swal2-popup .swal2-textarea:focus {
            border: 1px solid #b4dbed;
            outline: 0;
            box-shadow: 0 0 3px #c4e6f5
        }

        .swal2-popup .swal2-file::-webkit-input-placeholder,
        .swal2-popup .swal2-input::-webkit-input-placeholder,
        .swal2-popup .swal2-textarea::-webkit-input-placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-file:-ms-input-placeholder,
        .swal2-popup .swal2-input:-ms-input-placeholder,
        .swal2-popup .swal2-textarea:-ms-input-placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-file::-ms-input-placeholder,
        .swal2-popup .swal2-input::-ms-input-placeholder,
        .swal2-popup .swal2-textarea::-ms-input-placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-file::placeholder,
        .swal2-popup .swal2-input::placeholder,
        .swal2-popup .swal2-textarea::placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-range {
            margin: 1em auto;
            background: inherit
        }

        .swal2-popup .swal2-range input {
            width: 80%
        }

        .swal2-popup .swal2-range output {
            width: 20%;
            font-weight: 600;
            text-align: center
        }

        .swal2-popup .swal2-range input,
        .swal2-popup .swal2-range output {
            height: 2.625em;
            padding: 0;
            font-size: 1.125em;
            line-height: 2.625em
        }

        .swal2-popup .swal2-input {
            height: 2.625em;
            padding: 0 .75em
        }

        .swal2-popup .swal2-input[type=number] {
            max-width: 10em
        }

        .swal2-popup .swal2-file {
            background: inherit;
            font-size: 1.125em
        }

        .swal2-popup .swal2-textarea {
            height: 6.75em;
            padding: .75em
        }

        .swal2-popup .swal2-select {
            min-width: 50%;
            max-width: 100%;
            padding: .375em .625em;
            background: inherit;
            color: #545454;
            font-size: 1.125em
        }

        .swal2-popup .swal2-checkbox,
        .swal2-popup .swal2-radio {
            align-items: center;
            justify-content: center;
            background: inherit
        }

        .swal2-popup .swal2-checkbox label,
        .swal2-popup .swal2-radio label {
            margin: 0 .6em;
            font-size: 1.125em
        }

        .swal2-popup .swal2-checkbox input,
        .swal2-popup .swal2-radio input {
            margin: 0 .4em
        }

        .swal2-popup .swal2-validation-message {
            display: none;
            align-items: center;
            justify-content: center;
            padding: .625em;
            background: #f0f0f0;
            color: #666;
            font-size: 1em;
            font-weight: 300;
            overflow: hidden
        }

        .swal2-popup .swal2-validation-message::before {
            display: inline-block;
            width: 1.5em;
            min-width: 1.5em;
            height: 1.5em;
            margin: 0 .625em;
            border-radius: 50%;
            background-color: #f27474;
            color: #fff;
            font-weight: 600;
            line-height: 1.5em;
            text-align: center;
            content: '!';
            zoom: normal
        }

        @supports (-ms-accelerator:true) {
            .swal2-range input {
                width: 100% !important
            }

            .swal2-range output {
                display: none
            }
        }

        @media all and (-ms-high-contrast:none),
        (-ms-high-contrast:active) {
            .swal2-range input {
                width: 100% !important
            }

            .swal2-range output {
                display: none
            }
        }

        @-moz-document url-prefix() {
            .swal2-close:focus {
                outline: 2px solid rgba(50, 100, 150, .4)
            }
        }

        .swal2-icon {
            position: relative;
            justify-content: center;
            width: 5em;
            height: 5em;
            margin: 1.25em auto 1.875em;
            border: .25em solid transparent;
            border-radius: 50%;
            line-height: 5em;
            cursor: default;
            box-sizing: content-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            zoom: normal
        }

        .swal2-icon-text {
            font-size: 3.75em
        }

        .swal2-icon.swal2-error {
            border-color: #f27474
        }

        .swal2-icon.swal2-error .swal2-x-mark {
            position: relative;
            flex-grow: 1
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
            display: block;
            position: absolute;
            top: 2.3125em;
            width: 2.9375em;
            height: .3125em;
            border-radius: .125em;
            background-color: #f27474
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
            left: 1.0625em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
            right: 1em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal2-icon.swal2-warning {
            border-color: #facea8;
            color: #f8bb86
        }

        .swal2-icon.swal2-info {
            border-color: #9de0f6;
            color: #3fc3ee
        }

        .swal2-icon.swal2-question {
            border-color: #c9dae1;
            color: #87adbd
        }

        .swal2-icon.swal2-success {
            border-color: #a5dc86
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line] {
            position: absolute;
            width: 3.75em;
            height: 7.5em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            border-radius: 50%
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left] {
            top: -.4375em;
            left: -2.0635em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 3.75em 3.75em;
            transform-origin: 3.75em 3.75em;
            border-radius: 7.5em 0 0 7.5em
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right] {
            top: -.6875em;
            left: 1.875em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0 3.75em;
            transform-origin: 0 3.75em;
            border-radius: 0 7.5em 7.5em 0
        }

        .swal2-icon.swal2-success .swal2-success-ring {
            position: absolute;
            top: -.25em;
            left: -.25em;
            width: 100%;
            height: 100%;
            border: .25em solid rgba(165, 220, 134, .3);
            border-radius: 50%;
            z-index: 2;
            box-sizing: content-box
        }

        .swal2-icon.swal2-success .swal2-success-fix {
            position: absolute;
            top: .5em;
            left: 1.625em;
            width: .4375em;
            height: 5.625em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            z-index: 1
        }

        .swal2-icon.swal2-success [class^=swal2-success-line] {
            display: block;
            position: absolute;
            height: .3125em;
            border-radius: .125em;
            background-color: #a5dc86;
            z-index: 2
        }

        .swal2-icon.swal2-success [class^=swal2-success-line][class$=tip] {
            top: 2.875em;
            left: .875em;
            width: 1.5625em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal2-icon.swal2-success [class^=swal2-success-line][class$=long] {
            top: 2.375em;
            right: .5em;
            width: 2.9375em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal2-progress-steps {
            align-items: center;
            margin: 0 0 1.25em;
            padding: 0;
            background: inherit;
            font-weight: 600
        }

        .swal2-progress-steps li {
            display: inline-block;
            position: relative
        }

        .swal2-progress-steps .swal2-progress-step {
            width: 2em;
            height: 2em;
            border-radius: 2em;
            background: #3085d6;
            color: #fff;
            line-height: 2em;
            text-align: center;
            z-index: 20
        }

        .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step {
            background: #3085d6
        }

        .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step {
            background: inherit;
            color: #fff
        }

        .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line {
            background: inherit
        }

        .swal2-progress-steps .swal2-progress-step-line {
            width: 2.5em;
            height: .4em;
            margin: 0 -1px;
            background: #3085d6;
            z-index: 10
        }

        [class^=swal2] {
            -webkit-tap-highlight-color: transparent
        }

        .swal2-show {
            -webkit-animation: swal2-show .3s;
            animation: swal2-show .3s
        }

        .swal2-show.swal2-noanimation {
            -webkit-animation: none;
            animation: none
        }

        .swal2-hide {
            -webkit-animation: swal2-hide .15s forwards;
            animation: swal2-hide .15s forwards
        }

        .swal2-hide.swal2-noanimation {
            -webkit-animation: none;
            animation: none
        }

        .swal2-rtl .swal2-close {
            right: auto;
            left: 0
        }

        .swal2-animate-success-icon .swal2-success-line-tip {
            -webkit-animation: swal2-animate-success-line-tip .75s;
            animation: swal2-animate-success-line-tip .75s
        }

        .swal2-animate-success-icon .swal2-success-line-long {
            -webkit-animation: swal2-animate-success-line-long .75s;
            animation: swal2-animate-success-line-long .75s
        }

        .swal2-animate-success-icon .swal2-success-circular-line-right {
            -webkit-animation: swal2-rotate-success-circular-line 4.25s ease-in;
            animation: swal2-rotate-success-circular-line 4.25s ease-in
        }

        .swal2-animate-error-icon {
            -webkit-animation: swal2-animate-error-icon .5s;
            animation: swal2-animate-error-icon .5s
        }

        .swal2-animate-error-icon .swal2-x-mark {
            -webkit-animation: swal2-animate-error-x-mark .5s;
            animation: swal2-animate-error-x-mark .5s
        }

        @-webkit-keyframes swal2-rotate-loading {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes swal2-rotate-loading {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @media print {
            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
                overflow-y: scroll !important
            }

            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true] {
                display: none
            }

            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container {
                position: initial !important
            }
        }

    </style>
    <style type="text/css">
        .cleanslate,
        .cleanslate a,
        .cleanslate abbr,
        .cleanslate acronym,
        .cleanslate address,
        .cleanslate applet,
        .cleanslate area,
        .cleanslate aside,
        .cleanslate audio,
        .cleanslate b,
        .cleanslate big,
        .cleanslate blockquote,
        .cleanslate button,
        .cleanslate canvas,
        .cleanslate caption,
        .cleanslate cite,
        .cleanslate code,
        .cleanslate col,
        .cleanslate colgroup,
        .cleanslate datalist,
        .cleanslate dd,
        .cleanslate del,
        .cleanslate dfn,
        .cleanslate div,
        .cleanslate dl,
        .cleanslate dt,
        .cleanslate em,
        .cleanslate fieldset,
        .cleanslate figcaption,
        .cleanslate figure,
        .cleanslate footer,
        .cleanslate form,
        .cleanslate h1,
        .cleanslate h2,
        .cleanslate h3,
        .cleanslate h4,
        .cleanslate h5,
        .cleanslate h6,
        .cleanslate header,
        .cleanslate hr,
        .cleanslate i,
        .cleanslate iframe,
        .cleanslate img,
        .cleanslate input,
        .cleanslate ins,
        .cleanslate kbd,
        .cleanslate label,
        .cleanslate legend,
        .cleanslate li,
        .cleanslate main,
        .cleanslate map,
        .cleanslate mark,
        .cleanslate menu,
        .cleanslate meta,
        .cleanslate nav,
        .cleanslate object,
        .cleanslate ol,
        .cleanslate optgroup,
        .cleanslate option,
        .cleanslate output,
        .cleanslate p,
        .cleanslate pre,
        .cleanslate progress,
        .cleanslate q,
        .cleanslate samp,
        .cleanslate section,
        .cleanslate select,
        .cleanslate small,
        .cleanslate span,
        .cleanslate strike,
        .cleanslate strong,
        .cleanslate sub,
        .cleanslate summary,
        .cleanslate sup,
        .cleanslate table,
        .cleanslate tbody,
        .cleanslate td,
        .cleanslate textarea,
        .cleanslate tfoot,
        .cleanslate th,
        .cleanslate thead,
        .cleanslate time,
        .cleanslate tr,
        .cleanslate tt,
        .cleanslate ul,
        .cleanslate var,
        .cleanslate video,
        .cleanslate article {
            background-attachment: scroll !important;
            background-color: transparent !important;
            background-image: none !important;
            background-position: 0 0 !important;
            background-repeat: repeat !important;
            border-color: currentColor !important;
            border-style: none !important;
            border-width: medium !important;
            bottom: auto !important;
            clear: none !important;
            clip: auto !important;
            color: inherit !important;
            counter-increment: none !important;
            counter-reset: none !important;
            cursor: auto !important;
            direction: inherit !important;
            display: inline !important;
            float: none !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-style: inherit !important;
            font-variant: normal !important;
            font-weight: inherit !important;
            height: auto !important;
            left: auto !important;
            letter-spacing: normal !important;
            line-height: inherit !important;
            list-style-type: inherit !important;
            list-style-position: outside !important;
            list-style-image: none !important;
            margin: 0 !important;
            max-height: none !important;
            max-width: none !important;
            min-height: 0 !important;
            min-width: 0 !important;
            opacity: 1;
            outline: 0 !important;
            overflow: visible !important;
            padding: 0 !important;
            position: static !important;
            quotes: """" !important;
            right: auto !important;
            table-layout: auto !important;
            text-align: inherit !important;
            text-decoration: inherit !important;
            text-indent: 0 !important;
            text-transform: none !important;
            top: auto !important;
            unicode-bidi: normal !important;
            vertical-align: baseline !important;
            visibility: inherit !important;
            white-space: normal !important;
            width: auto !important;
            word-spacing: normal !important;
            z-index: auto !important;
            -webkit-background-origin: padding-box !important;
            background-origin: padding-box !important;
            -webkit-background-clip: border-box !important;
            background-clip: border-box !important;
            -webkit-background-size: auto !important;
            -moz-background-size: auto !important;
            background-size: auto !important;
            -webkit-border-image: none !important;
            -moz-border-image: none !important;
            -o-border-image: none !important;
            border-image: none !important;
            -webkit-border-radius: 0 !important;
            -moz-border-radius: 0 !important;
            border-radius: 0 !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            -webkit-box-sizing: content-box !important;
            -moz-box-sizing: content-box !important;
            box-sizing: content-box !important;
            -webkit-column-count: auto !important;
            -moz-column-count: auto !important;
            column-count: auto !important;
            -webkit-column-gap: normal !important;
            -moz-column-gap: normal !important;
            column-gap: normal !important;
            -webkit-column-rule: medium none #000 !important;
            -moz-column-rule: medium none #000 !important;
            column-rule: medium none #000 !important;
            -webkit-column-span: 1 !important;
            -moz-column-span: 1 !important;
            column-span: 1 !important;
            -webkit-column-width: auto !important;
            -moz-column-width: auto !important;
            column-width: auto !important;
            font-feature-settings: normal !important;
            overflow-x: visible !important;
            overflow-y: visible !important;
            -webkit-hyphens: manual !important;
            -moz-hyphens: manual !important;
            hyphens: manual !important;
            -webkit-perspective: none !important;
            -moz-perspective: none !important;
            -ms-perspective: none !important;
            -o-perspective: none !important;
            perspective: none !important;
            -webkit-perspective-origin: 50% 50% !important;
            -moz-perspective-origin: 50% 50% !important;
            -ms-perspective-origin: 50% 50% !important;
            -o-perspective-origin: 50% 50% !important;
            perspective-origin: 50% 50% !important;
            -webkit-backface-visibility: visible !important;
            -moz-backface-visibility: visible !important;
            -ms-backface-visibility: visible !important;
            -o-backface-visibility: visible !important;
            backface-visibility: visible !important;
            text-shadow: none !important;
            -webkit-transition: all 0s ease 0s !important;
            transition: all 0s ease 0s !important;
            -webkit-transform: none !important;
            -moz-transform: none !important;
            -ms-transform: none !important;
            -o-transform: none !important;
            transform: none !important;
            -webkit-transform-origin: 50% 50% !important;
            -moz-transform-origin: 50% 50% !important;
            -ms-transform-origin: 50% 50% !important;
            -o-transform-origin: 50% 50% !important;
            transform-origin: 50% 50% !important;
            -webkit-transform-style: flat !important;
            -moz-transform-style: flat !important;
            -ms-transform-style: flat !important;
            -o-transform-style: flat !important;
            transform-style: flat !important;
            word-break: normal !important
        }

        .cleanslate em,
        .cleanslate mark {
            font-style: italic !important
        }

        .cleanslate h1,
        .cleanslate h2,
        .cleanslate h3,
        .cleanslate h4,
        .cleanslate h5,
        .cleanslate h6,
        .cleanslate mark,
        .cleanslate strong {
            font-weight: 700 !important
        }

        .cleanslate ol,
        .cleanslate p,
        .cleanslate ul {
            margin: 1em 0 !important
        }

        .cleanslate,
        .cleanslate address,
        .cleanslate audio,
        .cleanslate blockquote,
        .cleanslate caption,
        .cleanslate colgroup,
        .cleanslate dd,
        .cleanslate dialog,
        .cleanslate div,
        .cleanslate dl,
        .cleanslate dt,
        .cleanslate fieldset,
        .cleanslate figure,
        .cleanslate footer,
        .cleanslate form,
        .cleanslate h1,
        .cleanslate h2,
        .cleanslate h3,
        .cleanslate h4,
        .cleanslate h5,
        .cleanslate h6,
        .cleanslate header,
        .cleanslate hgroup,
        .cleanslate hr,
        .cleanslate main,
        .cleanslate menu,
        .cleanslate nav,
        .cleanslate ol,
        .cleanslate option,
        .cleanslate p,
        .cleanslate pre,
        .cleanslate progress,
        .cleanslate section,
        .cleanslate summary,
        .cleanslate ul,
        .cleanslate video,
        .cleanslate article {
            display: block !important
        }

        .cleanslate h1 {
            font-size: 2em !important;
            padding: .67em 0 !important
        }

        .cleanslate h2 {
            font-size: 1.5em !important;
            padding: .83em 0 !important
        }

        .cleanslate h3 {
            font-size: 1.17em !important;
            padding: .83em 0 !important
        }

        .cleanslate h4 {
            font-size: 1em !important
        }

        .cleanslate h5 {
            font-size: .83em !important
        }

        .cleanslate table {
            display: table !important;
            border-collapse: collapse !important;
            border-spacing: 0 !important
        }

        .cleanslate thead {
            display: table-header-group !important
        }

        .cleanslate tbody {
            display: table-row-group !important
        }

        .cleanslate tfoot {
            display: table-footer-group !important
        }

        .cleanslate tr {
            display: table-row !important
        }

        .cleanslate td,
        .cleanslate th {
            display: table-cell !important;
            padding: 2px !important
        }

        .cleanslate ol li,
        .cleanslate ol ol li,
        .cleanslate ol ol ol li,
        .cleanslate ol ol ul li,
        .cleanslate ol ul ul li,
        .cleanslate ul li,
        .cleanslate ul ol ol li,
        .cleanslate ul ul li,
        .cleanslate ul ul ol li,
        .cleanslate ul ul ul li {
            list-style-position: inside !important;
            margin-top: .08em !important
        }

        .cleanslate ol ol,
        .cleanslate ol ol ol,
        .cleanslate ol ol ul,
        .cleanslate ol ul,
        .cleanslate ol ul ul,
        .cleanslate ul ol,
        .cleanslate ul ol ol,
        .cleanslate ul ul,
        .cleanslate ul ul ol,
        .cleanslate ul ul ul {
            padding-left: 40px !important;
            margin: 0 !important
        }

        .cleanslate nav ol,
        .cleanslate nav ul {
            list-style-type: none !important
        }

        .cleanslate menu,
        .cleanslate ul {
            list-style-type: disc !important
        }

        .cleanslate ol {
            list-style-type: decimal !important
        }

        .cleanslate menu menu,
        .cleanslate menu ul,
        .cleanslate ol menu,
        .cleanslate ol ul,
        .cleanslate ul menu,
        .cleanslate ul ul {
            list-style-type: circle !important
        }

        .cleanslate menu menu menu,
        .cleanslate menu menu ul,
        .cleanslate menu ol menu,
        .cleanslate menu ol ul,
        .cleanslate menu ul menu,
        .cleanslate menu ul ul,
        .cleanslate ol menu menu,
        .cleanslate ol menu ul,
        .cleanslate ol ol menu,
        .cleanslate ol ol ul,
        .cleanslate ol ul menu,
        .cleanslate ol ul ul,
        .cleanslate ul menu menu,
        .cleanslate ul menu ul,
        .cleanslate ul ol menu,
        .cleanslate ul ol ul,
        .cleanslate ul ul menu,
        .cleanslate ul ul ul {
            list-style-type: square !important
        }

        .cleanslate li {
            display: list-item !important;
            min-height: auto !important;
            min-width: auto !important;
            padding-left: 20px !important
        }

        .cleanslate code,
        .cleanslate kbd,
        .cleanslate samp {
            font-family: monospace !important
        }

        .cleanslate a {
            color: #00f !important;
            text-decoration: underline !important
        }

        .cleanslate a:visited {
            color: #529 !important
        }

        .cleanslate a,
        .cleanslate a *,
        .cleanslate input[type=checkbox],
        .cleanslate input[type=radio],
        .cleanslate input[type=submit],
        .cleanslate select {
            cursor: pointer !important
        }

        .cleanslate button,
        .cleanslate input[type=submit] {
            text-align: center !important;
            padding: 2px 6px 3px !important;
            border-radius: 4px !important;
            text-decoration: none !important;
            font-family: arial, helvetica, sans-serif !important;
            font-size: small !important;
            -webkit-appearance: push-button !important;
            color: buttontext !important;
            border: 1px solid #a6a6a6 !important;
            background: #d3d3d3 !important;
            background: -moz-linear-gradient(top, rgba(255, 255, 255, 1) 0, rgba(221, 221, 221, 1) 100%, rgba(209, 209, 209, 1) 100%, rgba(221, 221, 221, 1) 100%) !important;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(255, 255, 255, 1)), color-stop(100%, rgba(221, 221, 221, 1)), color-stop(100%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(221, 221, 221, 1))) !important;
            background: -webkit-linear-gradient(top, rgba(255, 255, 255, 1) 0, rgba(221, 221, 221, 1) 100%, rgba(209, 209, 209, 1) 100%, rgba(221, 221, 221, 1) 100%) !important;
            background: -o-linear-gradient(top, rgba(255, 255, 255, 1) 0, rgba(221, 221, 221, 1) 100%, rgba(209, 209, 209, 1) 100%, rgba(221, 221, 221, 1) 100%) !important;
            background: -ms-linear-gradient(top, rgba(255, 255, 255, 1) 0, rgba(221, 221, 221, 1) 100%, rgba(209, 209, 209, 1) 100%, rgba(221, 221, 221, 1) 100%) !important;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0, rgba(221, 221, 221, 1) 100%, rgba(209, 209, 209, 1) 100%, rgba(221, 221, 221, 1) 100%) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#dddddd', GradientType=0) !important;
            -webkit-box-shadow: 1px 1px 0 #eee !important;
            -moz-box-shadow: 1px 1px 0 #eee !important;
            -o-box-shadow: 1px 1px 0 #eee !important;
            box-shadow: 1px 1px 0 #eee !important;
            outline: initial !important
        }

        .cleanslate button {
            padding: 1px 6px 2px !important;
            margin-right: 5px !important
        }

        .cleanslate input[type=hidden] {
            display: none !important
        }

        .cleanslate textarea {
            -webkit-appearance: textarea !important;
            background: #fff !important;
            padding: 2px !important;
            margin-left: 4px !important;
            word-wrap: break-word !important;
            white-space: pre-wrap !important;
            font-size: 11px !important;
            font-family: arial, helvetica, sans-serif !important;
            line-height: 13px !important;
            resize: both !important
        }

        .cleanslate input,
        .cleanslate select,
        .cleanslate textarea {
            border: 1px solid #ccc !important
        }

        .cleanslate select {
            font-size: 11px !important;
            font-family: helvetica, arial, sans-serif !important;
            display: inline-block
        }

        .cleanslate input:focus,
        .cleanslate textarea:focus {
            outline: -webkit-focus-ring-color auto 5px !important;
            outline: initial !important
        }

        .cleanslate input[type=text] {
            background: #fff !important;
            padding: 1px !important;
            font-family: initial !important;
            font-size: small !important
        }

        .cleanslate input[type=checkbox],
        .cleanslate input[type=radio] {
            border: 1px solid #2b2b2b !important;
            border-radius: 4px !important;
            outline: intial !important
        }

        .cleanslate input[type=radio] {
            margin: 2px 2px 3px !important
        }

        .cleanslate button:active,
        .cleanslate input[type=submit]:active {
            background: #3b679e !important;
            background: -moz-linear-gradient(top, rgba(59, 103, 158, 1) 0, rgba(43, 136, 217, 1) 50%, rgba(32, 124, 202, 1) 51%, rgba(125, 185, 232, 1) 100%) !important;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(59, 103, 158, 1)), color-stop(50%, rgba(43, 136, 217, 1)), color-stop(51%, rgba(32, 124, 202, 1)), color-stop(100%, rgba(125, 185, 232, 1))) !important;
            background: -webkit-linear-gradient(top, rgba(59, 103, 158, 1) 0, rgba(43, 136, 217, 1) 50%, rgba(32, 124, 202, 1) 51%, rgba(125, 185, 232, 1) 100%) !important;
            background: -o-linear-gradient(top, rgba(59, 103, 158, 1) 0, rgba(43, 136, 217, 1) 50%, rgba(32, 124, 202, 1) 51%, rgba(125, 185, 232, 1) 100%) !important;
            background: -ms-linear-gradient(top, rgba(59, 103, 158, 1) 0, rgba(43, 136, 217, 1) 50%, rgba(32, 124, 202, 1) 51%, rgba(125, 185, 232, 1) 100%) !important;
            background: linear-gradient(to bottom, rgba(59, 103, 158, 1) 0, rgba(43, 136, 217, 1) 50%, rgba(32, 124, 202, 1) 51%, rgba(125, 185, 232, 1) 100%) !important;
            border-color: #5259b0 !important
        }

        .cleanslate ins,
        .cleanslate mark {
            background-color: #ff9 !important;
            color: #000 !important
        }

        .cleanslate abbr[title],
        .cleanslate acronym[title],
        .cleanslate dfn[title] {
            cursor: help !important;
            border-bottom-width: 1px !important;
            border-bottom-style: dotted !important
        }

        .cleanslate del {
            text-decoration: line-through !important
        }

        .cleanslate blockquote,
        .cleanslate q {
            quotes: none !important
        }

        .cleanslate blockquote:after,
        .cleanslate blockquote:before,
        .cleanslate li:after,
        .cleanslate li:before,
        .cleanslate q:after,
        .cleanslate q:before {
            content: "" !important
        }

        .cleanslate input,
        .cleanslate select {
            vertical-align: middle !important
        }

        .cleanslate hr {
            display: block !important;
            height: 1px !important;
            border: 0 !important;
            border-top: 1px solid #ccc !important;
            margin: 1em 0 !important
        }

        .cleanslate [dir=rtl] {
            direction: rtl !important
        }

        .cleanslate menu {
            padding-left: 40px !important;
            padding-top: 8px !important
        }

        .cleanslate [hidden],
        .cleanslate template {
            display: none !important
        }

        .cleanslate abbr[title] {
            border-bottom: 1px dotted !important
        }

        .cleanslate sub,
        .cleanslate sup {
            font-size: 75% !important;
            line-height: 0 !important;
            position: relative !important;
            vertical-align: baseline !important
        }

        .cleanslate sup {
            top: -.5em !important
        }

        .cleanslate sub {
            bottom: -.25em !important
        }

        .cleanslate img {
            border: 0 !important
        }

        .cleanslate figure {
            margin: 0 !important
        }

        .cleanslate textarea {
            overflow: auto !important;
            vertical-align: top !important
        }

        .cleanslate {
            font-size: medium !important;
            line-height: 1 !important;
            direction: ltr !important;
            text-align: left !important;
            text-align: start !important;
            font-family: "Times New Roman", Times, serif !important;
            color: #000 !important;
            font-style: normal !important;
            font-weight: 400 !important;
            text-decoration: none !important;
            list-style-type: disc !important
        }

        #my-widget a {
            color: orange !important;
        }

    </style>
    <style type="text/css">
        /*
.tingle-modal--visible .tingle-modal-box__footer {
    display: none;
}
*/

    </style>
    <style type="text/css">
        .generic {
            font-family: 'Open Sans Condensed', arial, sans;
            width: 500px;
            padding: 30px;
            background: #FFFFFF;
            margin: 50px auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
            -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
            -webkit-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);

        }

        .generic h2 {
            background: #4D4D4D;
            text-transform: uppercase;
            font-family: 'Open Sans Condensed', sans-serif;
            color: #797979;
            font-size: 18px;
            font-weight: 100;
            padding: 20px;
            margin: -30px -30px 30px -30px;
        }

        .generic input[type="text"],
        .generic input[type="date"],
        .generic input[type="datetime"],
        .generic input[type="email"],
        .generic input[type="number"],
        .generic input[type="search"],
        .generic input[type="time"],
        .generic input[type="url"],
        .generic input[type="password"],
        .generic textarea,
        .generic select {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            display: block;
            width: 100%;
            padding: 7px;
            border: none;
            border-bottom: 1px solid #ddd;
            background: transparent;
            margin-bottom: 10px;
            font: 16px Arial, Helvetica, sans-serif;
            height: 45px;
        }

        .generic textarea {
            resize: none;
            overflow: hidden;
        }

        .generic input[type="button"],
        .generic input[type="submit"] {
            -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
            -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
            box-shadow: inset 0px 1px 0px 0px #45D6D6;
            background-color: #2CBBBB;
            border: 1px solid #27A0A0;
            display: inline-block;
            cursor: pointer;
            color: #FFFFFF;
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 14px;
            padding: 8px 18px;
            text-decoration: none;
            text-transform: uppercase;
        }

        .generic input[type="button"]:hover,
        .generic input[type="submit"]:hover {
            background: linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
            background-color: #34CACA;
        }


        .s_button {
            border-radius: 28px;
            position: absolute;
            left: 50%;
            top: 50%;
            display: block;
            background: #fff;
            width: 150px;
            box-shadow: 0 2px 6px rgba(170, 185, 200, 0.4);
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .s_button svg {
            display: none;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -15px 0 0 -15px;
            fill: #fff;
        }

        .s_button div {
            height: 4px;
            margin: -2px 0 0 0;
            position: absolute;
            top: 50%;
            left: 71px;
            right: 25px;
            background: #d3d7e0;
            display: none;
            border-radius: 2px;
        }

        .s_button div span {
            position: absolute;
            background: #28e470;
            height: 4px;
            left: 0;
            top: 0;
            width: 0;
            display: block;
            border-radius: 2px;
        }

        .s_button a {
            position: relative;
            display: block;
            background: #3f82d7;
            z-index: 2;
            line-height: 56px;
            height: 56px;
            border-radius: 28px;
            width: 100%;
            text-align: center;
            color: #fff;
            box-shadow: 0 2px 6px rgba(170, 185, 200, 0.4);
        }

        .s_button a span {
            cursor: pointer;
            display: block;
        }









        .sloader,
        .sloader:after {
            border-radius: 50%;
            width: 10em;
            height: 10em;
        }

        .sloader {
            top: 35%;
            margin: 60px auto;
            font-size: 10px;
            position: relative;
            text-indent: -9999em;
            border-top: 1.1em solid rgba(255, 255, 255, 0.2);
            border-right: 1.1em solid rgba(255, 255, 255, 0.2);
            border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
            border-left: 1.1em solid #ffffff;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation: load8 1.1s infinite linear;
            animation: load8 1.1s infinite linear;
            z-index: 99999999;
        }

        @-webkit-keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }




        .s_button {
            color: #fff;
        }

        .shaz_back_overlay {
            display: block;
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 9;
        }




        .icon-lock {
            width: 48px;
            height: 48px;
            position: absolute;
            overflow: hidden;
            margin-left: 25px;
            margin-bottom: 25px;
            top: 46.5%;
            left: 46.8%;
        }

        .icon-lock .lock-top-1 {
            width: 40%;
            height: 40%;
            position: absolute;
            left: 50%;
            margin-left: -20%;
            top: 14%;
            background-color: #fff;
            border-radius: 40%;
        }

        .icon-lock .lock-top-2 {
            width: 24%;
            height: 40%;
            position: absolute;
            left: 50%;
            margin-left: -12%;
            top: 22%;
            background-color: rgba(0, 0, 0, 0.85);
            border-radius: 25%;
        }

        .icon-lock .lock-body {
            width: 60%;
            height: 48%;
            position: absolute;
            left: 50%;
            margin-left: -30%;
            bottom: 11%;
            background-color: #000;
            border-radius: 15%;
        }

        .icon-lock .lock-hole {
            width: 16%;
            height: 16%;
            position: absolute;
            left: 50%;
            margin-left: -8%;
            top: 51%;
            border-radius: 100%;
            background-color: rgba(0, 0, 0, 0.85);
        }

        .icon-lock .lock-hole:after {
            content: "";
            width: 43%;
            height: 78%;
            position: absolute;
            left: 50%;
            margin-left: -20%;
            top: 100%;
            background-color: inherit;
        }


        .lock:before,
        .lock:after,
        .unlock:before,
        .unlock:after {
            z-index: 10;
            left: 8px;
            width: 3px;
            height: 3px;
            margin-top: -2px;
            background: #fff;
            /* css3 */
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .lock:before,
        .unlock:before {
            left: 9px;
            width: 1px;
            height: 4px;
            margin-top: 0px;
        }

        .lock a:before,
        .unlock a:before {
            left: 3px;
            width: 13px;
            height: 10px;
            margin-top: -4px;
        }

        .lock a:after,
        .unlock a:after {
            left: 5px;
            width: 5px;
            height: 5px;
            border: 2px solid #c55500;
            border-bottom: 0;
            margin-top: -11px;
            background: transparent;
            /* css3 */
            -webkit-border-radius: 5px 5px 0 0;
            -moz-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }

        .unlock a:after {
            left: 12px;
        }

        .lock a:hover:after,
        .lock a:focus:after,
        .lock a:active:after,
        .unlock a:hover:after,
        .unlock a:focus:after,
        .unlock a:active:after {
            border-color: #730800;
        }

        .tingle-modal--visible .tingle-modal-box__footer button {
            border: 0 none;
            float: right;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: .2;
            padding: 0;
            width: auto;
            height: auto;
        }

        .tingle-modal-box__content {
            padding: 0;
            border-radius: 6px;
        }

        .tingle-modal>.tingle-modal__close {
            display: none;
        }

        .tingle-modal--visible .tingle-modal-box__footer button.tingle-modal__close {
            right: 18px;
        }

        .iframeWrap {
            border-radius: 6px;
            overflow: hidden;
        }

        iframe {
            border: none;
            margin: 0;
            padding: 0;
            display: block;
            /* Add this */
        }

    </style>
    <style type="text/css">
        /* ----------------------------------------------------------- */
        /* == tingle v0.14.0 */
        /* ----------------------------------------------------------- */

        .tingle-modal * {
            box-sizing: border-box;
        }

        .tingle-modal {
            overflow-y: auto;
        }

        .tingle-modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            visibility: hidden;
            flex-direction: column;
            align-items: center;
            overflow: hidden;
            -webkit-overflow-scrolling: touch;
            /*background: rgba(0, 0, 0, .8);*/
            opacity: 0;
            user-select: none;
            cursor: pointer;
            transition: transform .2s ease;
        }

        /* confirm and alerts
-------------------------------------------------------------- */

        .tingle-modal--confirm .tingle-modal-box {
            text-align: center;
        }

        /* modal
-------------------------------------------------------------- */

        .tingle-modal--noOverlayClose {
            cursor: default;
        }

        .tingle-modal--noClose .tingle-modal__close {
            display: none;
        }

        .tingle-modal__close {
            position: fixed;
            top: 10px;
            right: 28px;
            z-index: 1000;
            padding: 0;
            width: 5rem;
            height: 5rem;
            border: none;
            background-color: transparent;
            color: #f0f0f0;
            font-size: 6rem;
            font-family: monospace;
            line-height: 1;
            cursor: pointer;
            transition: color .3s ease;
        }

        .tingle-modal__closeLabel {
            display: none;
        }

        .tingle-modal__close:hover {
            color: #fff;
        }

        .tingle-modal-box {
            position: relative;
            flex-shrink: 0;
            margin-top: auto;
            margin-bottom: auto;
            width: 340px;
            border-radius: 6px;
            background: #fff;
            opacity: 1;
            cursor: auto;
            transition: transform .3s cubic-bezier(.175, .885, .32, 1.275);
            transform: scale(1);
        }

        .tingle-modal-box__content {
            padding: 0;
        }

        .tingle-modal-box__footer {
            padding: 1.5rem 2rem;
            width: auto;
            border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px;
            background-color: #f5f5f5;
            cursor: auto;
        }

        .tingle-modal-box__footer::after {
            display: table;
            clear: both;
            content: "";
        }

        .tingle-modal-box__footer--sticky {
            position: fixed;
            bottom: -200px;
            /* TODO : find a better way */
            z-index: 10001;
            opacity: 1;
            transition: bottom .3s ease-in-out .3s;
        }

        /* state
-------------------------------------------------------------- */

        .tingle-enabled {
            position: fixed;
            right: 0;
            left: 0;
            /*overflow: hidden;*/
            overflow-y: scroll;
        }

        .tingle-modal--visible .tingle-modal-box__footer {
            bottom: 0;
            padding: 0;
            background: none;
            position: absolute;
            top: 6px;
            right: 5px;
            z-index: 9999;
        }

        .tingle-modal--visible .tingle-modal-box__footer button {
            border: 0 none;
            float: right;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: .2;
        }

        .tingle-enabled .tingle-content-wrapper {
            filter: blur(8px);
        }

        .tingle-modal--visible {
            visibility: visible;
            opacity: 1;
        }

        .tingle-modal--visible .tingle-modal-box {
            transform: scale(1);
        }

        .tingle-modal--overflow {
            overflow-y: scroll;
            padding-top: 8vh;
        }

        /* btn
-------------------------------------------------------------- */

        .tingle-btn {
            display: inline-block;
            margin: 0 .5rem;
            padding: 1rem 2rem;
            border: none;
            background-color: grey;
            box-shadow: none;
            color: #fff;
            vertical-align: middle;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            line-height: normal;
            cursor: pointer;
            transition: background-color .4s ease;
        }

        .tingle-btn--primary {
            background-color: #3498db;
        }

        .tingle-btn--danger {
            background-color: #e74c3c;
        }

        .tingle-btn--default {
            background-color: #34495e;
        }

        .tingle-btn--pull-left {
            float: left;
        }

        .tingle-btn--pull-right {
            float: right;
        }

        /* responsive
-------------------------------------------------------------- */

        @media (max-width : 540px) {
            .tingle-modal {
                top: 0px;
                display: block;
                padding-top: 60px;
                width: 100%;
            }

            .tingle-modal-box {
                width: auto;
                border-radius: 0;
            }

            .tingle-modal-box__content {
                overflow-y: scroll;
            }

            .tingle-modal--noClose {
                top: 0;
            }

            .tingle-modal--noOverlayClose {
                padding-top: 0;
            }

            .tingle-modal-box__footer .tingle-btn {
                display: block;
                float: none;
                margin-bottom: 1rem;
                width: 100%;
            }

            .tingle-modal__close {
                top: 0;
                right: 0;
                left: 0;
                display: block;
                width: 100%;
                height: 60px;
                border: none;
                background-color: #2c3e50;
                box-shadow: none;
                color: #fff;
                line-height: 55px;
            }

            .tingle-modal__closeLabel {
                display: inline-block;
                vertical-align: middle;
                font-size: 1.5rem;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            }

            .tingle-modal__closeIcon {
                display: inline-block;
                margin-right: .5rem;
                vertical-align: middle;
                font-size: 4rem;
            }
        }

        @supports (backdrop-filter: blur(12px)) {
            .tingle-modal {
                backdrop-filter: blur(20px);
            }

            @media (max-width : 540px) {
                .tingle-modal {
                    backdrop-filter: blur(8px);
                }
            }

            .tingle-enabled .tingle-content-wrapper {
                filter: none;
            }
        }





        .client_logo {
            width: 100px;
            height: 100px;
            background: #fff;
            border: 2px solid #2a5da8;
            border-radius: 50%;
            text-align: center;
            margin: -50px auto 5px;
            overflow: hidden;
            position: relative;
            display: table;
        }

        .client_logo_inner {
            width: 100%;
            height: 100%;
            display: table-cell;
            vertical-align: middle;
        }

        .client_logo img {
            width: 80%;
            margin-top: 0px;
        }

        #sslczPayBtn {
            position: relative;
            background: #3498db;
            border: 0 none;
            color: #fff;
            padding: 8px 20px 8px 70px;
            border-radius: 4px;
            height: 42px;
            cursor: pointer;
            text-transform: uppercase;
            font-size: 13px;
            width: 254px;
            outline: 0;
            overflow: hidden;
        }

        #sslczPayBtn:active,
        #sslczPayBtn:focus,
        #sslczPayBtn:visited,
        #sslczPayBtn:hover {
            outline: 0;
            box-shadow: none;
        }

        #sslczPayBtn:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 42px;
            height: 100%;
            background: #2a5da8 url(https://securepay.sslcommerz.com/stores/logos/z.png) no-repeat 90% 50%;
            background-size: 70%;
            border-radius: 4px 0px 0px 4px;
            z-index: 9;
        }

        #sslczPayBtn:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 54px;
            height: 100%;
            background: #2a5da8;
            border-radius: 4px 0px 0px 4px;
            -ms-transform: skewX(-20deg);
            -webkit-transform: skewX(-20deg);
            transform: skewX(-25deg);
        }

        .client_logo img {
            width: 92%;
        }

        body {

            overflow-x: hidden;
            overflow-y: scroll !important;
        }

    </style>
</head>
{{-- End Header --}}