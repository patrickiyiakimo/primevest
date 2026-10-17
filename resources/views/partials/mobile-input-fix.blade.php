{{-- Prevent mobile browsers (iOS Safari / Android Chrome) from auto-zooming the page
     when a form field is focused. The browser zooms in whenever a focusable control's
     font-size is below 16px, which makes the page shift and breaks responsiveness.
     Forcing a 16px minimum on text-entry controls at phone widths stops the zoom. --}}
<style>
    html { -webkit-text-size-adjust: 100%; text-size-adjust: 100%; }

    @media screen and (max-width: 768px) {
        input:not([type="checkbox"]):not([type="radio"]):not([type="range"]):not([type="submit"]):not([type="button"]):not([type="reset"]):not([type="image"]):not([type="color"]):not([type="file"]),
        select,
        textarea {
            font-size: 16px !important;
        }
    }
</style>
