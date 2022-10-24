'use strict';

export function useFile() {

    function onFile(event) { console.log(event); return event.target.files[0]; }

    return {
        onFile
    }

}